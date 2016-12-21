<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class YouHaveAMessageFromTutorago extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $firstname;
    public $sendername;
    public $themessage;
    public function __construct($firstname, $sendername, $themessage)
    {
        //

        $this->firstname  = $firstname;
        $this->sendername = $sendername;
        $this->themessage = $themessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.newchat');
    }
}
