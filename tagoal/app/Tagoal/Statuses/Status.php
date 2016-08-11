<?php

namespace App\Tagoal\Statuses;

use Illuminate\Database\Eloquent\Model;
use App\Tagoal\Comments;
use App\Tagoal\Photos;

class Status extends Model
{
    protected $fillable = ['body'];


    public function user()
    {
    	return $this->belongsTo('App\Tagoal\Users\User');
    }

    public function comments()
    {
    	return $this->morphMany('App\Tagoal\Comments\Comment', 'commentable');
    }

    public function photos()
    {
    	return $this->morphMany('App\Tagoal\Photos\Photo', 'phototable');
    }
}
