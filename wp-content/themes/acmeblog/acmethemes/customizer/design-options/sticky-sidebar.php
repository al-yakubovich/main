<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'acmeblog-design-sidebar-sticky-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Sticky Sidebar Option', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*sticky sidebar enable disable*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-enable-sticky-sidebar]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-enable-sticky-sidebar'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-enable-sticky-sidebar]', array(
    'label'		=> __( 'Enable Sticky Sidebar Loader', 'acmeblog' ),
    'section'   => 'acmeblog-design-sidebar-sticky-option',
    'settings'  => 'acmeblog_theme_options[acmeblog-enable-sticky-sidebar]',
    'type'	  	=> 'checkbox',
    'priority'  => 30
) );