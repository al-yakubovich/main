<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'acmeblog-search', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Search', 'acmeblog' ),
    'panel'          => 'acmeblog-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-search-placholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-search-placholder'],
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-search-placholder]', array(
    'label'		=> __( 'Search Placeholder', 'acmeblog' ),
    'section'   => 'acmeblog-search',
    'settings'  => 'acmeblog_theme_options[acmeblog-search-placholder]',
    'type'	  	=> 'text',
    'priority'  => 10
) );