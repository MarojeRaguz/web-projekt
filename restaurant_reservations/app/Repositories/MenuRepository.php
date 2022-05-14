<?php

namespace App\Repositories;

use App\Interfaces\MenuRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;

class MenuRepository implements MenuRepositoryInterface
{

    public function getAll() 
    {
        $r = Menu::get();
        return $r;
    }
    public function getByID(int $id)
    {
        $r = Menu::findOrFail($id);
        return $r;
    }

    public function getByRestaurantID(int $restaurantId){
        $r = Menu::where('restaurant_id',$restaurantId)
                    ->orderBy('category','desc')
                    ->get();
        return $r;
    }

    public function delete(int $id)
    {
        $r = Menu::findOrFail($id);
        $r->delete();
    }

    public function update(array $data)
    {
        $r = $this->getByID($data['id']);

        foreach($data as $key => $value) {           
           $r->$key = $value;         
        }
        $r->save();
    }

    public function store(array $data)
    {
        $r = new Menu();
        foreach($data as $key => $value) {           
            $r->$key = $value;
        }
        $r->save();
    }

}