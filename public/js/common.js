$(function() {
	/**
	***************************************************************
	* =LOAD PAGE
	***************************************************************
	**/

	var menu = $('.main-nav-container');

	/* MAIN PAGE MASONRY */
	$('.recent').masonry({
		columnWidth: 100,
		itemSelector: '.recent__item'
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