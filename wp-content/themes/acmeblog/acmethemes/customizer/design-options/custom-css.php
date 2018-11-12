<?php
/*adding sections for custom css options */
$wp_customize->add_section( 'acmeblog-design-custom-css-option', array(
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Custom CSS', 'acmeblog' ),
    'panel'          => 'acmeblog-design-panel'
) );

/*custom-css*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-custom-css]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-custom-css'],
    'sanitize_callback'    => 'wp_strip_all_tags'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-custom-css]', array(
    'label'		=> __( 'Custom CSS', 'acmeblog' ),
    'section'   => 'acmeblog-design-custom-css-option',
    'settings'  => 'acmeblog_theme_options[acmeblog-custom-css]',
    'type'	  	=> 'textarea',
    'priority'  => 2
) );