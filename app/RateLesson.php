<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class RateLesson extends Model
{
    //
     protected $table = 'ratelessons';


    public function lesson()
    {
    	return $this->belongsTo('App\Lesson');
    }


    public static function createRating($request, $user_id, $lessonid)
    {

    	$r = new self();
    	$r->rate_by_student = $request->darating;
    	$r->comment_by_student = $request->ratecomment;
      $r->comment_by_tutor = ' ';
    	$r->tutor_id =  null;
    	$r->student_id =   $user_id;
    	$r->lesson_id = $lessonid;

    	$r->save();
            

    }

    
    public static function doTutorLessonRating($request, $user_id, $lessonid)
    {
           $ratedata = self::where(['lesson_id' => $lessonid])->first();
           if(is_object($ratedata)){
                   $ratedata->rate_by_tutor = $request->darating;
                   $ratedata->comment_by_tutor = $request->ratecomment;
                   $ratedata->tutor_id = $user_id;

                   $ratedata->save();
           }
    }

    public static function getTutorRating($id_tutor)
    {
        $ratings = DB::table('ratelessons')->select(DB::raw('comment_by_student, rate_by_student, name, firstname, photo'))->join('lessons', 'lessons.id', '=', 'ratelessons.lesson_id')->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->where(['ratelessons.tutor_id' => $id_tutor])->paginate(25);

  return $ratings;
    }


    public static function getOverallRating($id_tutor)
    {
        $ratings = DB::table('ratelessons')->select(DB::raw('comment_by_student, rate_by_student, name, firstname, photo'))->join('lessons', 'lessons.id', '=', 'ratelessons.lesson_id')->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->where(['ratelessons.tutor_id' => $id_tutor])->get();

          $tutorrate = 0;
          $myrates = 0;
        if(!empty($ratings)){
            // if(is_array($ratings)){
              foreach($ratings as $rate){
                $myrates++;
                $tutorrate+= (int)$rate->rate_by_student;

              }
            // }
        }

        if($tutorrate > 0){
           $r = ($tutorrate/$myrates);
          return $r;
           //exit;
        }
        return $tutorrate;
    }

}
