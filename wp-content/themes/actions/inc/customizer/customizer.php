<?php
/**
 * Adds postMessage support for site title and description for the Customizer.
 *
 * @since Actions 1.0.4
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function actions_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'actions_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'actions_customize_partial_blogdescription',
		) );
	}
	
}
add_action( 'customize_register', 'actions_customize_register', 11 );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Actions 1.0.4
 */
function actions_customize_preview_js() {
	wp_enqueue_script( 'actions-customize-preview', get_template_directory_uri() . '/js/customize.js', array( 'customize-preview' ), '20160412', true );
}
add_action( 'customize_preview_init', 'actions_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Actions 1.0.4
 * @see actions_customize_register()
 *
 * @return void
 */
function actions_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Actions 1.2
 * @see actions_customize_register()
 *
 * @return void
 */
function actions_customize_partial_blogdescription() {
	bloginfo( 'description' );
}