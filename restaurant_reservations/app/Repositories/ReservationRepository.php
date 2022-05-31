<?php

namespace App\Repositories;

use App\Interfaces\ReservationRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation;

class ReservationRepository implements ReservationRepositoryInterface
{

    public function getAll() 
    {
        $r = Reservation::get();
        return $r;
    }
    public function getByID(int $id)
    {
        $r = Reservation::findOrFail($id);
        return $r;
    }

    public function getByUserId(int $userId){
        $r = Reservation::where('user_id',$userId)
                        ->get();
        return $r;
    }

    public function getByRestaurantId(int $restaurantId){
        $r = Reservation::where('restaurant_id',$restaurantId)
                        ->get();
        return $r;
    }


    public function delete(int $id)
    {
        $r = Reservation::findOrFail($id);
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
        $r = new Reservation();
        foreach($data as $key => $value) {      
            $r->$key = $value;
        }
        $r->save();
    }

    public function changeStatus(string $status, int $id)
    {
        $r = $this->getByID($id);
        $r->status = $status;
        $r->save();
    }
    

}