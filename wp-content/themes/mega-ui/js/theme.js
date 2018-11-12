/* /* for scroll arrow */
     var amountScrolled = 300;

jQuery(window).scroll(function() {
    if ( jQuery(window).scrollTop() > amountScrolled ) {
        jQuery('a.back-to-top').fadeIn('slow');
    } else {
        jQuery('a.back-to-top').fadeOut('slow');
    }
});

jQuery('a.back-to-top').click(function() {
    jQuery('html, body').animate({
        scrollTop: 0
    }, 700);
    return false;
});

jQuery('.navbar-nav li.dropdown').find('.fa-angle-down').each(function(){
        jQuery(this).on('click', function(){
            if( jQuery(window).width() < 768) {
                jQuery(this).parent().next().slideToggle();
            }
            return false;
        });
    });