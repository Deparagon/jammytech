<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payout;
use TTools;

class AdminPayoutController extends Controller
{
    //

    
    public function  pendingPayout()

    {
			$payrequests = Payout::getPendingPayouts();



			return view('admin.payoutrequests', ['payrequests' => $payrequests, 'allrequest' => Payout::countAll(), 'paidrequest' => Payout::countPaid(), 'pending' => Payout::countPending()]);
    }



    public function markPayout(Payout $payout)
    {
        if(TTools::obuObject($payout)){
            $payout->wstatus = 1;
            $payout->save();

            return back()->with('paidmark', 'Payment request successfully marked as paid');
        }

            return back()->with('paidnot', 'Error occured during check and figuration and identifier just disappeared');


    }


   public function payouts()
   {

   	$payouts = Payout::getPayouts();
         
   	return view('admin.payouts', ['payouts' => $payouts, 'allrequest' => Payout::countAll(), 'paid' => Payout::countPaid(), 'cashpaid' => Payout::totalPaid()]);

   }


}
