/*!
 * jQuery Floatlabels plugin
 * Original author: @lollipopfly
 * Further changes, comments: @lollipopfly
 * Licensed under the MIT license
 */
(function( $ ) {
    $.fn.floatLabels = function(options) {

        // Default settings
        var settings = $.extend( {
            'color': '#33a',
        }, options);

        // Code
        return this.each(function() {
            var field = $(this),
                label = field.children('label'),
                input = field.children('input, textarea');

            input.on('keyup', function() {
                label.css({
                    opacity: 1,
                    top: '-20px',
                    color: settings.color,
                });

                if(input.val() === '') {
                    label.css({
                        opacity: '0',
                        top: '3px',
                    });
                }
            });

            input.on('focus', function() {
                label.css({
                    color: settings.color,
                });
            });

            input.on('blur', function() {
                label.css('color', 'gray');
            });
        });
    };
})(jQuery);

