<?php
/**
 * mega-ui Theme Customizer.
 *
 * @package mega-ui
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mega_ui_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	//Header settings
	$wp_customize->add_section( 'mega_ui_header_section' , array(
		'title'       => __( 'Header', 'mega-ui' ),
		'priority'    => 20,
		'description' => __( 'Header settings ', 'mega-ui' ),
	) );
	
	$wp_customize->add_setting('mega_ui_display_topbar_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_topbar_setting', array(
		'settings' => 'mega_ui_display_topbar_setting',
		'label'    => __('Display TopBar', 'mega-ui'),
		'section'  => 'mega_ui_header_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('mega_ui_mail_address', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_mail_address', array(
		'settings' => 'mega_ui_mail_address',
		'label' => __('Email:','mega-ui'),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_topbar_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('mega_ui_contact_number', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_contact_number', array(
		'settings' => 'mega_ui_contact_number',
		'label' => __('Contact Number:','mega-ui'),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_topbar_active_callback',
		'priority'	=> 24
	));
		
	$wp_customize->add_setting('mega_ui_display_social_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_social_setting', array(
		'settings' => 'mega_ui_display_social_setting',
		'label'    => __('Display Social Icons', 'mega-ui'),
		'section'  => 'mega_ui_header_section',
		'type'     => 'checkbox',
		'active_callback' =>'mega_ui_topbar_active_callback',
		'priority'	=> 24
	));
	for($i=1; $i<=5; $i++){
	$wp_customize->add_setting('mega_ui_social_icon_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_social_icon_'.$i, array(
		'settings' => 'mega_ui_social_icon_'.$i,
		'label' => __('Header Social Icon ','mega-ui').$i,
		'description' => __( 'Please add <strong>FontAwesome</strong> Class of respective social. Like  <strong>fa fa-facebook</strong>', 'mega-ui' ),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_social_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('mega_ui_social_link_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('mega_ui_social_link_'.$i, array(
		'settings' => 'mega_ui_social_link_'.$i,
		'label' => __('Social Icon Link ','mega-ui').$i,
		'description' => __( 'Please add Social Icon Link', 'mega-ui' ),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_social_active_callback',
		'priority'	=> 24
	));
	}
	
	//footer
	$wp_customize->add_section( 'mega_ui_footer_section' , array(
		'title'       => __( 'Footer', 'mega-ui' ),
		'priority'    => 25,
		'description' => __( 'Footer Option', 'mega-ui' ),
	) );
	
	$wp_customize->add_setting('mega_ui_display_footer_menu', array(
		'default'        => 0,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_footer_menu', array(
		'settings' => 'mega_ui_display_footer_menu',
		'label'    => __('Display Footer Manu', 'mega-ui'),
		'section'  => 'mega_ui_footer_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));

	$wp_customize->add_setting('mega_ui_footer_credit', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_footer_credit', array(
		'settings' => 'mega_ui_footer_credit',
		'label' => __('Footer Credit Text:','mega-ui'),
		'section' => 'mega_ui_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('mega_ui_footer_company', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_footer_company', array(
		'settings' => 'mega_ui_footer_company',
		'label' => __('Footer Company Name:','mega-ui'),
		'section' => 'mega_ui_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('mega_ui_footer_link', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('mega_ui_footer_link', array(
		'settings' => 'mega_ui_footer_link',
		'label' => __('Footer Company Link:','mega-ui'),
		'section' => 'mega_ui_footer_section',
		'priority'	=> 30
	));
}
add_action( 'customize_register', 'mega_ui_customize_register' );


function mega_ui_topbar_active_callback() {
	if ( get_theme_mod( 'mega_ui_display_topbar_setting', 0 ) ) {
		return true;
	}
	return false;
}
function mega_ui_social_active_callback() {
	if ( get_theme_mod( 'mega_ui_display_social_setting', 0 ) ) {
		return true;
	}
	return false;
}
/**
 * 1Sanitize checkbox
 */

if (!function_exists( 'mega_ui_sanitize_checkbox' ) ) :
	function mega_ui_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

/**
 * Sanitize integer input
 */
function mega_ui_sanitize_post_control( $input ) {
	if(is_array($input)){
		return $input;
	}else{
		$input= array();
		return $input;
	}
    
}

function mega_ui_sanitize_text_field( $str ) {

	return sanitize_text_field( $str );

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mega_ui_customize_preview_js() {
	wp_enqueue_script( 'mega_ui_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mega_ui_customize_preview_js' );