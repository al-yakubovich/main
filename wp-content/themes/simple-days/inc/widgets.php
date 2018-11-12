<?php
  defined('ABSPATH') or die("Please don't run this script.");

  register_sidebar(array(
    'name' => esc_attr__( 'Sidebar', 'simple-days' ),
    'id' => 'sidebar-1',
    'description' => esc_attr__( 'Add widgets here to appear in your sidebar.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Content Bottom Left', 'simple-days' ),
    'id' => 'footer-1',
    'description' => esc_attr__( 'Add widgets here to appear in bottom footer(left side)..', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Content Bottom Center', 'simple-days' ),
    'id' => 'footer-2',
    'description' => esc_attr__( 'Add widgets here to appear in bottom footer(center).', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Content Bottom Right', 'simple-days' ),
    'id' => 'footer-3',
    'description' => esc_attr__( 'Add widgets here to appear in bottom footer(right side)', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'On the pagination', 'simple-days' ),
    'id' => 'on_pagination',
    'description' => esc_attr__( 'Add widgets here to appear on the pagination', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Under the post', 'simple-days' ),
    'id' => 'under_post',
    'description' => esc_attr__( 'Add widgets under in the contents of the post', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Under the page', 'simple-days' ),
    'id' => 'under_page',
    'description' => esc_attr__( 'Add widgets under in the contents of the page', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));





  register_sidebar(array(
    'name' => esc_attr__( 'Over Header Left', 'simple-days' ),
    'id' => 'over_header_left',
    'description' => esc_attr__( 'Add widgets here to over header left.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Over Header Right', 'simple-days' ),
    'id' => 'over_header_right',
    'description' => esc_attr__( 'Add widgets here to over header right.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Header', 'simple-days' ),
    'id' => 'header_widget',
    'description' => esc_attr__( 'Add widgets here to header.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
      //global $hook_suffix;
      //if( 'customize.php' == $hook_suffix ){
      //  $setting_url = esc_js('javascript:wp.customize.section(\"simple_days_index_page_setting\").focus();' );
      //}else{
        $setting_url = esc_url(admin_url('customize.php?autofocus[section]=simple_days_index_page_setting'));
      //}

  register_sidebar(array(
    'name' => esc_attr__( 'Index List', 'simple-days' ),
    'id' => 'index_list',
    'description' => esc_attr__( 'Add widgets here to index list insert.', 'simple-days' ).' <a href="'.$setting_url.'">'.esc_html__( 'change the number of insert widget area.', 'simple-days' ).'</a>',
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Before the first H2 of the post', 'simple-days' ),
    'id' => 'before_h2_no1',
    'description' => esc_attr__( 'Add widgets before the first h2 in the contents of the post', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the second H2 of the post', 'simple-days' ),
    'id' => 'before_h2_no2',
    'description' => esc_attr__( 'Add widgets before the second h2 in the contents of the post', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the third H2 of the post', 'simple-days' ),
    'id' => 'before_h2_no3',
    'description' => esc_attr__( 'Add widgets before the third h2 in the contents of the post', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Before the first H2 of the page', 'simple-days' ),
    'id' => 'page_before_h2_no1',
    'description' => esc_attr__( 'Add widgets before the first h2 in the contents of the page', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the second H2 of the page', 'simple-days' ),
    'id' => 'page_before_h2_no2',
    'description' => esc_attr__( 'Add widgets before the second h2 in the contents of the page', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the third H2 of the page', 'simple-days' ),
    'id' => 'page_before_h2_no3',
    'description' => esc_attr__( 'Add widgets before the third h2 in the contents of the page', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s simple_days_box_shadow">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  
  if( get_theme_mod( 'simple_days_google_ad' , false)){
    get_template_part('/inc/widget-google_ad','responsive');
    register_widget( 'simple_days_google_ad_responsive_widget' );
  }
  if( get_theme_mod( 'simple_days_google_ad_infeed' , false)){
    get_template_part('/inc/widget-google_ad','infeed');
    register_widget( 'simple_days_google_ad_infeed_widget' );
  }
  if( get_theme_mod( 'simple_days_google_ad_inarticle' , false)){
    get_template_part('/inc/widget-google_ad','inarticle');
    register_widget( 'simple_days_google_ad_inarticle_widget' );
  }
  
  if( get_theme_mod( 'simple_days_toc_widget' , false)){
    get_template_part('/inc/widget-toc');
    register_widget( 'simple_days_toc_widget' );
  }
  
  if( get_theme_mod( 'simple_days_social_link_widget' , false)){
    get_template_part('/inc/widget-social-links');
    register_widget( 'simple_days_social_links_widget' );
  }
  
  if( get_theme_mod( 'simple_days_profile_widget' , false)){
    get_template_part('/inc/widget-profile');
    register_widget( 'simple_days_profile_widget' );
  }
  
  if( get_theme_mod( 'simple_days_another_profile_widget' , false)){
    get_template_part('/inc/widget-another-profile');
    register_widget( 'simple_days_another_profile_widget' );
  }
  
  if( get_theme_mod( 'simple_days_dd_archives_widget' , false)){
    get_template_part('/inc/widget-dd-archives');
    register_widget( 'simple_days_dd_archives_widget' );
  }
  
  if( get_theme_mod( 'simple_days_dd_categories_widget' , false)){
    get_template_part('/inc/widget-dd-categories');
    register_widget( 'simple_days_dd_categories_widget' );
  }
  
  if( get_theme_mod( 'simple_days_popular_post_widget' , false)){
    get_template_part('/inc/widget_postlist','popular');
    register_widget( 'simple_days_popular_post_widget' );
  }
  
  if( get_theme_mod( 'simple_days_recent_posts_with_thumbnail_widget' , false)){
    get_template_part('/inc/widget_postlist','recent_thum');
    register_widget( 'simple_days_recent_posts_with_thumbnail_widget' );
  }
  
  if( get_theme_mod( 'simple_days_update_posts_with_thumbnail_widget' , false)){
    get_template_part('/inc/widget_postlist','update');
    register_widget( 'simple_days_update_posts_with_thumbnail_widget' );
  }
  
  if( get_theme_mod( 'simple_days_recommend_posts_widget' , false)){
    get_template_part('/inc/widget_postlist','recommend');
    register_widget( 'simple_days_recommend_posts_widget' );
  }
