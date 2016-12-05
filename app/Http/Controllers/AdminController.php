<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Course;
use App\CourseRequest;
use App\Lesson;
use App\Transaction;
use App\TutorshipRequest;
use App\IcanTeach;
class AdminController extends Controller
{
    //

    public function __construct()
    {
       $this->middleWare('DaPowerful');
    }


    public function index()
    {

        $countusers = User::count();
        $tutorcount = User::where('tutor', 1)->count();
        $categorycount = Category::count();
        $coursecount = Course::count();
        $admincommission = Transaction::getAdminCommission();

        $courserequestcount = CourseRequest::where('status', 'Pending')->count();
        $students = User::where(['tutor' => 0, 'power' => 0])->orderBy('id', 'desc')->take(5)->get();
        $tutors = User::where(['tutor' => 1, 'power' => 0])->orderBy('id', 'desc')->take(5)->get();

        return view('admin.dashboard', ['countusers' => $countusers, 'tutorcount' => $tutorcount, 'categorycount' => $categorycount, 'coursecount' => $coursecount, 'courserequestcount' => $courserequestcount, 'students' => $students, 'tutors' => $tutors, 'admincommission' => $admincommission, 'completedlesson'=>Lesson::countCompleted(), 'ongoinglesson' =>Lesson::countOngoing(), 'biddablelesson'=> Lesson::countBiddable(), 'tutorshiprequest'=>TutorshipRequest::countPendingRequest(), 'pendingcourses' => IcanTeach::countPending()]);
    }
}
