<?php
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses words_header_style()
 */
function words_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'words_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '',
		'width'                  => 1920,
		'height'                 => 150,
		'flex-height'            => true,
		'header-text'   		 => false,
	) ) );
}
add_action( 'after_setup_theme', 'words_custom_header_setup' );