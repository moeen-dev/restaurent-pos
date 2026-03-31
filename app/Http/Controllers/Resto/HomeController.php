<?php

namespace App\Http\Controllers\Resto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ownerIndex()
    {
        return view('resto.resto');
    }
}
