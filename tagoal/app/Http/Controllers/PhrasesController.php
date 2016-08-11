<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tagoal\Phrases\Phrase;

class PhrasesController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'body' => 'required|unique:phrases',
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $phrases =  Phrase::orderBy('body','asc')->paginate(25);


        return view('phrases.index')->withPhrases($phrases);
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
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }


            $body = $request->all();
            $phrase = new Phrase($request->all());

            \Auth::user()->phrases()->save($phrase);

            return \Redirect::back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($body)
    {
        $phrase = Phrase::whereBody($body)->first();

        return view('phrases.show')->withPhrase($phrase);
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
