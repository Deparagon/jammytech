<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //


    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public static function getSocial($userid, $type ='Facebook')
    {
        return self::where(['user_id' => $userid, 'socialtype' => $type])->first();
    }
   

   public static function createSocial( $user_id, $socialtype, $sociallink, $status, $detail) 
   {

      $soc = self::getSocial($user_id, $socialtype);

      if(is_object($soc)){
        $soc->status = 1;
        $soc->$sociallink = $sociallink;
        $soc->detail = $detai;
        $soc->save();
        return true;
      }
   	 $s = new self();
   	 $s->user_id = $user_id;
   	 $s->socialtype = $socialtype;
   	 $s->sociallink = $sociallink;
   	 $s->status = $status;
   	 $s->detail = $detail; 

   	 $s->save();
     return true;
   }

}
