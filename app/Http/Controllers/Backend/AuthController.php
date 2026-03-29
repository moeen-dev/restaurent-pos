<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login form method
    public function loginForm()
    {

        if (Auth::check()) {

            $user = Auth::user();

            // optional: restrict only super_admin
            if ($user->role === 'super_admin' && $user->is_active) {
                flash()->info('You are already logged in!');
                return redirect()->route('admin.home');
            }

            Auth::logout(); 
        }
        
        return view('backend.layouts.auth.login');
    }

    // Login processing method
    public function loginSubmit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        // Login attempt
        if (Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ], $remember)) {

            $user = Auth::user();

            // Check if user is super admin and active
            if ($user->role !== 'super_admin' || !$user->is_active) {
                Auth::logout();

                flash()->error('Your account does not have access to the admin dashboard.');
                return back()->withInput();
            }

            // 3. Regenerate session
            $request->session()->regenerate();

            flash()->success('Login successful!');
            return redirect()->route('admin.home');
        }

        flash()->error('Invalid email or password.');
        return back()->withInput();
    }

    // Logout method
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
