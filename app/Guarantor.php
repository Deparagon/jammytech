<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    //


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
