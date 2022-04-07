<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Restaurant1Controller extends Controller
{
    public function menu()
    {
        return view('menu');
    }
}
