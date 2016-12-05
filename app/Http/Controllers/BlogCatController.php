<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Blogcat;
use TTools;
class BlogCatController extends Controller
{
    //

        public function __construct()
    {
      $this->middleware('auth');

    }

    public function index()
    {
    	 $blogcats = Blogcat::all();
          return view('admin.post.addcat', ['blogcats' => $blogcats]);
    }


    public function saveCat(Request $request)
    {
    	 $this->validate($request, ['name' => 'required|max:255', 'slug' => 'required']);

    	 Blogcat::createCat($request->name, $request->slug);
    	 return back()->with(['savedgood' => 'Blog Category Added successfully']);

    }

    public function edit(Blogcat $cat)
    {
    	if(TTools::obuObject($cat)){
    		$blogcats = Blogcat::all();
          return view('admin.post.addcat', ['blogcats' => $blogcats, 'dacat' => $cat]);
    	}
    	return back();
		
    }

    public function updateCat(Request $request, Blogcat $cat)
    {
    	if(TTools::obuObject($cat)){
    		$cat->name = $request->name;
    		$cat->slug = $request->slug;
    		$cat->save();
    		return back()->with(['savedgood' => 'Blog Category Updated successfully']);

    	}

    }
}
