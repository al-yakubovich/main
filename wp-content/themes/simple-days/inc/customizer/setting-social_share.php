<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * social share Settings
 *
 * @package Simple Days
 */


    
    $wp_customize->add_section('simple_days_social_share_setting',array(
      'title' => esc_html__('Social Share','simple-days'),
      'panel' => 'simple_days_posts_setting',
    ));
    
    $wp_customize->add_setting('sns_share',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('sns_share',array(
      'section' => 'simple_days_social_share_setting',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'sns_share', array(
     'selector' => '.social_share_list',
   ));

    $wp_customize->add_setting( 'simple_days_social_share',array(
      'default'    => 'false',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_share',array(
      'label'   => esc_html__( 'Display Style', 'simple-days'),
      'description' => esc_html__('Social share', 'simple-days'),
      'section' => 'simple_days_social_share_setting',
      'type'     => 'radio',
      'choices'  => array(
        'false' => esc_html__( 'Disable', 'simple-days' )
      ) + $social['shape_list'],
    ));

    $wp_customize->add_setting( 'simple_days_social_share_size',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_share_size',array(
      'label'   => esc_html__( 'Icon Size', 'simple-days'),
      'section' => 'simple_days_social_share_setting',
      'type'     => 'radio',
      'choices'  => $social['size_list'],
    ));

    $wp_customize->add_setting( 'simple_days_social_share_icon_color',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_social_share_icon_color', array(
      'label'      => esc_html__( 'Specifies the color of the icon.', 'simple-days' ),
      'section'    => 'simple_days_social_share_setting',
    )));

    $wp_customize->add_setting( 'simple_days_social_share_icon_hover_color',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_social_share_icon_hover_color', array(
      'label'      => esc_html__( 'Specifies the color of hover.', 'simple-days' ),
      'section'    => 'simple_days_social_share_setting',
    )));

    $wp_customize->add_setting( 'simple_days_social_share_icon_tooltip',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_share_icon_tooltip',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Tool tip', 'simple-days'),
      'section' => 'simple_days_social_share_setting',
      'type' => 'checkbox',
    ));



    $wp_customize->add_setting( 'simple_days_social_share_title_icon',array(
      'default'    => 'fa-share-alt',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control( 'simple_days_social_share_title_icon',array(
      'label'   => esc_html__( 'Title icon', 'simple-days'),
      'section' => 'simple_days_social_share_setting',
      'type' => 'select',
      'choices' => array(
       '&nbsp;' => esc_html('&nbsp;'),
       'fa-share-alt' => '&#xf1e0; fa-share-alt',
       'fa-share-alt-square' => '&#xf1e1; fa-share-alt-square',
       'fa-share-square-o' => '&#xf045; fa-share-square-o',
       'fa-share-square' => '&#xf14d; fa-share-square',
       'fa-share' => '&#xf064; fa-share',
       'fa-retweet' => '&#xf079; fa-retweet',
     ),
    ));


    $wp_customize->add_setting( 'simple_days_social_share_title',array(
      'default'           => esc_html__('Share this post', 'simple-days'),
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_social_share_title',array(
      'label'   => esc_html__( 'Title', 'simple-days'),
      'section' => 'simple_days_social_share_setting',
      'type'    => 'text',
    ));


    $sns_share_name = array(
      'none'               => '-',
      'buffer'             => esc_html__('buffer', 'simple-days'),
      'digg'               => esc_html__('digg', 'simple-days'),
      'mail'               => esc_html__('Email', 'simple-days'),
      'evernote'           => esc_html__('Evernote', 'simple-days'),
      'facebook'           => esc_html__('Facebook', 'simple-days'),
      'googleplus'         => esc_html__('Google+', 'simple-days'),
      'hatenabookmark'     => esc_html__('Hatena Bookmark', 'simple-days'),
      'line'               => esc_html__('Line', 'simple-days'),
      'linkedin'           => esc_html__('LinkedIn', 'simple-days'),
      'messenger'          => esc_html__('Messenger', 'simple-days'),
      'pinterest'          => esc_html__('Pinterest', 'simple-days'),
      'pocket'             => esc_html__('Pocket', 'simple-days'),
      'reddit'             => esc_html__('Reddit', 'simple-days'),
      'tumblr'             => esc_html__('Tumblr', 'simple-days'),
      'twitter'            => esc_html__('Twitter', 'simple-days'),
      'whatsapp'           => esc_html__('WhatsApp', 'simple-days'),
    );








    $i = 1;
    while($i <= 10){
      $wp_customize->add_setting( 'simple_days_sns_share_'.$i,array(
        'default'       => 'none',
        'sanitize_callback' => 'simple_days_sns_name_sanitize',
      ));
      $wp_customize->add_control('simple_days_sns_share_'.$i,array(
        
        'label'   => sprintf(esc_html__( 'Social share Icon #%s', 'simple-days'),$i),
        'section' => 'simple_days_social_share_setting',
        'type'    => 'select',
        'choices' => $sns_share_name,
        'priority'  => $i+100,
      ));
      $i++;
    }


