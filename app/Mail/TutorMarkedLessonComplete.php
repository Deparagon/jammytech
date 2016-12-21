<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TutorMarkedLessonComplete extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $student;
    public $tutor;
    public $comment;
    public $coursename;
    public function __construct($student, $tutor, $comment, $coursename )
    {
        //

        $this->student = $student;
        $this->tutor = $tutor;
        $this->comment = $comment;
        $this->coursename = $coursename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.tutormarkedcomplete');
    }
}
