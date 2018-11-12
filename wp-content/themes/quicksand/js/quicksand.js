//custom JS for initializing & more

jQuery(document).ready(function ($) { 

    // add btn-classes to paginations 
    var addClasses = function () {

        // === Btn-Classes ===

        // pagination: list-view
        $('.quicksand-post-pagination-list-view .nav-links a').addClass('btn btn-secondary');

        // pagination: single-view
        $('.post-pagination .nav-links a .meta-nav ').addClass('btn btn-secondary');

        // pagination: paginated post
        $('.page-links a').addClass('btn btn-outline-secondary');

        // comment: reply-link
        $('.comment-list .comment-body .reply .comment-reply-link').addClass('btn btn-outline-secondary');

        // image: navigation
        $('.image-navigation .nav-previous a, .image-navigation .nav-next a').addClass('btn btn-outline-secondary');

        $('table').addClass('table table-responsive');

        // === Blockquote ===
        $('.post-quote blockquote').addClass('card-blockquote');
    }


    // lightgallery
    var initLightgallery = function () {
        // only trigger lightgallery when it is turned on
        if (parseInt(quicksandColorScheme.settings.qs_content_use_lightgallery)) {

            // add an alt attribute with the img-caption, so lightgallery can use it
            $("figure").each(function () {
                var captiontext = $(this).find("figcaption").text();
                $(this).find("img").attr("alt", captiontext);
            }); 

            $('.gallery').lightGallery({
                selector: '.gallery-item .lightgallery-item',
//                mode: 'lg-fade',
//                cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                animateThumb: true
            });
        }
    }




    // flexSlider
    var flexSliderOptions = {
        smoothHeight: false, //Boolean: Allow height of the slider to animate smoothly in horizontal mode
        controlNav: true, // Create navigation for paging control of each slide.

        animation: "fade",
        direction: "horizontal",
        slideshowSpeed: 6000,
        animationSpeed: 600,
        prevText: "", //String: Set the text for the "previous" directionNav item
        nextText: "", //String: Set the text for the "next" directionNav item 

        easing: "swing", //String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported! 
        reverse: false, //Boolean: Reverse the animation direction
        animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        startAt: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        slideshow: true, //Boolean: Animate slider automatically 
        initDelay: 0, //Integer: Set an initialization delay, in milliseconds
        randomize: false, //Boolean: Randomize slide order
        fadeFirstSlide: true, //Boolean: Fade in the first slide when animation type is "fade"

        // Usability features
        pauseOnAction: true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover: false, //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
        pauseInvisible: true, //Boolean: Pause the slideshow when tab is invisible, resume when visible. Provides better UX, lower CPU usage.
        useCSS: true, //Boolean: Slider will use CSS3 transitions if available
        touch: true                    //Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
    };

    // flexslider in header
    var initFlexsliderHeader = function () {
        $('.quicksand-slider-header-wrapper .flexslider').flexslider(flexSliderOptions);
    }

    var initFlexsliderPostformatGallery = function () {
        // flexslider in post
        $.extend(flexSliderOptions, {
            smoothHeight: true,
            controlNav: false
        });
        $('.quicksand-post-gallery .flexslider').flexslider(flexSliderOptions);
    }


    // searchform in navbar
    var initSearchBar = function () {

        var $navContent = $('.nav-content');
        var $searchForm = $('.nav-searchform');

        $('.nav-search').on('click', function () {
            $navContent.fadeOut('fast', function () {
                $searchForm.removeClass('hidden-xs-up');
                $searchForm.hide().slideDown('fast');
                $('#quicksand-top-search-form').focus();
            });
        });

        // replace searchform with nav 
        $('.nav-search-cancel').on('click', function () {
            $searchForm.fadeOut('fast', function () {
                $navContent.hide().slideDown('fast');
            });
        });


        // show & hide searchform in mobile mode
        $('.nav-search-mobile').on('click', function () {
            var $searchFormMobile = $('.nav-searchform-mobile');
            $searchFormMobile.show("fold", {horizFirst: true}, 1000, function () {
                $('#quicksand-top-search-form-mobile').focus();
            });

            $('.nav-search-mobile').hide();
            $('.nav-search-close-mobile').removeClass('hidden-xs-up');
        });

        $('.nav-search-close-mobile').on('click', function () {
            var $searchFormMobile = $('.nav-searchform-mobile');
            $searchFormMobile.hide("fold", {horizFirst: true}, 1000);

            $('.nav-search-mobile').show();
            $('.nav-search-close-mobile').addClass('hidden-xs-up');
        });
    }



    // margin of the navbar-dropdown
    var adjustNavDropDown = function () {
        var marginTop = 16;
        var fontSize = $('body').css('font-size').replace("px", "");

        if (fontSize > 16) {
            var diff = fontSize - 16;
            marginTop = 16 - diff;
        } else if (fontSize < 16) {
            var diff = 16 - fontSize;
            marginTop = 16 + diff;
        }

        marginTop = $('.navbar-toggler').css('display') == 'none' ? marginTop : -7;
        $('.site-navigation .navbar .dropdown-menu').css('margin-top', marginTop + 'px');

    }

    $(window).resize(function () {
        adjustNavDropDown();
    });

    // effect for dropdown, but right now css-transition is used
//    $('.dropdown').on('show.bs.dropdown', function () {
//        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
//    });
//
//    // Add slideUp animation to Bootstrap dropdown when collapsing.
//    $('.dropdown').on('hide.bs.dropdown', function () {
//        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
//    });


    // === initialiase scripts ===   
    // searchbar
    initSearchBar();

    // Init fitVids
    // By default, fitvids automatically wraps Youtube, Vimeo, and Kickstarter players
    // add here custom other ones
    // ignore is also an option
    fitvids('.video', {
        players: ['iframe[src*="videopress.com"]']
    });

    // slider in header
    initFlexsliderHeader();

    // slider in post-head-overview
    initFlexsliderPostformatGallery();

    // lightgallery
    initLightgallery();

    // all paginations
    addClasses();

    // adjust margin of dropDown
    adjustNavDropDown();
});