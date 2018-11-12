<?php
/**
 * Authorize Theme Customizer.
 *
 * @package Authorize
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function authorize_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	
	/*** Add Home Features ***/
  	//Left Top
	$wp_customize->add_setting('home_feature_left', array('type' => 'theme_mod', 
									'sanitize_callback' => 'absint',
								));

  	$wp_customize->add_control( 'home_feature_left', array(
	  'label' => __( 'Home Feature: Left', 'authorize' ),
	  'description' => __( 'What page to display on home page. <br\>  Large box on left', 'authorize'),
	  'type' => 'dropdown-pages',
	  'allow_addition' => true,
	  'section' => 'static_front_page',
	) );
	
	//Right Top
	$wp_customize->add_setting('home_feature_right_top', array('type' => 'theme_mod', 
									'sanitize_callback' => 'absint',
								));
	
	$wp_customize->add_control( 'home_feature_right_top', array(
	  'label' => __( 'Home Feature: Right Top', 'authorize' ),
	  'description' => __( 'What page to display on home page. <br\>  Smaller box on top right', 'authorize'),
	  'type' => 'dropdown-pages',
	  'allow_addition' => true,
	  'section' => 'static_front_page',
	) );
	
	//Right Bottom
	$wp_customize->add_setting('home_feature_right_bottom', array('type' => 'theme_mod', 
									'sanitize_callback' => 'absint',
								));
	
	$wp_customize->add_control( 'home_feature_right_bottom', array(
	  'label' => __( 'Home Feature: Right Bottom', 'authorize' ),
	  'description' => __( 'What page to display on home page. <br\>  Smaller box on bottom right', 'authorize'),
	  'type' => 'dropdown-pages',
	  'allow_addition' => true,
	  'section' => 'static_front_page',
	) );

}
add_action( 'customize_register', 'authorize_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function authorize_customize_preview_js() {
	wp_enqueue_script( 'authorize_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'authorize_customize_preview_js' );
