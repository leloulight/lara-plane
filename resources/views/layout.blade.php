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
		<script type="text/javascript" src="{!! asset('bower/html5shiv/dist/html5shiv.min.js') !!}"></script>
	<![endif]-->
</head>
<body>
	<!-- begin wrap  -->
	<div class="wrap">
		<header class="header">
		<a href="#" class="hamburger-btn">
			<span class="hamburger-btn__line"></span>
			<span class="hamburger-btn__line"></span>
			<span class="hamburger-btn__line"></span>
		</a>
		<div class="container">
			<div class="row">
				<div class="col-md-24 main-nav-container">
					<nav class="main-nav">
						<ul>
						  <li class="main-nav__item"><a class="main-nav__link" href="#">Флот</a></li>
						  <li class="main-nav__item"><a class="main-nav__link" href="#">Карта крушений</a></li>
						  <li class="main-nav__item"><a class="main-nav__link" href="/about/">О нас</a></li>
						  <li class="main-nav__item"><a class="main-nav__link" href="/contact/">Контакты</a></li>
						  <li class="main-nav__item"><a class="main-nav__link" href="#">Купить кофе</a></li>
						</ul>
						<span class="main-nav__close"></span>
					</nav>
				</div>
				<div class="logo-container col-md-24">
					<h1 class="logo"><a href="/">My logotype</a></h1>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-md-24">
					<form action="#" class="search">
						<p class="search__desc">Найти космический корабль по названию</p>
						<div class="search-input-container">
							<input type="text" class="search__input" placeholder="Введите название космического корабля">
							<button type="submit" class="search__submit fa fa-search"></button>
							<span class="search__arrow"></span>
						</div>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-md-24">
					@yield('content')
				</div>
			</div>
		</div>

	</div>
	<!-- end wrap -->

	<footer class="footer">
		<p>footer</p>
	</footer>

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="{!! asset('js/libs/bootstrap.min.js') !!}"></script>
	{{-- <script src='js/libs/jquery.bxslider.min.js'></script> --}}

	<script src="{!! asset('bower/masonry/dist/masonry.pkgd.min.js') !!}"></script>
	<script src="{!! asset('build/js/global.min.js') !!}"></script>

	{{-- Elixir livereload --}}
	@if ( Config::get('app.debug') )
	  <script type="text/javascript">
	    document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
	  </script>
	@endif
</body>
</html>