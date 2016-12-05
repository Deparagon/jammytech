<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonDay extends Model
{
	protected $table ='lessondays';
    //

    public function lesson()
    {
    	$this->belongsTo('App\Lesson');
    }

    public static function getLessonDays($id_lesson)
    {
      $weekdays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
      $wd = self::where(['id_lesson' => $id_lesson])->first();
       $days =' ';
       if(TTools::obuObject($wd)){

          foreach($weekdays as $d){
            if($wd->$d ==1){
              $days .= $d.' ,';
            }

          }

       }
       return $days; 
    }

}
