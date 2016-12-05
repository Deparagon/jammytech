<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;

class SearchController extends Controller
{
    //

    public function index(Request $request)
    {

    	       if(!empty($request->keyword)){
                $data = Course::findCourse($request->keyword);
            }


    
    $result ='<ul class="list-group">';
    if(!empty($data)){
        foreach($data as $lesson){ 
        $result.='
<li class="list-group-item"> '.$lesson->name.' is avaliable | <a href="/subjects/'.$lesson->url.'"> View Tutors </a> | <a href="/user/newlesson">start a lesson </a> </li>';
}


    }
    else{
        $result.='<li> No result found for this request </li>';
    }
$result.='</ul>';
    echo $result;
    exit;
}
    
}
