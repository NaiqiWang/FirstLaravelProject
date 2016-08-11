<?php

namespace App\Tagoal\Counts;

use Illuminate\Database\Eloquent\Model;
use App\Tagoal\Tags\Tag;

class Count extends Model
{
    protected $fillable = ['user_id', 'countable_id', 'countable_type', 'body'];


    public function countable()
    {
        return $this->morphTo();
    }

    public function countLikes(Tag $tag)
    {
    	$numberOfLikes = $this::where('countable_id',$tag->id)->count();
        return $numberOfLikes;
    }

}
