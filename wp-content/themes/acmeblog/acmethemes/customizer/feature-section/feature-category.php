<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'acmeblog-feature-category', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category Slider Selection', 'acmeblog' ),
    'panel'          => 'acmeblog-feature-panel'
) );

/* feature cat selection */
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-feature-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-feature-cat'],
    'sanitize_callback' => 'acmeblog_sanitize_number'
) );

$wp_customize->add_control(
    new Acmeblog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'acmeblog_theme_options[acmeblog-feature-cat]',
        array(
            'label'		=> __( 'Select Category For Slider', 'acmeblog' ),
            'section'   => 'acmeblog-feature-category',
            'settings'  => 'acmeblog_theme_options[acmeblog-feature-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 5
        )
    )
);

/*Category posts number*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-feature-slider-post-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-feature-slider-post-number'],/*3*/
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-feature-slider-post-number]', array(
	'label'		        => __( 'Number Of Posts To Show', 'acmeblog' ),
	'section'           => 'acmeblog-feature-category',
	'settings'          => 'acmeblog_theme_options[acmeblog-feature-slider-post-number]',
	'type'	  	        => 'number',
	'priority'          => 100,
) );

/*Read More Text*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-feature-slider-read-more]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['acmeblog-feature-slider-read-more'],/*3*/
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-feature-slider-read-more]', array(
	'label'		        => __( 'Read More Text', 'acmeblog' ),
	'section'           => 'acmeblog-slider-options',
	'settings'          => 'acmeblog_theme_options[acmeblog-feature-slider-read-more]',
	'type'	  	        => 'text',
	'priority'          => 90,
	'active_callback'   => 'acmeblog_active_callback_slider_from_cat_post_page'
) );