<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Blogcat;
use TTools;
use Image;
class PostController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth');
    }


    public function index()
    {
    	$allposts = Post::with('blogcat')->paginate(25);

    	return view('admin.post.posts', ['allposts' => $allposts]);

    }

    public function showForm()
    {
    	$cats = Blogcat::all();
    	return view('admin.post.addpost', ['cats' => $cats]);
    }
   
    public function savePost(Request $request)
    {
    	$this->validate($request, ['author' => 'required', 'blogcat_id' => 'required|numeric', 'content'=> 'required', 'status' => 'required', 'title' => 'required|max:255',  'featuredimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
          $slug = strtolower(str_replace(' ', '-', $request->title));

      
        //print_r($request->file('profileimage'));
        $featuredimg = date('YmdHis').substr($slug, 1,10).'.jpg';

        Image::make($request->file('featuredimg'))->save('uploads/'.$featuredimg);
          $p = new Post();
          $p->title = $request->title;
          $p->slug = $slug;
          $p->featuredimg = $featuredimg;
          $p->author = $request->author;
          $p->content = $request->content;
          $p->status = $request->status;
          $p->blogcat_id = $request->blogcat_id;
          $p->save();

          //(new Post())->create($request->all());
          return back()->with('createdpost', 'Post created Successfully, thanks');
    }

    public function edit(Request $request, Post $post)
    {
    	$cats = Blogcat::all();
         if(TTools::obuObject($post)){

         	return view('admin.post.editpost', ['post' => $post, 'cats' => $cats]);
         }

    }

    public function updatePost(Request $request, Post $post)
    {
    	if(TTools::obuObject($post)){

            Post::updatePost($post, $request);
         	return back()->with('createdpost', 'Post Updated Successfully');
         }

    }
}
