<!DOCTYPE html>
<html <?php if ( is_amp()) echo '⚡ '; language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width,<?php if ( is_amp()): ?>minimum-scale=1,<?php endif; ?>initial-scale=1">
  <?php if ( is_amp()): get_template_part( 'inc/amp','head' ); endif;
  if ( !is_amp() && get_theme_mod( 'simple_days_amp',false) ): ?>
    <link rel="amphtml" href="<?php global $wp; echo esc_url(home_url( add_query_arg( array(), $wp->request ) )); ?>?amp=1" />
<?php endif;
if ( get_option('blog_public') != '0' && !is_amp() && get_theme_mod( 'simple_days_no_robots', true ) && (is_404() || is_tag() ||  is_day() || is_year() || is_month() || is_search()))echo '<meta name="robots" content="noindex,follow" />';
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php
  $ga_acount = (get_theme_mod( 'simple_days_amp_analytics','') != '') ? get_theme_mod( 'simple_days_amp_analytics','') : get_theme_mod( 'simple_days_ga_analytics_id','');
  if(is_amp() && $ga_acount != ''){ ?>
    <amp-analytics type="googleanalytics">
      <script type="application/json">
        {
          "vars": {
          "account": "<?php echo esc_attr($ga_acount) ?>"
          },
          "triggers": {
              "trackPageview": {
              "on": "visible",
              "request": "pageview"
            }
          }
        }
    </script>
    </amp-analytics>
  <?php
  } ?>


<div id="h_wrap" class="simple_days_box_shadow h_sticky">
  <input id="t_menu" class="dn" type="checkbox" />
  <?php
  $mod = get_theme_mod( 'simple_days_tagline_position','none');
  //over header widget
  if( is_active_sidebar( 'over_header_left' ) || is_active_sidebar( 'over_header_right' ))  get_template_part( 'template-parts/header','over' );
  ?>
  <div id="h_flex">
    <header id="site_h" role="banner">
      <div class="container sh_con">
        <div class="a_w">
          <div class="title_wrap">
            <div class="t_menu_d">
            <?php
            if ( is_active_nav_menu('primary')) {  ?><label for="t_menu" class="humberger tap_no"></label><?php } ?>
            </div>
            <div class="title_tag">
            <?php if($mod == "top" || $mod == "left") echo '<div class="tagline"><span>'.get_bloginfo('description').'</span></div>'; ?>

              <div class="site_title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="" rel="home">
          <?php if ( has_custom_logo() ) : ?>

              <?php $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
              if ( is_amp() ):
                if (get_theme_mod( 'simple_days_amp_logo_img',esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/amp-logo.png')) != esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/amp-logo.png')){
                  $amp_logo_id = attachment_url_to_postid( get_theme_mod( 'simple_days_amp_logo_img') );
                  $image = wp_get_attachment_image_src( $amp_logo_id, 'full' );
                }
              endif; ?>
              <<?php echo ( is_amp() ? 'amp-img layout="intrinsic"':'img'); ?> src="<?php echo esc_url( $image[0] ); ?>" class="header_logo" width="<?php echo absint( $image[1] ); ?>" height="<?php echo absint( $image[2] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />


            <?php else:
              $site_title_effects = '';
              if((get_theme_mod( 'simple_days_font_site_title_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_body_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google_jp', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_jp_effects_1', 'none' ) != 'none'){
                $site_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_jp_effects_1');
              }elseif((get_theme_mod( 'simple_days_font_site_title_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_body_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_effects_1', 'none' ) != 'none'){
                $site_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_effects_1');
              }
            ?>
            <?php if ( is_front_page() && is_home() ) : ?>
              <h1 class="title_text<?php echo $site_title_effects ; ?>"><?php bloginfo( 'name' ); ?></h1>
            <?php else : ?>
              <p class="title_text<?php echo $site_title_effects ; ?>"><?php bloginfo( 'name' ); ?></p>
            <?php endif; ?>
            <?php endif; ?>
            </a></div>
            <?php if($mod == "bottom" || $mod == "right") echo '<div class="tagline"><span>'.get_bloginfo('description').'</span></div>'; ?>
             </div>
             <div class="t_menu_d">
         <?php if (get_theme_mod( 'simple_days_mobile_header_search',true)){ ?>
              <label for="t_search" class="search_m tap_no"><i class="fa fa-search serch_icon" aria-hidden="true"></i></label>
        <?php } ?>
            </div>
          </div>

      <?php
    if(is_amp() && !is_ssl()){}else{
      ?>
      <input id="t_search" class="dn" type="checkbox" />
      <div id="h_search">
        <form role="search" method="get" class="search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if ( is_amp() ){ ?>target="_top"<?php } ?>>
          <input type="search" id="search-form-header" class="search_field" placeholder="<?php esc_attr_e( 'Search', 'simple-days' ) ?>" value="<?php echo get_search_query(); ?>" name="s" />
          <button type="submit" class="search_submit opa7"><i class="fa fa-search serch_icon" aria-hidden="true"></i></button>
        </form>
      </div>
    <?php } $mod = get_theme_mod( 'simple_days_menu_layout','1');

    if( is_active_sidebar( 'header_widget' )){
      //if($mod == "2")echo '<div></div>';
      ?>
      <div class="h_widget">
       <?php dynamic_sidebar( 'header_widget' ); ?>
     </div>
     <?php
     if(($mod == "1" || $mod == "2") && is_active_nav_menu('primary'))echo '<div class="m_box"></div>';
   } ?>


        </div>

      </div>

    </header>
    <nav id="nav_h" class="nav_base<?php if($mod == "3" || $mod == "4")echo ' nav_h2'; ?>">
      <div class="container nh_con">
      <?php wp_nav_menu( array(
       'theme_location'  => 'primary',
       'menu_class'      => 'menu_base',
       'menu_id'         => 'menu_h',
       'container'       => 'ul',
       
     ));
     ?>
      </div>
    </nav>

  </div>
</div>
<?php
if ( is_active_nav_menu('sub')) { ?>
<div id="s_menu" class="simple_days_box_shadow">
  <div class="container">
    <nav id="nav_s">
      <?php wp_nav_menu( array(
       'theme_location'  => 'sub',
       'menu_class'      => 'o_s_t',
       'menu_id'         => 'menu_s',
       'container'       => 'ul',
       'fallback_cb'     => '__return_false'
     ));
     ?>
    </nav>
  </div>
</div>
<?php
}
?>




<?php




//alert box
if( get_theme_mod( 'simple_days_alert_box',false) ) get_template_part( 'template-parts/header','alertbox' );
//Header image
if( is_home() && get_header_image() ) get_template_part( 'template-parts/header','image' );

function is_active_nav_menu($location){
 if(has_nav_menu($location)){
   $locations = get_nav_menu_locations();
   $menu = wp_get_nav_menu_items($locations[$location]);
   if(!empty($menu)){
     return true;
   }
 }else if($location != 'sub'){
   $menu = get_pages();
   if(!empty($menu)){
     return true;
   }
 }
 return false;
}
