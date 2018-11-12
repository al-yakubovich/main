<?php
defined('ABSPATH') or die("Please don't run this script.");

global $simple_days_amp;
$simple_days_amp = get_theme_mod( 'simple_days_amp',false);

function is_amp(){
  global $simple_days_amp;
  $is_amp = false;
  if ( empty($_GET['amp']) || !$simple_days_amp) {
    return false;
  }
  if ( $_GET['amp'] === '1' && $simple_days_amp) {
    $is_amp = true;
    return $is_amp;
  }
  return $is_amp;
}



define( 'SIMPLE_DAYS_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'SIMPLE_DAYS_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

get_template_part( 'inc/extra','content' );

if ( ! function_exists( 'simple_days_admin_menu' ) ) :
  function simple_days_admin_menu() {
    add_theme_page( esc_html_x( 'Color' , 'dashboard' , 'simple-days'), esc_html_x( 'Color' , 'dashboard' , 'simple-days'), 'manage_options', 'customize.php?autofocus[panel]=simple_days_custom_colors' );
    add_theme_page( 'Simple Days', 'Simple Days', 'manage_options', 'customize.php?autofocus[panel]=simple_days_setting' );
  }
endif;
add_action('admin_menu', 'simple_days_admin_menu');

if ( ! function_exists( 'simple_days_setup' ) ) :
  function simple_days_setup() {

    load_theme_textdomain( 'simple-days', SIMPLE_DAYS_THEME_DIR . '/languages' );
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    
    add_theme_support( 'html5', array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style',
    ) );

    
    if ( ! isset( $content_width ) ) {
      $content_width = 767;
    }

    add_theme_support( 'custom-background', array(
     'default-color'          => '',
     'default-image'          => '',
     'default-repeat'         => 'repeat',
     'default-position-x'     => 'left',
     'default-position-y'     => 'top',
     'default-size'           => 'auto',
     'default-attachment'     => 'scroll',
     'wp-head-callback'       => '_custom_background_cb',
     'admin-head-callback'    => '',
     'admin-preview-callback' => ''
   ));

    
    get_template_part( 'inc/customizer' );
   // Indicate widget sidebars can use selective refresh in the Customizer.(WP4.7)
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'custom-logo', array(
      'height'      => 60,
      'width'       => 300,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
    ));

    add_theme_support('custom-header',array(
        //default image (empty to use none).
        //'default-image'          => '',
        //'uploads' => true,
        //'header-text' => true,
      'flex-width' => true,
      'flex-height' => true,
        // Set height and width, with a maximum value for the width.
      'height'                 => 624,
      'width'                  => 1980,
    ));

    
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'gutenberg', array(
      'wide-images' => true,
    ) );

    register_nav_menu( 'primary' , esc_attr__( 'Header Menu', 'simple-days' ));
    register_nav_menu( 'secondary' , esc_attr__( 'Footer Menu', 'simple-days' ));
    register_nav_menu( 'sub' , esc_attr__( 'Header Sub Menu', 'simple-days' ));
    get_template_part( 'inc/starter_content' );

    
    $old_version = get_theme_mod( 'simple_days_theme_version','');
    $current_version = wp_get_theme(get_template())->Version;
    if($current_version != $old_version){
     set_theme_mod('simple_days_theme_version', $current_version);
     get_template_part( 'inc/build_style');
   }



 }
endif;
add_action( 'after_setup_theme', 'simple_days_setup' );

if ( ! function_exists( 'simple_days_document_title_separator' ) ) :
  
  function simple_days_document_title_separator( $separator ) {
    return esc_html( ' '.get_theme_mod( 'simple_days_title_separator','|').' ' );
  }
endif;
add_filter( 'document_title_separator', 'simple_days_document_title_separator' );

if ( ! function_exists( 'simple_days_widgets_init' ) ) :
  
  function simple_days_widgets_init() {
    get_template_part( 'inc/widgets' );
  }
endif;
add_action( 'widgets_init', 'simple_days_widgets_init' );

if ( ! function_exists( 'simple_days_remove_hentry' ) ) :
  
  function simple_days_remove_hentry( $hentry ) {
    return array_diff($hentry, array('hentry'));
  }
endif;
add_filter('post_class', 'simple_days_remove_hentry');

if ( ! function_exists( 'simple_days_get_the_archive_title' ) ) :
  
  function simple_days_get_the_archive_title($title) {
    if ( is_category() ) {
      $title = single_cat_title( '<i class="fa fa-folder-open-o" aria-hidden="true"></i> ', false );
    }elseif ( is_tag() ) {
      $title = single_tag_title( '<i class="fa fa-tag" aria-hidden="true"></i> ', false );
    } elseif ( is_author() ) {
      $title = '<i class="fa fa-user" aria-hidden="true"></i> '. get_the_author();

    } elseif ( is_year() || is_month() || is_day() ) {
     $title = '<i class="fa fa-calendar-check-o" aria-hidden="true"></i> '. $title;
   }
   return $title;
 }
endif;
add_filter( 'get_the_archive_title', 'simple_days_get_the_archive_title');

if ( ! function_exists( 'simple_days_replace_script_type' ) ) :
  function simple_days_replace_script_type($tag) {
   if (!is_amp()){
     $tag =  str_replace("type='text/javascript' src='https://www.googletagmanager.com/gtag/js", "async src='https://www.googletagmanager.com/gtag/js", $tag);
   }else{
     $tag =  preg_replace('/^(?!.*(ampproject)).*$/i', '', $tag);
     $tag =  str_replace("type='text/javascript'", "async", $tag);
     $tag =  str_replace("src='https://cdn.ampproject.org/v0/amp-ad-0.1.js", " custom-element=\"amp-ad\" src='https://cdn.ampproject.org/v0/amp-ad-0.1.js", $tag);
     $tag =  str_replace("src='https://cdn.ampproject.org/v0/amp-form-0.1.js", " custom-element=\"amp-form\" src='https://cdn.ampproject.org/v0/amp-form-0.1.js", $tag);
     $tag =  str_replace("src='https://cdn.ampproject.org/v0/amp-analytics-0.1.js", " custom-element=\"amp-analytics\" src='https://cdn.ampproject.org/v0/amp-analytics-0.1.js", $tag);
     $tag =  str_replace("src='https://cdn.ampproject.org/v0/amp-iframe-0.1.js", " custom-element=\"amp-iframe\" src='https://cdn.ampproject.org/v0/amp-iframe-0.1.js", $tag);
     $tag =  str_replace("src='https://cdn.ampproject.org/v0/amp-facebook-like-0.1.js", " custom-element=\"amp-facebook-like\" src='https://cdn.ampproject.org/v0/amp-facebook-like-0.1.js", $tag);
   }
   return $tag;
 }
endif;
add_filter( 'script_loader_tag','simple_days_replace_script_type');

