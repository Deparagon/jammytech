<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use TTools;
use App\Bank;
use Auth;

class BankController extends Controller
{
    //


    public function showForm()
    {
           
           $bank = Bank::where(['user_id' => Auth::user()->id])->first();
    	return view('tutor.bank', ['bank' => $bank]);
    }

    public function saveForm(Request $request)
    {
    	$this->validate($request, ['bank' => 'required', 'accountname' => 'required', 'accountnumber' => 'required', 'address' =>'required']);

      $bank = Bank::where(['user_id' => Auth::user()->id])->first();
      
      if(TTools::obuObject($bank)){
      	$bank->accountnumber = $request->accountnumber;
      	$bank->bank = $request->bank;
      	$bank->accountname = $request->accountname;
      	$bank->address = $request->address;

      	$bank->save();
      	return back()->with(['bankgood' => 'Bank detail updated Successfully']);

      }
      else{

      	Bank::creatBank($request->bank, $request->address, $request->accountname, $request->accountnumber);
      	return back()->with(['bankgood' => 'Bank detail created Successfully']);

      }

    }
}
