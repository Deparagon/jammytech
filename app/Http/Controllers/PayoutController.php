<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payout;
use Auth;
use App\Transaction;
use TTools;

class PayoutController extends Controller
{
    //


    public function showForm()
    {
        $payouts = Payout::myPayout(Auth::user()->id);

        return view('tutor.payoutrequest', ['payouts' => $payouts]);
    }
   
   public function saveForm(Request $request)
   {
       $this->validate($request, ['amount' => 'required']);

       if((float) $request->amount > 0.00){
         
       $amount = $request->amount;
       $charge = config('app.withcharge');
       $total = ($amount+$charge);
         $bal = Transaction::getUserBalance(Auth::user()->id);
         if($bal > $total){
              
              Payout::makeRequest(Auth::user()->id, $amount);
              return back()->with('successwith', 'Withdrawal request was  successful');

         }
        return back()->with('witherror', 'You need to have a balance greater or equal to '.TTools::showPrice($total));
       }
 return back()->with('witherror', 'Enter amount you want to withdraw in digits');
   }

}
