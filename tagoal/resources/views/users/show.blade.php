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

                    <ul class="list-inline">
                        <li>{{ $statusCount = $user->statuses->count() }} {{ str_plural('Status',$statusCount) }}</li>
                        <br>
                        <li>{{ $followersCount = $user->followers()->count()}} {{ str_plural('Follower',$followersCount) }}</li>
                        <br>
                        <li>Following {{ $followedUsersCount = $user->followedUsers()->count()}} {{ str_plural('Users',$followedUsersCount) }}</li>
                    </ul>
                 
                    @foreach ($user->followers as $follower)
                        @include ('partials.avatar', $follower)
                    @endforeach
                </div>
            </div>



        </div>

        <div class="col-md-6">
            @unless ($user->is(Auth::user()))
                @include ('partials.follow-form')
            @endif

            @if ($user->is(Auth::user()))
                @include('partials.publish-status-form')
            @endif

            @include('partials.statuses', ['statuses' => $user->statuses])
        </div>



    </div>

@stop