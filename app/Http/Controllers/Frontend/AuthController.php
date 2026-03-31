<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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

        try {
            [$user, $restaurant] = DB::transaction(function () use ($validatedData) {

                // CREATE OWNER USER
                $user = User::create([
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'email_verified_at' => now(),
                    'password' => Hash::make($validatedData['password']),
                    'role' => 'restaurant_owner'
                ]);

                // 2. CREATE RESTAURANT
                $restaurant = Restaurant::create([
                    'owner_id' => $user->id,
                    'name' => $validatedData['restaurant_name'],
                    'slug' => Str::slug($validatedData['restaurant_name']),
                    'phone' => $validatedData['phone_full'],
                    'address' => $validatedData['address'],
                ]);

                // 3. ATTACH OWNER
                $restaurant->users()->attach($user->id, [
                    'role' => 'owner'
                ]);

                return [$user, $restaurant];
            });

            // 4. LOGIN AUTO
            Auth::login($user);

            // 5. SET SESSION
            session(['restaurant_id' => $restaurant->id]);

            flash()->success('Registration successful! You are now logged in.');
            return redirect()->route('home');
        } catch (\Exception $e) {

            flash()->error('Registration failed: ' . $e->getMessage());

            return back()->withInput();
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
