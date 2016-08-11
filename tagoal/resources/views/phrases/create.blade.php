@extends('layout')

@section('content')

	<div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                    @include ('partials.avatar', $user)
                </div>

                <div class="media-body">
                    <hi>{{$user->name}}</hi>
                </div>
            </div>



        </div>

        <div class="col-md-6">

            @if ($user->is(Auth::user()))
                @include('partials.create-phrase-form')
            @endif

        </div>



    </div>

@stop