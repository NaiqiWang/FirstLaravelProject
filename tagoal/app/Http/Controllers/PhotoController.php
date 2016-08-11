<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tagoal\Photos\Photo;
use App\Tagoal\Statuses\Status;

class PhotoController extends Controller
{
   Public function store(Request $request)
   {

   		//dd($request->file('file'));

   		$file = $request->file('file');

   		$name = time() . $file->getClientOriginalName();
   		$file->move('photos', $name);


		    $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $photo = new Photo($data);
        $photo['photo_path'] = "/photos/{$name}";
        $status = Status::find($data['phototable_id']);
        $status->photos()->save($photo);

        return 'Working on it';
   }
}
