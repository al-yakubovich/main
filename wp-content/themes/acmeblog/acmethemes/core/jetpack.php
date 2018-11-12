<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Acme Themes
 * @subpackage AcmeBlog
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
if ( ! function_exists( 'acmeblog_jetpack_setup' ) ) :
	function acmeblog_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'acmeblog_infinite_scroll_render',
			'footer'    => 'page',
		) );
	} // end function acmeblog_jetpack_setup
endif;
add_action( 'after_setup_theme', 'acmeblog_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
if ( ! function_exists( 'acmeblog_infinite_scroll_render' ) ) :
	function acmeblog_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	} // end function acmeblog_infinite_scroll_render
endif;