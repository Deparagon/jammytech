<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JoinTutoragoTutorApproval extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $firstname;
    public $approvalnote;
    public function __construct( $firstname, $approvalnote)
    {
        //

        $this->firstname = $firstname;
        $this->approvalnote = $approvalnote;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.jointutors');
    }
}
