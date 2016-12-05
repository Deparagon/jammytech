<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Course;
use Image;
use TTools;

class CourseController extends Controller
{
    //

     public function index()
     {
         $courses = Course::with('category')->get();

         return view('admin.course.list', compact('courses'));
     }

    public function show()
    {
        return view('admin.course.add', ['categories' => Category::all()]);
    }

    public function add(Request $request)
    {
        $this->validate($request, ['category_id' => 'required|int', 'name' => 'required', 'description' => 'required', 'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        if ($request->hasFile('imageurl')) {
            $courseimage = date('YmdHis').$request->name.'.jpg';

            Image::make($request->file('imageurl'))->save('uploads/'.$courseimage);
        } else {
            $courseimage = 'course.png';
        }

        $course = new Course();
        $course->category_id = $request->category_id;
        $course->name = $request->name;
        $course->imageurl = $courseimage;
        $course->description = $request->description;

        $course->save();

        return back()->with(['createdmsg' => 'Course Created Successfully']);
    }

    public function edit(Course $course)
    {
        return view('admin.course.edit', ['course' => $course, 'categories' => Category::all()]);
    }

    public function update(Request $request, Course $course)
    {
        $this->validate($request, ['category_id' => 'required|int', 'name' => 'required', 'description' => 'required', 'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        $course->category_id = $request->category_id;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->price = $request->price;

        if ($request->hasFile('imageurl')) {
            $courseimage = date('YmdHis').$request->name.'.jpg';

            Image::make($request->file('imageurl'))->save('uploads/'.$courseimage);
            $course->imageurl = $courseimage;
        }

        $course->update();

        return back()->with(['createdmsg' => 'Course Updated Successfully']);
    }

    public function delete()
    {
        if (Course::find((int) $request->idcourse)->delete()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'Bad']);
        }
    }



    public function searchCourse(Request $request)
    {
        if($request->category =='All'){
            if(!empty($request->searchlesson)){
                $data = Course::findCourse($request->searchlesson);
            }
            else{
                TTools::naError('Provide search text');
                exit;
            }
        }
        else{

             if(!empty($request->searchlesson)){
                $data = Course::findCourseInCategory($request->category, $request->searchlesson);
             }
             else{
                 $data = Course::getCourseInCategory($request->category);
             }
            
            
        }
    
    $result ='';
    if(!empty($data)){
        foreach($data as $lesson){ 
        $result.='
<tr> <td> <img class="list-img" src="/uploads/'.$lesson->imageurl.'"> </td> <td>'.$lesson->name.'</td> <td>'.$lesson->description.' </td> <td> Search </td> <td> <input class="form-control" type="radio" name="lessontostart" value="'.$lesson->id.'"></td> </tr>';
}


    }
    else{
        $result.='<tr> <td colspan="5">  </td><tr> ';
    }

    echo $result;
    exit;
}
}