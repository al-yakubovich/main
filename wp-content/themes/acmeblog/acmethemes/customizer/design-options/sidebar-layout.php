<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'acmeblog-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Sidebar Layout', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-sidebar-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_sidebar_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Sidebar Layout', 'acmeblog' ),
    'section'   => 'acmeblog-design-sidebar-layout-option',
    'settings'  => 'acmeblog_theme_options[acmeblog-sidebar-layout]',
    'type'	  	=> 'select'
) );