<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
    		'title',
    		'body',
    		'published_at',
    		'user_id'
    ];
    
    //Make published_at a Carbon
    Protected $dates = ['published_at'];
    
    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }
    
    public function scopeUnPublished($query)
    {
    	$query->where('published_at', '>', Carbon::now());
    }
    
    public function setPublishedAtAttribute($date)
    {
    	
    	//Add time to when create
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    	
    	//If you want the time to be always midnight
//     	$this->attributes['published_at'] = Carbon::parse($date);
    }
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
}
