<?php

use App\Http\Controllers\Backend\AuthController as BackendAuthController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Pricingcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/pricing', [Pricingcontroller::class, 'pricing'])->name('pricing');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::group(['prefix' => 'admin'], function () {
    // Admin routes
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    // Admin login and dashboard routes
    Route::get('/admin-login', [BackendAuthController::class, 'loginForm'])->name('admin.login');
    Route::post('/login-processing', [BackendAuthController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::post('/logout', [BackendAuthController::class, 'logout'])->name('admin.logout');

    // Protected routes for super_admin role
    Route::middleware(['auth', 'role:super_admin'])->group(function () {
        // Protected admin routes
        Route::get('/dashboard', [BackendHomeController::class, 'index'])->name('admin.home');
    });
});
