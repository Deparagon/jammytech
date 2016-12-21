<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LessonRejectedByStudent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $tutor;
    public $student;
    public $comment;
    public $course;
    public function __construct($tutor, $student, $comment, $course)
    {
        //

        $this->tutor = $tutor;
        $this->student = $student;
        $this->comment = $comment; 
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.studentrejectcompletion');
    }
}
