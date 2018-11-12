<?php
/*adding sections for feature side for front page */
$wp_customize->add_section( 'acmeblog-feature-side', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Slider Right Section', 'acmeblog' ),
    'panel'          => 'acmeblog-feature-panel',
    'description'    => __( 'Note: If you select same post from both selection, then only one time post will display', 'acmeblog' )
) );

/*slider side post one*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-feature-post-one]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-feature-post-one'],
    'sanitize_callback' => 'acmeblog_sanitize_page'
) );
$wp_customize->add_control(
    new Acmeblog_Customize_Post_Dropdown_Control(
        $wp_customize,
        'acmeblog_theme_options[acmeblog-feature-post-one]',
        array(
            'label'		=> __( 'Select Post One', 'acmeblog' ),
            'section'   => 'acmeblog-feature-side',
            'settings'  => 'acmeblog_theme_options[acmeblog-feature-post-one]',
            'type'	  	=> 'post_dropdown',
            'priority'  => 55
        )
    )
);

/*slider side post two*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-feature-post-two]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-feature-post-two'],
    'sanitize_callback' => 'acmeblog_sanitize_page',
) );
$wp_customize->add_control(
    new Acmeblog_Customize_Post_Dropdown_Control(
        $wp_customize,
        'acmeblog_theme_options[acmeblog-feature-post-two]',
        array(
            'label'		=> __( 'Select Post Two', 'acmeblog' ),
            'section'   => 'acmeblog-feature-side',
            'settings'  => 'acmeblog_theme_options[acmeblog-feature-post-two]',
            'type'	  	=> 'post_dropdown',
            'priority'  => 60
        )
    )
);