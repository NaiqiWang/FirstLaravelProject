@extends('app')


@section('content')

	<h1>Write a new Article</h1>
	
	<hr/>
	{!! Form::open(array('url' => 'articles')) !!}
		@include('articles.form', ['submitButtonText' => 'Add Article'])
	{!! Form::close() !!}
	
	@include('errors.list')
	
@stop