if ( ! function_exists( 'simple_days_replace_link_stylesheet' ) ) :
  
  function simple_days_replace_link_stylesheet( $tag ) {
   if (is_amp()){
     $tag =  preg_replace( array( "/'/", '/(id|type|media)=".+?" */', '/ \/>/' ), array( '"', '', '>' ), $tag );
   }
   return $tag;
 }
endif;
add_filter( 'style_loader_tag', 'simple_days_replace_link_stylesheet' );

if ( ! function_exists( 'simple_days_required_stylesheets' ) ) :
  function simple_days_required_stylesheets(){

    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    WP_Filesystem();
    global $wp_filesystem;

    $upload_dir = wp_upload_dir();
    
    $check_file = $upload_dir['basedir']. '/simple_days_cache/style.min.css';

    if ( file_exists ($check_file)) {
      $css_url = $check_file;
    }else{
      $css_url = SIMPLE_DAYS_THEME_URI . '/assets/css/style.min.css';
    }

    
    if(get_theme_mod( 'simple_days_skin_style_random',false)){
      $skins_list = array('red_orange','orange','rose_peche','grape_juice','blue_yellow','blue_ocean','petrole','apple_green','yellow_mustard','brown_bread','gray_horse','black_coffee','moss_green','cinnamon');
    }else{
      $skins_list = 'none';
    }

    if (!is_amp()){

      
      if(get_theme_mod( 'simple_days_inline_style_css',false)){
        wp_register_style( 'simple_days_style', false, array(), wp_get_theme(get_template())->Version );
        wp_enqueue_style( 'simple_days_style' );
        wp_add_inline_style( 'simple_days_style', $wp_filesystem->get_contents( $css_url ) );
      }else{
        if ( file_exists ($check_file)) {
          $css_url = $upload_dir['baseurl'] . '/simple_days_cache/style.min.css';
        }
        wp_enqueue_style('simple_days_style', $css_url, array(), wp_get_theme(get_template())->Version);
      }
      //wp_enqueue_style('simple_days_style', SIMPLE_DAYS_THEME_URI . '/assets/css/style.min.css', array(), wp_get_theme(get_template())->Version);

      if($skins_list != 'none'){
        $skins_list_key = array_rand($skins_list);
        wp_enqueue_style('simple_days_skin_style', SIMPLE_DAYS_THEME_URI . '/assets/skins/'.$skins_list[$skins_list_key].'.min.css', array('simple_days_style'));
      }

      if ( is_customize_preview() ) {
        if(get_theme_mod( 'simple_days_skin_style','none') != 'none'){
          wp_enqueue_style('simple_days_skin_style', SIMPLE_DAYS_THEME_URI . '/assets/skins/'.get_theme_mod( 'simple_days_skin_style').'.min.css', array('simple_days_style'));
        }
      }




      if ( !is_user_logged_in() ){
        
        $ga_analytics_id = esc_attr(get_theme_mod( 'simple_days_ga_analytics_id',''));
        if ( get_theme_mod( 'simple_days_ga_analytics') == '1' && $ga_analytics_id != '') {
         wp_enqueue_script('google-analytics-ga', SIMPLE_DAYS_THEME_URI . '/assets/js/ga.js', array(), null );
         wp_localize_script( 'google-analytics-ga', 'ga_analytics_id', $ga_analytics_id );
       }
       if ( get_theme_mod( 'simple_days_ga_analytics') == '2' && get_theme_mod( 'simple_days_ga_analytics_id','') != '') {
         wp_enqueue_script('google-analytics-gtag-main', 'https://www.googletagmanager.com/gtag/js?id='.$ga_analytics_id, array(), null );
         wp_enqueue_script('google-analytics-gtag', SIMPLE_DAYS_THEME_URI . '/assets/js/gtag.js', array(), null );
         wp_localize_script( 'google-analytics-gtag', 'ga_analytics_id', $ga_analytics_id );
       }
     }
     
     if ( is_singular() && comments_open() && get_option( 'thread_comments' )) {
       wp_enqueue_script( 'comment-reply' );
     }

   }else{


    if (!is_user_logged_in()){
      global $wp_scripts, $wp_styles;$a1 = 'wp_scripts'; $a2 = 'wp_styles';$$a1 = $$a2 = new stdClass;
    }

    
    wp_enqueue_script('amp','https://cdn.ampproject.org/v0.js', array(), null );
    wp_enqueue_script('amp-ad','https://cdn.ampproject.org/v0/amp-ad-0.1.js', array(), null );
    wp_enqueue_script('amp-form','https://cdn.ampproject.org/v0/amp-form-0.1.js', array(), null );
    if(get_theme_mod( 'simple_days_amp_analytics','') != '' || get_theme_mod( 'simple_days_ga_analytics_id','') != ''){
      wp_enqueue_script('amp-analytics','https://cdn.ampproject.org/v0/amp-analytics-0.1.js', array(), null );
    }
    wp_enqueue_script('amp-iframe','https://cdn.ampproject.org/v0/amp-iframe-0.1.js', array(), null );
    if(get_theme_mod( 'simple_days_social_cta_facebook',false) == true && is_single() && get_theme_mod( 'simple_days_social_cta',false) == true && get_theme_mod( 'simple_days_social_account_facebook',false) == true){
      wp_enqueue_script('amp-facebook-like','https://cdn.ampproject.org/v0/amp-facebook-like-0.1.js', array(), null );
    }
    if(get_theme_mod( 'simple_days_social_cta_page',false) == true && is_page() && get_theme_mod( 'simple_days_social_cta',false) == true && get_theme_mod( 'simple_days_social_account_facebook',false) == true){
      wp_enqueue_script('amp-facebook-like','https://cdn.ampproject.org/v0/amp-facebook-like-0.1.js', array(), null );
    }
    
    if ( file_exists ($check_file)) {
      $css_url = $check_file;
    }else{
      $css_url = SIMPLE_DAYS_THEME_DIR . '/assets/css/style.min.css';
    }
    $css = $wp_filesystem->get_contents($css_url);
    if ($css == ''){
      require_once( ABSPATH . 'wp-load.php' );
      $css_remote = wp_remote_get( $css_url );
      $css = $css_remote['body'];
    }

    
    if($skins_list != 'none'){
      $skins_list_key = array_rand($skins_list);
      $css_url =  SIMPLE_DAYS_THEME_DIR . '/assets/skins/'.$skins_list[$skins_list_key].'.min.css';
      $css_skin = $wp_filesystem->get_contents($css_url);
      if ($css_skin == ''){
        $css_remote = wp_remote_get( $css_url );
        $css_skin = $css_remote['body'];
      }
      $css .= $css_skin;


    }

    
    if (get_theme_file_uri('style.css') != SIMPLE_DAYS_THEME_URI .'/style.css'){
      $css_child = $wp_filesystem->get_contents(get_theme_file_path('style.min.css'));
      if ($css_child == ''){
        $css_child_remote = wp_remote_get( get_theme_file_uri('style.min.css'));
        $css_child = $css_child_remote['body'];
      }
      $css .= $css_child;
    }

    if(get_theme_mod( 'simple_days_page_word_balloon_amp',false)){
      require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
      if ( is_plugin_active( 'word-balloon/word_balloon.php' ) ) {
        $css_word_balloon = $wp_filesystem->get_contents(plugin_dir_path('word-balloon/css/word_balloon_user.min.css'));
        if ($css_word_balloon == ''){
          $css_word_balloon_remote = wp_remote_get( plugins_url('word-balloon/css/word_balloon_user.min.css'));
          $css_word_balloon = $css_word_balloon_remote['body'];
        }
        $css .= $css_word_balloon;
      }
    }





    $icomoon_url = SIMPLE_DAYS_THEME_DIR .'/assets/fonts/icomoon/style.min.css';
    $icomoon = $wp_filesystem->get_contents($icomoon_url);
    if ($icomoon == ''){
      $icomoon_remote = wp_remote_get( $icomoon_url );
      $icomoon = $icomoon_remote['body'];
    }
    $css .= str_replace('url(\'icomoon','url(\''.esc_url(SIMPLE_DAYS_THEME_URI) .'/assets/fonts/icomoon/icomoon',$icomoon);
      //$fontawesome4 = $wp_filesystem->get_contents(SIMPLE_DAYS_THEME_URI .'/assets/fonts/fontawesome/style.min.css');
      //$css .= str_replace('url(\'../fonts/','url(\''.esc_url(SIMPLE_DAYS_THEME_URI) .'/assets/fonts/fontawesome/fonts/',$fontawesome4);








    $css .= "\n";
    $css .= wp_get_custom_css();
    wp_register_style( 'amp-custom', false ); wp_enqueue_style( 'amp-custom' );
    wp_add_inline_style( 'amp-custom', $css );

    
    $maxcdn = 'https://maxcdn.bootstrapcdn.com';
    wp_enqueue_style('font-awesome4_cdn', $maxcdn.'/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
  }

}
endif;
add_action('wp_enqueue_scripts','simple_days_required_stylesheets');

if ( ! function_exists( 'simple_days_footer_stylesheets' ) ) :
  function simple_days_footer_stylesheets() {

    if (!is_amp()){
      
      if(!get_theme_mod( 'simple_days_fontawesome',false)){
        wp_enqueue_style('font-awesome4', SIMPLE_DAYS_THEME_URI . '/assets/fonts/fontawesome/style.min.css', array(), null);
      }else{
        $maxcdn = 'https://maxcdn.bootstrapcdn.com';
        wp_enqueue_style('font-awesome4_cdn', $maxcdn.'/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
      }

      
      wp_enqueue_style('font-icomoon', SIMPLE_DAYS_THEME_URI . '/assets/fonts/icomoon/style.min.css', array(), null);
      if( get_theme_mod( 'simple_days_lightbox') == 'lity'){
       wp_enqueue_script( 'simplelightbox-js', SIMPLE_DAYS_THEME_URI . '/assets/js/lity/lity.min.js', array( 'jquery' ), null , true );
       wp_enqueue_style('simplelightbox-css', SIMPLE_DAYS_THEME_URI . '/assets/js/lity/lity.min.css', array(), null);
     }

     
     if( is_active_widget( false, false, 's_d_go_res', true )){
       wp_enqueue_script( 'google-adsense-js', '//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js', array(), null , true );
     }
     
     simple_days_customize_fonts_enqueue();

     if ( !is_user_logged_in() ){

     }
   }else{

   }

 }
endif;
add_action( 'wp_footer', 'simple_days_footer_stylesheets' );

if ( ! function_exists( 'highlight_load' ) ) :
  
  function highlight_load() {
    wp_enqueue_style('highlight_style', SIMPLE_DAYS_THEME_URI . '/assets/js/highlight/styles/'.get_theme_mod( 'simple_days_highlight_styles','default').'.css', array(), null);
    wp_enqueue_script('highlight_script',SIMPLE_DAYS_THEME_URI . '/assets/js/highlight/highlight.pack.js', array(), null );
  }
endif;

if ( ! function_exists( 'highlight_onload' ) ) :
  function highlight_onload() {
    echo '<script>hljs.initHighlightingOnLoad();</script>';
  }
endif;

if ( ! function_exists( 'simple_days_add_meta' ) ) :
  function simple_days_add_meta($post_id){
    if (!is_amp()){
      if ( !is_user_logged_in() ){
        
        if( get_theme_mod( 'simple_days_google_site_verification','') != '' && get_theme_mod( 'simple_days_ga_analytics',false) == true && get_theme_mod( 'simple_days_ga_analytics_id','') != ''){
          echo '<meta name="google-site-verification" content="'.esc_attr(get_theme_mod( 'simple_days_google_site_verification','')).'"/>'."\n";
        }
      }
    }
    
    if ( get_theme_mod( 'simple_days_ogp',false) == true ){
      $url = $description = $title = $image = '';
      $ogp_logo = get_theme_mod( 'simple_days_ogp_logo_img',esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/ogp.jpg'));
      if(is_home()){
       $url = home_url();
       $description = get_bloginfo('description');
       $title = get_bloginfo('name');
       $imgae = $ogp_logo;
     }else{
       $url = get_the_permalink();
       if(have_posts()): while(have_posts()): the_post();
         $description = mb_strimwidth( wp_strip_all_tags(strip_shortcodes(get_the_content()), true), 0 , 150, '&hellip;' );
       endwhile; endif;
       $title = get_the_title();
       if(!has_post_thumbnail()) {
         $imgae = $ogp_logo;
       }else{
        $imgae = wp_get_attachment_image_src( get_post_thumbnail_id() , 'full' );
        $imgae = $imgae[0];
      }
    }
    $get_locale = get_locale();
    if ($get_locale == 'ja'):$get_locale = 'ja_JP'; endif;

    echo '<meta property="og:url" content="'.esc_url($url).'" />'."\n";
    echo '<meta property="og:type" content="'.(is_singular() ? 'article' : 'website').'" />'."\n";
    echo '<meta property="og:title" content="'.esc_attr($title).'" />'."\n";
    echo '<meta property="og:description" content="'.esc_attr($description).'" />'."\n";
    echo '<meta property="og:image" content="'.esc_url($imgae).'" />'."\n";
    echo '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />'."\n";
    echo '<meta property="og:locale" content="'.esc_attr($get_locale).'" />'."\n";
    if ( get_theme_mod( 'simple_days_social_account_facebook_app_id' , '') != ''){
      echo '<meta property="fb:app_id" content="'.esc_attr(get_theme_mod( 'simple_days_social_account_facebook_app_id' , '')).'" />'."\n";
    }
    if ( get_theme_mod( 'simple_days_social_account_facebook_admins' , '') != ''){
      echo '<meta property="fb:admins" content="'.esc_attr(get_theme_mod( 'simple_days_social_account_facebook_admins' , '')).'" />'."\n";
    }

    $simple_days_twitter_card = get_theme_mod( 'simple_days_twitter_card' , 'false');
    $simple_days_twitter_user_name = get_theme_mod( 'simple_days_social_account_twitter' , '');
    if ( $simple_days_twitter_card != 'false' && $simple_days_twitter_user_name != ''){
      $simple_days_twitter_user_name = '@' . str_replace( '@' , '' , $simple_days_twitter_user_name );
      echo '<meta name="twitter:card" content="'.esc_attr($simple_days_twitter_card).'" />'."\n";
      echo '<meta name="twitter:site" content="'.esc_attr($simple_days_twitter_user_name).'" />'."\n";
    }
  }
  if ( get_theme_mod( 'simple_days_popular_post' , false) == true){
   if (!is_singular() || is_user_logged_in()) return;
   if (empty($post_id)) {
    global $post;
    $post_id = $post->ID;
  }
	//var_dump($post_id);
  simple_days_popular_posts($post_id);
}

}
endif;
add_action( 'wp_head', 'simple_days_add_meta' );






if ( ! function_exists( 'simple_days_user_profile_enqueue_script' ) ) :
  function simple_days_user_profile_enqueue_script() {
   wp_enqueue_style( 'wp-color-picker');
   wp_enqueue_script( 'wp-color-picker');
 }
endif;

if ( ! function_exists( 'simple_days_user_profile_script' ) ) :
  function simple_days_user_profile_script() {
   echo "<script>
   (function($) {
    $(function() {
      var options = {
        defaultColor: false,
        change: function(event, ui){},
        clear: function() {},
        hide: true,
        palettes: true
      };
      $('.color-picker').wpColorPicker(options);
      });
      })(jQuery);
      </script>".PHP_EOL;
    }
  endif;

  add_action( 'admin_head-profile.php', 'simple_days_user_profile_enqueue_script');
  add_action( 'admin_print_footer_scripts-profile.php', 'simple_days_user_profile_script');

  add_action( 'show_user_profile', 'simple_days_add_user_profile' );
  add_action( 'edit_user_profile', 'simple_days_add_user_profile' );

  if ( ! function_exists( 'simple_days_add_user_profile' ) ) :
//simple_days_social_user_profile
    function simple_days_add_user_profile( $user ) {

      ?>
      <h2><?php echo esc_html__( 'Simple Days Social Profile', 'simple-days'); ?></h2>
      <table class="form-table">
        <?php
        $simple_days_social_user_profile = get_the_author_meta( 'simple_days_social_user_profile', $user->ID );
        get_template_part( 'inc/social', 'list' );
        $social = get_query_var('social_list');
      //$social['name_list'] $social['shape_list'] $social['size_list']

        $i = 1;

        while($i <= 5){
          $sns_icon = $sns_url = '';
          ?>
          <tr>
            <th><label for="sns_icon_<?php echo esc_attr($i); ?>"><?php  echo sprintf(esc_html__( 'Social Icon #%s', 'simple-days'),esc_attr($i)); ?></label></th>
            <td>
              <?php

              if(isset($simple_days_social_user_profile['sns_icon_'.$i])){
                $sns_icon = $simple_days_social_user_profile['sns_icon_'.$i];
              }
              ?>
              <select name="sns_icon_<?php echo esc_attr($i); ?>" id="sns_icon_<?php echo esc_attr($i); ?>">
                <?php
                foreach ($social['name_list'] as $key => $value) {
                  echo '<option value="'.esc_attr($key).'" '. ($sns_icon == $key ? 'selected="selected"' : '').'>'.esc_html($value).'</option>';
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <th><label for="sns_url_<?php echo esc_attr($i); ?>"><?php  echo sprintf(esc_html__( 'Social URL #%s', 'simple-days'),esc_attr($i)); ?></label></th>
            <td>
              <?php
              if(isset($simple_days_social_user_profile['sns_url_'.$i])){
                $sns_url = $simple_days_social_user_profile['sns_url_'.$i];
              }
              ?>
              <input type="text" name="sns_url_<?php echo esc_attr($i); ?>" id="sns_url_<?php echo esc_attr($i); ?>" value="<?php echo esc_url($sns_url); ?>" class="regular-text">
            </td>
          </tr>
          <?php
          ++$i;
        }

        $simple_days_social_option = array('icon_shape','icon_size','icon_user_color','icon_user_hover_color','icon_tooltip');
        foreach ($simple_days_social_option as $value) {
          if(isset($simple_days_social_user_profile[$value])){
            $sns_info[$value] = $simple_days_social_user_profile[$value];
          }else{
            $sns_info[$value] = '';
          }
        }
        ?>
        <tr>
          <th><label for="sns_icon_shape"><?php esc_html_e( 'Display Style', 'simple-days'); ?></label></th>
          <td>
            <?php

            if($sns_info['icon_shape'] == '')$sns_info['icon_shape'] = 'icon_square';
            foreach ($social['shape_list'] as $key => $value) {
              echo '<p><label><input name="sns_icon_shape" type="radio" value="'.esc_attr($key).'" class="tog" '. ($sns_info['icon_shape'] == $key ? 'checked="checked"' : '').'>'.esc_html($value).'</label></p>';
            }
            ?>
          </td>
        </tr>
        <tr>
          <th><label for="sns_icon_size"><?php esc_html_e( 'Icon Size', 'simple-days'); ?></label></th>
          <td>
            <?php

            foreach ($social['size_list'] as $key => $value) {
              echo '<p><label><input name="sns_icon_size" type="radio" value="'.esc_attr($key).'" class="tog" '. ($sns_info['icon_size'] == $key ? 'checked="checked"' : '').'>'.esc_html($value).'</label></p>';
            }
            ?>
          </td>
        </tr>
        <tr>
          <th><label for="icon_user_color"><?php esc_html_e('Specifies the color of the icon.', 'simple-days'); ?></label></th>
          <td>
            <input class="color-picker" id="icon_user_color" name="icon_user_color" type="text" value="<?php echo esc_attr( $sns_info['icon_user_color'] ); ?>" />
          </td>
        </tr>
        <tr>
          <th><label for="icon_user_hover_color"><?php esc_html_e('Specifies the color of hover.', 'simple-days'); ?></label></th>
          <td>
            <input class="color-picker" id="icon_user_hover_color" name="icon_user_hover_color" type="text" value="<?php echo esc_attr( $sns_info['icon_user_hover_color'] ); ?>" />
          </td>
        </tr>
        <tr>
          <th><label for="icon_tooltip"><?php esc_html_e('Tool tip', 'simple-days'); ?></label></th>
          <td>
            <?php

            echo '<input name="icon_tooltip" type="checkbox" id="icon_tooltip" value="1" '. ($sns_info['icon_tooltip'] == true ? 'checked="checked"' : '').'>'.esc_html__( 'Enable', 'simple-days');
            ?>
          </td>
        </tr>
      </table>
      <?php
    }
  endif;

  add_action( 'personal_options_update', 'simple_days_save_user_profile' );
  add_action( 'edit_user_profile_update', 'simple_days_save_user_profile' );

  if ( ! function_exists( 'simple_days_save_user_profile' ) ) :
    function simple_days_save_user_profile( $user_id ) {

      if ( !current_user_can( 'edit_user', $user_id ) ) return false;
      if( !in_array( get_current_screen()->id, array('profile','user-edit') ) ) return;

      $simple_days_social_user_profile = array();

      $i = 1;
      while($i <= 5){
        if ( isset( $_POST['sns_icon_'.$i] ) ) {
          $simple_days_social_user_profile['sns_icon_'.$i] = sanitize_text_field( wp_unslash( $_POST['sns_icon_'.$i] ) );
        }
        if ( isset( $_POST['sns_url_'.$i] ) ) {
          $simple_days_social_user_profile['sns_url_'.$i] = sanitize_text_field( wp_unslash( $_POST['sns_url_'.$i] ) );
        }
        ++$i;
      }

      $simple_days_social_option = array('icon_shape','icon_size','icon_user_color','icon_user_hover_color','icon_tooltip');
      foreach ($simple_days_social_option as $value) {
        if ( isset( $_POST[$value] ) ) {
          $simple_days_social_user_profile[$value] = sanitize_text_field( wp_unslash( $_POST[$value] ) );
        }
      }
      update_user_meta( $user_id, 'simple_days_social_user_profile', $simple_days_social_user_profile );
    }
  endif;





  if ( ! function_exists( 'simple_days_customize_fonts_enqueue' ) ) :
    function simple_days_customize_fonts_enqueue() {
      $return_font = array();
      $return_font[0] = $return_font[1] = $return_font[2] = $return_font[3] = 'none';

      $google_font_body_jp = get_theme_mod( 'simple_days_font_body_google_jp','none');
      $font_body_jp = get_theme_mod( 'simple_days_font_body_jp','none');
      $google_font_body = get_theme_mod( 'simple_days_font_body_google','none');

      $google_font_headings_jp = get_theme_mod( 'simple_days_font_headings_google_jp','none');
      $font_headings_jp = get_theme_mod( 'simple_days_font_headings_jp','none');
      $google_font_headings = get_theme_mod( 'simple_days_font_headings_google','none');


      $google_font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_google_jp','none');
      $font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_jp','none');
      $google_font_site_title = get_theme_mod( 'simple_days_font_site_title_google','none');


      $google_font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_google_jp','none');
      $font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_jp','none');
      $google_font_post_title = get_theme_mod( 'simple_days_font_post_title_google','none');


      $google_font_effect[1] = get_theme_mod( 'simple_days_font_site_title_google_effects_1','none');
      $google_font_jp_effect[1] = get_theme_mod( 'simple_days_font_site_title_google_jp_effects_1','none');
      $google_font_effect[2] = get_theme_mod( 'simple_days_font_site_title_google_effects_2','none');
      $google_font_jp_effect[2] = get_theme_mod( 'simple_days_font_site_title_google_jp_effects_2','none');

      $google_font_effect = array_filter(str_replace('none', '' , $google_font_effect),"strlen" );
      $google_font_jp_effect = array_filter(str_replace('none', '' , $google_font_jp_effect),"strlen" );
      if(empty($google_font_effect)){
        $google_font_effect = '';
      }else{
        $google_font_effect = '&effect='.implode('|', array_values($google_font_effect));
      }
      if(empty($google_font_jp_effect)){
        $google_font_jp_effect = '';
      }else{
        $google_font_jp_effect = '&effect='.implode('|', array_values($google_font_jp_effect));
      }


      $earlyaccess = array('Hannari','Kokoro','Nikukyu','Nico Moji','Noto Sans Japanese','Noto Sans JP');





      if( $google_font_body_jp != 'none'){
        if(in_array($google_font_body_jp, $earlyaccess)){
          wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_body_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_body_jp )).'.css',array(),null );
        }else{
          wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_body_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_body_jp ).$google_font_jp_effect,array(),null );
        }
        $return_font[0] = '"'.$google_font_body_jp.'"';
      }else if($font_body_jp != 'none'){
        $return_font[0] = $font_body_jp;
      }else if($google_font_body != 'none'){
        wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_body), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_body).$google_font_effect,array(),null);
        $return_font[0] = '"'.$google_font_body.'"';
      }else if(get_theme_mod( 'simple_days_font_body','none') != 'none'){
        $return_font[0] = get_theme_mod( 'simple_days_font_body');
      }

      if( $google_font_headings_jp != 'none'){
        if(in_array($google_font_headings_jp, $earlyaccess)){
         wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_headings_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_headings_jp )).'.css',array(),null );
       }else{
        wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_headings_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_headings_jp ).$google_font_jp_effect,array(),null );
      }
      $return_font[1] = '"'.$google_font_headings_jp.'"';
    }else if($font_headings_jp != 'none'){
      $return_font[1] = $font_headings_jp;
    }else if($google_font_headings != 'none'){
     wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_headings), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_headings).$google_font_headings_effect,array(),null);
     $return_font[1] = '"'.$google_font_headings.'"';
   }else if(get_theme_mod( 'simple_days_font_headings','none') != 'none'){
    $return_font[1] = get_theme_mod( 'simple_days_font_headings');
  }

  if( $google_font_site_title_jp != 'none'){
    if(in_array($google_font_site_title_jp, $earlyaccess)){
      wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_site_title_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_site_title_jp )).'.css',array(),null );
    }else{
      wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_site_title_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_site_title_jp ).$google_font_jp_effect,array(),null );
    }
    $return_font[2] = '"'.$google_font_site_title_jp.'"';
  }else if($font_site_title_jp != 'none'){
    $return_font[2] = $font_site_title_jp;
  }else if($google_font_site_title != 'none'){
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_site_title), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_site_title).$google_font_effect,array(),null);
    $return_font[2] = '"'.$google_font_site_title.'"';
  }else if(get_theme_mod( 'simple_days_font_site_title','none') != 'none'){
    $return_font[2] = get_theme_mod( 'simple_days_font_site_title');
  }

  if( $google_font_post_title_jp != 'none'){
    if(in_array($google_font_post_title_jp, $earlyaccess)){
      wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_post_title_jp ), 'https://fonts.googleapis.com/earlyaccess/'.strtolower(str_replace( " ", "", $google_font_post_title_jp )).'.css',array(),null );
    }else{
      wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_post_title_jp ), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_post_title_jp ).$google_font_jp_effect,array(),null );
    }
    $return_font[3] = '"'.$google_font_post_title_jp.'"';
  }else if($font_post_title_jp != 'none'){
    $return_font[3] = $font_post_title_jp;
  }else if($google_font_post_title != 'none'){
    wp_enqueue_style( 'google_webfont_'.str_replace( " ", "_", $google_font_post_title), 'https://fonts.googleapis.com/css?family='.str_replace( " ", "+", $google_font_post_title).$google_font_effect,array(),null);
    $return_font[3] = '"'.$google_font_post_title.'"';
  }else if(get_theme_mod( 'simple_days_font_post_title','none') != 'none'){
    $return_font[3] = get_theme_mod( 'simple_days_font_post_title');
  }

  return $return_font;
}
endif;

