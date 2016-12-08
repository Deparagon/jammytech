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


    public static function createRating($request, $user_id, $lessonid, $doer ='TUTOR')
    {

    	$r = new self();
    	$r->rate = $request->darating;
    	$r->comment = $request->ratecomment;
    	$r->tutor_id = ($doer =='TUTOR')? $user_id : null;
    	$r->student_id =  ($doer =='STUDENT')? $user_id : null;
    	$r->lesson_id = $lessonid;

    	$r->save();
            

    }



    public static function getTutorRating($id_tutor)
    {
        $ratings = DB::table('ratelessons')->select(DB::raw('comment, rate, name, firstname'))->join('lessons', 'lessons.id', '=', 'ratelessons.lesson_id')->join('courses', 'courses.id', '=', 'lessons.id_course')->join('users', 'users.id', '=', 'lessons.id_student')->where(['ratelessons.tutor_id' => $id_tutor])->paginate(25);

  return $ratings;
    }
}
