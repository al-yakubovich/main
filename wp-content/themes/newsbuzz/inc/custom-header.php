<?php
/**
 *
 *
 * Please browse readme.txt for credits and forking information
 *
 * @package newsbuzz
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses newsbuzz_header_style()
 */
function newsbuzz_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'newsbuzz_custom_header_args', array(
		'default-image'          => '%s/images/headers/default-bg.png',
		'default-text-color'     => 'fff',
		'width'                  => 1200,
		'height'                 => 520,
		'flex-height'            => true,
		'flex-width'	         => true,
		'wp-head-callback'       => 'newsbuzz_header_style',
	) ) );


	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'mountains' => array(
			'url'           => '%s/images/headers/default-bg.png',
			'thumbnail_url' => '%s/images/headers/default-bg_thumbnail.png',
			'description'   => _x( 'food', 'header image', 'newsbuzz' )
		),		
	) );
}
add_action( 'after_setup_theme', 'newsbuzz_custom_header_setup' );

if ( ! function_exists( 'newsbuzz_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see newsbuzz_custom_header_setup().
 */
function newsbuzz_header_style() {
	$header_image = get_header_image();
	$header_text_color   = get_header_textcolor();
		
	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
		return;
	}

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="newsbuzz-header-css">
	<?php
		if ( ! empty( $header_image ) ) :
			$header_width = get_custom_header()->width;
			$header_height = get_custom_header()->height;
			$header_height1 = ($header_height / $header_width * 1600);
			$header_height2 = ($header_height / $header_width * 768);
			$header_height3 = ($header_height / $header_width * 360);
			
	?>
				.site-header {
					background: url(<?php header_image(); ?>) no-repeat scroll center;
					<?php if($header_height1 > 200){ ?>
						background-size: cover;
						background-position:center;
					<?php }else{ ?>
						background-size: cover;
					<?php } ?>
				}

		
				@media (max-width: 359px) {
					.site-header {
						<?php if($header_height3 > 80){ ?>
							background-size: cover;
							background-position:center;
						<?php }else{ ?>
							background-size: cover;
						<?php } ?>
						
					}
					
				}
		
  <?php else: ?>

		
	<?php endif; 

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
		endif;
		if ( empty( $header_image ) ) :
	?>
		.site-header .home-link {
			min-height: 0;
		}
	<?php

		// If the user has set a custom color for the text, use that.

		else:
			
	?>

		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		.site-title::after{
			background: #<?php echo esc_attr( $header_text_color ); ?>;
			content:"";       
		}
	<?php endif; ?>

	</style>
	<?php
}
endif; // newsbuzz_header_style




