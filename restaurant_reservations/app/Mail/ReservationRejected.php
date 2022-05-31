<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \App\Models\Reservation;
use \App\Models\User;
use \App\Models\Restaurant;

class ReservationRejected extends Mailable
{
    use Queueable, SerializesModels;
    public $reservation;
    public $user;
    public $restaurant;

    public function __construct(Restaurant $restaurant, Reservation $reservation, User $user)
    {
        $this->reservation = $reservation;
        $this->user = $user;
        $this->restaurant = $restaurant;
        
    }

    public function build()
    {
        return $this->from($this->user->email)
                    ->view('emails.rejectedEmail');
    }
}
