@if ($user->isFollowedBy(Auth::user()))
	<p>You are following {{ $user->name }} </p>

	{!! Form::open(['route' => ['follow_path', $user->id], 'method' => 'DELETE']) !!}
		{!! Form::hidden('userIdToUnfollow', $user->id) !!}  
		<button type="submit" class="btn btn-primary" >Unfollow {{ $user->name }}</button>

	{!! Form::close() !!}

@else
	{!! Form::open(['route' => 'follows_path']) !!}
		{!! Form::hidden('userIdToFollow', $user->id) !!}  
		<button type="submit" class="btn btn-primary" >Follow {{ $user->name }}</button>

	{!! Form::close() !!}
@endif


