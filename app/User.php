<?php

namespace app;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
    /**
     * The properties.
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'firstname', 'lastname', 'verification_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function educations()
    {
        return $this->hasMany('App\Education');
    }

    public function workExperiences()
    {
        return $this->hasMany('App\WorkExperience');
    }

    public function teachingExperiences()
    {
        return $this->hasOne('App\TeachingExperience');
    }

    public function icanTeach()
    {
        return $this->hasMany('App\IcanTeach');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function guarantor()
    {
        return $this->hasMany('App\Guarantor');
    }

    public function courseRequest()
    {
        return $this->hasMany('App\CourseRequest');
    }

       public function tutorshipRequest()
    {
        return $this->hasOne('App\TutorshipRequest');
    }


    public function referrals()
    {
        return $this->hasMany('App\Referral');
    }

           public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
   public function activities()
   {
    return $this->hasMany('App\Activity');
   }


   public function banks()
   {
    return $this->hasMany('App\Bank');
   }

   public function bidder()
   {
    return $this->hasMany('App\Bidder');
   }


   public function bidcussion()
   {
    return $this->hasMany('App\Bidcussion');
   }


 public function payouts()
 {
    return $this->hasMany('App\Payout');
 }
 
 public static function getByState($state)
 {
    return self::where(['state' =>$state, 'tutor' => 1])->paginate(25);
 }

  public static function countTutorByState($state)
 {
    return self::where(['state' =>$state, 'tutor' => 1])->count();
 }

public static function getUserFirstname($id)
{
    $user = self::where(['id' => $id])->first();
    if($user){
        return $user->firstname;
    }
     return '';
}

public static function getUserNames($id)
{
    $user = self::where(['id' => $id])->first();
    if($user){
        return $user->lastname.' '.$user->firstname;
    }
     return '';
}

}


