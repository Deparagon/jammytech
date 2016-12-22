<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lesson;
use Auth;
use App\Course;
use App\LessonComment;
use App\RateLesson;
use Mail;
use App\Mail\TutorMarkedLessonComplete;
use App\User;
class TutorClassController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $myclasses = Lesson::getMyClasses(Auth::user()->id);

       $allclasses = Lesson::where(['id_tutor' => Auth::user()->id])->count();
 $completedcount = Lesson::where(['id_tutor' => Auth::user()->id, 'status' => 'Completed'])->count();
 $ongoingcount = Lesson::where(['id_tutor' => Auth::user()->id, 'status' => 'Ongoing'])->count();
        return view('tutor.myclasses', ['myclasses' => $myclasses, 'ongoingcount' => $ongoingcount, 'completedcount' => $completedcount, 'allclasses'=> $allclasses]);


    }

    public function lessonComplete(Lesson $lesson)
    {
        $course = Course::find($lesson->id_course);
        $lessoncomments = LessonComment::where(['lesson_id' => $lesson->id])->get();
        return view('tutor.tutorlessoncomplete', ['lesson' => $lesson, 'course' => $course, 'lessoncomments' => $lessoncomments]);
    }


    public function tutorMarkComplete(Lesson $lesson, Request $request)
    {

        $this->validate($request, ['tutormessage' => 'required']);
        $lesson->tutorcomplete = 1;
        $lesson->save();
         $student = User::find($lesson->id_student);
         $course = Course::find($lesson->id_course);
         Mail::to($student->email)->send( new TutorMarkedLessonComplete( $student->firstname, Auth::user()->firstname, $request->tutormessage, $course->name ));
         
         LessonComment::makeComment($lesson->id, Auth::user()->id, $request->tutormessage);
         return back()->with(['markedgreend' => 'Lesson has been marked as complete, we will wait for student to respond']);
    }


    public function rating(Lesson $lesson)
    {
        return view('tutor.ratecompletedlesson', ['lesson' => $lesson]);

    }
    public function rateCompletedLesson(Lesson $lesson, Request $request)
    {
    

           $this->validate($request, ['darating' =>'required', 'ratecomment' => 'required']);

           RateLesson::doTutorLessonRating($request, Auth::user()->id, $lesson->id);
           $lesson->tutorrate = 1;
           $lesson->save();

           return back()->with(['ratingsuccess' => 'Rating completed successfully, thanks for your feedback to Tutorago community']);

    }
}
