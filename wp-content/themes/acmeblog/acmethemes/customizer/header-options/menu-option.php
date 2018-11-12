<?php
/*adding sections for header options panel*/
$wp_customize->add_section( 'acmeblog-header-menu', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Search Options', 'acmeblog' ),
    'panel'          => 'acmeblog-header-panel'
) );

/*header show search*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-menu-show-search]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-menu-show-search'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-menu-show-search]', array(
    'label'		=> __( 'Show Search', 'acmeblog' ),
    'section'   => 'acmeblog-header-menu',
    'settings'  => 'acmeblog_theme_options[acmeblog-menu-show-search]',
    'type'	  	=> 'checkbox',
    'priority'  => 45
) );