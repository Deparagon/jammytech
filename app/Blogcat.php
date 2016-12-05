<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcat extends Model
{
    //


    public function posts()
    {
    	return $this->hasMany('App\Post');
    }


    public static function createCat($name, $slug)
    {
    	$c = new Blogcat();
    	$c->name = $name;
    	$c->slug = $slug;
    	$c->save();
    	return true;

    }
}
