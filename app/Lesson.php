<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;
use App\LessonDay;
use App\TTools;
use DB;
use Mail;
use App\IcanTeach;
use App\Course;
use App\Mail\BiddableEmail;
use App\Mail\LessonSetOngoingEmail;

class Lesson extends Model
{
    //

   protected $primaryKey ='id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }


   public function lessonComment()
   {
    return $this->hasMany('App\LessonComment');
   }

    public function lessonday()
    {
    	return $this->hasOne('App\LessonDay');
    }
  

     public function rateLesson()
   {
    return $this->hasMany('App\RateLesson');
   }

   public function course()
   {
    return $this->belongsTo('App\Course', 'id_course' );
   }

    public static function countBiddable()
    {
      return self::where(['status' => 'Biddable'])->count();
    }

    public static function countOngoing()
    {
      return self::where(['status' => 'Ongoing'])->count();
    }
    public static function countCompleted()
    {
      return self::where(['status' => 'Completed'])->count();
    }
    public static function startLesson()
    {
    	if(session()->has('lessonsteponeinfo')){
    		if(session()->has('lessonsteptwoinfo')){
              $lesson  = new Lesson();

              // print_r(Session::get('lessonsteponeinfo'));
              // exit;

        $lesson->id_course = Session::get('lessonsteponeinfo')['lessontostart'];
        $lesson->lessonstreet =Session::get('lessonsteponeinfo')['lessonstreet'];
        $lesson->lessoncity =Session::get('lessonsteponeinfo')['lessoncity'];
        $lesson->lessonstate = Session::get('lessonsteponeinfo')['lessonstate'];
        $lesson->lessonstartin = Session::get('lessonsteponeinfo')['lessonstartin'];
       $lesson->tutorgender = Session::get('lessonsteponeinfo')['tutorgender'];
        $lesson->lessonstudentcount = Session::get('lessonsteponeinfo')['lessonstudentcount'];
        $lesson->lessonlocation = Session::get('lessonsteponeinfo')['lessonlocation'];
        $lesson->lessonphone = Session::get('lessonsteponeinfo')['lessonphone'];
        $lesson->lessonemail =Session::get('lessonsteponeinfo')['lessonemail'];
        $lesson->id_student = Auth::user()->id;

         $lesson->duration = Session::get('lessonsteptwoinfo')['duration'];
         $lesson->lessonstarttime = Session::get('lessonsteptwoinfo')['lessonstarttime'];
         $lesson->hoursperday = Session::get('lessonsteptwoinfo')['hoursperday'];
         $lesson->studentlevel =Session::get('lessonsteptwoinfo')['studentlevel'];
         $lesson->budget = Session::get('lessonsteptwoinfo')['budget'];
         $lesson->lessongoal = Session::get('lessonsteptwoinfo')['lessongoal'];
         $lesson->status = 'Fresh';
                $lesson->save();
          $lessonday= New LessonDay();
         $daysdata = Session::get('lessonsteptwoinfo')['lessondays'];
      $lessonday->id_lesson = $lesson->id;
       $lessonday->monday = (in_array('monday', $daysdata))? 1 : 0;
       $lessonday->tuesday = (in_array('tuesday', $daysdata))? 1 : 0;
       $lessonday->wednesday = (in_array('wednesday', $daysdata))? 1 : 0;
       $lessonday->thursday = (in_array('thursday', $daysdata))? 1 : 0;
       $lessonday->friday = (in_array('friday', $daysdata))? 1 : 0;
       $lessonday->saturday = (in_array('saturday', $daysdata))? 1 : 0;
       $lessonday->sunday = (in_array('sunday', $daysdata))? 1 : 0;

         $lessonday->save();
               
         Session::forget('lessonsteptwoinfo');
         Session::forget('lessonsteponeinfo');
          return $lesson;

    		}
    		return false;
    	}
    	return false;
    	
    }


    public static function getBiddables()
    {
      return self::where(['status' =>'biddable'])->with('course')->orderBy('id', 'desc')->get();
    }


    public static function lessonPaymentMade($lessonid, $amount)
    {
       $lesson  = self::find($lessonid);
      $e = strtotime(date('Y-m-d H:i:s')."+ ".$lesson->duration." months" );
      $end= date('Y-m-d H:i:s', $e);
         if(TTools::obuObject($lesson)){
              $lesson->amount = $amount;
              $lesson->paymentstatus = 'Paid';
              $lesson->start =date('Y-m-d H:i:s');
              $lesson->end = $end;
              $lesson->status ='Ongoing';
              $lesson->save();

              self::emailLessonStart($lesson);

              // Inform lesson tutor

         }
    }

