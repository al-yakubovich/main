<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package loose
 */

if ( ! function_exists( 'loose_jetpack_setup' ) ) :
/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function loose_jetpack_setup() {
		add_theme_support(
			 'infinite-scroll',
			array(
				'container' => 'main',
				'render'    => 'loose_infinite_scroll_render',
				'footer'    => false,
			)
			);
} // end function loose_jetpack_setup
add_action( 'after_setup_theme', 'loose_jetpack_setup' );
endif;

if ( ! function_exists( 'loose_infinite_scroll_render' ) ) :
/**
 * Custom render function for Infinite Scroll.
 */
function loose_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
			}
} // end function loose_infinite_scroll_render
endif;
