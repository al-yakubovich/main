/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * Theme Customizer sections functions
 *
 */

( function( $ ) {

	// Add BoldR Pro upgrade message
	upgrade = $('<a class="boldr-customize-pro"></a>')
	.attr('href', "https://www.iceablethemes.com/shop/boldr-pro/")
	.attr('target', '_blank')
	.text(boldr_customizer_section_l10n.upgrade_pro)
	;
	$('.preview-notice').append(upgrade);
	// Remove accordion click event
	$('.boldr-customize-pro').on('click', function(e) {
		e.stopPropagation();
	});

} )( jQuery );
