<?php
defined('ABSPATH') or die("Please don't run this script.");
/**
 * Site Settings
 *
 * @package Simple Days
 */

$delimiter = '&#124;';
$wp_customize->add_setting( 'simple_days_title_separator',array(
  'default'    => $delimiter,
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_title_separator',array(
  'label'   => esc_html__( 'the separator for the document title.', 'simple-days'),
  'section' => 'title_tagline',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   '&#124;' => esc_html('&#124;'),
   '&mdash;' => esc_html('&mdash;'),
   '&minus;' => esc_html('&minus;'),
   '&amp;' => esc_html('&amp;'),
   '&middot;' => esc_html('&middot;'),
   '&bull;' => esc_html('&bull;'),
   '&#58;' => esc_html('&#58;'),
   '&#166;' => esc_html('&#166;'),
   '&#43;' => esc_html('&#43;'),
   '&#47;' => esc_html('&#47;'),
   '&spades;' => esc_html('&spades;'),
   '&hearts;' => esc_html('&hearts;'),
   '&diams;' => esc_html('&diams;'),
   '&clubs;' => esc_html('&clubs;'),
   '&loz;' => esc_html('&loz;'),
   '&#8984;' => esc_html('&#8984;'),
   '&raquo;' => esc_html('&raquo;'),
   '&gt;' => esc_html('&gt;'),
   '&rarr;' => esc_html('&rarr;'),
   '&rArr;' => esc_html('&rArr;'),
   '&sim;' => esc_html('&sim;'),
   '&hellip;' => esc_html('&hellip;'),
 ),
));


$wp_customize->add_section('simple_days_box_style_setting',array(
  'title' => esc_html__('Box Style', 'simple-days'),
  'panel' => 'simple_days_site_setting',
));
  // Add Settings and Controls for Box Style.
$wp_customize->add_setting( 'simple_days_box_style', array(
  'default'           => 'flat',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_box_style', array(
  'label'    => esc_html__( 'Box Style', 'simple-days' ),
  'section'  => 'simple_days_box_style_setting',
  'type'     => 'radio',
  'choices'  => array(
    'flat' => esc_html__( 'Flat', 'simple-days' ),
    'shadow' => esc_html__( 'Shadow', 'simple-days' ),
  ),
));



  // Add Settings and Controls for Option.
$wp_customize->add_section('simple_days_gutenberg_setting',array(
  'title' => esc_html__('Gutenberg', 'simple-days'),
  'panel' => 'simple_days_site_setting',
  'priority'    => 99999,
));
get_template_part( 'inc/gutenberg_block', 'list' );
$gutenberg_block = get_query_var('gutenberg_block_list');

$wp_customize->add_setting( 'simple_days_gutenberg_block_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_gutenberg_block_info', array(
  'section' => 'simple_days_gutenberg_setting',
  'label' => esc_html__( 'Select a block to be displayed', 'simple-days' ),
  
    //'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'), esc_html__( 'Google Fonts', 'simple-days')),
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));

foreach ($gutenberg_block['core_list'] as $key => $value) {
  $wp_customize->add_setting( 'simple_days_gutenberg_block_'.$key,array(
    'default'    => true,
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'simple_days_gutenberg_block_'.$key,array(
    'label'   => esc_html($value),
    //'description' => esc_html__('Uploaded to this post is always enabled on the Add Media.', 'simple-days'),
    'section' => 'simple_days_gutenberg_setting',
    'type' => 'checkbox',
  ));
}
foreach ($gutenberg_block['embed_list'] as $key => $value) {
  $wp_customize->add_setting( 'simple_days_gutenberg_block_'.$key,array(
    'default'    => true,
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( 'simple_days_gutenberg_block_'.$key,array(
    'label'   => esc_html($value),
    //'description' => esc_html__('Uploaded to this post is always enabled on the Add Media.', 'simple-days'),
    'section' => 'simple_days_gutenberg_setting',
    'type' => 'checkbox',
  ));
}





  // Add Settings and Controls for Option.
$wp_customize->add_section('simple_days_option',array(
  'title' => esc_html__('Option', 'simple-days'),
  'panel' => 'simple_days_site_setting',
  'priority'    => 1000000,
));


$wp_customize->add_setting( 'simple_days_uploaded_to_this_post',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_uploaded_to_this_post',array(
  'label'   => esc_html__( 'Enable', 'simple-days'),
  'description' => esc_html__('Uploaded to this post is always enabled on the Add Media.', 'simple-days'),
  'section' => 'simple_days_option',
  'type' => 'checkbox',
));


$wp_customize->add_setting( 'simple_days_no_robots',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_no_robots',array(
  'label'   => esc_html__( 'Enable', 'simple-days'),
  'description' => esc_html__('Robots do not search for 404 , search , tag , year , month , day page', 'simple-days'),
  'section' => 'simple_days_option',
  'type' => 'checkbox',
));


$wp_customize->add_setting( 'simple_days_404_img',array(
  'default'    => esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/404.jpg'),
  'sanitize_callback' => 'simple_days_sanitize_image_file',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_404_img', array(
  'label' => esc_html__( '404 Image', 'simple-days'),
  'description' => esc_html__( '404 page use this image.', 'simple-days'),
  'section' => 'simple_days_option',
)));


$wp_customize->add_setting( 'simple_days_no_img',array(
  'default'    => esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'),
  'sanitize_callback' => 'simple_days_sanitize_image_file',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_no_img', array(
  'label' => esc_html__( 'No Image', 'simple-days'),
  'description' => esc_html__( 'No thumbnail page use this image.', 'simple-days'),
  'section' => 'simple_days_option',
)));