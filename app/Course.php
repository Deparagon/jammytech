<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    //

    public function category()
    {
        return $this->belongsTo('App\Category');
    }


public function icanteach()
    {
        return $this->hasMany('App\IcanTeach');
    }

// public function lesson()
// {
//    return $this->hasMany('App\Lesson',  )
// }


    public static function getCourseInCategory($id_category)
{
    $courses = DB::table('courses')
                  ->where('courses.category_id', '=', $id_category)
                  ->get();

    return $courses;
}


    public static function findCourse($keyword)
{
   $resultset = [];
    $courses = DB::table('courses')
                  ->where('courses.name', 'LIKE', "%$keyword%")
                  ->orWhere('courses.description', 'LIKE', "%$keyword%")
                  ->get();

    if(count($courses) >0){
        foreach($courses as $course){
             $course->url = strtolower(str_replace(' ', '-', $course->name)).'-tutors';
               $resultset[] = $course;
         }
       }
       return $resultset;
}



    public static function findCourseInCategory($id_category, $keyword)
{
 
    $courses = DB::table('courses')
                  ->where('courses.category_id', '=', $id_category)
                  ->where('courses.name', 'LIKE', "%$keyword%")
                  ->orWhere('courses.description', 'LIKE', "%$keyword%")
                  ->get();

}

}
