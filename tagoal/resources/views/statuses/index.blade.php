@extends('layout')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			@include('partials.publish-status-form')

			@include('partials.statuses')
		</div>
	</div>
@stop

@section('scripts.footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
@stop