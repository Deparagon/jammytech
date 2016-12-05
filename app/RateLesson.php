<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
