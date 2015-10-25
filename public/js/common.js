$(function() {
	/**
	***************************************************************
	* =LOAD PAGE
	***************************************************************
	**/

	var menu = $('.main-nav-container');

	/* MAIN PAGE MASONRY */
	var container = document.querySelector('.recent'),
		msnry = new Masonry( container, {
			columnWidth: 30,
			gutter: 10,
			itemSelector: 'recent__item',
		});

	imagesLoaded( container, function() {
		msnry = new Masonry( container );
	});

	/**
	***************************************************************
	* =USABILLITY
	***************************************************************
	**/

	// MAIN MENU
	// Open menu
	$('.hamburger-btn').on('click', function(e) {
		e.preventDefault();
		menu.animate({
				right: '0'
			},
			400, function() {
			/* stuff to do after animation is complete */
		});
	});

	// close menu
	$('.main-nav__close').on('click', function() {
		menu.animate({
			right: "-100%"},
			400, function() {
			/* stuff to do after animation is complete */
		});
	});
});