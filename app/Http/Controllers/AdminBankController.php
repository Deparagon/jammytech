<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bank;

class AdminBankController extends Controller
{
    //


    public function __construct()
    {
       $this->middleWare('DaPowerful');
    }

    public function index()
    {
        $banks = Bank::where(['powerful' => 1])->get();
        return view('admin.bank', ['banks' => $banks]);
    }

    public function createBank(Request $request)
    {
    	$this->validate($request, ['bank' => 'required', 'accountname' => 'required', 'accountnumber' => 'required', 'address' => 'required']);

    	Bank::creatBank($request->bank, $request->address, $request->accountname, $request->accountnumber);
    	return back()->with(['createdbank' => 'Bank details created successfully']);

    }


    public function edit(Request $request, Bank $bank)
    {

    	return view('admin.edit_bank', ['bank' => $bank]);

    }


    public function updateBank(Request $request, Bank $bank)
    {
    	$bank->bank = $request->bank;
    	$bank->accountname = $request->accountname;
    	$bank->accountnumber = $request->accountnumber;
    	$bank->address = $request->address;
    	$bank->save();
    	return back()->with(['createdbank' => 'Bank details Updated successfully']);



    }

    public function deleteBank(Request $request)
    {

       Bank::find((int) $request->idbank)->delete();
       echo 'OK';
       exit;

    }
}
