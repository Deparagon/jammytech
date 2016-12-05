<?php

namespace app;

use App\Education;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table = 'educations';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
