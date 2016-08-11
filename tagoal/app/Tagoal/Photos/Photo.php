<?php

namespace App\Tagoal\Photos;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
	protected $table = 'photos';
	
	protected $fillable = ['user_id', 'phototable_id', 'phototable_type', 'photo_path', 'name', 'Thumbnail_path'];
	
	protected $baseDir = 'photos';
	

    public function phototable()
    {
        return $this->morphTo();
    }
    
    public static function named($name)
    {
    	
     	$photo = new static;
    	
     	return $photo->saveAs($name);
    	
    }
    
    

    protected function saveAs($name)
    {
    	
    	
    	$this->name = sprintf('%s-%s', time(), $name);
    	$this->path = sprintf('%s/%s', $this->baseDir, $this->name);
    	$this->thumbnail_path = sprintf('%s/tn-%s', $this->baseDir, $this->name);
    	
     	return $this;
    }
    
    public function move(UploadedFile $file)
    {
    	$file->move($this->baseDir, $this->name);
    	$this->makeThumbnail();

    	return $this;
    }
    
    protected function makeThumbnail()
    {
    	Image::make($this->path)
    	->fit(200)
    	->save($this->thumbnail_path);
    }
}