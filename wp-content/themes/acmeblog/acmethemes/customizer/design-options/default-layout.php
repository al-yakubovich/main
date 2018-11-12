<?php
/*adding sections for default layout options*/
$wp_customize->add_section( 'acmeblog-design-default-layout-option', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Layout', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*global default layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-default-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-default-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select'
) );

$choices = acmeblog_default_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-default-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Layout', 'acmeblog' ),
    'section'   => 'acmeblog-design-default-layout-option',
    'settings'  => 'acmeblog_theme_options[acmeblog-default-layout]',
    'type'	  	=> 'select'
) );