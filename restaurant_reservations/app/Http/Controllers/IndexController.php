<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\RestaurantRepositoryInterface;

class IndexController extends Controller
{
    private $restaurantRepo;

    public function __construct(RestaurantRepositoryInterface $restaurantRepo)
    {
        //$this->middleware('auth');
        $this->restaurantRepo = $restaurantRepo;
    }

    public function index()
    {
        $data = $this->restaurantRepo->getAll();
        return view('index')->with('data', $data);
    }

    public function myReservations()
    {
        return view('myReservations');
    }
}
