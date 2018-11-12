<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'acmeblog-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Enable Feature Section', 'acmeblog' ),
    'panel'          => 'acmeblog-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-enable-feature'],
    'sanitize_callback' => 'acmeblog_sanitize_checkbox'
) );

$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-enable-feature]', array(
    'label'		    => __( 'Enable Feature Section', 'acmeblog' ),
    'description'	=> __( 'Feature section will display on front/home page', 'acmeblog' ),
    'section'       => 'acmeblog-enable-feature',
    'settings'      => 'acmeblog_theme_options[acmeblog-enable-feature]',
    'type'	  	    => 'checkbox',
    'priority'      => 10
) );