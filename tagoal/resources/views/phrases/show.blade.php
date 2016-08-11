@extends('layout')

@section('content')

	<div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">

                    {{ $phrase->body }}

               		@if(Auth::user())


						{!! Form::open(['route' => ['tag_path', $phrase->id], 'class' => 'comments_create-form']) !!}
							{!! Form::hidden('phrase_id', $phrase->id) !!}

							<div class="form-group">
								{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1]) !!}
							</div>
						{!! Form::close() !!}

					@endif

					@if ($tags = $phrase->tags)
						<div class="comments">
							@foreach ($tags as $tag)
								@include('partials.tag')
							@endforeach
						</div>
					@endif
                    
                </div>
            </div>
        </div>
    </div>

@stop