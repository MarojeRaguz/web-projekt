<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Restaurant3Controller extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function menu()
    {
        return view('menu');
    }
}
