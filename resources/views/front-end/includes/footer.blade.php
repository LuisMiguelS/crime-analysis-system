<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="col-md-4 footer-left">
			<h6 class="text-center">THE C·A·S BLOG</h6>
			<p>Blog informativo de noticias proveído por C·A·S.</p>
			<p>Este blog te mantendrá informado oficialmente sobre las últimas noticias de importancia que suceden en la actualidad.</p>
		</div>
		
		<div class="col-md-4 footer-middle">
			<h4>Noticias Oficiales</h4>
			<p>Noticias proveidas por el departamento de la policía.</p>
		</div>
		
		<div class="col-md-4 footer-right">
			<h4>Criminales Buscados</h4>
			<li><a>- Conoce a quienes persigue la ley. </a></li>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<!-- footer -->
<div class="foot-nav">
	<div class="container">
		<ul>
			<li class="{{ request()->is('/') ? 'active' : '' }}">
            	<a href="/">Home</a>
            </li>
            
            <li class="{{ request()->is('criminales-buscados') ? 'active' : '' }}">
            	<a href="{{ route('criminals') }}">Criminales Buscados</a>
            </li>
            
            @guest
				<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
			@else
				<li>
	            	<a href="{{ route('dashboard') }}">Dashboard</a>
	            </li>

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
			<div class="clearfix"></div>
		</ul>
	</div>
</div>

<!-- footer-bottom -->
<div class="copyright">
	<div class="container">
		<p>Copyright © 2018 C·A·S. All rights reserved.</p>
	</div>
</div>