<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TTools;

class Identity extends Model
{
    //

    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public static function saveUpdate($user_id, $idtype, $identity)
    {
        $old = self::where('user_id', $user_id)->first();
        if(TTools::obuObject($old)){
        	$old->idtype = $idtype;
        	$old->identity = $identity;

        	$old->save();
        	return true;
        }

        $newid = new self();
        $newid->user_id = $user_id;
        $newid->idtype = $idtype;
        $newid->identity = $identity;
        $newid->save();
        return true;

    }
}
