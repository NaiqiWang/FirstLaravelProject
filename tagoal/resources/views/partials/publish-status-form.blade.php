@include('errors.list')

<div class="status-post">
	{!! Form::open(['route' => 'statuses_path']) !!}
			    
		<div class="form-group">
			{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => "What's on your mind?"]) !!}
		</div>

		<div class="form-group status-post-submit">
			{!! Form::submit('Post Status', ['btn btn-default btn-xs']) !!}
		</div>

	{!! Form::close() !!}
</div>