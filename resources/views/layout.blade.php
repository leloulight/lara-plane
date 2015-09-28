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
	<div class="wrap">
		<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-24">
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav navbar-right">
					        <li><a href="#">Флот</a></li>
					        <li><a href="#">Карта крушений</a></li>
					        <li><a href="#">О нас</a></li>
					        <li><a href="#">Контакты</a></li>
					        <li><a href="#">Купить кофе</a></li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-md-24">
					<h1 class="logo"><a href="/">My logotype</a></h1>
				</div>
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-md-24">
					<form action="#" class="search">
						<p class="search__desc">Найти космический корабль по названию</p>
						<div class="search-input-container">
							<input type="text" class="search__input" placeholder="Введите название космического корабля">
							<input type="submit" class="search__submit">
							<span class="search__arrow"></span>
						</div>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div>
		</header>

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