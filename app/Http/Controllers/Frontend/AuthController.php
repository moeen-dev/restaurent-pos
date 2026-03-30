<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
}
