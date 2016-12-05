<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable =['title', 'content', 'slug', 'author', 'blogcat_id', 'status'];

    public function blogcat(){
    	return $this->belongsTo('App\Blogcat');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public static function updatePost($post, $request)
    {
        if($request->hasFile('featuredimg')){
               $featuredimg = date('YmdHis').substr($request->slug, 1,10).'.jpg';

        Image::make($request->file('featuredimg'))->save('uploads/'.$featuredimg);
        $post->featuredimg = $featuredimg;
        }
    	$post->author = $request->author;
    	$post->title = $request->title;
    	$post->content = $request->content;
    	$post->slug = $request->slug;
    	$post->blogcat_id = $request->blogcat_id;
    	$post->status = $request->status;
         $post->save();
         return true;
    }


    public static function getPosts()
    {
        return self::with('blogcat')->orderBy('id', 'desc')->get();
    }


}
