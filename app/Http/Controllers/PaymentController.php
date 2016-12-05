<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Invoice;
use Session;
use Auth;
use Paystack;
use App\Bank;
use App\Bidder;
use App\Bidcussion;
use App\Lesson;
use TTools;
class PaymentController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {

            $amount = config('app.processingfee'); 
            $lesson_id = Session::get('lesson');

            // print_r($lesson_id);
            // exit;

           $invoice= Invoice::makeInvoice($amount, $lesson_id, 'ProcessingFee');
           $banks = Bank::getAdminBank();

    	return view('student.payment_option', ['lesson' => $lesson_id, 'invoice' => $invoice, 'banks' => $banks]);

    }

    public function goToPayStack()
    {
			return Paystack::getAuthorizationUrl()->redirectNow();
    }


    public function validateStack()
    {

    	$jpay = Paystack::getPaymentData();
        
            if($jpay['status'] ==1){
             $msg =  $this->checkPayment($jpay);
             // echo $msg;
             // exit;
             $status = 'Fail';
             if( ($msg =='lessonfee') || ($msg =='processingfee') ){
                $status ='Pass';
             }

               return view('student.paymentstate', ['status' => $status, 'msg' => $msg]);
            }


         
          
        
    }

    public function checkPayment($spay)
    {
       $invoice= Invoice::getInvByRef($spay['data']['reference']);
       if(TTools::obuObject($invoice)){

           if($spay['data']['gateway_response'] == 'Successful' &&  $spay['data']['status'] =='success'){
               
               $amountpaid = $spay['data']['amount'] /100;
               if($invoice->amount == $amountpaid ){
                //echo $amountpaid;
                //exit;

                 if($invoice->status ==0){ 

                    if($invoice->detail =='ProcessingFee'){
                      // echo 'here we are';
                      // exit;
                        Lesson::LessonProccessingFeePaid($invoice->lesson_id);
                        // process 
                        return 'processingfee';
                        
                    }

                    if($invoice->detail == 'LessonFee'){
                        Lesson::lessonPaymentMade($invoice->lesson_id, $invoice->amount);
                        // process 
                       return 'lessonfee';
                        

                    }
               }
               else{
                   return 'badstatus';
               }
             }
             else{
                return 'incomplete';
             }
             
           }
       }
       return 'noinvoice';
    }


   public function payOptions(Request $request)
   { 
    $lesson = Lesson::find((int) $request->lesson);
    $bid = Bidder::where(['lesson_id' => $lesson->id])->first();
    $latestreply = Bidcussion::getLatestTutorReply($bid->id);
    $lesson->id_tutor = $latestreply->tutor_id;
    $lesson->save();

           $invoice= Invoice::makeInvoice($latestreply->price, $lesson->id, 'LessonFee');
           $banks = Bank::getAdminBank();
    
    return view('student.pay_options', ['invoice' => $invoice, 'banks' => $banks, 'lesson' => $lesson]);
   }




}
