<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\Category;
use App\Post;
use App\User;
use TTools;
use App\IcanTeach;
use App\Blogcat;
use App\Comment;
class ExternalController extends Controller
{
    //
    public function __construct()
    {
      //$this->middleware('guest');
    }


    public function home()
    {
         $courses = Course::orderBy('id', 'desc')->take(4)->get();
         $categories = Category::with('courses')->inRandomOrder()->take(6)->get();
         // /print_r($categories);
         // exit;
        return view('external.home', ['courses' => $courses, 'categories' =>$categories]);
        
    }
    
    
    public function faq()
    {
        return view('external.faq');
    }

     public function privacy()
    {
        return view('external.privacy');
    }
 public function terms()
    {
        return view('external.terms');
    }


 public function contact()
    {
        return view('external.contact');
    }


    public function contactSave(Request $request)
    {
      $this->validate($request, ['fullname' =>'required', 'email' => 'required', 'message' =>'required']);


      $contact = new Contact();
      $contact->fullname = $request->fullname;
      $contact->email = $request->email;
      $contact->message = $request->message;
      $contact->phone = $request->phone;
      $contact->save();

      return back()->with(['contactsaved'=> 'Contact Saved successfully']);

    }

    
    public function blogPost()
    {
      $posts = Post::getPosts();
      return view('external.blog', ['posts' => $posts]);
    }


    public function singlePost($post)
    {
       $slug = explode('.', $post);

       $singlepost =Post::where(['slug' => $slug[0]])->first();
       if(TTools::obuObject($singlepost)){
         $category = Blogcat::find($singlepost->blogcat_id);
         $comments = $singlepost->comments;
        return view('external.single', ['singlepost' => $singlepost, 'category' => $category, 'comments' => $comments]);
       }

    }

    public function byState($state)
    {
         $t = explode('-', $state);
         if(count($t) > 2){
          $s = $t[0].' '.$t[1];
         }
         else{
          $s = $t[0];
         }
 
         $statetutors = User::getByState($s);
         $countstate = count($statetutors);
        
         
        return view('external.dynamicbystate', ['statetutors' => $statetutors , 'state' => $s, 'countstate' => $countstate]);
    }

    public function bySubject($subject)
    {
           
           $arg = explode('-', $subject);
           array_pop($arg);
           $s = implode(' ', $arg);
                  $subjecttutors = IcanTeach::getSubjectTutors($s);

                  $countsubject = count($subjecttutors);
         
        return view('external.dynamicbysubject', ['subjecttutors' => $subjecttutors, 'countsubject' => $countsubject, 'subject' => $s,  ]);

    }


    public function commentSave(Request $request, $post)
    {
        $this->validate($request, ['author' => 'required', 'comment' => 'required']);
           $slug = explode('.', $post);

       $singlepost =Post::where(['slug' => $slug[0]])->first();
          Comment::makeComment($singlepost->id, $request->author, $request->comment);
          return back()->with('successcomment', 'Comment submitted successfully');


    }
    public function search(Request $request)
    {
            $searched = '';
            $resultset = [];
            $countresult = 0;
   
            $searched = $request->searched;

            //return $searched;

           $resultset = Course::findCourse($searched);
           //return $resultset;


           $countresult = count($resultset);
        
        
     return view('external.searched', ['searched' => $searched, 'resultset'=> $resultset, 'countresult' => $countresult]);
    }

        
      public function login()
    {
        //
      return redirect('/');
    }
}
