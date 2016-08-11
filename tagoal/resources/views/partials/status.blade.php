<article class="media status-media">
	<div class="pull-left">
		<img class"media-object" src="//www.gravatar.com/avatar//{{ md5($status->user->email) }}?s=30" alt="{{ $status->user->name }}">
	</div>

	<div class="media-body">
		<h4 class="media-heading">{{ $status->user->name }}</h4>
		<P>{{ $status->created_at->diffForHumans() }}</P>

		{{ $status->body }}
	</div>

</article>

@if(Auth::user())
	
	{!! Form::open(['route' => ['comment_path', $status->id], 'class' => 'comments_create-form']) !!}
			   
		{!! Form::hidden('commentable_id', $status->id) !!}

		<div class="form-group">
			{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1]) !!}
		</div>

		<div class="form-group status-post-submit">
			{!! Form::submit('Post Status', ['btn btn-default btn-xs']) !!}
		</div>

		<div class="form-group">
			{!! Form::textarea('body', null, ['class' => 'dropzone']) !!}		</div>

	{!! Form::close() !!}
	
	{!! Form::open(['route' => ['photo_path', $status->id], 'class' => 'dropzone']) !!}
			   
		{!! Form::hidden('phototable_id', $status->id) !!}

		<div class="form-group">
			<form action="/{{$status}}/{{$status->id}}/photos" method="POST" class="dropzone">
				{{ csrf_field() }}		
			</form>
		</div>
	{!! Form::close() !!}
	

@endif

@if ($comments = $status->comments)
	<div class="comments">
		@foreach ($comments as $comment)
			@include('partials.comment')
		@endforeach
	</div>
@endif