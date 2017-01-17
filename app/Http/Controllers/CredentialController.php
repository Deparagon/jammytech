<?php

namespace app\Http\Controllers;

use App\User;
use DB;
use App\Education;
use App\Course;
use App\CourseRequest;
use App\TeachingExperience;
use App\WorkExperience;
use App\IcanTeach;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use TTools;
use Image;
use App\Identity;

class CredentialController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    public function show()
    {
        $educations = Auth::user()->educations;

        $workexperiences = Auth::user()->workexperiences;
        $identification = Identity::where('user_id', Auth::user()->id)->first();

        return view('tutor.credential', ['educations' => $educations, 'identification' => $identification, 'workexperiences' => $workexperiences]);
    }

    public function createEdu(Request $request)
    {
        $this->validate($request, ['institution' => 'required', 'course' => 'required', 'degree' => 'required']);

        $edu = new Education();
        $edu->user_id = Auth::user()->id;
        $edu->institution = $request->institution;
        $edu->course = $request->course;
        $edu->degree = $request->degree;
        $edu->startdate = $request->startdate;
        $edu->enddate = $request->enddate.' 00:00:00';
        $edu->save();

        return back()->with('createdmsg', 'Successfully saved education information');
    }

    public function createWexp(Request $request)
    {
        $this->validate($request, ['organization' => 'required', 'position' => 'required', 'roles' => 'required']);
        $wk = new WorkExperience();
        $ongoing = $request->ongoing;
        if( !(int) $ongoing > 0){
            $ongoing = 0;
        }

        $wk->user_id = Auth::user()->id;
        $wk->organization = $request->organization;
        $wk->position = $request->position;
        $wk->roles = $request->roles;
        $wk->ongoing = $ongoing;
        $wk->save();

        return back()->with('createdmsg', 'Successfully saved work experience');
    }

    public function deleteWexp(Request $request)
    {
        if (WorkExperience::find((int) $request->idworkex)->delete()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'Bad']);
        }
    }

    public function deleteEdu(Request $request)
    {
        // print_r($request->all());
        // exit;
        if (Education::find((int) $request->idedu)->delete()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'Bad']);
        }
    }

    public function teachingShow()
    {
        $teaching = Auth::user()->teachingExperiences;

        $icanteachs = DB::table('icanteachs')->select(DB::raw('icanteachs.id, courses.name as coursename, courses.description as coursedescription, courses.imageurl as image, categories.name as catname'))->join('courses', 'courses.id', '=', 'icanteachs.course_id')->join('categories', 'categories.id', '=', 'courses.category_id')->where(['user_id' => Auth::user()->id])->get();

        //print_r($icanteachs);

        return view('tutor.teachingexperience', ['teaching' => $teaching, 'courses' => Course::all(), 'canteachs' => $icanteachs]);
    }

    public function icanteachShow()
    {
        $icanteachs = DB::table('icanteachs')->select(DB::raw('icanteachs.id,  price, courses.name as coursename, courses.description as coursedescription, courses.imageurl as image, categories.name as catname'))->join('courses', 'courses.id', '=', 'icanteachs.course_id')->join('categories', 'categories.id', '=', 'courses.category_id')->where(['user_id' => Auth::user()->id])->get();

        //print_r($icanteachs);

        $coursrequests = CourseRequest::where(['user_id' => Auth::user()->id])->get();

        return view('tutor.mysubjects', ['courses' => Course::all(), 'canteachs' => $icanteachs, 'courserequests' => $coursrequests]);
    }

    public function createUpdate(Request $request)
    {
        $this->validate($request, ['teachinglevel' => 'required', 'levelexplanation' => 'required']);
        $saveteaching = TeachingExperience::where(['user_id' => Auth::user()->id])->first();

        if ($saveteaching) {
            $saveteaching->teachinglevel = $request->teachinglevel;
            $saveteaching->levelexplanation = $request->levelexplanation;
            $saveteaching->update();

            return back()->with('createdmsg', 'Teaching Experience updated Successfully');
        } else {
            $teachingexp = new TeachingExperience();
            $teachingexp->teachinglevel = $request->teachinglevel;
            $teachingexp->levelexplanation = $request->levelexplanation;
            $teachingexp->user_id = Auth::user()->id;
            $teachingexp->save();

            return back()->with('createdmsg', 'Teaching Experience submitted Successfully');
        }
    }

    public function createIcanTeach(Request $request)
    {
        $this->validate($request, ['course_id' => 'required', 'price' => 'required|max:4']);

        foreach ($request->course_id as $course_id) {
            if (IcanTeach::where(['user_id' => $course_id, 'course_id' => $course_id])->first()) {
            } else {
                $coursedata = new IcanTeach();
                $coursedata->user_id = Auth::user()->id;
                $coursedata->price = $request->price;
                $coursedata->course_id = $course_id;
                $coursedata->save();
            }
        }

        return back()->with('createdmsg', 'All Subject(s) successfully added to your profile');
    }




    public function createNewSubjects()
    {
        $courserequests = CourseRequest::where(['user_id' => Auth::user()->id])->get();
         
         return view('tutor.createsubjects', ['courserequests' =>$courserequests]);
    }
    public function requestAdd(Request $request)
    {
        $this->validate($request, ['course' => 'required', 'description' => 'required']);

        $courserequest = new CourseRequest(['course' => $request->course, 'description' => $request->description]);
        $courserequest->user_id = Auth::user()->id;
        $courserequest->save();

        return back()->with('createdmsg', 'Your request have been submitted Successfully');
    }

    

    public function deleteIcanteach(Request $request)
    {
    

          $icanteach = IcanTeach::find($request->idteach);
          if(TTools::obuObject($icanteach)){
            $icanteach->delete();
          }
           echo 'OK';
           exit;
    }



    public function saveID(Request $request)
    {
            $this->validate($request, ['idtype' =>'required', 'identity' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

            $identity = date('YmdHis').$request->idtype.'.jpg';

            Image::make($request->file('identity'))->save('uploads/'.$identity);

          Identity::saveUpdate(Auth::user()->id, $request->idtype, $identity);
          return back()->with(['savedid' => 'Identity updated successfully']);
    }



    public function deleteCourseRequest(CourseRequest $creq  )
    {
             if($creq->status == 'Approved'){
                return back()->with('cantdo', 'You cannot delete approved course request');

             }
             $creq->delete();
             return back()->with('createdmsg', 'You have successfully deleted the request');
    }
}
