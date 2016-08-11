<?php

namespace App\Tagoal\Comments;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'body'];


    public function commentable()
    {
        return $this->morphTo();
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
