<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * social cta Settings
 *
 * @package Simple Days
 */


    
    $wp_customize->add_section('simple_days_social_cta_setting',array(
      'title' => esc_html__('Social CTA','simple-days'),
      'panel' => 'simple_days_posts_setting',
    ));

    $wp_customize->add_setting('sns_cta',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('sns_cta',array(
      'section' => 'simple_days_social_cta_setting',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'sns_cta', array(
     'selector' => '.simple_days_cta_box ',
   ));

    $wp_customize->add_setting( 'simple_days_social_cta',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_cta',array(
      'label'   => esc_html__( 'Display', 'simple-days'),
      'description' => esc_html__('call-to-action under in the contents of the post', 'simple-days'),
      'section' => 'simple_days_social_cta_setting',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_social_cta_heading_text',array(
      'default'           => esc_html__('Follow us', 'simple-days'),
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_social_cta_heading_text',array(
      'label'   => esc_html__( 'heading text', 'simple-days'),
      'section' => 'simple_days_social_cta_setting',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_social_cta_end_text',array(
      'default'           => esc_html__('We will keep you updated', 'simple-days'),
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_social_cta_end_text',array(
      'label'   => esc_html__( 'end text', 'simple-days'),
      'section' => 'simple_days_social_cta_setting',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_social_cta_facebook',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_cta_facebook',array(
      'label'   => esc_html__( 'Display', 'simple-days'),
      'description' => esc_html__('Facebook', 'simple-days'),
      'section' => 'simple_days_social_cta_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_social_cta_facebook_script',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_cta_facebook_script',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('required Facebook script.', 'simple-days').'<br />'.esc_html__('be careful not to conflict', 'simple-days'),
      'section' => 'simple_days_social_cta_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_social_cta_twitter',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_cta_twitter',array(
      'label'   => esc_html__( 'Display', 'simple-days'),
      'description' => esc_html__('Twitter', 'simple-days'),
      'section' => 'simple_days_social_cta_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_social_cta_gradation',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_cta_gradation',array(
      'label'   => esc_html__( 'Gradation Color', 'simple-days'),
      'description' => esc_html__('Background color', 'simple-days'),
      'section' => 'simple_days_social_cta_setting',
      'type' => 'checkbox',
    ));


