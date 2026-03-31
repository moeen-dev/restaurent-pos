<?php

use Illuminate\Support\Facades\Route;

// Backend Controllers
use App\Http\Controllers\Backend\AuthController as BackendAuthController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
// Frontend Controllers
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Pricingcontroller;
// Restaurant Controllers
use App\Http\Controllers\Resto\HomeController as RestoHomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/pricing', [Pricingcontroller::class, 'pricing'])->name('pricing');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

// Authentication routes
Route::get('/register', [FrontendAuthController::class, 'register'])->name('register');
Route::post('/register', [FrontendAuthController::class, 'registerSubmit'])->name('register.submit');
Route::get('/login', [FrontendAuthController::class, 'login'])->name('login');
Route::post('/login', [FrontendAuthController::class, 'loginSubmit'])->name('login.submit');
Route::post('/logout', [FrontendAuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'restaurant'], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    // Protected routes for restaurant role
    Route::middleware(['auth', 'restaurant:owner'])->group(function () {
        // Protected restaurant routes
        Route::get('owner/dashboard', [RestoHomeController::class, 'ownerIndex'])->name('owner.dashboard');
    });

    // Protected routes for manager role
    Route::middleware(['auth', 'restaurant:manager'])->group(function () {
        // Protected restaurant routes
        // Route::get('manager/dashboard', [RestoHomeController::class, 'managerIndex'])->name('manager.dashboard');
    });

    // Protected routes for staff role
    Route::middleware(['auth', 'restaurant:staff'])->group(function () {
        // Protected restaurant routes
        // Route::get('staff/dashboard', [RestoHomeController::class, 'staffIndex'])->name('staff.dashboard');
    });
});


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
