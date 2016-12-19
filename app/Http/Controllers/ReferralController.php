<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Transaction;
use App\Referral;
class ReferralController extends Controller
{
    //
    public function __construct()
    {
    	  $this->middleware('auth');

    }


    public function show()
    {
    	$referrals = Referral::where(['user_id' => Auth::user()->id])->paginate(25);

        $countref = Referral::countMyReferrals(Auth::user()->id);

        $refmoney = Transaction::getMyReferralEarning(Auth::user()->id);
       // return $referrals;
    	return view('user.myreferrals', ['referrals' =>$referrals, 'refmoney' => $refmoney, 'countref' => $countref]);
    }


   


}
