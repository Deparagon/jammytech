<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bidcussion;
use Mail;
use App\User;
use App\Course;
use Auth;

use App\Mail\TutorBidsEmail;
class Bidder extends Model
{
    //


    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public function lesson()
    {
    	return $this->belongsTo('App\Lesson');
    }

    public function bidcussion()
    {
    	return $this->hasMany('App\Bidcussion');
    }


   public static function doBid($user_id, $lesson_id, $price, $comments)
   {
   	 $b = new self();
   	 $b->user_id = $user_id;
   	 $b->lesson_id = $lesson_id;
   	 $b->save();
   	 Bidcussion::doTutorComments($b->id, $user_id, $price, $comments);
   	 return true;

   }

   public static function sendBidEmail($lesson, $price, $comment)
   {
       $student = User::find($lesson->id_student);
       $course = Course::find($lesson->id_course);
     Mail::to($student->email)->send( new TutorBidsEmail($student->firstname, Auth::user()->firstname, $price, $course, $lesson, $comment, date('Y-m-d H:i:s') ));    

   }
//Bidder::sendBidEmail($lesson, $request->price, $request->comment)
}
