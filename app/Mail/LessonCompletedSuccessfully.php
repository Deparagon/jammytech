<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LessonCompletedSuccessfully extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $firstname;
    public $coursename;
    public $studentname;
    public $comment;
    public function __construct( $firstname, $coursename, $studentname, $comment)
    {
        //

        $this->firstname = $firstname;
        $this->coursename = $coursename;
        $this->studentname = $studentname;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.lessoncompletedsuccessfully');
    }
}
