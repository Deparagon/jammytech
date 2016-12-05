<?php

namespace app;

use App\Profile;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
       'alatitude', 'alongitude', 'birthday', 'photo', 'video', 'phone', 'gender', 'street', 'city', 'state', 'bio',
    ];

    // who owns profile : user
    public function user()
    {
        return $this->belongsTo('App\User');
    }



    public static function getByState()
    {
    	
    }
}
