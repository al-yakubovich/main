/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
(function($) {
	var $mobile_left_menu = $('.mobile-left-menu'),
		$mobile_left = $('#mobile-left-menu'),		
		$mobile_right_menu = $('.mobile-right-menu'),
		$mobile_right = $('#mobile-right-menu');

	$mobile_left_menu.on('click', { id: '#mobile-left-menu' }, showSideMenu );
	$mobile_left.children('.fa-times').on('click', { id: '#mobile-left-menu' }, showSideMenu );

	$mobile_right_menu.on('click', { id: '#mobile-right-menu' }, showSideMenu );
	$mobile_right.children('.fa-times').on('click', { id: '#mobile-right-menu' }, showSideMenu );
	
	function showSideMenu(e) {		
		var $menu = $(e.data.id);
		toggleVisibility( $menu );		
	}
	function toggleVisibility( togglableItem ) {
		if( togglableItem.hasClass('closed') ) {
			togglableItem
				.removeClass('closed')
				.addClass('open');
		} else {
			togglableItem
				.removeClass('open')
				.addClass('closed');
		}
	}
})(jQuery);
