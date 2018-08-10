<!DOCTYPE HTML>
<html>
<head>
	<title>{{ $articulo->titular }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="{{ asset('front-end/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="{{ asset('front-end/css/style.css') }}" rel='stylesheet' type='text/css' />
	<link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
	<script src="{{ asset('front-end/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>
</head>
<body>
	@include('front-end.includes.start')

	<div class="banner1"></div>

	<!-- technology -->
	<div class="technology-1">
		<div class="container">
			<div class="col-md-9 technology-left">
				<div class="business">
					<div class=" blog-grid2">
						<img src="{{ $articulo->img }}" class="img-responsive" alt="">
						<div class="blog-text">
							<h5>{{ $articulo->titular }}</h5>
							<p>{{ $articulo->descripcion }}</p>		
						</div>
					</div>
				</div>
			</div>
		
			@include('front-end.includes.sidebar')
		</div>
	</div>

	@include('front-end.includes.footer')
</body>
</html>