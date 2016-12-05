<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Lesson;
use App\Transaction;
use TTools;
use App\Activity;


class ProfileController extends Controller
{
    //
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
         $profiledata = Auth::user();
         $mybalance = Transaction::getUserBalance(Auth::user()->id);
         $activities = Activity::where(['user_id' => Auth::user()->id])->orderBy('id', 'desc')->take(5)->get();

         $lessonnotes = Lesson::getStudentLessonComments(Auth::user()->id);
         
         $lessonattentions = Lesson::getStudentRejectedLesson(Auth::user()->id);

         $myunratedlessons = Lesson::getUnRatedByStudent(Auth::user()->id);

         $myunratedclasses = Lesson::getUnRatedByTutor(Auth::user()->id);

        $countlesson = Lesson::where(['id_student'=> Auth::user()->id])->count();
        return view('user.dashboard', ['countlesson' => $countlesson, 'datejoin' =>Auth::user()->created_at, 'profiledata' =>$profiledata, 'mybalance' => $mybalance, 'activities' => $activities, 'lessonnotes' => $lessonnotes, 'lessonattentions' => $lessonattentions, 'myunratedlessons' => $myunratedlessons, 'myunratedclasses' => $myunratedclasses]);
    }

    public function show()
    {
        $userdata = User::find(Auth::user()->id);
        $month = '00';
        $year = '00';
        $day = '00';
        
            if($userdata->birthday !='0000-00-00'){
                $day = date('d', strtotime($userdata->birthday));
                $month = date('m', strtotime($userdata->birthday));
                $year = date('Y', strtotime($userdata->birthday));
            
        }

        return view('user.profile', ['userdata' => $userdata, 'day' => $day, 'year' => $year, 'month' => $month]);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, ['day' =>'required', 'month' => 'required', 'year'=> 'required', 'phone' => 'required', 'bio' => 'required']);
        $birthday = $request->year.'-'.$request->month.'-'.$request->day;
        $user = User::find(Auth::user()->id);
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->birthday = $birthday;
        $user->street = $request->street;
        $user->city= $request->city;
        $user->state = $request->state;
        $user->bio= $request->bio;
        $user->save();
       
          
        $activity = new Activity;
        $activity->event ='Updated profile information';
        $activity->user_id =Auth::user()->id;
        $activity->ip = TTools::getIP();
        $activity->save();
        return back()->with(['updatedprof' => 'Profile updated successfully']);
    }

    public function photo()
    {
        $profiledata = Auth::user();

        return view('user.photo', ['profiledata' => $profiledata]);
    }

    public function savePhoto(Request $request)
    {
        $this->validate($request, [
            'profileimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //print_r($request->file('profileimage'));
        $profilepix = date('YmdHis').Auth::user()->firstname.'.jpg';

        Image::make($request->file('profileimage'))->save('uploads/'.$profilepix);

      $user = User::find(Auth::user()->id);
      $user->photo = $profilepix;
      $user->save();
       Activity::act('Updated profile picture ', Auth::user()->id);
        // Auth::user()->update(['photo' => $profilepix]);
       // Image::make($image->getRealPath())->resize(468, 249)->save(public_path().'/uploads/'.$filename);

       // print_r($img);
        return back()->with(['savedphoto' => 'Profile Photo updated successfully ']);
    }

    public function saveVideo(Request $request)
    {
        $this->validate($request, ['video' => 'required']);

        $user = User::find(Auth::user()->id);
      $user->video = $request->video;
      $user->save();
        Activity::act('Updated bio video ', Auth::user()->id);
        return back()->with(['savedvideo' => 'Profile Video updated successfully ']);


    }

    public function video()
    {
        

        return view('user.video');
    }

   
    
}
