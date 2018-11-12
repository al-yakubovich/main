<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Starter Content
 *
 */
 

  $starter_content = array(
    'widgets' => array(
      'sidebar-1' => array(
        'search',
        'calendar',
      ),
      'footer-1' => array(
        'text_about',
      ),
      'footer-2' => array(
        'text_business_info',
      ),
      'footer-3' => array(
        'meta',
      ),
      /*'under_post' => array(
        'my_text' => array(
            'text',
            array(
                'text'  => esc_attr__( 'how about ad area?', 'simple-days' )
            )
        )
      ),
      'on_pagination' => array(
        'my_text' => array(
            'text',
            array(
                'text'  => esc_attr__( 'how about ad area?', 'simple-days' )
            )
        )
      ),*/

    ),
    'theme_mods' => array(
      'simple_days_social_share' => 'icon_square',
      'simple_days_sns_share_1' => 'facebook',
      'simple_days_sns_share_2' => 'twitter',
      'simple_days_sns_share_3' => 'linkedin',
      'simple_days_sns_share_4' => 'googleplus',
      'simple_days_sns_share_5' => 'mail',
      'simple_days_posts_title_over_thumbnail' => true,
      'simple_days_page_title_over_thumbnail' => true,
    ),

    'posts' => array(
      'about' => array(
        'thumbnail' => '{{image-1}}',
      ),
      'blog' => array(
        'post_type' => 'post',
        'thumbnail'  => '{{image-2}}',
        'post_title' => esc_html_x('Blog', 'customizer' ,'simple-days'),
        'post_content' => esc_html__( 'You only live once. Might as well enjoy it.' ,'simple-days' ),
      ),
      'services' => array(
        'post_type' => 'page',
        'thumbnail'  => '{{image-3}}',
        'post_title' => esc_html_x('Services', 'customizer' ,'simple-days'),
        'post_content' => esc_html__( 'I will skip work tomorrow.' ,'simple-days' ),
      ),
      'contact' => array(
        'thumbnail' => '{{image-1}}',
      ),

    ),
    'attachments' => array(
      'image-1' => array(
        'file' => 'assets/images/ogp.jpg',
      ),
      'image-2' => array(
        'file' => 'assets/images/404.jpg',
      ),
      'image-3' => array(
        'file' => 'assets/images/blog.jpg',
      ),
    ),

    'nav_menus' => array(
      'primary' => array(
        'name'  => esc_attr__( 'Primary Menu', 'simple-days' ),
        'items' => array(
          'page_about',
          'page_blog',
          'page_service' => array(
            'type' => 'post_type',
            'object' => 'page',
            'object_id' => '{{services}}',
          ),
          'page_contact',
        ),
      ),
    ),
    'options' => array(
      //'show_on_front' => 'page',
      //'page_on_front' => '{{home}}',
      //'page_for_posts' => '{{blog}}',
      //'blogdescription' => 'My Awesome Blog'
    ),
  );
  $starter_content = apply_filters( 'simple_days_starter_content', $starter_content );
  add_theme_support( 'starter-content', $starter_content );
