<?php

namespace App\Tagoal\Phrases;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $fillable = ['body'];


    public function user()
    {
    	return $this->belongsTo('App\Tagoal\Users\User');
    }


    public function tags()
    {
        return $this->hasMany('App\Tagoal\Tags\Tag');
    }

}
