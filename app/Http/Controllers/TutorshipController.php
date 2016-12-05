<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TutorshipRequest;
use App\TeachingExperience;
use App\WorkExperience;
use App\Guarantor;
use App\Education;
use App\Profile;
use App\User;
use App\TTools;
use App\IcanTeach;
class TutorshipController extends Controller
{
    //

    public function __construct()
    {
         $this->middleware('auth');
    }


    public function index()
    {
    	$trequests= TutorshipRequest::where(['status'=> 'Pending'])->with('user')->get();

           return view('admin.user.tutorship', ['trequests' =>$trequests]);

    }


    public function icanTeachRequests()
    {
        $pendings = IcanTeach::getPending();

        return view('admin.user.icanteach', ['pendings' => $pendings, 'countpending' => IcanTeach::countPending()]);
    }

    public function show(TutorshipRequest $tutorreq)
    {
    	$educations = Education::where(['user_id' => $tutorreq->user_id])->get();
    	$teachingexps = TeachingExperience::where(['user_id' => $tutorreq->user_id])->first();
    	$workingexps = WorkExperience::where(['user_id' => $tutorreq->user_id])->get();
    	$gurantors = Guarantor::where(['user_id' => $tutorreq->user_id])->get();
    	// $profile =Profile::where(['user_id' => $tutorreq->user_id])->first();
        $userdata =User::where(['id' => $tutorreq->user_id])->first();
        return view('admin.user.tutorapproval', ['teachingexps' =>$teachingexps, 'workingexps'=>$workingexps, 'gurantors' => $gurantors, 'userdata' =>$userdata, 'tutorreq' =>$tutorreq]);

    }


    public function approve(Request $request)
    {
    	if((int) $request->idreq >0){

            $requestdata = TutorshipRequest::find( (int) $request->idreq);
            if($requestdata){
            $tutoruser =User::where(['id' => $requestdata->user_id])->first();

            $tutoruser->tutor = 1;
            $tutoruser->update();

            $requestdata->status ='Approved';
            $requestdata->feedback =$request->defeedback;
            $requestdata->update();

            TTools::naSuccess($tutoruser->firstname.' tutor request have been approved');
            exit;

            }
    	}

    }

    public function comment(Request $request)
    {
    	if((int) $request->idreq >0){

            $requestdata = TutorshipRequest::find( (int) $request->idreq);
            if($requestdata){
            $requestdata->feedback =$request->defeedback;
            $requestdata->update();

            TTools::naSuccess('Comment have been applied to the request ');
            exit;

            }
    	}


    }


    public function icanTeachDelete(Request $request)
    {
        IcanTeach::find($request->id_request)->delete();
        echo 'OK';
        exit;

    }

    public function icanTeachApprove(Request $request)
    {
         $icanteach = IcanTeach::find((int) $request->id_request);
         if($icanteach){
            $icanteach->status = 'Approved';
            $icanteach->save();
            echo 'OK';
            exit;
         }
         echo 'KO';
         exit;
    }
}
