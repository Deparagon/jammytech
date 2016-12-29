<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    //

     public function __construct()
    {
       $this->middleWare('auth');
    }


    public function index()
    {
    	return view('admin.contact');
    }
}
