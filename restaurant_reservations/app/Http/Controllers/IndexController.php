<?php

namespace App\Http\Controllers;

use App\Interfaces\ReservationRepositoryInterface;
use Illuminate\Http\Request;
use App\Interfaces\RestaurantRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    private $restaurantRepo;
    private $reservationRepo;

    public function __construct(RestaurantRepositoryInterface $restaurantRepo,ReservationRepositoryInterface $reservationRepo)
    {
        //$this->middleware('auth');
        $this->restaurantRepo = $restaurantRepo;
        $this->reservationRepo=$reservationRepo;
    }

    public function index()
    {
        $restaurants = $this->restaurantRepo->getAll();
        return view('index')->with('restaurants', $restaurants);
    }

    public function myReservations()
    {
        $user=Auth::user();
        if($user->role=="user"){
            $reservations = $this->reservationRepo->getByUserId($user->id);    
        }else{
            $reservations = $this->reservationRepo->getByRestaurantId($user->restaurant_id);   
        }
        return view('myReservations')->with('reservations',$reservations);
    }
    
}
