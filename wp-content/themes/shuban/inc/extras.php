<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Shuban
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function shuban_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'shuban_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function shuban_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'shuban_pingback_header' );


/**
* Add help button on admin navbar
*/
function shuban_add_help_button() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	global $wp_admin_bar;

	$args = array(
		'id'     => 'shuban-help',
		'parent' => 'top-secondary',
		'title'  => __( 'Theme Help', 'shuban' ),
		'href'   => admin_url( 'themes.php?page=about-shuban&help=true' ),
		'meta'   => array(
			'class'    => 'shuban-help-bar',
		),
	);
	$wp_admin_bar->add_menu( $args );

}
add_action( 'wp_before_admin_bar_render', 'shuban_add_help_button' );


/**
* Add admin styles
*/
function shuban_admin_style() {
	wp_enqueue_style( 'shuban-admin', get_template_directory_uri() . '/css/shuban-admin.css' );
}
add_action( 'admin_init' , 'shuban_admin_style' );



/**
* Add welcome page
*/
function shuban_add_welcome_page() {
    $_name = __( 'About Shuban' , 'shuban' );

    $theme_page = add_theme_page(
        $_name,
        $_name,
        'edit_theme_options',
        'about-shuban',
        'shuban_welcome_page'
    );
}
add_action( 'admin_menu', 'shuban_add_welcome_page' );


function shuban_welcome_page() {
	include_once( 'views/about.php' );
}
