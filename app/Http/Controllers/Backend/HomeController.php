<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Session expired']);
        }

        return view('backend.layouts.home.index');
    }
}
