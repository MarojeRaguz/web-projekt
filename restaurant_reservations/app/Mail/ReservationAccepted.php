<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \App\Models\Reservation;
use \App\Models\User;

class ReservationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $userEmail;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('acceptedEmail');
    }
}
