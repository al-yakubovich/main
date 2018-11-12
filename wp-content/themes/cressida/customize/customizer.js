/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Background color
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			if ( to !== 'ffffff' || to !== '' ) {
				$( 'body' ).removeClass( 'cressida-background-color-default' );
				$( 'body' ).addClass( 'cressida-background-color-custom' );
			} else {
				$( 'body' ).removeClass( 'cressida-background-color-custom' );
				$( 'body' ).addClass( 'cressida-background-color-default' );
			}
		} );
	} );

} )( jQuery );
