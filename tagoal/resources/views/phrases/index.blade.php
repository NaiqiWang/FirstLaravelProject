@extends('layout')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		    @if (Auth::user())
                @include('partials.create-phrase-form')
            @endif



			@foreach($phrases as $phrase)
				{!! link_to_route('phrase_path', $phrase->body, $phrase->body) !!}
			@endforeach
		</div>
	</div>
@stop