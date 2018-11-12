/**
 * File customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme-Customizer-Preview reload changes asynchronously.
 */

(function ($) {
    // if not in design-mode, don't go any further
    if (typeof wp.customize !== 'function') {
        return;
    }


    var hex2rgba_convert = function (hex, opacity) {
        hex = hex.replace('#', '');
        var r = parseInt(hex.substring(0, 2), 16);
        var g = parseInt(hex.substring(2, 4), 16);
        var b = parseInt(hex.substring(4, 6), 16);

        var result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
        return result;
    }


    // sidebar
    wp.customize('qs_sidebar_border_color', function (value) {
        value.bind(function (qs_sidebar_border_color) {

            var borderColor;
            var borderStyle;

            borderColor = borderStyle = '#secondary .widget,\n\
            #third .widget,\n\
            #secondary .widget ul li,\n\
            #third .widget ul li,\n\
            #secondary .widget ol li\n\
            #third .widget ol li';

            $(borderColor).css('border-color', qs_sidebar_border_color);
            $(borderStyle).css('border-style', 'solid');
        });
    });
    wp.customize('qs_sidebar_border_width', function (value) {
        value.bind(function (qs_sidebar_border_width) {

            // widget border-width can't be more than 1
            var borderWidthOuter = '#secondary .widget';
            var borderWidthInner;
            var borderBottom;

            borderWidthOuter = '#secondary .widget\n\
            #third .widget';
            borderWidthInner = '#secondary .widget ul li,\n\
            #third .widget ul li,\n\
            #secondary .widget ol li,\n\
            #third .widget ol li';
            // no border below the widget-title
            borderBottom = '#secondary .widget .card-header.widget-title\n\
            #third .widget .card-header.widget-title';

            $(borderWidthOuter).css('border-width', qs_sidebar_border_width > 1 ? 1 : qs_sidebar_border_width);
            $(borderWidthInner).css('border-width', qs_sidebar_border_width);
            $(borderBottom).css('border-bottom', 'none');
        });
    });
    wp.customize('qs_sidebar_text_color', function (value) {
        value.bind(function (qs_sidebar_text_color) {
            var color;
            var colorBadges;
            
            color = '#secondary .widget ul li,\n\
            #third .widget ul li,\n\
            #secondary .widget ol li,\n\
            #third .widget ol li';
 
            colorBadges = '#secondary .widget ul li .tag-pill,\n\
            #third .widget ul li .tag-pill';

            $(color).css('color', qs_sidebar_text_color);
            $(colorBadges).css('background', qs_sidebar_text_color); 
        });
    });
    wp.customize('qs_sidebar_background_color', function (value) {
        value.bind(function (qs_sidebar_background_color) {
            var background;
            var color;
            
            background = '#secondary .widget ul li, \n\
            #third .widget ul li, \n\
            #secondary .widget ol li \n\
            #third .widget ol li';
            
            color = '#secondary .widget ul li .tag-pill,\n\
            #third .widget ul li .tag-pill';

            $(background).css('background', qs_sidebar_background_color);
            $(color).css('color', qs_sidebar_background_color);
        });
    });
    wp.customize('qs_sidebar_link_color', function (value) {
        value.bind(function (qs_sidebar_link_color) {
            var color;
            color = '#secondary .widget li a, \n\
            #third .widget li a, \n\
            #secondary .widget table a\n\
            #third .widget table a';

            $(color).css('color', qs_sidebar_link_color);
        });
    });


    wp.customize('qs_nav_logo_text', function (value) {
        value.bind(function (qs_nav_logo_text) {
            var text;

            text = '.nav-content .navbar-brand';

            $(text).text(qs_nav_logo_text);
        });
    });

    wp.customize('qs_slider_height', function (value) {
        value.bind(function (qs_slider_height) {

            var height;
            height = '.quicksand-slider-header-wrapper .flexslider .slides';

            $(height).css('max-height', qs_slider_height + 'rem');
        });
    });

    wp.customize('qs_slider_margin_top', function (value) {
        value.bind(function (qs_slider_margin_top) {

            var marginTop;
            marginTop = '.quicksand-slider-header-wrapper';

            $(marginTop).css('margin-top', qs_slider_margin_top + 'rem');
        });
    });

    wp.customize('qs_content_font_size', function (value) {
        value.bind(function (qs_content_font_size) {

            var fontSize = 'body,html';

            $(fontSize).css('font-size', qs_content_font_size + 'px');

            // adjust also the dropdown in preview
            // how can I get into the scope of quicksand.js to trigger adjustNavDropDown?
            var marginTop = 16;

            if (fontSize > 16) {
                var diff = fontSize - 16;
                marginTop = 16 - diff;
            } else if (fontSize < 16) {
                var diff = 16 - fontSize;
                marginTop = 16 + diff;
            }

            marginTop = $('.navbar-toggler').css('display') == 'none' ? marginTop : -7;
            $('.site-navigation .navbar .dropdown-menu').css('margin-top', marginTop + 'px');
        });
    });

})(jQuery); 