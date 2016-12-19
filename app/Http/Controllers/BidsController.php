<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bidder;
use Auth;
use App\Lesson;
use App\Category;
use App\Course;
use App\User;
use TTools;
use App\LessonDay;
use DB;
use App\Bidcussion;
class BidsController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('auth');

    }
     public function fetchBiddables()
    
   {
       return view('tutor.biddablelessons', ['biddablelessons' => Lesson::getBiddables()]);
   }



   public function singleBiddable(Request $request, Lesson $lesson)
   {
         $ibid = 'No';
           if($lesson){
           // return $lesson;
            if($lesson->status =='Biddable'){
            $course = Course::find($lesson->id_course);
            $ihavebeen = Bidder::where(['lesson_id' => $lesson->id, 'user_id' => Auth::user()->id])->first();
            if(TTools::obuObject($ihavebeen)){
              $ibid = 'Yes';
            }
            $days = LessonDay::getLessonDays($lesson->id);
                     return view('tutor.biddable_single', ['lesson' => $lesson, 'course' => $course, 'days' => $days, 'ibid' => $ibid]);
            }
           }
   }


   public function saveBid(Request $request, Lesson $lesson)
   {
            $this->validate($request, ['comment' => 'required', 'price' => 'required|numeric']);

            Bidder::doBid(Auth::user()->id, $lesson->id, $request->price, $request->comment);

            Bidder::sendBidEmail($lesson, $request->price, $request->comment);

            return back()->with(['biddone' =>' Your application have been submitted']);

   }


  public function allBids()
  {
    $bidders = Bidder::where(['user_id' => Auth::user()->id])->with('lesson')->whereHas('lesson',function($q){ 
       $q->where('lessons.status', '=', 'biddable');

    })->with('bidcussion')->paginate(25);

     return view('tutor.allbids', ['bidders' => $bidders]);
  }


  public function singleBid( Bidder $bidded)
  {
        $bidchats = $bidded->bidcussion;
        $lesson = Lesson::find($bidded->lesson_id);
        $course = Course::find($lesson->id_course);
       $mylatestedreply = Bidcussion::getTutorLatestReply($bidded->id, Auth::user()->id);
       // print_r($mylatestedreply);
       // exit;

        return view('tutor.bidchat', ['bidchats' => $bidchats, 'lesson' => $lesson, 'course' => $course, 'mylatestedreply' => $mylatestedreply]);
  }

public function saveTutorChat(Request $request, Bidder $bidded)
{
    $this->validate($request, ['price' =>'required|numeric', 'comment' => 'required']);
  	   if(TTools::obuObject($bidded)){
  	   	Bidcussion::doTutorComments($bidded->id, Auth::user()->id, $request->price, $request->comment);

  	   	return back()->with(['goodchat' => 'Reply submitted successfully']);
  	   }
  	   return back()->with(['badchat' => 'Error Occured while processing your request, try again later']);	   

}

  public function lessonChat(Bidder $bid)
  {

        $bidchats = $bid->bidcussion;
        $lesson = Lesson::find($bid->lesson_id);
        $course = Course::find($lesson->id_course);

        $latestreply = Bidcussion::getLatestTutorReply($bid->id);

        return view('student.lessonchat', ['bidchats' => $bidchats, 'lesson' => $lesson, 'course' => $course, 'latestreply' => $latestreply]);
  }


  public function bidsOnMyLesson()
  {
      
      $bidsonmylesson = DB::table('lessons')->select(DB::raw('courses.name, bidders.id AS bidder, users.firstname, users.lastname, bidders.created_at, users.id AS tutor, courses.description' ))->join('bidders', 'bidders.lesson_id', '=', 'lessons.id')->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'bidders.user_id')->where('lessons.id_student', '=', Auth::user()->id)->where('lessons.status', '=', 'biddable')->get();
          
         // print_r($bidsonmylesson);
        //  exit;

          return view('student.bidsonmylesson', ['bidsonmylesson' => $bidsonmylesson]);
          

  }



  public function saveStudentChat(Request $request, Bidder $bid)
  {
  	$this->validate($request, ['price' =>'required|numeric', 'comment' => 'required']);
  	   if(TTools::obuObject($bid)){
  	   	Bidcussion::doStudentComment($bid->id, Auth::user()->id, $request->price, $request->comment);

  	   	return back()->with(['goodchat' => 'Reply submitted successfully']);
  	   }
  	   return back()->with(['badchat' => 'Error Occured while processing your request, try again later']);

  	   
  }


}