if ( ! function_exists( 'simple_days_popular_posts' ) ) :
  function simple_days_popular_posts($post_id) {
    $period_name = array('all','yearly','monthly','weekly','daily');
    $count_key = '_simple_days_popular_posts_count_';
    $period_key = '_simple_days_popular_posts_period_';
    //var_dump($count_key);
    $period_value = array(
      'all' => 10,
      'yearly' => date('Y'),
      'monthly' => date('Y').date('n'),
      'weekly' => date('Y').date('W'),
      'daily' => date('Y').date('n').date('j'),
    );
    
    $post_meta_value = get_post_meta($post_id, $count_key.'all', true);
    //var_dump($post_meta_value);
    
    if (empty($post_meta_value) || !isset($post_meta_value)) {
     $count_value = 1;
	  //$add_value['all'] = [];
     foreach ($period_name as $key) {
       add_post_meta($post_id, $count_key.$key, $count_value);
       add_post_meta($post_id, $period_key.$key, $period_value[$key]);
     }
   } else {
    foreach ($period_name as $key) {
     $period_old_value = get_post_meta($post_id, $period_key.$key, true);
     if($period_old_value != $period_value[$key]){
      
      $count_value = 1;
      update_post_meta($post_id, $period_key.$key, $period_value[$key]);
    }else{
      
      $count_value = get_post_meta($post_id, $count_key.$key, true) + 1;
    }
    update_post_meta($post_id, $count_key.$key, $count_value);
  }
}

/*
		// Show view the count for testing purposes (add "?show_count=1" onto the URL)
		if ( isset($_GET['show_count']) && intval($_GET['show_count']) == 1 ) {
			echo '<p style="color:red; text-align:center; margin:1em 0;">';
			echo get_post_meta( $post->ID, $custom_field, true );
			echo ' views of this post</p>';
		}*/
  }

