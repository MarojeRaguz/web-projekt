<?php

namespace App\Http\Controllers;

use App\Interfaces\MenuRepositoryInterface;
use App\Interfaces\RestaurantRepositoryInterface;
use App\Interfaces\ReservationRepositoryInterface;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $menuRepo;
    private $restaurantRepo;
    private $reservationRepo;

    public function __construct(MenuRepositoryInterface $menuRepo,
        RestaurantRepositoryInterface $restaurantRepo, 
        ReservationRepositoryInterface $reservationRepo
    )
    {
        //$this->middleware('auth');
        $this->menuRepo = $menuRepo;
        $this->restaurantRepo=$restaurantRepo;
        $this->reservationRepo = $reservationRepo;
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
        return redirect('/my-reservation');
    }

    public function cancel($reservationID)
    {
        $this->reservationRepo->changeStatus("canceled", $reservationID);
        return redirect('/my-reservation');
    }

    public function delete($reservationID)
    {
        $this->reservationRepo->delete($reservationID);
        return redirect('/my-reservation');
    }

}
