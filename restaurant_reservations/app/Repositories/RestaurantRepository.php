<?php

namespace App\Repositories;

use App\Interfaces\RestaurantRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Restaurant;

class RestaurantRepository implements RestaurantRepositoryInterface
{

    public function getAll() 
    {
        $r = Restaurant::get();
        return $r;
    }
    public function getByID(int $id)
    {
        $r = Restaurant::findOrFail($id);
        return $r;
    }

    public function delete(int $id)
    {
        $r = Restaurant::findOrFail($id);
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
        $r = new Restaurant();
        foreach($data as $key => $value) {           
            $r->$key = $value;
        }
        $r->save();
    }

}