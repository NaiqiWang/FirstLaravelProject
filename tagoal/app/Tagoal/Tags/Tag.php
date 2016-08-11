<?php

namespace App\Tagoal\Tags;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['user_id', 'phrase_id', 'body'];

    public function phrase()
    {
    	return $this->belongsTo('App\Tagoal\Phrases\Phrase', 'phrase_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Tagoal\Users\User', 'user_id');
    }

    public function counts()
    {
    	return $this->morphOne('App\Tagoal\Counts\Count', 'countable');
    }

}
