<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    //
  
  public function user()
  {
  	return $this->belongsTo('App\User');
  }

    public static function myPayout($user_id)
    {
        return self::where(['user_id' => $user_id])->get();
    }

    public static function getPendingPayouts()
    { 
       return self::where(['wstatus' => 0])->with('user')->get();

    }

        public static function getPayouts()
    { 
       return self::where(['wstatus' => 1])->with('user')->paginate(25);

    }

    public static function makeRequest($user_id, $amount)
    {

    	$idtrans = Transaction::withdrawalCommission($user_id, $amount, 'Commission Withdrawal from Tutorago.com');
    	$r = new self();
    	$r->user_id = $user_id;
    	$r->transaction_id = $idtrans;
    	$r->amount = $amount;
    	$r->charge = config('app.withcharge');
    	$r->detail = 'Withdrawal request from Tutorago website';

    	$r->save();
    }

        public static function countAll()
    {
        return self::count();


    }
    public static function countPending()
    {
      return self::where(['wstatus' => 0])->count();

    }

    public static function countPaid()
    {
      return self::where(['wstatus' => 1])->count();

    }

    public static function totalPaid()
    {
        return self::where(['wstatus' => 1])->sum('amount');
    }
}
