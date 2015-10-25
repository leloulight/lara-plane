@include('header')
<body>
	<header class="header main-page-header">
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
						  <li class="main-nav__item"><a class="main-nav__link" href="/spaceships/">Флот</a></li>
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
							<input type="text" class="search__input" placeholder="Название корабля">
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

    @include('footer')
</body>
</html>