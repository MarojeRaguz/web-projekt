<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function menu()
    {
        return $this->hasOne(Menu::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
