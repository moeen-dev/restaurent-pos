<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function Flasher\Prime\flash;

class AuthController extends Controller
{
    public function register()
    {
        return view('frontend.layouts.auth.register');
    }

    public function registerSubmit(Request $request)
    {
        // Handle registration logic here
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'restaurant_name' => 'required|string|max:255',
            'phone_full' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'terms' => 'accepted',
        ]);

        // Generate 6 digit oto
        $otp = random_int(100000, 999999);

        // Store data in session
        session([
            'register_data' => $validatedData,
            'register_otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5) // OTP valid for 5 minutes
        ]);

        // Send OTP to user's email
        Mail::to($validatedData['email'])->send(new SendOtpMail($otp, $validatedData['name']));

        flash()->success('An OTP has been sent to your email. Please verify to complete registration.');
        return redirect()->route('register.otp');
    }

    public function showOtpForm()
    {
        // Optional: prevent direct access without session
        if (!session('register_data')) {
            return redirect()->route('register');
        }

        return view('frontend.layouts.auth.verify-otp'); // create this view
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        if (!session('register_otp')) {
            return redirect()->route('register')->withErrors('Session expired');
        }

        if (now()->gt(session('otp_expires_at'))) {
            return back()->withErrors('OTP expired');
        }

        if ($request->otp != session('register_otp')) {
            return back()->withErrors('Invalid OTP');
        }

        // OTP verified → proceed to save
        return $this->completeRegistration();
    }

    private function completeRegistration()
    {
        $data = session('register_data');

        try {
            [$user, $restaurant] = DB::transaction(function () use ($data) {

                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'email_verified_at' => now(),
                    'password' => Hash::make($data['password']),
                    'role' => 'restaurant_owner'
                ]);

                $restaurant = Restaurant::create([
                    'owner_id' => $user->id,
                    'name' => $data['restaurant_name'],
                    'slug' => Str::slug($data['restaurant_name']),
                    'phone' => $data['phone_full'],
                    'address' => $data['address'],
                ]);

                $restaurant->users()->attach($user->id, [
                    'role' => 'owner'
                ]);

                return [$user, $restaurant];
            });

            Auth::login($user);
            session(['restaurant_id' => $restaurant->id]);

            // Clear temp session
            session()->forget([
                'register_data',
                'register_otp',
                'otp_expires_at'
            ]);

            flash()->success('Registration successful!');
            return redirect()->route('login');
        } catch (\Exception $e) {
            return redirect()->route('register')->withErrors($e->getMessage());
        }
    }

    public function login()
    {
        return view('frontend.layouts.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (!Auth::attempt($request->only('email', 'password'))) {

                flash()->error('Invalid email or password.');
                return back()->withInput();
            }

            $user = Auth::user();
            $restaurant = $user->restaurants()->first();

            if (!$restaurant) {

                Auth::logout();
                flash()->error('No restaurant found for your account.');
                return redirect()->route('login');
            }

            $role = $restaurant->pivot->role;

            session([
                'restaurant_id' => $restaurant->id,
                'role' => $role
            ]);

            // Check role properly
            if (!in_array($role, ['owner', 'manager', 'staff'])) {
                Auth::logout();
                flash()->error('Access denied for your role.');
                return redirect()->route('login');
            }

            $message = match ($role) {
                'owner' => redirect()->route('owner.dashboard')->with('success', 'Welcome, Login as an Owner!'),
                'manager' => redirect()->route('manager.dashboard')->with('success', 'Welcome, Login as a Manager!'),
                'staff' => redirect()->route('staff.dashboard')->with('success', 'Welcome, Login as a Staff!'),
                default => redirect()->route('login')->with('error', 'Login successful!')
            };

            return $message;
        } catch (\Exception $e) {

            Log::error('Login error', [
                'message' => $e->getMessage(),
                'email' => $request->input('email'),
                'ip' => $request->ip(),
            ]);

            flash()->error('Login failed: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        flash()->success('You have been logged out successfully.');
        return redirect()->route('login');
    }
}
