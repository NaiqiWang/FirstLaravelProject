<article class="comment_comment media status-media">
	<div class="pull-left">
		<img class"media-object" src="//www.gravatar.com/avatar//{{ md5($tag->user->email) }}?s=30" alt="{{ $tag->user->name }}">
	</div>

	<div class="media-body">
		<h4 class="media-heading">{{ $tag->user->name }}</h4>

		{{ $tag->body }}



		{!! Form::open(['route' => ['count_path', $tag->id], 'class' => 'counts_create-form']) !!}
			{!! Form::hidden('tag_id', $tag->id) !!}

				<div class="form-group">
					<button type="submit" class="btn btn-primary" >Like</button>
					@if($tag->counts)
						{{ $tag->counts->countLikes($tag) }}
					@endif

				</div>
		{!! Form::close() !!}



	</div>

</article>

