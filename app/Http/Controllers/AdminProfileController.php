<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Auth;
use TTools;
use App\Activity;
class AdminProfileController extends Controller
{
    //

   public function __construct()
    {
       $this->middleWare('DaPowerful');
    }


 public function studentlist()
    {
        $students = User::where(['tutor' => 0, 'power' => 0])->get();

        return view('admin.user.studentlist', compact('students'));
    }

    public function tutorlist()
    {
        $tutors = User::where(['tutor' => 1, 'power' => 0])->get();

        return view('admin.user.tutorlist', compact('tutors'));
    }

    public function studentedit(User $student)
    {
    

        $month = '00';
        $year = '00';
        $day = '00';
        if(TTools::obuObject($student)){
            if($student->birthday !='0000-00-00'){
                $day = date('d', strtotime($student->birthday));
                $month = date('m', strtotime($student->birthday));
                $year = date('Y', strtotime($student->birthday));
            }
        }

        return view('admin.user.studentprofile', ['userdata' => $student,  'day' => $day, 'year' => $year, 'month' => $month]);
    }

    public function tutoredit(User $tutor)
    {
 

        $month = '00';
        $year = '00';
        $day = '00';
        if(TTools::obuObject($tutor)){
            if($tutor->birthday !='0000-00-00'){
                $day = date('d', strtotime($tutor->birthday));
                $month = date('m', strtotime($tutor->birthday));
                $year = date('Y', strtotime($tutor->birthday));
            }
        }
        return view('admin.user.tutorprofile', ['userdata' => $tutor, 'day' => $day, 'year' => $year, 'month' => $month]);
    }


    public function updateStudent(User $student, Request $request)
    {

           //return $student;
    	$this->validate($request, ['phone' => 'required', 'bio' => 'required']);
    	       
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->street = $request->street;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->bio = $request->bio;
        $student->save();
        
   

       return back()->with(['updatedprof' => 'Profile updated successfully']);

    }


    public function updateTutor(User $tutor)
    {

        $this->validate($request, ['phone' => 'required', 'bio' => 'required']);
               
        $tutor->gender = $request->gender;
        $tutor->phone = $request->phone;
        $tutor->street = $request->street;
        $tutor->city = $request->city;
        $tutor->state = $request->state;
        $tutor->bio = $request->bio;
        $tutor->save();
        return back()->with(['updatedprof' => 'Profile updated successfully']);
    }


    public function deleteUser(Request $request)
    { 
        $deletable = User::find($request->userid);

        if(is_object($deletable)){
            $deletable->delete();
            echo 'OK';
            exit;
        }
        else{
            echo 'Could not find user to delete';
            exit;
        }

    }

}
