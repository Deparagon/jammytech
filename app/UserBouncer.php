<?php

/*


*/
namespace app;
use Auth;
use App\User;
use App\TutorshipRequest;
class UserBouncer {



public static function isTutor()
{
	if(Auth::user()->tutor ==1){
		return true;
	}
	return false;
}
 

 public static function isTutorWanabe ()
 {
 	$tutor =TutorshipRequest::find(Auth::user()->id);
 	if($tutor){
 		return true;
 	}

 	return false;
 }


 public static function isAdmin()
 {
 	if(Auth::user()->power ==1){
		return true;
	}
	return false;

 }

}