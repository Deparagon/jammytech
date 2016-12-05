<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

        public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public static function getBalace()
    {
    	$credit = self::sum('credit');
       $debit = self::sum('debit');
		return ($credit - $debit);
    }


    public static function getUserBalance($user_id)
    {
       $credit = self::where(['user_id' =>$user_id])->sum('credit');
       $debit = self::where(['user_id' =>$user_id])->sum('debit');
     return ($credit - $debit);
    }

    public static function getAdminCommission()
    {
       $credit = self::where(['user_id' =>1, 'transaction_type' =>'AdminCommission'])->sum('credit');
       
     return $credit;
    }


    public static function payTutorLessonComplete($lesson, $amount, $detail )
    {
        $t = new self();
        $t->user_id = $lesson->id_tutor;
        $t->credit = $amount;
        $t->debit = 0;
        $t->transaction_type = 'CreditLessonCommission';
        $t->detail = $detail;

        $t->save();
    }


    public static function payReferral($user_id, $amount, $detail)
    {
        $t = new self();
        $t->user_id = $user_id;
        $t->credit = $amount;
        $t->debit = 0;
        $t->transaction_type = 'CreditReferralCommission';
        $t->detail = $detail;
        $t->save();
    }


 public static function withdrawalCommission($user_id, $amount, $detail)
    {
        $c = new self();
        $c->user_id = $user_id;
        $c->credit = 0;
        $c->debit = config('app.withcharge');
        $c->transaction_type = 'debitWithdrawalCharge';
        $c->detail = 'Wthdrawal charge';
        $c->save();

        $t = new self();
        $t->user_id = $user_id;
        $t->credit = 0;
        $t->debit = $amount;
        $t->transaction_type = 'debitWithdrawal';
        $t->detail = $detail;
        $t->save();

        return $t->id;
    }


}
