<!DOCTYPE html>
<html>
<head>
<title>Laravel</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100"  type="text/css">
<link rel="stylesheet" href="{{  elixir('css/all.css') }}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />

</head>
	<body>
		<div class="container">
				<div class="content">
					<div class="title">
						@include('partials.flash')						
						@yield('content')
					</div>
					
					
					<script src="//code.jquery.com/jquery.js"></script>
					<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
					
					<script>
						$('div.alert').not('.alert_important').delay(3000).slideUp(300);
					</script>
				</div>
		</div>
		
		<script src="/js/all.js"></script>
		
				@yield('footer')
	</body>
</html>
