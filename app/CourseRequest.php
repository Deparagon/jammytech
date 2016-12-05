<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CourseRequest extends Model
{
    protected $table = 'newcourserequests';
    protected $fillable = ['course', 'description'];
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
