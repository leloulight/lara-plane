<!doctype html>
<html lang="ru">
<head>
	<title>Lara-plane</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- BOOTSTRAP -->
	{{-- <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" /> --}}

	<!-- BXSLIDER -->
	{{-- <link rel="stylesheet" href="css/jquery.bxslider.css"> --}}

	<!-- FONT-AWESOME -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link href="{!! asset('build/css/style.css') !!}" rel="stylesheet" />

	<!--[if lt IE 9]>
		<script type="text/javascript" src="{!! asset('js/libs/html5shiv.min.js') !!}"></script>
	<![endif]-->
</head>
<body>
	<!-- begin wrap  -->
	<div class="wrap container">

		@yield('content')

	</div>
	<!-- end wrap -->

	<footer class="footer">

	</footer>

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="{!! asset('js/libs/bootstrap.min.js') !!}"></script>
	{{-- <script src='js/libs/jquery.bxslider.min.js'></script> --}}
	<script src="{!! asset('build/js/global.min.js') !!}"></script>

	{{-- Elixir livereload --}}
	@if ( Config::get('app.debug') )
	  <script type="text/javascript">
	    document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
	  </script>
	@endif
</body>
</html>