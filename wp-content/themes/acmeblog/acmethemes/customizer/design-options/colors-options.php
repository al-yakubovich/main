<?php
/*customizing default colors section and adding new controls-setting too*/
$wp_customize->add_section( 'colors', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Colors', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*Primary color*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-primary-color]', array(
    'label'		=> __( 'Primary Color', 'acmeblog' ),
    'section'   => 'colors',
    'settings'  => 'acmeblog_theme_options[acmeblog-primary-color]',
    'type'	  	=> 'color'
) );