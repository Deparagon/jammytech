<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lesson;
use App\Course;
use App\User;
use App\Invoice;
class AdminLessonController extends Controller
{
    //

   public function __construct()
    {
       $this->middleWare('DaPowerful');
    }


    public function index()
    {
    	return view('admin.lessons', ['lessons' => Lesson::getLessons()]);
    }


    public function show(Lesson $lesson)
    {
    	if(is_object($lesson)){

    		$course = Course::find($lesson->id_course);
    		$student = User::find($lesson->id_student);
    		$tutor = User::find($lesson->id_tutor);

            $invoice = Invoice::getLessoninvoice($lesson->id, $lesson->id_student);

    		return view('admin.lesson', ['lesson' => $lesson, 'student' => $student, 'course' => $course, 'tutor' => $tutor, 'invoice' => $invoice]);
    	}

    }


    public function processingFee(Request $request)
    {
        $this->validate($request, ['lesson' => 'required']);

        $lesson = Lesson::find((int)$request->lesson);

        if(is_object($lesson)){
        	if($lesson->status =='Fresh'){
        		Lesson::LessonProccessingFeePaid($lesson->id);
        		return back()->with('updatedfee', 'Processing fee was successfully applied to this lesson');
        	}
        	
        	return back()->with('feeerror', 'Proccessing Fee has already been paid for this lesson');
        }
        return back()->with('feeerror', 'Could not find a lesson with the information provided');

    }

    public function MainFee(Request $request)
    {
        $this->validate($request, ['lesson' => 'required']);

        $lesson = Lesson::find((int)$request->lesson);

        if(is_object($lesson)){
        	if($lesson->status =='Biddable'){
        		Lesson::lessonPaymentMade($lesson->id, $lesson->amount);
        		return back()->with('updatedfee', 'Lesson fee was successfully applied to this lesson');
        	}
        	
        	return back()->with('feeerror', 'Lesson Fee has already been paid for this lesson');
        }
        return back()->with('feeerror', 'Could not find a lesson with the information provided');

    }

}
