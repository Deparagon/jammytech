<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    //

    public function user()
    {
    	return $this->belongsTo('App\User');
    }



    public static function getStudentReferral($id_student)
    {
    	return self::where(['referred' => $id_student, 'status' => 0])->first();
    }


    public static function countMyReferrals($user_id)
    {
    	return self::where(['user_id' => $user_id])->count();

    }
}
