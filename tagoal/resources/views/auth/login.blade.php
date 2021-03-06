@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form method="POST" action="/auth/login">
			{!! csrf_field() !!}
			
			<div class="form-group">
				<label class="col-md-4 control-label">E-Mail Address</label>
				<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
				</div>
			</div>
		
			<div class="form-group">
				<label class="col-md-4 control-label">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password" required>
				</div>
			</div>
		
			<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember"> Remember Me
				</label>
			</div>
			</div>
			</div>
		
			<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">Login</button>
		
				<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
			</div>
	</div>
</div>
@stop