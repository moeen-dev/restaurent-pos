<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('frontend.layouts.auth.register');
    }

    public function login()
    {
        return view('frontend.layouts.auth.login');
    }   
}
