<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Lesson;
use App\Category;
use App\Course;
use App\Profile;
use App\User;
use TTools;
use App\IcanTeach;
use Session;
use App\LessonDay;
use App\Bidder;

class LessonController extends Controller
{
    //
    public $dauser;

    public function __construct()
    {
         $this->middleware('auth');
    }


    public function show()
    {
        $lessons = Lesson::where(['id_student' => Auth::user()->id])->get();
        $mylessons = Lesson::getMyLessons(Auth::user()->id);

       $alllessoncount = Lesson::where(['id_student' => Auth::user()->id])->count();
 $completedcount = Lesson::where(['id_student' => Auth::user()->id, 'status' => 'Completed'])->count();
 $ongoingcount = Lesson::where(['id_student' => Auth::user()->id, 'status' => 'Ongoing'])->count();
        return view('student.lessons', ['mylessons' => $mylessons, 'ongoingcount' => $ongoingcount, 'completedcount' => $completedcount, 'alllessoncount'=> $alllessoncount]);
    }

    public function lessonStepOne()
    {
        $allcourses = Course::with('category')->get();
        $profiledata = Auth::user()->profile;

        return view('student.newlesson', ['categories' => Category::all(), 'allcourses' => $allcourses, 'profiledata' => $profiledata]);
    }

//'duration' => 'required', 'hoursperday' => 'required', 'lessonstarttime' => 'required', 'studentlevel' => 'required', 'budget' => 'required', 'amount' => 'required', 'tutorgender' => 'required'
    public function lessonStepTwo(Request $request)
    {
        $this->validate($request, ['lessontostart'=> 'required','lessoncity' => 'required', 'lessonstate' => 'required', 'lessonstartin' => 'required', 'lessonstudentcount' => 'required', 'tutorgender'=>'required', 'lessonlocation' => 'required', 'lessonphone' => 'required', 'lessonemail' => 'required']);

       Session::put('lessonsteponeinfo', $request->all());
       Session::put('lessononestatus','success');
        

        return redirect()->action('LessonController@lessonStepThree');
       
    }

    public function lessonStepThree()
    {
       

        return view('student.lessonstepthree', ['firststepstatus' => Session::get('lessononestatus')]);

    }


    public function lessonStepFour(Request $request)
    {
        $succeeded = 'False';
       $this->validate($request, ['duration' => 'required', 'lessondays' => 'required', 'lessonstarttime' =>'required', 'hoursperday' => 'required', 'studentlevel' => 'required', 'budget'=> 'required', 'lessongoal' => 'required']);  


       $days = count($request->lessondays);
       $totalhours = $days * $request->duration * 4 * $request->hoursperday;


            $canteachdata = IcanTeach::where(['course_id' => Session::get('lessonsteponeinfo')['lessontostart'], 'status' => 'Approved' ])->get();

            // print_r($canteachdata);
            // exit;

            if($canteachdata){
                $tutorprices = [];
                foreach ($canteachdata as $tutordata) {
                     
                  $tutorprices[$tutordata->user_id]  = $tutordata->price * $totalhours;
                }

                $budgetstate = 'KO';
                $goodpricetutor = [];
                if(!empty($tutorprices)){
                    asort($tutorprices);
                    $bestpricedtutor = array_shift($tutorprices);
                    foreach($tutorprices as $tutor => $price){
                     
                     if($request->budget >= $price){
                        $budgetstate = 'OK';
                        $goodpricetutor[] = $tutor;
                     }
                    }
                }

                
             Session::put('lessonsteptwoinfo', $request->all());
             Session::put(['budgetstate' => $budgetstate, 'succeeded' =>'succeeded']);
              if(isset($bestpricedtutor)){
             Session::put(['bestpricedtutor' => $bestpricedtutor]);

              }

            }
       

             
               


                return redirect()->action('LessonController@lessonSubmit');

          }




      public function lessonSubmit(Request $request)
      {
         $completed = 'No';
        if(Session::has('succeeded')){
            if(Session::get('succeeded')  =='succeeded'){
                $completed = 'Yes';
            }
        }

        return view('student.lessonsubmit', ['completed' =>$completed]);
      
}


   public function lessonPayment()
   {
    $createdlesson = 'No';
    $lesson = Lesson::startLesson();
    if($lesson){
        $createdlesson = 'Yes';
        
    }
    Session::put('createdlesson', $createdlesson);
    Session::put('lesson', $lesson->id);

     return redirect()->action('PaymentController@index');
     

   }



public function singleLessonStart(Course $course )
{
      if(TTools::obuObject($course)){

         $coursedata = $course->category;
         return view('student.startsinglecourse', ['course' => $course, 'coursedata' => $coursedata, 'profiledata' => Auth::user(), 'categories' => Category::all()]);

      }
}


public function singleCategoryStart( Category $category)
{
   
   $courses = Course::where(['category_id' => $category->id])->with('category')->get();
   $profiledata = User::find(Auth::user()->id);

   return view('student.startcategorycourse', ['courses' => $courses, 'cat' => $category, 'profiledata' => $profiledata, 'categories' => Category::all()]);

}
  
}