@extends('app')

@section('content')
	<h1> {{ $articles->title}} </h1>
	
	<article>
		{{ $articles->body }}
	</article>
	
	
	@unless ($articles->tags->isEmpty())
		<h5>Tags:</h5>
		<ul>
			@foreach ($articles->tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endunless
@stop 