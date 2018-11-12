<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'acmeblog-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front/Home Sidebar Layout', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-front-page-sidebar-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_sidebar_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-front-page-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Front/Home Sidebar Layout', 'acmeblog' ),
    'section'   => 'acmeblog-front-page-sidebar-layout',
    'settings'  => 'acmeblog_theme_options[acmeblog-front-page-sidebar-layout]',
    'type'	  	=> 'select'
) );