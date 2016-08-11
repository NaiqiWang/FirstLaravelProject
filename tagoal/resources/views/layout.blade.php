<!DOCTYPE html>
<html>
<head>
<title>Project Flyer</title>

<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/libs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">



</head>



    @include('partials.nav')
    	
	<body>
    
		<div class="container">
				@yield('content')
		</div>
		
		<script src="/js/libs.js"></script>

		<script>
			$('.comments_create-form').on('keydown', function(e){
				if(e.keyCode ==13){
					e.preventDefault();
					$(this).submit();
				}

			})

		</script>

		<script>
			$('.counts_create-form').on('keydown', function(e){
				if(e.keyCode ==13){
					e.preventDefault();
					$(this).submit();
				}

			})

		</script>


		@yield('scripts.footer')	
		

		@include('flash')
					
					
							
	</body>
</html>
