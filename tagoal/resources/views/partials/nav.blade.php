<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Tagoal</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class="nav-link" href="/users">Users</a></li>
            <li><a class="nav-link" href="/statuses">Status</a></li>
            <li><a class="nav-link" href="/phrases">Phrases</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
          	<li class="dropdown">
          	
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img class="nav-gravatar" src="//www.gravatar.com/avatar//{{ md5(Auth::user()->email) }}?s=30" alt="{{ Auth::user()->name }}">
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>

				<ul class="dropdown-menu" role="menu">    
				    <li>{!! link_to_route('profile_path', 'Your Profile', Auth::user()->name) !!}</li>
					  <li><a href="/auth/logout">Logout</a></li>
            <li><a href="/auth/logout">Logout</a></li>
            <li><a href="/auth/logout">Logout</a></li>
				</ul>
			</li>          
          
	            <li><a class="navbar-collapse collapse navbar-right">
					Hello, {{ Auth::user()->name }}
				</a></li>
				
            @else
            	<li><a class="nav-link" href="/auth/register">Register</a></li>
            	<li><a class="nav-link" href="/auth/login">Login</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>
    