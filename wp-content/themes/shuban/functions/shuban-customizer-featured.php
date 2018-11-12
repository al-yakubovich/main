<?php

/**
* ADD NEW SECTION
*/
$wp_customize->add_section( 'shuban_featured_section', array(
    'title'    => esc_html__( 'Featured Posts Settings', 'shuban' ),
    'priority' => 21,
) );
/**
* FEATURED POSTS
*/
$wp_customize->add_setting( 'shuban_hide_featured_posts', array(
    'default'           => false,
    'sanitize_callback' => 'shuban_sanitize_checkbox',
) );
// Add control
$wp_customize->add_control( 'shuban_hide_featured_posts', array(
    'type'        => 'checkbox',
    'label'       => esc_html__( 'Hide Featured Posts', 'shuban' ),
    'section'     => 'shuban_featured_section',
    'description' => 'Check this to hide featured posts sider from Homepage.',
) );
/**
* Featured Category
*/
$wp_customize->add_setting( 'shuban_featured_category', array(
    'sanitize_callback' => 'wp_kses_post',
) );
// Add Control
$wp_customize->add_control( new WP_Customize_Category_Dropdown( $wp_customize, 'shuban_featured_category', array(
    'label'    => esc_html__( 'Select Featured Category', 'shuban' ),
    'settings' => 'shuban_featured_category',
    'section'  => 'shuban_featured_section',
) ) );
/**
* Number of featured posts
*/
$wp_customize->add_setting( 'shuban_featured_count', array(
    'default'           => '5',
    'sanitize_callback' => 'shuban_sanitize_number',
) );
// Add control
$wp_customize->add_control( 'shuban_featured_count', array(
    'type'        => 'number',
    'label'       => esc_html__( 'Number of Featured Posts', 'shuban' ),
    'section'     => 'shuban_featured_section',
    'description' => 'Enter maximum number of posts to be displayed in slider.',
) );
/**
* FEATURED POSTS IDS
*/
$wp_customize->add_setting( 'shuban_featured_ids', array(
    'default'           => '',
    'sanitize_callback' => 'wp_kses_post',
) );
// Add control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shuban_featured_ids', array(
    'label'       => esc_html__( 'Enter featured post IDs', 'shuban' ),
    'section'     => 'shuban_featured_section',
    'settings'    => 'shuban_featured_ids',
    'type'        => 'text',
    'description' => 'Enter comma separated list of post IDs. Featured category setting will be ignored.',
) ) );