<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TutorBidsEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
 
    public $student;
    public $tutor;
    public $price;
    public $course;
    public $lesson;
    public $comment;
    public $dedate;

    public function __construct($student, $tutor, $price, $course, $lesson, $comment, $dedate)
    {
         $this->student = $student;
         $this->tutor = $tutor;
         $this->price = $price;
         $this->course = $course;
         $this->lesson = $lesson;
         $this->comment = $comment;
         $this->dedate = $dedate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.tutorbid');
    }
}
