<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guarantor;
use App\Education;
use Auth;

class GuarantorController extends Controller
{
   
    public function __construct()
    {
         $this->middleware('auth');
    }
    public function show()
    {
        //$user = Auth::user();
        $guarantors = Guarantor::where(['user_id' => Auth::user()->id])->get();
        //$this->dauser->guarantor;

        return view('tutor.guarantor', ['myguarantors' => $guarantors]);
    }

    public function add(Request $request)
    {
        $this->validate($request, ['firstname' => 'required|max:255', 'lastname' => 'required|max:255', 'email' => 'required|email|max:255', 'phone' => 'required|max:255', 'yearsknown' => 'required|max:255', 'placeofwork' => 'required|max:255']);

        $g = new Guarantor();
        $g->firstname = $request->firstname;
        $g->lastname = $request->lastname;
        $g->email = $request->email;
        $g->phone = $request->phone;
        $g->placeofwork = $request->placeofwork;
        $g->yearsknown = $request->yearsknown;
        $g->user_id = Auth::user()->id;

        $g->save();

        return back()->with('createdmsg', 'Guarantor saved successfully');
    }

    public function deleteG(Request $request)
    {
        if (Guarantor::find((int) $request->idgurantor)->delete()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'Bad']);
        }
    }
}
