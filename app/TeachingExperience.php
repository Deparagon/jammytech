<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class TeachingExperience extends Model
{
    protected $table = 'teachingexperiences';
    //


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
