<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tagoal\Users\User;

class FollowsController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $userIdToFollow = $request->userIdToFollow;

        $followed = User::findOrFail($userIdToFollow);

        \Auth::user()->followedUsers()->attach($userIdToFollow);
        
        return \Redirect::back();
        //return \Auth::user();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $userIdToUnfollow = $request->userIdToUnfollow;
        \Auth::user()->followedUsers()->detach($userIdToUnfollow);

        return \Redirect::back();
        //return \Auth::user();
    }
}
