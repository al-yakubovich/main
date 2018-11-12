<?php
/*adding sections for header date*/
$wp_customize->add_section( 'acmeblog-header-date', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Enable Date', 'acmeblog' ),
    'panel'          => 'acmeblog-header-panel'
) );

/*show date*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-show-date]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-show-date'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox'
) );

$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-show-date]', array(
    'label'		=> __( 'Show Date', 'acmeblog' ),
    'section'   => 'acmeblog-header-date',
    'settings'  => 'acmeblog_theme_options[acmeblog-show-date]',
    'type'	  	=> 'checkbox',
    'priority'  => 7
) );