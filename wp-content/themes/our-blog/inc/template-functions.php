<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package our_blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function our_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'our_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function our_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'our_blog_pingback_header' );


if( ! function_exists( 'our_blog_social_links' ) ) :
/**
 * Prints social links in header
*/
function our_blog_social_links(){
	$defaults = array(
		array(
			'font' => 'fa fa-facebook',
			'link' => 'https://www.facebook.com/',                        
		),
		array(
			'font' => 'fa fa-twitter',
			'link' => 'https://twitter.com/',
		),
		array(
			'font' => 'fa fa-pinterest',
			'link' => 'https://www.linkedin.com/',
		),
		array(
			'font' => 'fa fa-instagram',
			'link' => 'https://plus.google.com',
		)
	);
	$social_links = get_theme_mod( 'top_header_social_links', $defaults );?>
		<?php foreach( $social_links as $link ){ ?>
			<li><a href="<?php echo esc_url( $link['link'] ); ?>" target="_blank">
				<i class="<?php echo esc_attr( $link['font'] ); ?>" aria-hidden="true"></i></a></li>    	   
		<?php } ?>
	<?php
}
endif;
