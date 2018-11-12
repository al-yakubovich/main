<?php
/**
 * our blog Theme Customizer
 *
 * @package our_blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function our_blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'our_blog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'our_blog_customize_partial_blogdescription',
		) );
	}

}
add_action( 'customize_register', 'our_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function our_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function our_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function our_blog_customize_preview_js() {
	wp_enqueue_script( 'our-blog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'our_blog_customize_preview_js' );

function our_blog_customizer_js() {
    wp_enqueue_script('our-blog-customizer', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.js', array('jquery'), '1.0.0', true);

    wp_localize_script( 'our-blog-customizer', 'our_blog_customizer_js_obj', array(
        'pro' => __('Upgrade To Pro','our-blog')
    ) );
    wp_enqueue_style( 'our-blog-customizer', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.css');
}
add_action( 'customize_controls_enqueue_scripts', 'our_blog_customizer_js' );


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer required panels.
 */

require trailingslashit( get_template_directory() ).'/inc/customizer/our-blog-theme-options-panel.php';
require trailingslashit( get_template_directory() ) .'/inc/customizer/our-blog-general-panel.php';
require trailingslashit( get_template_directory() ) . '/inc/customizer/our-blog-customizer-sanitize.php';
require trailingslashit( get_template_directory() ) . '/inc/customizer/our-blog-customizer-classes.php';