endif;

if ( ! function_exists( 'simple_days_comment_author_anchor' ) ) :
  function simple_days_comment_author_anchor( $author_link ){
    return str_replace( "<a", "<a target='_blank'", $author_link );
  }
endif;
add_filter( "get_comment_author_link", "simple_days_comment_author_anchor" );

if ( ! function_exists( 'simple_days_comment' ) ) :
  function simple_days_comment($comment, $args, $depth) { ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
      <div class="comment_body" itemscope itemtype="https://schema.org/UserComments">
        <div class="comment_metadata">
          <span class="fn" itemprop="creator" itemscope itemtype="https://schema.org/Person"><?php echo get_comment_author_link(); ?></span>
          <time><?php comment_date(get_option( 'date_format' )); ?></time>
          <span class="comment_reply">
            <?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-reply" aria-hidden="true"></i> '.__('Reply', 'simple-days'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </span>
          <span class="comment_edit">
            <?php edit_comment_link('<i class="fa fa-pencil" aria-hidden="true"></i> '.__('Edit', 'simple-days'),'  ','') ?>
          </span>
        </div>
        <div class="comment_main">
          <div class="comment_avatar">
            <?php echo get_avatar( $comment->comment_author_email, 100 ); ?>
          </div>
          <div class="comment_text" itemprop="commentText">
            <?php comment_text() ?>
          </div>

        </div>
        <?php if ($comment->comment_approved == '0') : ?>
          <span><?php esc_html_e('*Your comment is awaiting moderation.*', 'simple-days') ?></span>
        <?php endif; ?>
      </div>
    </li>
  <?php }
