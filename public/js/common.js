$(function() {
	/**
	***************************************************************
	* =LOAD PAGE
	***************************************************************
	**/

	var menu = $('.main-nav-container');

	/* MAIN PAGE MASONRY */
	var recent = document.querySelector('.recent');

    if(recent) {
        var msnry = new Masonry( recent, {
            columnWidth: 45,
            gutter: 10,
            itemSelector: 'recent__item',
        });

        imagesLoaded( recent, function() {
            msnry = new Masonry( recent );
        });
    }


    /* Float labels (contact page) */
    if($('.float-label').length > 0) {
        $('.float-label').floatLabels({
            color: "#4961f5"
        });
    }
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