<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Activity;
use Auth;
use Hash;

class SecurityController extends Controller
{
    //
    public function __construct()
    {
          $this->middleware('auth');
    }


    public function index()
    {
    	return view('user.password');
    }

        public function changePassword(Request $request)
    {  
        $this->validate($request, ['oldpassword' =>'required', 'newpassword'=>'required|min:6']);

        $currentpass = Auth::user()->password;
        if (Hash::check($request->oldpassword, $currentpass)) {
            $member = Auth::user();
            $member->password = bcrypt($request->newpassword);
            $member->save();
              Activity::act('Successful account password change', Auth::user()->id);
            return back()->with(['passwordupdated' =>'Password Updated successfully']);
        }
        else{
            Activity::act('Password changed failed, old password error', Auth::user()->id);
            return back()->with(['errorupdate' =>'Could not set new password, old password did not match']);


        }

    }
}
