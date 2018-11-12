<?php
defined('ABSPATH') or die("Please don't run this script.");

class Simple_Days_Customize {

  public static function register ( $wp_customize ) {
    //delete header textcolor control
    $wp_customize->remove_control("header_textcolor");
    $wp_customize->remove_control("background_color");
    $wp_customize->remove_control("display_header_text");

    $wp_customize->register_control_type( 'Simple_Days_Image_Select_Control' );

    $wp_customize->get_control( 'header_image' )->section = 'simple_days_header_image';
    $wp_customize->get_control( 'custom_logo' )->section = 'simple_days_header_logo_image';
    $wp_customize->get_section('title_tagline')->panel = 'simple_days_site_setting';
    $wp_customize->get_section('background_image')->panel = 'simple_days_site_setting';
    $wp_customize->get_section('static_front_page')->panel = 'simple_days_site_setting';

    get_template_part( 'inc/social', 'list' );
    $social = get_query_var('social_list');


    $heading_border_style = array(
      'none' => esc_html__( 'none', 'simple-days' ),
      'solid' => esc_html__( 'Solid', 'simple-days' ),
      'double' => esc_html__( 'Double', 'simple-days' ),
      'groove' => esc_html__( 'Groove', 'simple-days' ),
      'ridge' => esc_html__( 'Ridge', 'simple-days' ),
      'inset' => esc_html__( 'Inset', 'simple-days' ),
      'outset' => esc_html__( 'Outset', 'simple-days' ),
      'dashed' => esc_html__( 'Dashed', 'simple-days' ),
      'dotted' => esc_html__( 'Dotted', 'simple-days' ),
    );


    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/sanitize.php';



    
    $wp_customize->add_panel( 'simple_days_site_setting', array(
      'priority'    => 0,
      'title'       => esc_html__('Site settings', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-site.php';
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-google_fonts.php';

    $wp_customize->add_panel('simple_days_custom_colors', array(
      'title'         => esc_html__('Colors', 'simple-days'),
      'priority'      => 0
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-colors.php';

    
    $wp_customize->add_panel( 'simple_days_header_setting', array(
      'priority'    => 0,
      'title'       => esc_html__('Header', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-header.php';
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-alert_box.php';

    
    $wp_customize->add_panel( 'simple_days_footer_setting', array(
      'priority'    => 0,
      'title'       => esc_html__('Footer', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-footer.php';


    
    $wp_customize->add_section('simple_days_sidebar_setting',array(
      'title'       => esc_html__('Sidebar', 'simple-days'),
      'priority'   => 0,
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-sidebar.php';



    
    $wp_customize->add_panel( 'simple_days_index_setting', array(
      'priority'    => 1,
      'title'       => esc_html__('Index', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-index.php';

    
    $wp_customize->add_panel( 'simple_days_posts_setting', array(
      'priority'    => 1,
      'title'       => esc_html__('Posts', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-posts.php';
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-social_share.php';
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-social_cta.php';

    
    $wp_customize->add_panel( 'simple_days_pages_setting', array(
      'priority'    => 1,
      'title'       => esc_html__('Pages', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-pages.php';

    
    $wp_customize->add_panel( 'simple_days_setting', array(
      'priority'    => 2,
      'title'       => esc_html__('Simple Days', 'simple-days'),
    ));




    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-menu_icon.php';


    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-widget_title.php';
















    
    $wp_customize->add_section('simple_days_widget_setting',array(
      'title' => esc_html__('Simple Days Widget','simple-days'),
      'panel' => 'simple_days_setting',
    ));

    $wp_customize->add_setting( 'simple_days_social_link_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_social_link_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Add Social Links Widget', 'simple-days'),
      'section' => 'simple_days_widget_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_recent_posts_with_thumbnail_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_recent_posts_with_thumbnail_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Recent Posts with thumbnail widget', 'simple-days'),
      'section' => 'simple_days_widget_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_update_posts_with_thumbnail_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_update_posts_with_thumbnail_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Update Posts with thumbnail widget', 'simple-days'),
      'section' => 'simple_days_widget_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_recommend_posts_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_recommend_posts_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Recommended Posts with thumbnail widget', 'simple-days'),
      'section' => 'simple_days_widget_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_dd_archives_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_dd_archives_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Drop Down Archives widget without JavaScript', 'simple-days'),
      'section' => 'simple_days_widget_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_dd_categories_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_dd_categories_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Drop Down Categories widget without JavaScript', 'simple-days'),
      'section' => 'simple_days_widget_setting',
      'type' => 'checkbox',
    ));




    $social_account_description_before = esc_html__('e.g.&nbsp;', 'simple-days');
    $social_account_description_after = '<strong class="highlighter">&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</strong><br />'.esc_html__('type the &lowast; part of your url', 'simple-days');
    $social_account_description['amazon'] = esc_html__("add your amazon website's full URL", 'simple-days').'<br />'.esc_html__('e.g.&nbsp;', 'simple-days').esc_html__('Your wish list URL', 'simple-days');
    $social_account_description['facebook'] = $social_account_description_before.' facebook.com/'.$social_account_description_after;
    $social_account_description['twitter'] = $social_account_description_before.' twitter.com/'.$social_account_description_after;
    $social_account_description['linkedin'] = $social_account_description_before.' linkedin.com/in/'.$social_account_description_after;
    $social_account_description['instagram'] = $social_account_description_before.' instagram.com/'.$social_account_description_after;
    $social_account_description['googleplus'] = $social_account_description_before.'  plus.google.com/'.$social_account_description_after;
    $social_account_description['pinterest'] = $social_account_description_before.' pinterest.com/'.$social_account_description_after;
    $social_account_description['flickr'] = $social_account_description_before.' flickr.com/photos/'.$social_account_description_after;
    $social_account_description['github'] = $social_account_description_before.' github.com/'.$social_account_description_after;
    $social_account_description['codepen'] = $social_account_description_before.' codepen.io/'.$social_account_description_after;
    $social_account_description['youtube'] = $social_account_description_before.' youtube.com/'.$social_account_description_after;
    $social_account_description['vimeo'] = $social_account_description_before.' vimeo.com/'.$social_account_description_after;
    $social_account_description['soundcloud'] = $social_account_description_before.' soundcloud.com/'.$social_account_description_after;
    $social_account_description['meetup'] = $social_account_description_before.' meetup.com/'.$social_account_description_after;
    $social_account_description['hatenabookmark'] = $social_account_description_before.' b.hatena.ne.jp/'.$social_account_description_after;
    $social_account_description['line'] = $social_account_description_before.' line.naver.jp/ti/p/'.$social_account_description_after;
    $social_account_description['tumblr'] = esc_html__('e.g.&nbsp;', 'simple-days').' <strong class="highlighter">&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</strong>.tumblr.com<br />'.esc_html__('type the &lowast; part of your url', 'simple-days');

    $social_account_list = $social['name_list'];
    unset($social_account_list['none']);
    unset($social_account_list['feedly']);
    unset($social_account_list['rss']);

    
    $wp_customize->add_section('simple_days_social_account_setting',array(
      'title' => esc_html__('Social Account','simple-days'),
      'panel' => 'simple_days_setting',
    ));

    foreach ($social_account_list as $key => $value) {
      $wp_customize->add_setting( 'simple_days_social_account_'.$key,array(
        'default'           => '',
        'sanitize_callback' => 'wp_strip_all_tags',
      ));
      $wp_customize->add_control('simple_days_social_account_'.$key,array(
        'label'   => $value,
        'description' => $social_account_description[$key],
        'section' => 'simple_days_social_account_setting',
        'type'    => 'text',
      ));
    }

    
    $wp_customize->add_setting( 'simple_days_social_account_facebook_app_id',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_social_account_facebook_app_id',array(
      'label'   => esc_html__( 'Facebook App ID', 'simple-days'),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
      'section' => 'simple_days_social_account_setting',
      'type'    => 'text',
    ));
    
    $wp_customize->add_setting( 'simple_days_social_account_facebook_admins',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_social_account_facebook_admins',array(
      'label'   => esc_html__( 'Facebook fb:admins', 'simple-days'),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
      'section' => 'simple_days_social_account_setting',
      'type'    => 'text',
    ));
































    
    $wp_customize->add_setting('profile',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('profile',array(
      'section' => 'simple_days_profile_setting',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'profile', array(
     'selector' => '.pf_box:not(.pf_another_box)',
   ));

    $wp_customize->add_section('simple_days_profile_setting',array(
      'title' => esc_html__('Profile Widget', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));
    $wp_customize->add_setting( 'simple_days_profile_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_profile_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Add Profile Widget', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_another_profile_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_another_profile_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Add Another Profile Widget', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_profile_title',array(
      'default'           => esc_html__( 'Profile', 'simple-days'),
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_profile_title',array(
      'label'   => esc_html__( 'Title', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_profile_name',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_profile_name',array(
      'label'   => esc_html__( 'Name', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_profile_image',array(
      'default'    => '',
      'sanitize_callback' => 'simple_days_sanitize_image_file',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_profile_image', array(
      'label' => esc_html__( 'Profile image', 'simple-days'),
      'description' => esc_html__( 'Profile use this image.', 'simple-days'),
      'section' => 'simple_days_profile_setting',
    )));
    $wp_customize->add_setting( 'simple_days_profile_image_wrap', array(
      'default'           => 'circle',
      'sanitize_callback' => 'simple_days_sanitize_radio',
    )
  );
    $wp_customize->add_control( 'simple_days_profile_image_wrap', array(
      'label'    => esc_html__( 'Profile image display shape', 'simple-days' ),
      'section'  => 'simple_days_profile_setting',
      'type'     => 'radio',
      'choices'  => array(
        'circle' => esc_html__( 'Circle', 'simple-days' ),
        'square' => esc_html__( 'Square', 'simple-days' ),
      ),
    ));
    $wp_customize->add_setting( 'simple_days_profile_background_image',array(
      'default'    => '',
      'sanitize_callback' => 'simple_days_sanitize_image_file',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_profile_background_image', array(
      'label' => esc_html__( 'Background image', 'simple-days'),
      'description' => esc_html__( 'Background use this image.', 'simple-days'),
      'section' => 'simple_days_profile_setting',
    )));

    $wp_customize->add_setting( 'simple_days_profile_text',array(
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('simple_days_profile_text',array(
      'label'   => esc_html__( 'Profile text', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type'    => 'textarea',
    ));
    $wp_customize->add_setting( 'simple_days_profile_read_more_url',array(
      'default'           => '',
      'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('simple_days_profile_read_more_url',array(
      'label'   => esc_html__( 'Read more URL', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_profile_read_more_text',array(
      'default'           => esc_html__( 'Read More', 'simple-days' ),
      'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('simple_days_profile_read_more_text',array(
      'label'   => esc_html__( 'Read more text', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_profile_read_more_blank',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_profile_read_more_blank',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Read more link open new window.', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type' => 'checkbox',
    ));


    $wp_customize->add_setting( 'simple_days_profile_social_link_shape',array(
      'default'    => 'icon_square',
      'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( 'simple_days_profile_social_link_shape',array(
      'label'   => esc_html__( 'Social Links', 'simple-days'),
      'description' => esc_html__('Display Style', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type'     => 'radio',
      'choices'  => $social['shape_list'],
    ));

    $wp_customize->add_setting( 'simple_days_profile_social_link_size',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_profile_social_link_size',array(
      'label'   => esc_html__( 'Icon Size', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type'     => 'radio',
      'choices'  => $social['size_list'],
    ));



    $wp_customize->add_setting( 'simple_days_profile_social_icon_color',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_profile_social_icon_color', array(
      'label'      => esc_html__( 'Specifies the color of the icon.', 'simple-days' ),
      'section'    => 'simple_days_profile_setting',
    )));

    $wp_customize->add_setting( 'simple_days_profile_social_icon_hover_color',array(
      'default'    => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_profile_social_icon_hover_color', array(
      'label'      => esc_html__( 'Specifies the color of hover.', 'simple-days' ),
      'section'    => 'simple_days_profile_setting',
    )));

    $wp_customize->add_setting( 'simple_days_profile_social_icon_tooltip',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_profile_social_icon_tooltip',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Tool tip', 'simple-days'),
      'section' => 'simple_days_profile_setting',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_profile_caution', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_profile_caution', array(
      'section' => 'simple_days_profile_setting',
      'label' => esc_html__( 'How to show social icon', 'simple-days' ),
      
      'content' => sprintf(esc_html__( 'You must register your %1$s before you can show social links.', 'simple-days' ),'<a href="'.esc_js('javascript:wp.customize.section(\"simple_days_social_account_setting\").focus();' ).'">'.esc_html__( 'Social Account', 'simple-days' ).'</a>'),
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));


    $i = 1;
    while($i <= 5){
      $wp_customize->add_setting( 'simple_days_profile_social_icon_'.$i,array(
        'default'       => 'none',
        'sanitize_callback' => 'simple_days_sns_name_sanitize',
      ));
      $wp_customize->add_control('simple_days_profile_social_icon_'.$i,array(
        
        'label'   => sprintf(esc_html__( 'Social Icon #%s', 'simple-days'),$i),
        'section' => 'simple_days_profile_setting',
        'type'    => 'select',
        'choices' => $social['name_list'],
        'priority'  => $i+100,
      ));
      $i++;
    }

    
    $wp_customize->add_section('simple_days_popular_post_setting',array(
      'title' => esc_html__('Popular Post', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));
    $wp_customize->add_setting( 'simple_days_popular_post',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_popular_post',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Count Popular Post', 'simple-days'),
      'section' => 'simple_days_popular_post_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_popular_post_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_popular_post_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Popular Posts Widgets', 'simple-days'),
      'section' => 'simple_days_popular_post_setting',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting('popular_post_view',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('popular_post_view',array(
      'section' => 'simple_days_popular_post_setting',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'popular_post_view', array(
     'selector' => '.page_view',
   ));


    $wp_customize->add_setting( 'simple_days_popular_post_view',array(
      'default'    => 'none',
      'sanitize_callback' => 'simple_days_sanitize_select',
    ));
    $wp_customize->add_control( 'simple_days_popular_post_view',array(
      'label'   => esc_html__( 'Display page view at the each post.', 'simple-days'),
      'section' => 'simple_days_popular_post_setting',
      'type' => 'select',
      'choices' => array(
       'none' =>  esc_html__( 'Hide', 'simple-days' ),
       'all' => esc_html__('Page View', 'simple-days'),
       'yearly' => esc_html__('Yearly Page View', 'simple-days'),
       'monthly' => esc_html__('Monthly Page View', 'simple-days'),
       'weekly' => esc_html__('Weekly Page View', 'simple-days'),
       'daily' => esc_html__('Daily Page View', 'simple-days'),
     ),
    ));

    $wp_customize->add_setting( 'simple_days_popular_post_view_icon',array(
      'default'    => 'fa-signal',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control( 'simple_days_popular_post_view_icon',array(
      'label'   => esc_html__( 'Page view icon', 'simple-days'),
      'section' => 'simple_days_popular_post_setting',
      'type' => 'select',
      'choices' => array(
       '&nbsp;' => esc_html('&nbsp;'),
       'fa-signal' => '&#xf012; fa-signal',
       'fa-area-chart' => '&#xf1fe; fa-area-chart',
       'fa-line-chart' => '&#xf201; fa-line-chart',
       'fa-heart-o' => '&#xf08a; fa-heart-o',
       'fa-heart' => '&#xf004; fa-heart',
       'fa-star-o' => '&#xf006; fa-star-o',
       'fa-star' => '&#xf005; fa-star',
       'fa-history' => '&#xf1da; fa-history',
       'fa-history' => '&#xf1da; fa-history',
       'fa-home' => '&#xf015; fa-home',
       'fa-bolt' => '&#xf0e7; fa-bolt',
       'fa-lightbulb-o' => '&#xf0eb; fa-lightbulb-o',
       'fa-smile-o' => '&#xf118; fa-smile-o',
       'fa-rocket' => '&#xf135; fa-rocket',
       'fa-location-arrow' => '&#xf124; fa-location-arrow',
       'fa-info-circle' => '&#xf05a; fa-info-circle',
       'fa-info' => '&#xf129; fa-info',
       'fa-paw' => '&#xf1b0; fa-paw',
       'fa-bomb' => '&#xf1e2; fa-bomb',
       'fa-birthday-cake' => '&#xf1fd; fa-birthday-cake',
       'fa-fort-awesome' => '&#xf286; fa-fort-awesome',
       'fa-gamepad' => '&#xf11b; fa-gamepad',
     ),
    ));

    $wp_customize->add_setting( 'simple_days_popular_post_view_position', array(
      'default'           => 'right',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      'transport'=>'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_popular_post_view_position', array(
      'label'    => esc_html__( 'Post view display position', 'simple-days' ),
      'section'  => 'simple_days_popular_post_setting',
      'type'     => 'radio',
      'choices'  => array(
        'left' => esc_html__( 'Left', 'simple-days' ),
        'center' => esc_html__( 'Center', 'simple-days' ),
        'right' => esc_html__( 'Right', 'simple-days' ),
      ),
    ));





    $wp_customize->add_setting( 'simple_days_popular_post_view_logout',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_popular_post_view_logout',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Display page view to logout user.', 'simple-days'),
      'section' => 'simple_days_popular_post_setting',
      'type' => 'checkbox',
    ));



    
    $wp_customize->add_section('simple_days_toc_setting',array(
      'title' => esc_html__('Table of contents', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));

    $wp_customize->add_setting('toc_setting',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('toc_setting',array(
      'section' => 'simple_days_toc_setting',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'toc_setting', array(
     'selector' => '.s_d_toc',
   ));


    $wp_customize->add_setting( 'simple_days_toc',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('insert table of contents', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_toc_title',array(
      'default'           => esc_html_x( 'Contents', 'toc' , 'simple-days' ),
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_toc_title',array(
      'label'   => esc_html_x( 'Toc Title', 'toc' , 'simple-days' ),
      'section' => 'simple_days_toc_setting',
      'type'    => 'text',
    ));

    $wp_customize->add_setting( 'simple_days_toc_hide',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc_hide',array(
      'label'   => esc_html__( 'Initially hide table of contents', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_toc_dc',array(
      'default'    => '3',
      'sanitize_callback' => 'simple_days_sanitize_select',
    ));
    $wp_customize->add_control( 'simple_days_toc_dc',array(
      'label'   => esc_html__( 'lower limit the heading which toc is displayed', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'select',
      'choices' => array(
       '2' => '2',
       '3' => '3',
       '4' => '4',
       '5' => '5',
       '6' => '6',
       '7' => '7',
       '8' => '8',
       '9' => '9',
       '10' => '10',
     ),
    ));
    $wp_customize->add_setting( 'simple_days_toc_post',array(
      'default'    => true,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc_post',array(
      'label'   => esc_html__( 'Automatically display toc in post', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_toc_page',array(
      'default'    => true,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc_page',array(
      'label'   => esc_html__( 'Automatically display toc in page', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_toc_dp',array(
      'default'    => '0',
      'sanitize_callback' => 'simple_days_sanitize_select',
    ));
    $wp_customize->add_control( 'simple_days_toc_dp',array(
      'label'   => esc_html__( 'display position', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'select',
      'choices' => array(
       '0' => esc_html__('Before the first heading', 'simple-days'),
       '1' => esc_html__('After the first heading', 'simple-days'),
       '2' => esc_html__('Top', 'simple-days'),
     ),
    ));
    $wp_customize->add_setting( 'simple_days_toc_hierarchical',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc_hierarchical',array(
      'label'   => esc_html__( 'hierarchical view', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_toc_numerical',array(
      'default'    => true,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc_numerical',array(
      'label'   => esc_html__( 'numerical display', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_toc_widget',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc_widget',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Add Widgets TOC', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_toc_widget_sticky',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_toc_widget_sticky',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Sticky TOC of SideBar Widgets', 'simple-days'),
      'section' => 'simple_days_toc_setting',
      'type' => 'checkbox',
    ));
    
    $wp_customize->add_section('simple_days_blog_card_setting',array(
      'title' => esc_html__('Blog Card', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));
    $wp_customize->add_setting( 'simple_days_blog_card_internal',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_blog_card_internal',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Blog card(internal site)', 'simple-days'),
      'section' => 'simple_days_blog_card_setting',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_blog_card_external',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_blog_card_external',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Blog card(external site)', 'simple-days'),
      'section' => 'simple_days_blog_card_setting',
      'type' => 'checkbox',
    ));





    
    $wp_customize->add_section('simple_days_google_analytics_setteing',array(
      'title' => esc_html__('Google Analytics', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));

    $wp_customize->add_setting( 'simple_days_ga_analytics', array(
      'default'           => 'false',
      'sanitize_callback' => 'simple_days_sanitize_radio',
    )
  );
    $wp_customize->add_control( 'simple_days_ga_analytics', array(
      'label'    => esc_html__( 'Google Analytics', 'simple-days' ),
      'section'  => 'simple_days_google_analytics_setteing',
      'type'     => 'radio',
      'choices'  => array(
        'false' => esc_html__( 'Disable', 'simple-days' ),
        '1' => esc_html__( 'ga.js', 'simple-days' ),
        '2' => esc_html__( 'gtag.js', 'simple-days' ),
      ),
    ));

    $wp_customize->add_setting( 'simple_days_ga_analytics_id',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_ga_analytics_id',array(
      'label'   => esc_html__( 'Google Analytics account', 'simple-days'),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('UA-XXXXXX-Y'),
      'section' => 'simple_days_google_analytics_setteing',
      'type'    => 'text',
    ));

    $wp_customize->add_setting( 'simple_days_google_site_verification',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_site_verification',array(
      'label'   => esc_html__( 'Google Site Verification', 'simple-days'),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890AbCdeFghIjKLMnoPQrstuVWXYz'),
      'section' => 'simple_days_google_analytics_setteing',
      'type'    => 'text',
    ));










    
  // Add Settings and Controls for Google AD.
    $wp_customize->add_section('simple_days_google_ad_setteing',array(
      'title' => esc_html__('Google AdSense', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_publisher_id',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_ad_publisher_id',array(
      'label'   => esc_html__( 'Your publisher ID(data-ad-client):', 'simple-days'),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('ca-pub-1234567890'),
      'section' => 'simple_days_google_ad_setteing',
      'type'    => 'text',
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_labeling',array(
      'default'    => '0',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_google_ad_labeling',array(
      'label'   => esc_html__( 'Labeling ads', 'simple-days'),
      'section' => 'simple_days_google_ad_setteing',
      'type'     => 'radio',
      'choices'  => array(
        '0' => esc_html__( 'Hide', 'simple-days' ),
        '1' => esc_html__( 'Advertisements', 'simple-days' ),
        '2' => esc_html__( 'Sponsored Links', 'simple-days' ),
      ),
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_labeling_position', array(
      'default'           => 'right',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      'transport'=>'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_google_ad_labeling_position', array(
      'label'    => esc_html__( 'Labeling ads display position', 'simple-days' ),
      'section'  => 'simple_days_google_ad_setteing',
      'type'     => 'select',
      'choices'  => array(
        'left' => esc_html__( 'Left', 'simple-days' ),
        'center' => esc_html__( 'Center', 'simple-days' ),
        'right' => esc_html__( 'Right', 'simple-days' ),
      ),
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_responsive_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_google_ad_responsive_info', array(
      'section' => 'simple_days_google_ad_setteing',
      
      'label' => sprintf(esc_html__('%s ad setting', 'simple-days'),esc_html_x('Responsive', 'google_ad', 'simple-days')),

    //'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'),esc_html__( 'Local Fonts Japanese', 'simple-days')),
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));

    $wp_customize->add_setting( 'simple_days_google_ad',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_google_ad',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      
      'description' => sprintf(esc_html__('Add Widgets Google AdSense (%s)', 'simple-days'),esc_html_x('Responsive', 'google_ad', 'simple-days')),
      'section' => 'simple_days_google_ad_setteing',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_data_ad_slot',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_ad_data_ad_slot',array(
      
      'label'   => sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('Responsive', 'google_ad', 'simple-days')),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
      'section' => 'simple_days_google_ad_setteing',
      'type'    => 'text',
    ));


    $wp_customize->add_setting( 'simple_days_google_ad_infeed_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_google_ad_infeed_info', array(
      'section' => 'simple_days_google_ad_setteing',
      
      'label' => sprintf(esc_html__('%s ad setting', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')),

    //'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'),esc_html__( 'Local Fonts Japanese', 'simple-days')),
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));

    $wp_customize->add_setting( 'simple_days_google_ad_infeed',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_google_ad_infeed',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      
      'description' => sprintf(esc_html__('Add Widgets Google AdSense (%s)', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')),
      'section' => 'simple_days_google_ad_setteing',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_data_ad_slot_infeed',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_ad_data_ad_slot_infeed',array(
      
      'label'   => sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
      'section' => 'simple_days_google_ad_setteing',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_google_ad_data_ad_layout_key_infeed',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_ad_data_ad_layout_key_infeed',array(
      
      'label'   => sprintf(esc_html__( 'Your %s ad unit\'s layout key(data-ad-layout-key):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('-a0+b1+2c-d3+4e'),
      'section' => 'simple_days_google_ad_setteing',
      'type'    => 'text',
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_data_ad_slot_infeed_mobile',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_ad_data_ad_slot_infeed_mobile',array(
      
      'label'   => esc_html_x('For Mobile', 'google_ad', 'simple-days').sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
      'section' => 'simple_days_google_ad_setteing',
      'type'    => 'text',
    ));
    $wp_customize->add_setting( 'simple_days_google_ad_data_ad_layout_key_infeed_mobile',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_ad_data_ad_layout_key_infeed_mobile',array(
      
      'label'   => esc_html_x('For Mobile', 'google_ad', 'simple-days').sprintf(esc_html__( 'Your %s ad unit\'s layout key(data-ad-layout-key):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('-a0+b1+2c-d3+4e'),
      'section' => 'simple_days_google_ad_setteing',
      'type'    => 'text',
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_inarticle_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_google_ad_inarticle_info', array(
      'section' => 'simple_days_google_ad_setteing',
      
      'label' => sprintf(esc_html__('%s ad setting', 'simple-days'),esc_html_x('In-article', 'google_ad', 'simple-days')),

    //'content' => sprintf(esc_html__('This selection overrides %s.', 'simple-days'),esc_html__( 'Local Fonts Japanese', 'simple-days')),
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));

    $wp_customize->add_setting( 'simple_days_google_ad_inarticle',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_google_ad_inarticle',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      
      'description' => sprintf(esc_html__('Add Widgets Google AdSense (%s)', 'simple-days'),esc_html_x('In-article', 'google_ad', 'simple-days')),
      'section' => 'simple_days_google_ad_setteing',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_google_ad_data_ad_slot_inarticle',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_google_ad_data_ad_slot_inarticle',array(
      
      'label'   => sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('In-article', 'google_ad', 'simple-days')),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('1234567890'),
      'section' => 'simple_days_google_ad_setteing',
      'type'    => 'text',
    ));

    
    $wp_customize->add_section('simple_days_amp_setting',array(
      'title' => esc_html__('AMP(beta Ver.)', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));


    $wp_customize->add_setting( 'simple_days_amp',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_amp',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Accelerated Mobile Pages(AMP)', 'simple-days'),
      'section' => 'simple_days_amp_setting',
      'type' => 'checkbox',
    ));





    
    $wp_customize->add_setting( 'simple_days_amp_logo_img',array(
      'default'    => esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/amp-logo.png'),
      'sanitize_callback' => 'simple_days_sanitize_image_file',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_amp_logo_img', array(
      'label' => esc_html__( 'AMP Logo Image', 'simple-days'),
      'description' => __( 'AMP Logo use this image.', 'simple-days').'<br />'.__( 'For more information', 'simple-days').' <a href="'.esc_url('https://developers.google.com/search/docs/data-types/article#amp').'" target="_blank">'.__( 'click here' , 'simple-days').'</a>',
      'section' => 'simple_days_amp_setting',
    )));

    $wp_customize->add_setting( 'simple_days_amp_analytics',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_amp_analytics',array(
      'label'   => esc_html__( 'Google Analytics AMP account', 'simple-days'),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('UA-XXXXXX-Y'),
      'section' => 'simple_days_amp_setting',
      'type'    => 'text',
    ));



    
  // Add Settings and Controls for OGP.
    $wp_customize->add_section('simple_days_ogp_setteing',array(
      'title' => esc_html__('OGP', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));
    
    $wp_customize->add_setting( 'simple_days_ogp',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_ogp',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('add metadata for Open Graph protocol(OGP)', 'simple-days'),
      'section' => 'simple_days_ogp_setteing',
      'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting( 'simple_days_ogp_logo_img',array(
      'default'    => esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/ogp.jpg'),
      'sanitize_callback' => 'simple_days_sanitize_image_file',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simple_days_ogp_logo_img', array(
      'label' => esc_html__( 'OGP Image', 'simple-days'),
      'description' => esc_html__( 'If no thumbnail or home page then use this image.', 'simple-days'),
      'section' => 'simple_days_ogp_setteing',
    )));

    
    $wp_customize->add_setting( 'simple_days_twitter_card', array(
      'default'           => 'false',
      'sanitize_callback' => 'simple_days_sanitize_radio',
    )
  );
    $wp_customize->add_control( 'simple_days_twitter_card', array(
      'label'    => esc_html__( 'Twitter Card', 'simple-days' ),
      'section'  => 'simple_days_ogp_setteing',
      'type'     => 'radio',
      'choices'  => array(
        'false' => esc_html__( 'Disable', 'simple-days' ),
        'summary' => esc_html__( 'Summary Card', 'simple-days' ),
        'summary_large_image' => esc_html__( 'Summary Card with Large Image', 'simple-days' ),
      ),
    ));




    
  // Add Settings and Controls for Sitemap.
    $wp_customize->add_section('simple_days_sitemap_setteing',array(
      'title' => esc_html__('Site map', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));

    
    $wp_customize->add_setting( 'simple_days_sitemap_page',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_sitemap_page',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Display the site map at the page.', 'simple-days'),
      'section' => 'simple_days_sitemap_setteing',
      'type' => 'checkbox',
    ));
    $wp_customize->add_setting( 'simple_days_sitemap_page_post_name',array(
      'default'           => '',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control('simple_days_sitemap_page_post_name',array(
      'label'   => esc_html__( 'Page slug to be display at the page.', 'simple-days'),
      'description' => esc_html__('e.g.&nbsp;', 'simple-days').esc_html('sitemap'),
      'section' => 'simple_days_sitemap_setteing',
      'type'    => 'text',
    ));



    $wp_customize->add_setting( 'simple_days_sitemap_footer',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_sitemap_footer',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Display the site map link at footer area', 'simple-days'),
      'section' => 'simple_days_sitemap_setteing',
      'type' => 'checkbox',
    ));


    
  // Add Settings and Controls for Option.
    $wp_customize->add_section('simple_days_script_css',array(
      'title' => esc_html__('JavaScript and CSS', 'simple-days'),
      'panel' => 'simple_days_setting',
    ));

    $wp_customize->add_setting( 'simple_days_inline_style_css',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_inline_style_css',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Style Css inline mode', 'simple-days'),
      'section' => 'simple_days_script_css',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_script_css_fontawesome_info', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_script_css_fontawesome_info', array(
      'section' => 'simple_days_script_css',
      'label' => esc_html__( 'use CDN FontAwesome 4', 'simple-days' ),
      
      'content' => esc_html__('Simple Days\'s careful selection of FontAwesome icons to make it smoothly.', 'simple-days').'<br>'.esc_html__('Therefore, you can not use full icons.', 'simple-days').'<br>'.esc_html__('If you use CDN FontAwesome, you can use full icons.', 'simple-days').'<br>'.esc_html__('but to be slowly.', 'simple-days'),
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));
    $wp_customize->add_setting( 'simple_days_fontawesome',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_fontawesome',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('use CDN FontAwesome 4', 'simple-days'),
      'section' => 'simple_days_script_css',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_lightbox',array(
      'default'    => 'false',
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_lightbox',array(
      'label'   => esc_html__( 'Lightbox', 'simple-days'),
      'section' => 'simple_days_script_css',
      'type'     => 'radio',
      'choices'  => array(
        'false' => esc_html__( 'Disable', 'simple-days' ),
        'lity' => esc_html__( 'Lity', 'simple-days' ),
      ),
    ));



    $wp_customize->add_setting( 'simple_days_highlight',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_highlight',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('use highlight.js', 'simple-days'),
      'section' => 'simple_days_script_css',
      'type' => 'checkbox',
    ));

    $wp_customize->add_setting( 'simple_days_highlight_styles',array(
      'default'       => 'default',
      'sanitize_callback' => 'simple_days_sanitize_select',
    ));

    $highlight_styles = array(
      'default'                 => 'default',
      'a11y-dark'                 => 'a11y-dark',
      'a11y-light'                   => 'a11y-light',
      'agate'                   => 'agate',
      'an-old-hope'                 => 'an-old-hope',
      'androidstudio'                 => 'androidstudio',
      'arduino-light'                   => 'arduino-light',
      'arta'                 => 'arta',
      'ascetic'                   => 'ascetic',
      'atelier-cave-dark'                 => 'atelier-cave-dark',
      'atelier-cave-light'                   => 'atelier-cave-light',
      'atelier-dune-dark'                 => 'atelier-dune-dark',
      'atelier-dune-light'                   => 'atelier-dune-light',
      'atelier-estuary-dark'                 => 'atelier-estuary-dark',
      'atelier-estuary-light'                   => 'atelier-estuary-light',
      'atelier-forest-dark'                 => 'atelier-forest-dark',
      'atelier-forest-light'                   => 'atelier-forest-light',
      'atelier-heath-dark'                 => 'atelier-heath-dark',
      'atelier-heath-light'                   => 'atelier-heath-light',
      'atelier-lakeside-dark'                 => 'atelier-lakeside-dark',
      'atelier-lakeside-light'                   => 'atelier-lakeside-light',
      'atelier-plateau-dark'                 => 'atelier-plateau-dark',
      'atelier-plateau-light'                   => 'atelier-plateau-light',
      'atelier-savanna-dark'                 => 'atelier-savanna-dark',
      'atelier-savanna-light'                   => 'atelier-savanna-light',
      'atelier-seaside-dark'                 => 'atelier-seaside-dark',
      'atelier-seaside-light'                   => 'atelier-seaside-light',
      'atelier-sulphurpool-dark'                 => 'atelier-sulphurpool-dark',
      'atelier-sulphurpool-light'                   => 'atelier-sulphurpool-light',
      'atom-one-dark'                 => 'atom-one-dark',
      'atom-one-dark-reasonable'                 => 'atom-one-dark-reasonable',
      'atom-one-light'                   => 'atom-one-light',
      'brown-paper'                 => 'brown-paper',
      'codepen-embed'                   => 'codepen-embed',
      'color-brewer'                 => 'color-brewer',
      'darcula'                   => 'darcula',
      'dark'                 => 'dark',
      'darkula'                   => 'darkula',
      'docco'                 => 'docco',
      'dracula'                   => 'dracula',
      'far'                 => 'far',
      'foundation'                   => 'foundation',
      'github'                 => 'github',
      'github-gist'                   => 'github-gist',
      'gml'                 => 'gml',
      'googlecode'                 => 'googlecode',
      'grayscale'                   => 'grayscale',
      'gruvbox-dark'                 => 'gruvbox-dark',
      'gruvbox-light'                   => 'gruvbox-light',
      'hopscotch'                 => 'hopscotch',
      'hybrid'                   => 'hybrid',
      'idea'                 => 'idea',
      'ir-black'                   => 'ir-black',
      'isbl-editor-dark'                   => 'isbl-editor-dark',
      'isbl-editor-light'                   => 'isbl-editor-light',
      'kimbie.dark'                 => 'kimbie.dark',
      'kimbie.light'                   => 'kimbie.light',
      'lightfair'                   => 'lightfair',
      'magula'                   => 'magula',
      'mono-blue'                 => 'mono-blue',
      'monokai'                   => 'monokai',
      'monokai-sublime'                 => 'monokai-sublime',
      'nord'                   => 'nord',
      'obsidian'                   => 'obsidian',
      'ocean'                 => 'ocean',
      'paraiso-dark'                   => 'paraiso-dark',
      'paraiso-light'                 => 'paraiso-light',
      'pojoaque'                   => 'pojoaque',
      'purebasic'                   => 'purebasic',
      'qtcreator_dark'                 => 'qtcreator_dark',
      'qtcreator_light'                   => 'qtcreator_light',
      'railscasts'                 => 'railscasts',
      'rainbow'                   => 'rainbow',
      'routeros'                 => 'routeros',
      'school-book'                   => 'school-book',
      'shades-of-purple'                   => 'shades-of-purple',
      'solarized-dark'                 => 'solarized-dark',
      'solarized-light'                   => 'solarized-light',
      'sunburst'                   => 'sunburst',
      'tomorrow'                 => 'tomorrow',
      'tomorrow-night'                   => 'tomorrow-night',
      'tomorrow-night-blue'                 => 'tomorrow-night-blue',
      'tomorrow-night-bright'                   => 'tomorrow-night-bright',
      'tomorrow-night-eighties'                 => 'tomorrow-night-eighties',
      'vs'                   => 'vs',
      'vs2015'                 => 'vs2015',
      'xcode'                   => 'xcode',
      'xt256'                   => 'xt256',
      'zenburn'                 => 'zenburn',
    );

$wp_customize->add_control('simple_days_highlight_styles',array(
  'label'   => esc_html__( 'Style of highlight.js', 'simple-days'),
  'section' => 'simple_days_script_css',
  'type'    => 'select',
  'choices' => $highlight_styles,
));





  // Add Settings and Controls for Option.
$wp_customize->add_section('simple_days_word_balloon',array(
  'title' => esc_html__('Word Balloon', 'simple-days'),
  'panel' => 'simple_days_setting',
));

$wp_customize->add_setting( 'simple_days_page_word_balloon_amp',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( 'simple_days_page_word_balloon_amp',array(
  'label'   => esc_html__( 'Enable', 'simple-days'),
  'description' => esc_html__('Use word balloon css when AMP', 'simple-days'),
  'section' => 'simple_days_word_balloon',
  'type' => 'checkbox',
));
/*
  $wp_customize->add_setting( 'simple_days_page_word_balloon_install', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_page_word_balloon_install', array(
    'section' => 'simple_days_word_balloon',
    'label' => esc_html__( 'Install Word Balloon Plugins', 'simple-days' ),
    'content' => '<a href="'. esc_url( admin_url( 'plugin-install.php?tab=search&type=author&s=yahman' ) ).'" class="button button-secondary">'.esc_html__( 'Install Plugins', 'simple-days' ).'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));
*/

  $wp_customize->add_setting( 'simple_days_page_word_balloon_install', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_word_balloon_install', array(
    'section' => 'simple_days_word_balloon',
    
    'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'Word Balloon', 'simple-days')),
    'plugin' => array(
     'name' => esc_html__('Word Balloon', 'simple-days'),
     'dir' => 'word-balloon',
     'filename' => 'word_balloon.php',
   ),
    
      
      
      
      
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));






















  














  
      /*if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site_title a',
        // PHP 5.2 or earlier 'render_callback' => function() { bloginfo( 'name' ); },
        'render_callback' => 'simple_days_customize_partial_blogname',
        ) );
      }*/


      
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

      if(get_theme_mod( 'simple_days_sidebar_layout','3') != '0'){
        $wp_customize->get_setting( 'simple_days_sidebar_layout' )->transport = 'postMessage';
      }



    }// end of public static function register

    function simple_days_customize_partial_blogname() {
     bloginfo( 'name' );
   }

   public static function live_preview() {
     wp_enqueue_script(
              'simple_days_customizer_script', // Give the script a unique ID
              SIMPLE_DAYS_THEME_URI . '/assets/js/customizer/customizer.min.js', // Define the path to the JS file
              array( 'jquery', 'customize-preview' ), // Define dependencies
              null, // Define a version (optional)
              true // Specify whether to put in footer (leave this true)
            );

   }

   public static function Simple_Days_preview_style() {
     get_template_part( 'inc/preview_style');
   }//end of public static function header_output



   public static function Simple_Days_build_css() {
    get_template_part( 'inc/build_style');
  }

  public static function simple_days_customizer_print_scripts_styles() {
    get_template_part('inc/customizer-script');
  }
}//end of Simple_Days_Customize



// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Simple_Days_Customize' , 'register' ) );

// Output custom CSS to live site
if ( is_customize_preview() ) {
  add_action( 'wp_head' , array( 'Simple_Days_Customize' , 'Simple_Days_preview_style' ) );
  add_action( 'wp_footer', array( 'Simple_Days_Customize' , 'simple_days_customizer_print_scripts_styles' ) ,999999999999999 );
}

// 即時反映用の JavaScript をエンキューします。
add_action( 'customize_preview_init' , array( 'Simple_Days_Customize' , 'live_preview' ) );

//CSS Save
add_action( 'customize_save_after', array( 'Simple_Days_Customize' , 'Simple_Days_build_css' ) );

if ( class_exists( 'WP_Customize_Control' ) ) {

  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-sortable.php';


  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-html_text.php';


  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-plugin_install.php';


  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-image_select.php';

}//end of if ( class_exists( 'WP_Customize_Control' ) ) {

