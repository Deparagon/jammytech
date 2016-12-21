<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
//use TTools;
use App\Course;
use App\User;
class IcanTeach extends Model
{
    //
    protected $table = 'icanteachs';
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public static function getPending()
    {
    	return IcanTeach::where(['status' => 'Pending'])->with('user')->with('course')->get();
    }

    public static function countPending()
    {
    	return IcanTeach::where(['status' => 'Pending'])->count();
    }

        public static function getMyCanTeach($userid)
    {
        return self::where(['status' => 'Approved', 'user_id' => $userid])->with('course')->get();
    }



    public static function getSubjectTutors($subject)
    {
        $tutors =[];
        $course = Course::where(['name' => $subject])->first();
        if(is_object($course)) {
            $subjecttutors = self::where(['course_id' => $course->id])->get();
            if(!empty($subjecttutors)){
                if(count($subjecttutors) > 0){
                    foreach ($subjecttutors as $stutor) {
                        $tutors[] = User::find($stutor->user_id);
                    }
                }
            }
        }
         return $tutors;
    }
}
