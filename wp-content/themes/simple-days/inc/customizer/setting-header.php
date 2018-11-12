<?php
defined('ABSPATH') or die("Please don't run this script.");
/**
 * Header Settings
 *
 * @package Simple Days
 */

$wp_customize->add_section('simple_days_header_logo_image',array(
  'title' => esc_html__('Logo','simple-days'),
  'panel' => 'simple_days_header_setting',
));

$wp_customize->add_setting( 'simple_days_logo_image_width', array(
  'default' => 300,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_logo_image_width', array(
  'label' => esc_html__( 'Max width(px)', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('300'),
  'section' => 'simple_days_header_logo_image',
  'priority'    => 9,
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 600,),
));
$wp_customize->add_setting( 'simple_days_logo_image_height', array(
  'default' => 60,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_logo_image_height', array(
  'label' => esc_html__( 'Max height(px)', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('60'),
  'section' => 'simple_days_header_logo_image',
  'priority'    => 9,
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 600,),
));



$wp_customize->add_section('simple_days_header_image',array(
  'title' => esc_html__('Header image', 'simple-days'),
  'panel' => 'simple_days_header_setting',
));
$wp_customize->add_setting( 'simple_days_header_image_text',array(
  'default'           => '',
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control('simple_days_header_image_text',array(
  'label'   => esc_html__( 'Text on Header image', 'simple-days'),
        //'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
  'section' => 'simple_days_header_image',
  'priority'    => 0,
  'type'    => 'text',
));






$wp_customize->add_section('simple_days_layout_header',array(
  'title' => esc_html__('Layout', 'simple-days'),
  'panel' => 'simple_days_header_setting',
));

$wp_customize->add_setting( 'simple_days_menu_layout', array(
  'default'           => '1',
  'sanitize_callback' => 'sanitize_key',
  'transport'=>'postMessage',
));
$wp_customize->add_control( new Simple_Days_Image_Select_Control( $wp_customize, 'simple_days_menu_layout', array(
  'label'       => esc_html__( 'Title and Menu Layout', 'simple-days' ),
  'section'     => 'simple_days_layout_header',
  'choices'     => array(
    '1' => array(
      'label' => esc_html__( 'One row Left Title Right Menu', 'simple-days' ),
      'url'   => '%smenu_1.png'
    ),
    '2'    => array(
      'label' => esc_html__( 'One row Left Menu Right Title', 'simple-days' ),
      'url'   => '%smenu_2.png'
    ),
    '3'    => array(
      'label' => esc_html__( 'Two rows Up Title Down Menu', 'simple-days' ),
      'url'   => '%smenu_3.png'
    ),
    '4' => array(
      'label' => esc_html__( 'Two rows Up Menu Down Title', 'simple-days' ),
      'url'   => '%smenu_4.png'
    ),
  ),
)));

$wp_customize->add_setting( 'simple_days_menu_layout_title_position', array(
  'default'           => 'center',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_menu_layout_title_position', array(
  'label'    => esc_html__( 'Title display position ( when Two rows )', 'simple-days' ),
  'section'  => 'simple_days_layout_header',
  'type'     => 'select',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
  ),
));
$wp_customize->add_setting( 'simple_days_menu_layout_menu_position', array(
  'default'           => 'left',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_menu_layout_menu_position', array(
  'label'    => esc_html__( 'Menu display position ( when Two rows )', 'simple-days' ),
  'section'  => 'simple_days_layout_header',
  'type'     => 'select',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_tagline_position', array(
  'default'           => 'none',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_tagline_position', array(
  'label'    => esc_html__( 'Tagline display position', 'simple-days' ),
  'section'  => 'simple_days_layout_header',
  'type'     => 'select',
  'choices'  => array(
    'none' => esc_html__( 'Hide', 'simple-days' ),
    'top' => esc_html__( 'Top', 'simple-days' ),
    'bottom' => esc_html__( 'Bottom', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'left' => esc_html__( 'Left', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_site_title_size', array(
  'default' => 24,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_site_title_size', array(
  'label' => esc_html__( 'Site title size(px)', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('24'),
  'section'  => 'simple_days_layout_header',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 64,),
));

$wp_customize->add_setting( 'simple_days_layout_header_height', array(
  'default' => 54,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_layout_header_height', array(
  'label' => esc_html__( 'Header height(px)', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('54').'<br />'.esc_html__('Header height to auto when 54.', 'simple-days'),
  'section'  => 'simple_days_layout_header',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 54, 'step' => 1, 'max' => 600,),
));

$wp_customize->add_setting( 'simple_days_sticky_header',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_sticky_header',array(
  'label'   => esc_html__( 'Enable', 'simple-days'),
  'description' => esc_html__('Sticky header', 'simple-days'),
  'section' => 'simple_days_layout_header',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_header_shadow',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_header_shadow',array(
  'label'   => esc_html__( 'Enable', 'simple-days'),
  'description' => esc_html__('Display header shadow', 'simple-days'),
  'section' => 'simple_days_layout_header',
  'type' => 'checkbox',
));



$wp_customize->add_section('simple_days_header_mobile',array(
  'title' => esc_html__('Mobile', 'simple-days'),
  'panel' => 'simple_days_header_setting',
));

$wp_customize->add_setting( 'simple_days_mobile_header_search',array(
  'default'    => true,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_mobile_header_search',array(
  'label'   => esc_html__( 'Enable', 'simple-days'),
  'description' => esc_html__('Display search button in header for mobile user', 'simple-days'),
  'section' => 'simple_days_header_mobile',
  'type' => 'checkbox',
));

$wp_customize->add_setting( 'simple_days_humberger_menu_spin', array(
  'default'           => '1125',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_humberger_menu_spin', array(
  'label'    => esc_html__( 'Spin number of humberger menu', 'simple-days' ),
  'section'  => 'simple_days_header_mobile',
  'type'     => 'select',
  'choices'  => array(
    '45' => esc_html( '0'),
    '405' => esc_html( '1'),
    '765' => esc_html( '2'),
    '1125' => esc_html( '3'),
    '1485' => esc_html( '4'),
  ),
));

$wp_customize->add_setting( 'simple_days_humberger_menu_spin_speed', array(
  'default' => 0.8,
  'sanitize_callback' => 'absint',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_humberger_menu_spin_speed', array(
  'label' => esc_html__( 'Speed of humberger spin', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('0.8'),
  'section' => 'simple_days_header_mobile',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 0, 'step' => 0.1, 'max' => 10,),
));

$wp_customize->add_setting( 'simple_days_humberger_menu_right',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
  'transport'=>'postMessage',
));
$wp_customize->add_control( 'simple_days_humberger_menu_right',array(
  'label'   => esc_html__( 'Enable', 'simple-days'),
  'description' => esc_html__('Display humberger menu to right', 'simple-days'),
  'section' => 'simple_days_header_mobile',
  'type' => 'checkbox',
));
