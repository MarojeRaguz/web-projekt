<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function getAll() 
    {
        $r = User::get();
        return $r;
    }
    public function getByID(int $id)
    {
        $r = User::findOrFail($id);
        return $r;
    }

    public function delete(int $id)
    {
        $r = User::findOrFail($id);
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
        $r = new User();
        foreach($data as $key => $value) {   
            if($key == 'password') {
                $user->$key = Hash::make($data['password']);
            }        
            $r->$key = $value;
        }
        $r->save();
    }

}