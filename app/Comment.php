<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //


    public function post()
    {
    	return $this->belongsTo('App\Post');
    }


    public static function makeComment($post_id, $author, $comment)
    {
    	$c = new self();
    	$c->post_id = $post_id;
    	$c->author = $author;
    	$c->comment = $comment;
    	$c->save();
    	return true;
    }
}
