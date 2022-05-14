<?php

namespace App\Http\Controllers;

use App\Interfaces\MenuRepositoryInterface;
use App\Interfaces\RestaurantRepositoryInterface;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $menuRepo;
    private $restaurantRepo;

    public function __construct(MenuRepositoryInterface $menuRepo,RestaurantRepositoryInterface $restaurantRepo)
    {
        //$this->middleware('auth');
        $this->menuRepo = $menuRepo;
        $this->restaurantRepo=$restaurantRepo;
    }

    public function menu(int $restaurantId)
    {
        $menu = $this->menuRepo->getByRestaurantID($restaurantId);
        $restaurant = $this->restaurantRepo->getByID($restaurantId);
        return view('menu')->with('menu',$menu)->with('restaurantName',$restaurant->name);
    }



}
