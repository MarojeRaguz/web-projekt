<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant; 

class IndexController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $data = Restaurant::all();
        return view('index')->with('data', $data);
    }

    public function myReservations()
    {
        return view('myReservations');
    }
}
