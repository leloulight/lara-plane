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


    /* Detail carousel */
    $('.detail-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }],
    });

    /* Magnefic popup for carousel images */
    $('.slick-track').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it
            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function
            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });


    /* Float labels (contact page) */
    if($('.float-label').length > 0) {
        $('.float-label').floatLabels({
            color: "#4961f5"
        });
    }



    /* Typehead Autocomplete */
    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;
            matches = [];
            substrRegex = new RegExp(q, 'i');

            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });
            cb(matches);
        };
    };

    $.getJSON( "files/spaceships.json", function( data ) {
        var spaceshipNames = new Array();
        $.each( data, function ( index, product )
        {
            spaceshipNames.push( product.name );
        } );

        $('.search__input').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'spaceships',
                source: substringMatcher(spaceshipNames)
            });
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