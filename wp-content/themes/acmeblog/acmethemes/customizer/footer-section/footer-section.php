<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'acmeblog-footer-option', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Footer Option', 'acmeblog' )
) );

/*copyright*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-footer-copyright]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-footer-copyright'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-footer-copyright]', array(
    'label'		=> __( 'Copyright Text', 'acmeblog' ),
    'section'   => 'acmeblog-footer-option',
    'settings'  => 'acmeblog_theme_options[acmeblog-footer-copyright]',
    'type'	  	=> 'text',
    'priority'  => 2
) );