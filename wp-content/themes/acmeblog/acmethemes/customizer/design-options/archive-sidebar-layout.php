<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'acmeblog-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category/Archive Sidebar Layout', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-archive-sidebar-layout'],
    'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_sidebar_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-archive-sidebar-layout]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Category/Archive Sidebar Layout', 'acmeblog' ),
    'description'   => __( 'Sidebar Layout for listing pages like category, author etc', 'acmeblog' ),
    'section'       => 'acmeblog-archive-sidebar-layout',
    'settings'      => 'acmeblog_theme_options[acmeblog-archive-sidebar-layout]',
    'type'	  	    => 'select'
) );