<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['startTime', 'endTime', 'status','restaurant_id','user_id'];

    public function restaurant() 
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
