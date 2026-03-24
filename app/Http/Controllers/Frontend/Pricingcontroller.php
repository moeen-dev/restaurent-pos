<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pricingcontroller extends Controller
{
    public function pricing()
    {
        return view('frontend.layouts.pricing.index');
    }
}
