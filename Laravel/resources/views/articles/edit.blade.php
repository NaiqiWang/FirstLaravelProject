@extends('app')


@section('content')

	<h1>Edit a new Article</h1>
	
	<hr/>
	{!! Form::open(['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]]) !!}
		@include('articles.form', ['submitButtonText' => 'Update Article'])
	{!! Form::close() !!}
	
	@include('errors.list')
	
@stop