   public static function getLessons()
   {
     $lessons = DB::table('lessons')->select(DB::raw('lessons.id AS lessonid, lessons.created_at AS createdat, lessons.status AS destatus, courses.name as coursename, courses.description as coursedescription, paymentstatus, firstname, lastname, start, end'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->paginate(25);

  return $lessons;
   }

      public static function getStudentLessonComments($studentid)
   {
     $lessons = DB::table('lessons')->select(DB::raw('lessons.id AS lessonid, lessons.created_at AS createdat, lessons.status AS destatus, courses.name as coursename, firstname, lastname, start, end'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_tutor')->where(['tutorcomplete' =>1, 'studentcomplete' => 0, 'lessons.id_student' => $studentid])->get();

  return $lessons;
   }

         public static function getTutorLessonComments($id_tutor)
   {
     $lessons = DB::table('lessons')->select(DB::raw('lessons.id AS lessonid, lessons.created_at AS createdat, lessons.status AS destatus, courses.name as coursename, firstname, lastname, start, end'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->join('lessoncomments', 'lessoncomments.lesson_id', '=', 'lessons.id')->where(['tutorcomplete' =>1, 'studentcomplete' => 0, 'lessons.id_tutor' => $id_tutor])->get();

  return $lessons;
   }


         public static function getStudentRejectedLesson($id_tutor)
   {
     $lessons = DB::table('lessons')->select(DB::raw('lessons.id AS lessonid, lessons.created_at AS createdat, lessons.status AS destatus, courses.name as coursename, firstname, photo, lastname, start, end'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->where(['tutorcomplete' =>0, 'studentreject' =>1, 'studentcomplete' => 0, 'lessons.id_tutor' => $id_tutor])->get();

  return $lessons;
   }


         public static function getUnRatedByTutor($id_tutor)
   {
     $lessons = DB::table('lessons')->select(DB::raw('lessons.id AS lessonid, lessons.created_at AS createdat, lessons.status AS destatus, courses.name as coursename, firstname, photo, lastname, start, end'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->where(['tutorrate' =>0, 'studentcomplete' =>1, 'tutorcomplete' => 1, 'lessons.id_tutor' => $id_tutor])->get();

  return $lessons;
   }

         public static function getUnRatedByStudent($id_student)
   {
     $lessons = DB::table('lessons')->select(DB::raw('lessons.id AS lessonid, lessons.created_at AS createdat, lessons.status AS destatus, courses.name as coursename, firstname, photo, lastname, start, end'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_tutor')->where(['studentrate' =>0, 'studentcomplete' =>1, 'tutorcomplete' => 1, 'lessons.id_student' => $id_student])->get();

  return $lessons;
   }


    public static function LessonProccessingFeePaid($lessonid)
    {
            $lesson  = self::find($lessonid);

            if(TTools::obuObject($lesson)){
              $lesson->status = 'Biddable';
              $lesson->save();
            }
            self::emailBidders($lessonid);
            

           return true;

           //send email to bidders.

    }



public static function getMyLessons($id_student)
{
  $mylessons = DB::table('lessons')->select(DB::raw('courses.name as coursename, courses.description as coursedescription, paymentstatus, id_tutor, firstname, lastname, start, end'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->where(['id_student' => $id_student])->paginate(25);

  return $mylessons;
   
}
   
public static function getMyClasses($id_tutor)
{
   $myclasses = DB::table('lessons')->select(DB::raw('courses.name as coursename, courses.description as coursedescription, paymentstatus, firstname, lastname, start, end, lessons.status, lessons.id AS lesson_id'))->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_tutor')->where(['id_tutor' => $id_tutor])->get();

  return $myclasses;

} 



public static function emailBidders($lessonid)
{
     $lesson = self::find($lessonid);

     $course = Course::find($lesson->id_course);

     $tutors = IcanTeach::where(['course_id' => $lesson->id_course]);
     if(count($tutors) > 0){
      foreach ($tutors as $tutor) {
          $tutorsdata = User::find($tutor->user_id);
          

          Mail::to($tutorsdata->email)->send( new BiddableEmail( $tutorsdata->firstname, $lesson, $course));


      }
     }
}



public static function emailLessonStart($lesson)
{

  $student = User::find($lesson->id_student);
  $tutor = User::find($lesson->id_tutor);
  $coursedata = Course::find($lesson->id_course);
  if(TTools::obuObject($tutor)){
    Mail::to($tutor->email)->send( new LessonSetOngoingEmail( $tutor->firstname, $student->firstname, $coursedata->name));

  }
 

}



}
