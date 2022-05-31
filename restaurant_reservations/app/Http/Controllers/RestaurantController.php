<?php

namespace App\Http\Controllers;

use App\Interfaces\MenuRepositoryInterface;
use App\Interfaces\RestaurantRepositoryInterface;
use App\Interfaces\ReservationRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Mail\ReservationAccepted;
use App\Mail\ReservationRejected;
use Illuminate\Support\Facades\Auth;
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

        $events = array();

        $reservations = $this->reservationRepo->getByRestaurantId($restaurantId);
        foreach($reservations as $reservation){
            if($reservation->status == "accepted"){
                $events[] = [
                    'id'   => $reservation->id,
                    'title' => Auth::user()->name,
                    'start' => $reservation->startTime,
                    'end' => $reservation->endTime,
                ];
            }
        }

        return view('menu', ['events' => $events])->with('menu',$menu)->with('restaurant',$restaurant);
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

    public function store(Request $request){

        $reservation= Reservation::create([
            'startTime' => $request->startTime,
            'endTime' => $request->endTime,
            'status' => $request->status,
            'restaurant_id' => $request->restaurant_id,
            'user_id' => $request->user_id
        ]
        );
        return response()->json($reservation);

    }

}
