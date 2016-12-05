<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TTools;

class Activity extends Model
{
    //


    public function user()
    {
    	return $this->belongsTo('App\User');
    }




    public static function act($event, $id)
    {
    	$a = new self();
    	$a->user_id = $id;
    	$a->event = $event;
    	$a->ip =TTools::getIP();

    	$a->save();
    	return true;

    }
}
