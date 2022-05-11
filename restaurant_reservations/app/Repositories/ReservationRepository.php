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
            if($key == 'password') {
                $Reservation->$key = Hash::make($data['password']);
            }        
            $r->$key = $value;
        }
        $r->save();
    }

}