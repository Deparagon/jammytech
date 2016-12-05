<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorshipRequest extends Model
{
    //
    protected $table = 'tutorshiprequests';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public static function countPendingRequest()
    {
    	return self::where(['status' =>'Pending'])->count();
    }
}
