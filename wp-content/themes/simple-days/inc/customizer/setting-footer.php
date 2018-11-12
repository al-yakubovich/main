<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Footer Settings
 *
 * @package Simple Days
 */

    
    $wp_customize->add_section('simple_days_layout_footer',array(
      'title' => esc_html__('Layout', 'simple-days'),
      'panel' => 'simple_days_footer_setting',
    ));


    $wp_customize->add_setting( 'simple_days_footer_layout', array(
      'default'           => '2',
      'sanitize_callback' => 'sanitize_key',
      'transport'=>'postMessage',
    ) );
    $wp_customize->add_control( new Simple_Days_Image_Select_Control( $wp_customize, 'simple_days_footer_layout', array(
      'label'       => esc_html__( 'Footer Menu Layout', 'simple-days' ),
      'section'     => 'simple_days_layout_footer',
      'choices'     => array(
        '1' => array(
          'label' => esc_html__( 'First', 'simple-days' ),
          'url'   => '%sfooter_1.png'
        ),
        '2'    => array(
          'label' => esc_html__( 'Second', 'simple-days' ),
          'url'   => '%sfooter_2.png'
        ),
        '3'    => array(
          'label' => esc_html__( 'Third', 'simple-days' ),
          'url'   => '%sfooter_3.png'
        ),
      ),
    )));


    $wp_customize->add_setting('back_to_top_button',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('back_to_top_button',array(
      'section' => 'simple_days_layout_footer',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'back_to_top_button', array(
      'selector' => '.to_top',
    ));
    $wp_customize->add_setting( 'simple_days_back_to_top_button',array(
      'default'    => true,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_back_to_top_button',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Back to top button', 'simple-days'),
      'section' => 'simple_days_layout_footer',
      'type' => 'checkbox',
    ));

    
    
    $wp_customize->add_setting('copyright',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('copyright',array(
      'section' => 'simple_days_layout_footer',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'copyright', array(
     'selector' => '.copyright',
   ));


    $copyright_year = 1998;
    $copyright_year_list = array();
    while($copyright_year <= date('Y')){
      $copyright_year_list[] = (string) $copyright_year;
      $copyright_year++;
    }

    $copyright_year_list = array_combine( $copyright_year_list, $copyright_year_list ) ;
    $copyright_year_list = $copyright_year_list + array('none' => '');
    $wp_customize->add_setting( 'simple_days_copyright_year',array(
      'default'    => 'none',
      'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control( 'simple_days_copyright_year',array(
      'label'   => esc_html__( 'Year of Publication', 'simple-days'),
      'section' => 'simple_days_layout_footer',
      'type' => 'select',
      'choices' => $copyright_year_list,
    ));

    $wp_customize->add_setting('copyright_description',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('copyright_description',array(
      'section' => 'simple_days_layout_footer',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'copyright_description', array(
      'selector' => '.description',
    ));
    $wp_customize->add_setting( 'simple_days_copyright_description',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_copyright_description',array(
      'label'   => esc_html__( 'Hide', 'simple-days'),
      'description' => esc_html__('Description', 'simple-days'),
      'section' => 'simple_days_layout_footer',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting('copyright_wordpress',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('copyright_wordpress',array(
      'section' => 'simple_days_layout_footer',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'copyright_wordpress', array(
      'selector' => '.copyright_wordpress',
    ));
    $wp_customize->add_setting( 'simple_days_copyright_wordpress',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_copyright_wordpress',array(
      'label'   => esc_html__( 'Hide', 'simple-days'),
      'description' => esc_html__('Powered by WordPress', 'simple-days'),
      'section' => 'simple_days_layout_footer',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_copyright_simple_days',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_copyright_simple_days',array(
      'label'   => esc_html__( 'Hide', 'simple-days'),
      'description' => esc_html__('Theme by Simple Days', 'simple-days'),
      'section' => 'simple_days_layout_footer',
      'type' => 'checkbox',
    ));

    
    $wp_customize->add_section('simple_days_widget_title_setting',array(
      'title' => esc_html__('Widget Title','simple-days'),
      'panel' => 'simple_days_footer_setting',
    ));

