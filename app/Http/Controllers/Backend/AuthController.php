<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Login form method
    public function loginForm()
    {

        if (Auth::check()) {

            $user = Auth::user();

            // optional: restrict only super_admin
            if ($user->role === 'super_admin' && $user->is_active) {

                // Log already logged in user access to login page
                Log::info('Already logged in user attempted to access the admin login page.', [
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);

                flash()->info('You are already logged in!');
                return redirect()->route('admin.home');
            }

            // Log unauthorized access attempt to login page
            Log::warning('Unauthorized user tried to access admin login', [
                'user_id' => $user->id ?? null
            ]);

            Auth::logout();
        }

        return view('backend.layouts.auth.login');
    }

    // Login processing method
    public function loginSubmit(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        // Log login attempt
        log::info('Login attemtp', [
            'email' => $validated['email'],
            'ip' => $request->ip(),
        ]);

        // Login attempt
        if (Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ], $remember)) {

            $user = Auth::user();

            // Check if user is super admin and active
            if ($user->role !== 'super_admin' || !$user->is_active) {

                // Log unauthorized access attempt to admin dashboard
                Log::warning('Unauthorized user tried to access admin dashboard', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'role' => $user->role,
                    'is_active' => $user->is_active,
                    'ip' => $request->ip(),
                ]);

                Auth::logout();

                flash()->error('Your account does not have access to the admin dashboard.');
                return back()->withInput();
            }

            // Log successful login
            Log::info('User Logged in successfully', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $request->ip(),
            ]);

            // 3. Regenerate session
            $request->session()->regenerate();

            flash()->success('Login successful!');
            return redirect()->route('admin.home');
        }

        // Log failed login attempt
        Log::error('Login failed ', [
            'email' => $validated['email'],
            'ip' => $request->ip(),
        ]);

        flash()->error('Invalid email or password.');
        return back()->withInput();
    }

    // Logout method
    public function logout(Request $request)
    {
        // Log logout action
        Log::info('User logged out', [
            'user_id' => Auth::id(),
            'email' => Auth::user()->email ?? null,
            'ip' => $request->ip(),
        ]);

        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
