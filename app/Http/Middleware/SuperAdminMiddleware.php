<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check() || Auth::user()->role !== 'super_admin') {
            flash()->error('You do not have permission to access this page.');
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
