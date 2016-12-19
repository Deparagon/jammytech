<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Course;
use App\CourseRequest;
use App\User;
use TTools;
class RequestController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('DaPowerful');
    }


    public function index ()
    {
    	$crequests = CourseRequest::where(['status'=> 'Pending'])->with('user')->get();
        $categories = Category::all();
        $countedreq = CourseRequest::where(['status'=> 'Pending'])->count();
    	
    	return view('admin.user.courserequest', ['crequests' => $crequests, 'countedreq' => $countedreq, 'categories' => $categories]);

    }

    public function approveCourse(Request $request)
    {
    	if( (int) $request->idrequest > 0){
    		$requestdata = CourseRequest::find( (int) $request->idrequest);
    		if($requestdata){
    			$course = new Course;

    			$course->category_id = (int) $request->category;
    			$course->name = $requestdata->course;
    			$course->description = $requestdata->description;
    			$course->save();
    			$requestdata->status = 'Approved';
    			$requestdata->update();
    			TTools::naSuccess('Course request have been approved');
    			exit;
    		}
    		else{
    			TTools::naError('Invalid Course request');
    			exit;
    		}
    	}
    	else{
    		TTools::naError('Invalid Course request');
    		exit;
    	}
    	


    }


    public function show()
    {

    }
    

    public function deleteCourseRequest(CourseRequest $crequest)
    {
           $crequest->delete();
           return back()->with('rdeleted', 'Course request was deleted successfully');
    }
    
}
