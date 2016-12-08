<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Lesson;
use App\IcanTeach;
use App\Education;
use App\TeachingExperience;
use App\WorkExperience;
use App\RateLesson;

class TutorController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function show(Request $request, User $tutor)
    {
    	    $allclasses = Lesson::where(['id_tutor' => $tutor->id])->count();
 $completedcount = Lesson::where(['id_tutor' => $tutor->id, 'status' => 'Completed'])->count();
 $ongoingcount = Lesson::where(['id_tutor' => $tutor->id, 'status' => 'Ongoing'])->count();
         $icanteach = IcanTeach::getMyCanTeach($tutor->id);
$educations = Education::where(['user_id' => $tutor->id])->get();
    	$teachingexps = TeachingExperience::where(['user_id' => $tutor->user_id])->first();
    	$workingexps = WorkExperience::where(['user_id' => $tutor->user_id])->get();
 //return $icanteach;
        
        $tutorrattings = RateLesson::getTutorRating($tutor->id);
        
         return view('tutor.tutor', ['datutor' => $tutor, 'tutorprofile' => $tutor, 'allclasses' => $allclasses, 'completedcount' => $completedcount, 'ongoingcount' => $ongoingcount, 'icanteach' => $icanteach, 'educations' => $educations, 'teachingexps' => $teachingexps, 'workingexps' => $workingexps, 'tutorrattings' => $tutorrattings]);
    }
}
