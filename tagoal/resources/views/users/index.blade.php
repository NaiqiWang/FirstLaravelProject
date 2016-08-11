@extends('layout')

@section('content')

	
 <h1 class="page-header">All Users</h1>

    @foreach ($users->chunk(4) as $userSet)
        <div class="row users">
            @foreach ($userSet as $user)
                <div class="col-md-3 user-block">

               		@include ('partials.avatar', $user)    
                    <h4 class="user-block-username">
                        {!! link_to_route('profile_path', $user->name, $user->name) !!}
                    </h4>

                </div>
            @endforeach
        </div>
    @endforeach

@stop