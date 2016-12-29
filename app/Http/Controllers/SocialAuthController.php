<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;
use App\Social;
use Auth;
use Session;
class SocialAuthController extends Controller
{
    //

    

    public function doFacebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function doFacebookCallback()
    {

         try {
            $user = Socialite::driver('facebook')->user();

            if($user){
                $detail = 'facebookid:'.$user->getId().'|facebookname:'.$user->getName();
                $sociallink = 'https://facebook.com/'.$user->getId();
               Social::createSocial( Auth::user()->id, 'Facebook', $sociallink, 1, $detail);
                 Session::flash('sociallinkage', 'Facebook verification was successful');
                 return redirect('/user/dashboard');

            }
        } catch (Exception $e) {
            return redirect('/twitterredirect');
        }
        
        

       

        return redirect()->to('/home');
    }


    // GOOGLE
    public function doGoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function doGoogleCallback()
    {

         try {
            $user = Socialite::driver('google')->user();

            if($user){
                $detail = 'googleid:'.$user->getId().'|googleavatar:'.$user->getAvatar().'|name:'.$user->getName();
                $sociallink = 'https://plus.google.com/'.$user->getId();
               Social::createSocial( Auth::user()->id, 'Google', $sociallink, 1, $detail);
                 Session::flash('sociallinkage', 'Google verification was successful');
                 return redirect('/user/dashboard');

            }
        } catch (Exception $e) {
            return redirect('/twitterredirect');
        }

    }


   // TWTTTER 

    public function doLinkedinRedirect()
    {
       return Socialite::with('linkedin')->redirect();      
    }


    public function doLinkedinCallback()
    {
 try {
            $user = Socialite::driver('linkedin')->user();

            if($user){
                $detail = 'linkedinid:'.$user->getId().'|avatar:'.$user->getAvatar().'|name:'.$user->getName();
                $sociallink = 'https://linkedin.com/'.$user->getId();
               Social::createSocial( Auth::user()->id, 'Linkedin', $sociallink, 1, $detail);
                 Session::flash('sociallinkage', 'Linkedin verification was successful');
                 return redirect('/user/dashboard');

            }
        } catch (Exception $e) {
            return redirect('/linkedinredirect');
        }
    }




   // TWTTTER 

    public function doTwitterRedirect()
    {
       return Socialite::with('twitter')->redirect();      
    }


    public function doTwitterCallback()
    {
 try {
            $user = Socialite::driver('twitter')->user();

            if($user){
                $detail = 'twitter_id:'.$user->id.'|twitter_avatar:'.$user->avatar_original.'|name:'.$user->name;
                $sociallink = 'https://twitter.com/'.$user->nickname;
               Social::createSocial( Auth::user()->id, 'Twitter', $sociallink, 1, $detail);
                 Session::flash('sociallinkage', 'Twitter verification was successful');
                 return redirect('/user/dashboard');

            }
        } catch (Exception $e) {
            return redirect('/twitterredirect');
        }
    }



}
