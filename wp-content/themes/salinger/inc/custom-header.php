<?php
/**
 * Implement an optional custom header for Salinger
 *
 * See http://codex.wordpress.org/Custom_Headers
 *
 * @since Salinger 1.0
 *
 * @package Salinger
 */

/**
 * Set up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses salinger_header_style() to style front-end.
 *
 * @since Salinger 1.0
 */
function salinger_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color' => '444',
		'default-image'      => '',

		// Set height and width, with a maximum value for the width.
		'height'             => 200,
		'width'              => 1366,
		'max-width'          => 2000,

		// Support flexible height and width.
		'flex-height'        => true,
		'flex-width'         => true,

		// Random image rotation off by default.
		'random-default'     => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'   => 'salinger_header_style',
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'salinger_custom_header_setup' );

/**
 * Load our special font CSS file.
 *
 * @since Salinger 1.0
 */
function salinger_custom_header_fonts() {

	$font_url = salinger_get_font_url();

	if ( ! empty( $font_url ) ) {
		wp_enqueue_style( 'salinger-fonts', esc_url_raw( $font_url ), array(), null );
	}

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'salinger_custom_header_fonts' );

/**
 * Style the header text displayed on the blog.
 *
 * get_header_textcolor() options: 444 is default, hide text (returns 'blank'), or any hex value.
 *
 * @since Salinger 1.0
 */
function salinger_header_style() {
	$text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( $text_color == get_theme_support( 'custom-header', 'default-text-color' ) ) {
		return;
	}

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="salinger-header-css">
	<?php
	// Has the text been hidden?
	if ( ! display_header_text() ) :
	?>
	.site-title,
	.site-description {
		position: absolute;
		clip: rect(1px 1px 1px 1px); /* IE7 */
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php
	// If the user has set a custom color for the text, use that.
	else :
	?>
	.site-header h1 a,
	.site-header h2 {
		color: #<?php echo esc_attr( $text_color ); ?>;
	}
	<?php endif; ?>
	</style>
	<?php
}
