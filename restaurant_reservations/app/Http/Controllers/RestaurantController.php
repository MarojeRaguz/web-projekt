<?php

namespace App\Http\Controllers;

use App\Interfaces\MenuRepositoryInterface;
use App\Interfaces\RestaurantRepositoryInterface;
use App\Interfaces\ReservationRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\ReservationAccepted;
use App\Mail\ReservationRejected;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{
    private $menuRepo;
    private $restaurantRepo;
    private $reservationRepo;
    private $userRepo;

    public function __construct(MenuRepositoryInterface $menuRepo,
        RestaurantRepositoryInterface $restaurantRepo, 
        ReservationRepositoryInterface $reservationRepo,
        UserRepositoryInterface $userRepo
    )
    {
        //$this->middleware('auth');
        $this->menuRepo = $menuRepo;
        $this->restaurantRepo=$restaurantRepo;
        $this->reservationRepo = $reservationRepo;
        $this->userRepo = $userRepo;
    }

    public function menu($restaurantId)
    {
        $menu = $this->menuRepo->getByRestaurantID($restaurantId);
        $restaurant = $this->restaurantRepo->getByID($restaurantId);
        return view('menu')->with('menu',$menu)->with('restaurantName',$restaurant->name);
    }

    public function accept($reservationID)
    {
        $this->reservationRepo->changeStatus("accepted", $reservationID);
        $this->mailForAccepted($reservationID);
        return redirect('/my-reservation');
    }

    public function cancel($reservationID)
    {
        $this->reservationRepo->changeStatus("canceled", $reservationID);
        $this->mailForRejected($reservationID);
        return redirect('/my-reservation');
    }

    public function delete($reservationID)
    {
        $this->reservationRepo->delete($reservationID);
        return redirect('/my-reservation');
    }

    public function mailForAccepted($reservationID)
    {
        $reservation = $this->reservationRepo->getByID($reservationID);
        $user = $this->userRepo->getByID($reservation->user_id);    
        $restaurant = $this->restaurantRepo->getByID($reservation->restaurant_id);
        Mail::to($user->email)->send(new ReservationAccepted($restaurant, $reservation, $user));
    }

    public function mailForRejected($reservationID)
    {
        $reservation = $this->reservationRepo->getByID($reservationID);
        $user = $this->userRepo->getByID($reservation->user_id);    
        $restaurant = $this->restaurantRepo->getByID($reservation->restaurant_id);
        Mail::to($user->email)->send(new ReservationRejected($restaurant, $reservation, $user));
    }

}
