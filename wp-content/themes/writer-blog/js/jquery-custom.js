( function($) {

/* Mobile menu
----------------------------------------------------- */

$( '.dropdown-toggle' ).on( 'click', function(){
	$( this ).toggleClass( 'toggled' );
 	$( this ).next().slideToggle();
} );

// Function to show the menu
function show_menu() {
	$( '.nav-parent' ).addClass( 'mobile-menu-open' );
	$( '.mobile-menu-overlay' ).addClass( 'mobile-menu-active' );
}

// Function to hide the menu
function hide_menu(){
	$( '.nav-parent' ).removeClass( 'mobile-menu-open' );
	$( '.mobile-menu-overlay' ).removeClass( 'mobile-menu-active' );
}

$( '.menubar-right' ).on( 'click', show_menu );
$( '.mobile-menu-overlay' ).on( 'click', hide_menu );
$( '.menubar-close' ).on( 'click', hide_menu );

/* Home header owl carousal slider settings
------------------------------------------------------ */

$( document ).ready( function(){
    $( '.owl-home-carousel' ).owlCarousel( {
  	  'items'            :	1,
  	  'autoplay'         :	true,
  	  'autoplayTimeout'  :	5000,
  	  'loop'             :	true,
  	  'dots'             :	false,
  	  'smartSpeed'       :	1000,
  	  'animateIn'        :	'fadeIn',
  	  'animateOut'       :	'fadeOut',
  	  'touchDrag'        :	false,
  	  'mouseDrag'        :	false
    } );

    var owl = $( ".owl-home-carousel" );
   
    // Custom Navigation Events
    $( ".slider-navigation>.next" ).click( function(e){
    	e.preventDefault();
      owl.trigger( 'next.owl.carousel', [1000] );
    } )
    $( ".slider-navigation>.prev" ).click( function( e ){
    	e.preventDefault();
      owl.trigger( 'prev.owl.carousel', [1000] );
    } );

  // Widget Carousel
  $( '.owl-widget-carousel' ).owlCarousel( {
  	  'items'              :	1,
  	  'autoplay'           :	true,
  	  'autoplayTimeout'    :	5000,
  	  'loop'               :	true,
  	  'dots'               :	false,
  	  'startPosition'      :  'left',
  	  'autoplayHoverPause' :	true
    } );

    var owl2 = $( ".slider-widget>div" );
   
    // Custom Navigation Events
    $( ".slider-widget-navigation>.next" ).on( 'click', function( e ){
    	e.preventDefault();

      // select grand parent's first child 
      var grand_parent_class = $( this ).parent().parent().children().first();
      //trigger the slide
      grand_parent_class.trigger( 'next.owl.carousel', [300] );
    } );

    $( ".slider-widget-navigation>.prev" ).click( function( e ){
    	e.preventDefault();
      
      // Select grand parent's first child 
      var grand_parent_class = $( this ).parent().parent().children().first();
      //trigger the slide
      grand_parent_class.trigger( 'prev.owl.carousel', [300] );
    } );
} );

/* Sticky Header
------------------------------------------------------ */

window.onload = function() {
    var selector      = $( '.sticky-sidebar' );
    var position      = selector.offset();
    var parent_width  = $( '.sidebar' ).width();
    var window_width  = $( window ).width();
    var sticky_height = selector.height();
    var limit         = $( '.footer-container' ).offset().top - sticky_height - 50;
    var body_height   = $( '.body-container .eight' ).height();
    var sidebar_height   = $( '.body-container .four' ).height();

    // Sticky sidebar only work on screen size bigger
    // than 991px and if post body has reasonal amount
    // of contents
    if ( ( window_width >= 991 ) && ( body_height > sidebar_height ) && selector.length ) {
      $( window ).scroll( function() {
          var window_position = $( window ).scrollTop();
          if ( window_position >= ( position.top-50 ) ) {
            //console.log(window_position + ' ' + position.top);
              selector.addClass( 'stuck' ).css( {
                'width' : parent_width,
                'top'   : '50px',
              } );
          } else {
              selector.removeClass( 'stuck' ).css( {
                'width' : parent_width,
                'top'   : '0',
              } );
          } // if window_position

          if ( limit <  $( window ).scrollTop() ) {
            var diff = limit - $( window ).scrollTop();
            selector.css( {
              top: diff
            } );
          } // if limit
      } ); // scroll function
    } // if window_width
}

} )( jQuery );