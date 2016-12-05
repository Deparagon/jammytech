<?php

namespace app\Http\Controllers;

use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Lesson;
use App\Transaction;
use TTools;
use App\Activity;

//use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
        
    }

}
