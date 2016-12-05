<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Paystack;
use Auth;

class Invoice extends Model
{
    //


   public function user()
   {
   	 $this->belongsTo('App\User');
   }


   public static function makeInvoice($amount, $lessonid, $detail)
   {

   	 $inv = new self();
   	 $inv->user_id = Auth::user()->id;
   	 $inv->reference = Paystack::genTranxRef();
       $inv->lesson_id = $lessonid;
       $inv->detail = $detail;
   	 $inv->amount = $amount;
   	 $inv->status = 0;
   	 $inv->save();

   	 return $inv;


   }

   public static function getInvByRef($reference)
   {
       return self::where(['reference' => $reference])->first();
   }


   public static function getLessoninvoice($lessonid, $user_id)
   {
    return self::where(['lesson_id' => $lessonid, 'detail' => 'lessonFee', 'user_id' => $user_id])->orderBy('id', 'desc')->first();

   }
}
