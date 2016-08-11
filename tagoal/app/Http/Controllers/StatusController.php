<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tagoal\Statuses\Status;
use App\Tagoal\Users\User;
use App\Tagoal\Statuses\StatusRepository;



class StatusController extends Controller
{

    protected $statusRepository;

    function __contruct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repo = new StatusRepository();

        //$statuses = $repo->getAllForUser(\Auth::user());  
        $statuses = $repo->getFeedForUser(\Auth::user()); 
        //$statuses = $this->statusRepository->getAllForUser(\Auth::user());

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $body = $request->all();
        $status = new Status($request->all());

        \Auth::user()->statuses()->save($status);

        return \Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
