<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package feather Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses feather_magazine_header_style()
 */
function feather_magazine_custom_header_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 155,
		'height'      => 44,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	add_theme_support( 'custom-header', array(
		'default-image'			=> '',
		'default-text-color'	=> '333',
		'width'					=> 1900,
		'height'				=> 200,
		'flex-width'			=> true,
		'flex-height'			=> true,
		'wp-head-callback'		=> 'feather_magazine_header_style',
	) );
}
add_action( 'after_setup_theme', 'feather_magazine_custom_header_setup' );

if ( ! function_exists( 'feather_magazine_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see feather_magazine_custom_header_setup().
 */
function feather_magazine_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

	if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		#site-header {
			background-image: url(<?php header_image(); ?>) !important;
		    background-size: cover;
		}

	<?php if ( ! display_header_text() ) : ?>
	.site-title,
	.site-description {
		position: absolute;
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php else : ?>
	.site-branding .site-title,
	.site-branding .site-description,
	.site-branding .site-title a,
	.site-branding .site-title a:hover {
		color: #<?php echo esc_attr( $header_text_color ); ?>;
	}
	.site-branding .site-title:after {
		background: #<?php echo esc_attr( $header_text_color ); ?>;
	}
	<?php endif; ?>
	</style>
	<?php
}
endif;
