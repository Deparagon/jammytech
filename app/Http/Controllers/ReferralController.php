<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
class ReferralController extends Controller
{
    //
    public function __construct()
    {
    	  $this->middleware('auth');

    }


    public function show()
    {
    	$referrals = Auth::user()->referrals;
    	return view('user.myreferrals', compact('referrals'));
    }
}
