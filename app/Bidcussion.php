<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidcussion extends Model
{
    //

    public function bidder()
    {
    	return $this->belongsTo('App\Bidder');
    }


    public static function doTutorComments($id_bid, $tutor, $price, $comment)
    {
        $c = new self();
        $c->bidder_id = $id_bid;
        $c->tutor_id = $tutor;
        $c->price = $price;
        $c->comment = $comment;
        $c->save();
        return true;
    }

    public static function doStudentComment($idbid, $student, $price, $comment)
    {
        $c = new self();
        $c->bidder_id = $idbid;
        $c->student_id = $student;
        $c->tutor_id = 0;
        $c->price = $price;
        $c->comment = $comment;
        $c->save();
        return true;

    }

    public static function getTutorLatestReply($bidid, $tutor)
    {
       return self::where(['bidder_id' => $bidid, 'tutor_id' => $tutor ])->orderBy('id', 'desc')->first();
    }
    public static function getLatestTutorReply($bidid)
    {
        return self::where(['bidder_id' => $bidid, 'student_id' => null ])->orderBy('id', 'desc')->take(1)->first();
    }
}
