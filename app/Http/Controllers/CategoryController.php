<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Course;
use Validator;
use Image;

class CategoryController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('DaPowerful');

    }
protected function validateCategory($data)
{
    return Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
}

    public function add(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        // print_r($_POST);
        // Print_r($_FILES);
        // echo '<hr>';
        // print_r($request);
        if ($request->hasFile('imageurl')) {
            $categoryimage = date('YmdHis').$this->request->name.'.jpg';

            Image::make($request->file('imageurl'))->save('uploads/'.$categoryimage);
        } else {
            $categoryimage = 'category.png';
        }

        $category = new Category();
        $category->name = $request->name;
        $category->imageurl = $categoryimage;
        $category->description = $request->description;

        $category->save();

        return back()->with('createdmsg', 'Category Created successfully');
    }

    public function show()
    {
        return view('admin.category.add');
    }

    public function index()
    {
        $categories = Category::all();

        return view('admin.category.list', compact('categories'));
    }

    public function edit(Category $category)
    {
        $courses = $category->courses();

        return view('admin.category.edit', ['category' => $category, 'courses' => $courses]);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        if ($request->hasFile('imageurl')) {
            $categoryimage = date('YmdHis').$request->name.'.jpg';

            Image::make($request->file('imageurl'))->save('uploads/'.$categoryimage);

            $category->update(['name' => $request->name, 'description' => $request->description, 'imageurl' => $categoryimage]);
        } else {
            $category->update(['name' => $request->name, 'description' => $request->description]);
        }

        return back()->with('createdmsg', 'Category Updated successfully');
    }

    public function delete(Request $request)
    {
        if (Category::find((int) $request->idcategory)->delete()) {
            Course::where('category_id', $request->idcategory)->delete();

            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'Bad']);
        }
    }
}
