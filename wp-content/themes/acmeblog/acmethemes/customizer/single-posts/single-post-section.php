<?php
/*adding sections for Single post options*/
$wp_customize->add_section( 'acmeblog-single-post', array(
	'priority'       => 200,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Single Post Options', 'acmeblog' )
) );

/*blog layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-single-post-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-single-post-layout'],
	'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_blog_single_image_layout();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-single-post-layout]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Single Post Layout', 'acmeblog' ),
	'description'=> __( 'Image display options', 'acmeblog' ),
	'section'   => 'acmeblog-single-post',
	'settings'  => 'acmeblog_theme_options[acmeblog-single-post-layout]',
	'type'	  	=> 'select',
	'priority'  => 10
) );

/*single image layout*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-single-image-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-single-image-size'],
	'sanitize_callback' => 'acmeblog_sanitize_select'
) );
$choices = acmeblog_get_image_sizes_options();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-single-image-size]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Image Layout Options', 'acmeblog' ),
	'section'   => 'acmeblog-single-post',
	'settings'  => 'acmeblog_theme_options[acmeblog-single-image-size]',
	'type'	  	=> 'select',
	'priority'  => 20
) );

/*show related posts*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-show-related]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-show-related'],
	'sanitize_callback' => 'acmeblog_sanitize_checkbox'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-show-related]', array(
	'label'		=> __( 'Show Related Posts In Single Post', 'acmeblog' ),
	'section'   => 'acmeblog-single-post',
	'settings'  => 'acmeblog_theme_options[acmeblog-show-related]',
	'type'	  	=> 'checkbox',
	'priority'  => 30
) );

/*Related title*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-related-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-related-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-related-title]', array(
	'label'		=> __( 'Related Posts title', 'acmeblog' ),
	'section'   => 'acmeblog-related-posts',
	'settings'  => 'acmeblog_theme_options[acmeblog-related-title]',
	'type'	  	=> 'text',
	'priority'  => 20
) );