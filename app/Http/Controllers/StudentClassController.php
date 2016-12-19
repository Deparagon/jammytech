<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\LessonComment;
use App\Course;
use App\User;
use App\Lesson;
use App\RateLesson;
use TTools;
use Auth;
use App\Transaction;
use App\Referral;
class StudentClassController extends Controller
{
    //

     public function __construct()
     {
       $this->middleware('auth');
     }
    public function acceptComplete(Lesson $lesson)
    {
    	if(TTools::obuObject($lesson)){
    	$lessoncomment = LessonComment::where(['lesson_id' => $lesson->id, 'tutor_id' => $lesson->id_tutor])->orderBy('id', 'desc')->first();
    	$course = Course::find($lesson->id_course);
    	$tutor = User::find($lesson->id_tutor);

    	return view('student.acceptcomplete', ['lesson' => $lesson, 'lessoncomment' => $lessoncomment, 'course' => $course, 'tutor' => $tutor]);

    	}


    }


    public function doLessonAcceptReject(Lesson $lesson, Request $request)
    {
        $this->validate($request, ['studentmessage' => 'required']);
   
           LessonComment::makeComment($lesson->id, Auth::user()->id, $request->studentmessage, 'STUDENT');

        if($request->has('rejectcompletion')){
                    // echo $request->rejectcompletion;
            $lesson->studentreject = 1;
            $lesson->tutorcomplete = 0;
            $lesson->save();
                     LessonComment::makeComment($lesson->id, Auth::user()->id, $request->studentmessage, 'STUDENT');

         return back()->with(['markedreject' => 'You rejected the offer to mark this lesson as completed. Your tutor will be informed.']);

        }
        
           if($request->has('acceptcomplete')){
            // $request->acceptcomplete;
            // paytutors
            $lesson->studentcomplete = 1;
            $lesson->status ='Completed';
            $lesson->save();
            $this->payTutor($lesson);
            $this->payReferral($lesson);
            $this->payAdminCommission($lesson);

            return back()->with(['markedgreend' => 'You have successfully marked this lesson as complete. Please rate your tutor, describe your experience with your tutor.']);
        }
    }



      public function rating(Lesson $lesson)
      {
           return view('student.ratelesson', ['lesson' => $lesson]);
      }

      public function rateLesson( Lesson $lesson, Request $request)
      {
           //echo $request->darating;
           //echo $request->ratecomment;

           $this->validate($request, ['darating' =>'required', 'ratecomment' => 'required']);

           RateLesson::createRating($request, Auth::user()->id, $lesson->id);
           $lesson->studentrate = 1;
           $lesson->save();

           return back()->with(['ratingsuccess' => 'Rating completed successfully, thanks for your feedback to Tutorago community']);

      }


    public function payTutor($lesson)
    {
         $per = (int) config('app.whattutorsget');
         $per  =( $per > 0)? $per : 75;

         $tutorcut = ($per/100) * $lesson->amount;

         $course = Course::find($lesson->id_course);
         
         $student = User::find($lesson->id_student);
       Transaction::payTutorLessonComplete($lesson, $tutorcut, 'Payment for the completion of '.$course->name.' lesson with '.$student->firstname );



    }

    public function payReferral($lesson)
    {

      $referral =  Referral::getStudentReferral($lesson->id_student);
      if(TTools::obuObject($referral)){

         $refercut = 0.05 * $lesson->amount;

         $student = User::find($lesson->id_student);

        Transaction::payReferral($referral->user_id, $refercut, 'Referral Bonus for referring '.$student->firstname.'  to Tutorago ');
      }



    }

   public function payAdminCommission($lesson)
   {

    $admincut = (0.2 * $lesson->amount);
     $course = Course::find($lesson->id_course);

       Transaction::payAdmin( $admincut, 'Admin Commisstion for '.$course->name.' completed. Lesson ID :'.$lesson->id);
   }
}
