<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TutorshipRequest;
use Auth;
use App\Activity;
use TTools;
class JoinTutorController extends Controller
{
    //
     
     public function __construct()
     {
          $this->middleware('auth');
     }

    public function show()
    {
    	$myrequest = TutorshipRequest::where(['user_id'=> Auth::user()->id])->first();

    	return view('tutor.jointutorrequest', ['myjoinrequest' =>$myrequest]);

    }


    public function beTutor(Request $request)
    {
    	$tutor = new TutorshipRequest();
    	$tutor->user_id = Auth::user()->id;

    	$tutor->feedback = '  ';
    	$tutor->save();

    	 Activity::act('Requested to join tutorago tutors ', Auth::user()->id);
    	TTools::naSuccess('Thanks for your interest in Tutorago');
    	TTools::naSuccess('Your request has been submitted');
    	TTools::naSuccess('While you wait for admin approval, please update your credential and profile details ');
    	exit;


    }
}
