<!--start-main-->
<div class="header">
    <div class="header-top">
        <div class="container">
			<div class="logo">
				<a href="/"><h1>THE C·A·S BLOG</h1></a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
		
	<!--head-bottom-->
	<div class="head-bottom">
  		<div class="container">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
      			</button>
    		</div>
    		
    		<div id="navbar" class="navbar-collapse collapse">
      			<ul class="nav navbar-nav">
		            <li class="active"><a href="/">Home</a></li>
		            <li><a href="{{ route('criminals') }}">Criminales Buscados</a></li>
		            @guest
						<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
					@else
						<li>
							<a href="{{ route('logout') }}" class="dropdown-item notify-item"
	                           onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                            <i class="fi-power"></i> <span>{{ __('Cerrar Sesión') }}</span>
	                        </a>

	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            @csrf
	                        </form>
	                    </li>
		            @endguest
      			</ul>
    		</div>
  		</div>
	</div>
</div>