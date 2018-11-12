<?php

/**
* ADD NEW SECTION
*/
$wp_customize->add_section( 'shuban_theme_options', array(
    'title'    => esc_html__( 'Theme Options', 'shuban' ),
    'priority' => 22,
) );
/**
* Add logo
*/
$wp_customize->add_setting( 'shuban_logo', array(
    'sanitize_callback' => 'esc_url_raw',
) );
// Add control
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'shuban_logo', array(
    'label'    => esc_html__( 'Upload Logo', 'shuban' ),
    'section'  => 'shuban_theme_options',
    'settings' => 'shuban_logo',
) ) );
/**
* Add logo height
*/
$wp_customize->add_setting( 'shuban_logo_height', array(
    'default'           => '50',
    'sanitize_callback' => 'shuban_sanitize_number',
) );
// Add control
$wp_customize->add_control( 'shuban_logo_height', array(
    'type'        => 'number',
    'label'       => esc_html__( 'Logo Height (in px)', 'shuban' ),
    'section'     => 'shuban_theme_options',
    'description' => 'Width will be adjusted proportionally.',
) );
/**
* Footer Left Text
*/
$wp_customize->add_setting( 'shuban_footer_text_left', array(
    'default'           => esc_html__( '(c) COPYRIGHT 2017 - ALL RIGHTS RESERVED', 'shuban' ),
    'sanitize_callback' => 'wp_kses_post',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shuban_footer_text_left', array(
    'label'    => esc_html__( 'Footer Text Left', 'shuban' ),
    'section'  => 'shuban_theme_options',
    'settings' => 'shuban_footer_text_left',
    'type'     => 'text',
) ) );

if ( shuban_fs()->is_not_paying() ) {
    /**
     * Disable Right footer Text field
     */
    $wp_customize->add_setting( 'shuban_footer_text_right', array(
        'default'           => esc_html__( 'WordPress Blog Themes by Salt Techno', 'shuban' ),
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shuban_footer_text_right', array(
        'label'       => esc_html__( 'Footer Text Right', 'shuban' ),
        'section'     => 'shuban_theme_options',
        'settings'    => 'shuban_footer_text_right',
        'type'        => 'text',
        'description' => 'You can edit this text only in a <b>Pro Version</b>.',
        'input_attrs' => array(
        'class' => 'readonly disabled',
    ),
    ) ) );
}

/**
* Full  POST Content
*/
$wp_customize->add_setting( 'shuban_full_post_content', array(
    'default'           => false,
    'sanitize_callback' => 'shuban_sanitize_checkbox',
) );
// Add control
$wp_customize->add_control( 'shuban_full_post_content', array(
    'type'        => 'checkbox',
    'label'       => esc_html__( 'Show full post content', 'shuban' ),
    'section'     => 'shuban_theme_options',
    'description' => 'Check this to show full post content.',
) );