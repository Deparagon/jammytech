<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonComment extends Model
{
    //

    protected $table = 'lessoncomments';

        public function lesson()
    {
    	$this->belongsTo('App\Lesson');
    }

    public static function makeComment($lessonid, $user_id, $comment, $who ='TUTOR')
    {
    	$c = new Self();

    	$c->student_id = ($who =='STUDENT')? $user_id : 0;
    	$c->tutor_id= ($who =='TUTOR')? $user_id : 0;
    	$c->lesson_id = $lessonid;
    	$c->comment = $comment;
    	$c->save();
    	return true;
    }
}
