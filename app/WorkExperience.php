<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = 'workexperiences';
    //


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
