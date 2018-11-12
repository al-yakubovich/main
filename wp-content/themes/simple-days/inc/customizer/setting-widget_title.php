<?php
defined('ABSPATH') or die("Please don't run this script.");
/**
 * Widget title Settings
 *
 * @package Simple Days
 */


$section_name['sidebar'] = 'simple_days_sidebar_setting';
$section_name['footer'] = 'simple_days_widget_title_setting';
$side_footer = array('sidebar' => esc_html_x( 'Sidebar', 'widget_title' , 'simple-days'),'footer' => esc_html_x( 'Footer', 'widget_title' , 'simple-days'));
foreach ($side_footer as $s_f_name => $s_f_t_name) {






  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_info', array(
    'section' => $section_name[$s_f_name],
    
    'label' => esc_html_x( 'Widget title', 'widget_title' , 'simple-days'),

  )));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_text_size', array(
    'default' => 18,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_text_size', array(
    'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    //'description' => esc_html__('default&#58;', 'simple-days').esc_html('1'),
    'section' => $section_name[$s_f_name],
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1, 'step' => 1, 'max' => 64,),
  ));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_text_color',array(
    'default'    => '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_text_color', array(
    'label' => esc_html_x('font color', 'post_heading' ,'simple-days'),
    'section'    => $section_name[$s_f_name],
  )));

  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_text_position', array(
    'default'           => 'left',
    'sanitize_callback' => 'simple_days_sanitize_radio',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_text_position', array(
    'label'    => esc_html__( 'heading position', 'simple-days' ),
    'section'  => $section_name[$s_f_name],
    'type'     => 'radio',
    'choices'  => array(
      'left' => esc_html__( 'Left', 'simple-days' ),
      'center' => esc_html__( 'Center', 'simple-days' ),
      'right' => esc_html__( 'Right', 'simple-days' ),
    ),
  ));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_padding_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_padding_info', array(
    'section' => $section_name[$s_f_name],
    'label' => esc_html_x( 'padding', 'post_heading' , 'simple-days').esc_html_x( '(top,right,bottom,left)', 'post_heading' , 'simple-days'),
    
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));
  foreach ($border_angle as $key => $value) {
    $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_padding_'.$key, array(
      'default' => 0,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_padding_'.$key, array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
      'section' => $section_name[$s_f_name],
      'type' => 'number',
      'input_attrs' => array(
        'min' => 0, 'step' => 1, 'max' => 100,),
    ));

  }

  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_margin_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_margin_info', array(
    'section' => $section_name[$s_f_name],
    'label' => esc_html_x( 'margin', 'post_heading' , 'simple-days').esc_html_x( '(top,right,bottom,left)', 'post_heading' , 'simple-days'),
    
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));
  foreach ($border_angle as $key => $value) {
    $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_margin_'.$key, array(
      'default' => 0,
      'sanitize_callback' => 'simple_days_sanitize_intval',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_margin_'.$key, array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
      'section' => $section_name[$s_f_name],
      'type' => 'number',
      'input_attrs' => array(
        'min' => -20, 'step' => 1, 'max' => 100,),
    ));
  }

  foreach ($border_angle as $key => $value) {




    $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_info', array(
      'section' => $section_name[$s_f_name],
      'label' => sprintf(esc_html_x( 'border %s', 'post_heading' , 'simple-days'),$value),
      
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));
    $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_style', array(
      'default'           => 'none',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_style', array(
      //'label'    => esc_html__( 'border top style', 'simple-days' ),
      'section'  => $section_name[$s_f_name],
      'type'     => 'select',
      'choices'  => $heading_border_style,
    ));
    $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_width', array(
      'default' => 1,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_width', array(
      //'label' => esc_html_x('border top width', 'post_heading' ,'simple-days'),
      'section' => $section_name[$s_f_name],
      'type' => 'number',
      'input_attrs' => array(
        'min' => 1, 'step' => 1, 'max' => 64,),
    ));
    $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_color',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_border_'.$key.'_color', array(
      //'label' => esc_html_x('border top color', 'post_heading' ,'simple-days'),
      'section'    => $section_name[$s_f_name],
    )));



  }

  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_background_color',array(
    'default'    => '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_background_color', array(
    'label' => esc_html_x('background color', 'post_heading' ,'simple-days'),
    'section'    => $section_name[$s_f_name],
  )));

  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_border_radius_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_border_radius_info', array(
    'section' => $section_name[$s_f_name],
    'label' => esc_html_x( 'border radius', 'post_heading' , 'simple-days').esc_html_x( '(top-left,top-right,bottom-right,bottom-left)', 'post_heading' , 'simple-days'),
    
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));

  $border_radius_angle = array('top_left' , 'top_right' ,'bottom_right','bottom_left');
  foreach ($border_radius_angle as $value) {


    $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_border_radius_'.$value, array(
      'default' => 0,
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_border_radius_'.$value, array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
      'section' => $section_name[$s_f_name],
      'type' => 'number',
      'input_attrs' => array(
        'min' => 0, 'step' => 1, 'max' => 100,),
    ));

  }

  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_balloon',array(
    'default'    => false,
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_balloon',array(
    'label'   => esc_html_x( 'balloon', 'post_heading' , 'simple-days'),
        //'description' => esc_html__('Current name', 'simple-days'),
    'section' => $section_name[$s_f_name],
    'type' => 'checkbox',
  ));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_balloon_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_balloon_info', array(
    'section' => $section_name[$s_f_name],
    'label' => esc_html_x( 'balloon', 'post_heading' , 'simple-days').esc_html_x( '(position,width,height)', 'post_heading' , 'simple-days'),
    
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_balloon_position', array(
    'default' => 30,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_balloon_position', array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    'section' => $section_name[$s_f_name],
    'type' => 'number',
    'input_attrs' => array(
      'min' => -14, 'step' => 1, 'max' => 857,),
  ));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_balloon_width', array(
    'default' => 15,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_balloon_width', array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    'section' => $section_name[$s_f_name],
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1, 'step' => 1, 'max' => 100,),
  ));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_balloon_height', array(
    'default' => 15,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_widget_title_'.$s_f_name.'_balloon_height', array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    'section' => $section_name[$s_f_name],
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1, 'step' => 1, 'max' => 100,),
  ));
  $wp_customize->add_setting( 'simple_days_widget_title_'.$s_f_name.'_balloon_color',array(
    'default'    => '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_widget_title_'.$s_f_name.'_balloon_color', array(
    'label' => esc_html_x('balloon color', 'post_heading' ,'simple-days'),
    'section'    => $section_name[$s_f_name],
  )));


}