endif;

if ( ! function_exists( 'simple_days_add_quicktags' ) ) :
  function simple_days_add_quicktags() {

   if (wp_script_is('quicktags')){
    ?>
  <script type="text/javascript">
   QTags.addButton( 'heading-2', '<?php esc_html_e( 'h2', 'simple-days' ); ?>', '<h2>', '</h2>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>2', 1001 );
   QTags.addButton( 'heading-3', '<?php esc_html_e( 'h3', 'simple-days' ); ?>', '<h3>', '</h3>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>3', 1002 );
   QTags.addButton( 'heading-4', '<?php esc_html_e( 'h4', 'simple-days' ); ?>', '<h4>', '</h4>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>4', 1003 );
   QTags.addButton( 'heading-5', '<?php esc_html_e( 'h5', 'simple-days' ); ?>', '<h5>', '</h5>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>5', 1004 );
   QTags.addButton( 'heading-6', '<?php esc_html_e( 'h6', 'simple-days' ); ?>', '<h6>', '</h6>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>6', 1005 );
   QTags.addButton( 'notification-info', '<?php esc_html_e( 'BOX (info)', 'simple-days' ); ?>', '<div class="alert_box_s_d info_s_d simple_days_box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1010 );
   QTags.addButton( 'notification-success', '<?php esc_html_e( 'BOX (Success)', 'simple-days' ); ?>', '<div class="alert_box_s_d success_s_d simple_days_box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1011 );
   QTags.addButton( 'notification-alert', '<?php esc_html_e( 'BOX (Warning)', 'simple-days' ); ?>', '<div class="alert_box_s_d warning_s_d simple_days_box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1012 );
   QTags.addButton( 'notification-danger', '<?php esc_html_e( 'BOX (Danger)', 'simple-days' ); ?>', '<div class="alert_box_s_d danger_s_d simple_days_box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1013 );
   <?php if( get_theme_mod( 'simple_days_highlight' , false)){ ?>
     QTags.addButton( 'pre-code', '<?php esc_html_e( 'pre code', 'simple-days' ); ?>', '<pre><code>', '</code></pre>', '', '<?php esc_html_e( 'Code', 'simple-days' ); ?>', 1020 );
   <?php } ?>
 </script>
 <?php
}
}
endif;
add_action( 'admin_print_footer_scripts', 'simple_days_add_quicktags' );

if ( ! function_exists( 'simple_days_add_editor_styles' ) ) :
  function simple_days_add_editor_styles() {
    
    add_editor_style( 'assets/css/custom-editor-style.css' );

    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
      add_filter( 'mce_buttons', 'simple_days_tiny_mce_register_buttons' );
      add_filter( 'mce_external_plugins', 'simple_days_tiny_mce_register_script' );
    }
  }
endif;
add_action( 'admin_init', 'simple_days_add_editor_styles' );

if ( ! function_exists( 'simple_days_tiny_mce_register_script' ) ) :
  function simple_days_tiny_mce_register_script( $plugins ) {
    $plugins['simple_days_alert_plugin'] = SIMPLE_DAYS_THEME_URI . '/assets/js/tinymce/tiny-mce.js';
    return $plugins;
  }
endif;

if ( ! function_exists( 'simple_days_tiny_mce_register_buttons' ) ) :
  function simple_days_tiny_mce_register_buttons( $buttons ) {
    $newBtns = array(
      'simpledaysalertlist'
    );
    $buttons = array_merge( $buttons, $newBtns );
    return $buttons;
  }
endif;










if ( ! function_exists( 'simple_days_gutenberg_allowed_block_types' ) ) :
  function simple_days_gutenberg_allowed_block_types( $allowed_blocks, $post ) {

    get_template_part( 'inc/gutenberg_block', 'list' );
    $gutenberg_block = get_query_var('gutenberg_block_list');
    $allowed_blocks = array();

    foreach ($gutenberg_block['core_list'] as $key => $value) {
      if(get_theme_mod( 'simple_days_gutenberg_block_'.$key, true))$allowed_blocks[] = 'core/'.$key;
    }
    foreach ($gutenberg_block['embed_list'] as $key => $value) {
      if(get_theme_mod( 'simple_days_gutenberg_block_'.$key, true))$allowed_blocks[] = 'core-embed/'.$key;
    }

    if( $post->post_type === 'page' ) {

    }
    return $allowed_blocks;

  }
//add_filter( 'allowed_block_types', 'simple_days_gutenberg_allowed_block_types', 10, 2 );
endif;





if ( ! function_exists( 'simple_days_gutenberg_editor_styles' ) ) :
  
  function simple_days_gutenberg_editor_styles() {
    wp_enqueue_style( 'simple_days_gutenberg_editor_styles', SIMPLE_DAYS_THEME_URI . '/assets/css/gutenberg-editor-style.min.css',array( 'wp-edit-blocks' ) );
    wp_enqueue_style( 'simple_days_gutenberg_front_styles', SIMPLE_DAYS_THEME_URI . '/assets/css/gutenberg-front-one-column-style.min.css',array( 'wp-edit-blocks' ) );
    wp_enqueue_style('font-awesome4', SIMPLE_DAYS_THEME_URI . '/assets/fonts/fontawesome/style.min.css', array(), null);
  }
endif;
add_action( 'enqueue_block_editor_assets', 'simple_days_gutenberg_editor_styles' );

if ( ! function_exists( 'simple_days_gutenberg_front_styles' ) ) :
  function simple_days_gutenberg_front_styles() {
    if(get_theme_mod( 'simple_days_sidebar_layout','3') == '0' || !is_active_sidebar( 'sidebar-1' )){
      wp_enqueue_style( 'simple_days_gutenberg_front_styles', SIMPLE_DAYS_THEME_URI . '/assets/css/gutenberg-front-one-column-style.min.css',array( 'wp-blocks','simple_days_style' ) );
    }else{
      wp_enqueue_style( 'simple_days_gutenberg_front_styles', SIMPLE_DAYS_THEME_URI . '/assets/css/gutenberg-front-style.min.css',array( 'wp-blocks','simple_days_style' ) );
    }
    
    wp_enqueue_script( 'fitvids',SIMPLE_DAYS_THEME_URI . '/assets/js/gutenberg/jquery.fitvids.js', array('jquery'), null, true);
    add_action('wp_footer', 'simple_days_fitvids');
  }
endif;
add_action( 'enqueue_block_assets', 'simple_days_gutenberg_front_styles' );

if ( ! function_exists( 'simple_days_fitvids' ) ) :
  function simple_days_fitvids() {
    echo '<script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery(".wp-block-embed-vimeo").fitVids();
    });</script>';
  }
endif;


if (function_exists('register_block_type')) {
  
}

if ( ! function_exists( 'simple_days_customizer_css' ) ) :
  
  function simple_days_customizer_css() {
    
    if(!get_theme_mod( 'simple_days_fontawesome',false)){
      wp_enqueue_style('font-awesome4', SIMPLE_DAYS_THEME_URI . '/assets/fonts/fontawesome/style.min.css', array(), null);
    }else{
      $maxcdn = 'https://maxcdn.bootstrapcdn.com';
      wp_enqueue_style('font-awesome4_cdn', $maxcdn.'/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
    }

    wp_enqueue_style('font-icomoon', SIMPLE_DAYS_THEME_URI . '/assets/fonts/icomoon/style.min.css', array(), null);

    wp_enqueue_style( 'simple_days_customizer_css', SIMPLE_DAYS_THEME_URI . '/assets/css/customizer.min.css', array(), null );



    wp_enqueue_script(
              'simple-fontawesome-iconpicker-js', // Give the script a unique ID
              SIMPLE_DAYS_THEME_URI . '/assets/js/customizer/simple-iconpicker.min.js', // Define the path to the JS file
              array( 'jquery', 'customize-preview' ), // Define dependencies
              null, // Define a version (optional)
              true // Specify whether to put in footer (leave this true)
            );



    wp_register_script(
              'simple-fontawesome-iconpicker-simple_days', // Give the script a unique ID
              SIMPLE_DAYS_THEME_URI . '/assets/js/customizer/simple-iconpicker_simple_days.min.js', // Define the path to the JS file
              array( 'simple-fontawesome-iconpicker-js' ), // Define dependencies
              null, // Define a version (optional)
              true // Specify whether to put in footer (leave this true)
            );
    $simple_days_localize = array(
      'localize_clear' => esc_html__('Clear', 'simple-days'),
    );
    wp_localize_script( 'simple-fontawesome-iconpicker-simple_days', 'simple_days_localize', $simple_days_localize );
    wp_enqueue_script( 'simple-fontawesome-iconpicker-simple_days' );




    wp_enqueue_style( 'simple-fontawesome-iconpicker-css', SIMPLE_DAYS_THEME_URI . '/assets/css/simple-iconpicker.min.css', array(), null );

    wp_enqueue_style( 'simple_days_customizer_icon-css', SIMPLE_DAYS_THEME_URI . '/assets/fonts/customizer/style.min.css', array(), null );

    
    add_action( 'enqueue_block_assets', 'simple_days_gutenberg_front_styles' );

  }
endif;
add_action( 'customize_controls_print_styles', 'simple_days_customizer_css' );

if ( ! function_exists( 'simple_days_customizer_script' ) ) :
  
  function simple_days_customizer_script() {

  }
endif;
add_action( 'customize_register', 'simple_days_customizer_script' );

if ( ! function_exists( 'simple_days_customize_preview' ) ) :
  function simple_days_customize_preview() {

  }
endif;
add_action( 'customize_preview_init', 'simple_days_customize_preview' );





if ( ! function_exists( 'simple_days_admin_enqueue_scripts' ) ) :
  function simple_days_admin_enqueue_scripts() {
    if(get_theme_mod( 'simple_days_uploaded_to_this_post',false) != false){
      ?>
      <script type="text/javascript">jQuery(function( $ ){

       wp.media.view.Modal.prototype.on( 'open', function( ){ $( 'select.attachment-filters' ).find( '[value="uploaded"]').attr( 'selected', true ).parent().trigger('change'); });
     });
   </script>
   <?php
 }
}
endif;
add_action( 'admin_footer-post-new.php', 'simple_days_admin_enqueue_scripts' );
add_action( 'admin_footer-post.php', 'simple_days_admin_enqueue_scripts' );

if ( ! function_exists( 'simple_days_delete_blog_card_cache' ) ) :
  function simple_days_delete_blog_card_cache() {
    delete_option('simple_days_external_cache');

    delete_option('simple_days_theme_version');

    $dir = WP_CONTENT_DIR.'/uploads/simple_days_cache/';
    if ( file_exists($dir) ) {
      require_once(ABSPATH . 'wp-admin/includes/file.php');
      global $wp_filesystem;
      if ( WP_Filesystem() ) {
        if ( $wp_filesystem->is_dir($dir) ) {
          $wp_filesystem->delete($dir,true);
        }
      }
    }
    
    $allposts = get_posts( 'numberposts=-1&post_type=any&post_status=any' );
    $period_name = array('all','yearly','monthly','weekly','daily');
    foreach( $allposts as $postinfo ) {
      delete_post_meta( $postinfo->ID, '_simple_days_popular_posts_count');
      delete_post_meta( $postinfo->ID, '_simple_days_popular_posts_period');
      foreach ($period_name as $key) {
       delete_post_meta( $postinfo->ID, '_simple_days_popular_posts_count_'.$key);
       delete_post_meta( $postinfo->ID, '_simple_days_popular_posts_period_'.$key);
     }
   }
 }
endif;
add_action('switch_theme', 'simple_days_delete_blog_card_cache');


if (is_amp()){
  if ( ! function_exists( 'simple_days_head_amp_custom_start' ) ) :
    
    function simple_days_head_amp_custom_start() {
      ob_start( 'simple_days_head_amp_custom_replace' );
    }
  endif;

  if ( ! function_exists( 'simple_days_head_amp_custom_replace' ) ) :
    function simple_days_head_amp_custom_replace($buffer) {
      $buffer = str_replace("id='amp-custom-inline-css'", "amp-custom", $buffer);
      $buffer = preg_replace('/<link (.*?)type=\"text\/css\"(.*?)>/i', '', $buffer);
      return $buffer;
    }
  endif;

  if ( ! function_exists( 'simple_days_head_amp_custom_end' ) ) :
    function simple_days_head_amp_custom_end() {
      ob_end_flush();
    }
  endif;
  add_action( 'wp_head', 'simple_days_head_amp_custom_start', 0 );
  add_action( 'wp_head', 'simple_days_head_amp_custom_end', 100 );

  if ( ! function_exists( 'simple_days_head_amp_footer_start' ) ) :
    
    function simple_days_head_amp_footer_start() {
      ob_start( 'simple_days_head_amp_footer_replace' );
    }
  endif;

  if ( ! function_exists( 'simple_days_head_amp_footer_replace' ) ) :
    function simple_days_head_amp_footer_replace($buffer) {
      $buffer = preg_replace('/<script type=\"text\/javascript\">(.*?)<\/script>/is', '', $buffer);
      $buffer = preg_replace('/<link rel=\"style(.*?)>/is', '', $buffer);
      return $buffer;
    }
  endif;

  if ( ! function_exists( 'simple_days_head_amp_footer_end' ) ) :
    function simple_days_head_amp_footer_end() {
      ob_end_flush();
    }
  endif;

  add_action( 'wp_footer', 'simple_days_head_amp_footer_start', 0 );
  add_action( 'wp_footer', 'simple_days_head_amp_footer_end', 100 );

  if ( ! function_exists( 'simple_days_TagCloud_slug_class' ) ) :
    
    function simple_days_TagCloud_slug_class( $taglinks ) {
      $taglinks = preg_replace( '/ style="(.*?)"/i', '', $taglinks );
      return $taglinks;
    }
  endif;

  add_filter ( 'wp_tag_cloud', 'simple_days_TagCloud_slug_class' );

  if ( ! function_exists( 'simple_days_remove_widgets_style' ) ) :
    
    function simple_days_remove_widgets_style() {
      global $wp_widget_factory;
      remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
    }
  endif;

  add_action( 'widgets_init', 'simple_days_remove_widgets_style' );

  if ( ! function_exists( 'simple_days_head_amp_custom_comment_avatar' ) ) :
    
    function simple_days_head_amp_custom_comment_avatar($get_avatar) {
      $get_avatar = preg_replace( '/<img (.*?)>/i', '<amp-img $1></amp-img>', $get_avatar );
      return $get_avatar;
    }
  endif;


  if ( ! function_exists( 'simple_days_head_amp_custom_comment_reply_link' ) ) :
    
    function simple_days_head_amp_custom_comment_reply_link($comment_reply_link) {
      $comment_reply_link = preg_replace( '/ onclick=\'(.*?)\'/i', '', $comment_reply_link );
      return $comment_reply_link;
    }
  endif;

  add_filter( 'comment_reply_link', 'simple_days_head_amp_custom_comment_reply_link' );

  
  if (!is_user_logged_in()){

    if ( ! function_exists( 'simple_days_disable_script' ) ) :
     function simple_days_disable_script() {
       add_filter( 'get_avatar', 'simple_days_head_amp_custom_comment_avatar' );
       add_filter( 'cancel_comment_reply_link', '__return_false' );

       remove_action('wp_head', 'wp_resource_hints', 2);
       remove_action('wp_head', 'print_emoji_detection_script', 7);
       remove_action('admin_print_scripts', 'print_emoji_detection_script');
       remove_action('wp_print_styles', 'print_emoji_styles' );
       remove_action('admin_print_styles', 'print_emoji_styles');
       remove_action('wp_head', 'rest_output_link_wp_head');
       remove_action('wp_head', 'wp_oembed_add_discovery_links');
       remove_action('wp_head', 'wp_oembed_add_host_js');
       remove_action('wp_head', 'feed_links', 2);
       remove_action('wp_head', 'feed_links_extra', 3);
       remove_action('wp_head', 'rsd_link');
       remove_action('wp_head', 'wlwmanifest_link');
       remove_action('wp_head', 'wp_generator');
       remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
       remove_action('wp_head', 'rel_canonical');
       remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

       remove_action( 'wp_footer', 'wp_print_footer_scripts' );
     }
   endif;
   add_action( 'init', 'simple_days_disable_script',999999999999);
 }
}


