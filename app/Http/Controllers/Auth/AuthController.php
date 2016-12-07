<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use App\Referral;
use Mail;
use App\Mail\NewUserEmail;
use TTools;

class AuthController extends Controller
{

    protected $secretkey = '6LfRDA4UAAAAAFu7bdvJP_19exIuMwbMcx7bwGij';

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    use RegistersUsers;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function createViaAjax(Request $request)
    {
        
        $validation = $this->validator($request->all());
        if ($validation->fails())  {  
                return response()->json($validation->errors()->toArray());
            }
            else{
                //create user
               $this->create($request->all());
               // $this->login($newuser);
            //if ($this->user()){
                return response()->json(['response' => 'success']);
            //}
               
            }

    }

       public function httpRequest($string)
    {
        $headers = array();
        //$headers[] = 'Content-type: application/json';
        if (function_exists('curl_init')) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $this->url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $base_response = curl_exec($ch);
            curl_close($ch);

            return $base_response;
        } else {
            return 'Curl offline';
        }
    }

    public function checkCaptchaStatus($response)
    {
        $this->url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = 'secret='.$this->secretkey.'&response='.$response.'&remoteip='.TTools::getIP();

        return json_decode($this->httpRequest($data));

    }

    protected function validator(array $data)
    {
             $grecaptcharesponse = $data['g-recaptcha-response'];

             $response = $this->checkCaptchaStatus($grecaptcharesponse);
             if($response->success !=1){
                return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'referralemail' => 'email',
             'Captcha' => 'required',
        ]);
                //echo  json_encode(['response' => ' Captcha validation failed, confirm that you are human']);
                //exit;
             }

        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'referralemail' => 'email',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $newuser =  User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Mail::to($data['email'])->send(new NewUserEmail($data['firstname']));
        
        if($data['referralemail']){
            $dereferrer = User::where(['email' =>$data['referralemail']])->first();
            if($dereferrer){
                $ref = new Referral();
                $ref->user_id = $dereferrer->id;
                $ref->referred = $newuser->id;
                $ref->save();
            }
        }
       // print_r($newuser);
        return $newuser;
    }

    protected function validateLogin($data)
    {
        return Validator::make($data, [

            'email' => 'required|email',
            'password' => 'required',

        ]);
    }

    public function doLogin(Request $request)
    {

        $validation = $this->validateLogin($request->all());
        if($validation->fails()){
            return response()->json($validation->errors()->toArray());
        }
         else{
           
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return response()->json(['response' => 'success']);
        }
        else{
            return response()->json(['response' => 'mismatch']);
        }
             
            
         }
        
         
    }


}
