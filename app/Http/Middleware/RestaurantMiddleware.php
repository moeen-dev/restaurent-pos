<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestaurantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $restaurantId = session('restaurant_id');

        $restaurant = $user->restaurants()
            ->where('restaurants.id', $restaurantId)
            ->first();

        if (!$restaurant) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'No restaurant found.');
        }

        $role = $restaurant->pivot->role;

        // Save globally
        session([
            'restaurant_id' => $restaurant->id,
            'role' => $role,
        ]);

        // ✅ FIX: Check role properly
        if (!empty($roles) && !in_array($role, $roles)) {
            return redirect()->route('home')
                ->with('error', 'Access denied');
        }

        return $next($request);
    }
}
