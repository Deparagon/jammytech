<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Bank extends Model
{
    //

public function user()
{
	return $this->belongsTo('App\User');
}
public static function creatBank($bank, $address, $accountname, $accountnumber)
{

	$b = new self();
	$b->user_id = Auth::user()->id;
	$b->bank = $bank;
	$b->address = $address;
	$b->accountnumber = $accountnumber;
	$b->accountname = $accountname;
    if(Auth::user()->power ==1){
    	$b->powerful = 1;
    }
	$b->save();

}


public static function getUserBank($user_id)
{
	return self::where(['user_id' => $user_id])->first();
}

public static function getAdminBank()
{
	return Bank::where(['powerful' => 1])->get();
}

}
