<?php
/*adding sections for header social options */
$wp_customize->add_section( 'acmeblog-header-social', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Social Options', 'acmeblog' ),
    'panel'          => 'acmeblog-header-panel'
) );

/*enable social*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-enable-social]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-enable-social'],
	'sanitize_callback' => 'acmeblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-enable-social]', array(
	'label'		=> __( 'Enable social', 'acmeblog' ),
	'section'   => 'acmeblog-header-social',
	'settings'  => 'acmeblog_theme_options[acmeblog-enable-social]',
	'type'	  	=> 'checkbox',
	'priority'  => 10
) );

/*facebook url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-facebook-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-facebook-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-facebook-url]', array(
    'label'		=> __( 'Facebook url', 'acmeblog' ),
    'section'   => 'acmeblog-header-social',
    'settings'  => 'acmeblog_theme_options[acmeblog-facebook-url]',
    'type'	  	=> 'url',
    'priority'  => 20
) );

/*twitter url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-twitter-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-twitter-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-twitter-url]', array(
    'label'		=> __( 'Twitter url', 'acmeblog' ),
    'section'   => 'acmeblog-header-social',
    'settings'  => 'acmeblog_theme_options[acmeblog-twitter-url]',
    'type'	  	=> 'url',
    'priority'  => 25
) );

/*youtube url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-youtube-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-youtube-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-youtube-url]', array(
    'label'		=> __( 'Youtube url', 'acmeblog' ),
    'section'   => 'acmeblog-header-social',
    'settings'  => 'acmeblog_theme_options[acmeblog-youtube-url]',
    'type'	  	=> 'url',
    'priority'  => 25
) );

/*Instagram url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-instagram-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-instagram-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-instagram-url]', array(
    'label'		=> __( 'Instagram url', 'acmeblog' ),
    'section'   => 'acmeblog-header-social',
    'settings'  => 'acmeblog_theme_options[acmeblog-instagram-url]',
    'type'	  	=> 'url',
    'priority'  => 30
) );

/*@Since Version: 1.4.0
 * Google +  url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-google-plus-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-google-plus-url'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-google-plus-url]', array(
    'label'		=> __( 'Google Plus Url', 'acmeblog' ),
    'section'   => 'acmeblog-header-social',
    'settings'  => 'acmeblog_theme_options[acmeblog-google-plus-url]',
    'type'	  	=> 'url',
    'priority'  => 40
) );

/*Pinterest  url*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-pinterest-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-pinterest-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-pinterest-url]', array(
    'label'		=> __( 'Pinterest url', 'acmeblog' ),
    'section'   => 'acmeblog-header-social',
    'settings'  => 'acmeblog_theme_options[acmeblog-pinterest-url]',
    'type'	  	=> 'url',
    'priority'  => 50
) );