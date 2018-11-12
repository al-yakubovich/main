<?php
defined('ABSPATH') or die("Please don't run this script.");
/**
 * Build Style
 *
 * @package Simple Days
 */

require_once( ABSPATH . 'wp-admin/includes/file.php' );
WP_Filesystem();
global $wp_filesystem;


$maintenance_string = '<?php $upgrading = ' . time() . '; ?>';
$maintenance_file = $wp_filesystem->abspath() . '.maintenance';
$wp_filesystem->put_contents($maintenance_file,$maintenance_string, FS_CHMOD_FILE);





$css = $skin_color = array();


$skin = get_theme_mod('simple_days_skin_style','none');
if(get_theme_mod('simple_days_skin_style_random',false)) $skin = 'none';
if($skin != 'none') $skin_color = get_skin_color($skin);

$content_file_dir = SIMPLE_DAYS_THEME_DIR .'/assets/css/core/';



$css[0] =  $wp_filesystem->get_contents( $content_file_dir.'000_base.min.css' );
if ($css[0] == ''){
  require_once( ABSPATH . 'wp-load.php' );
  $css_remote = wp_remote_get( $content_file_dir.'000_base.min.css' );
  $css[0] = $css_remote['body'];
}



$css[10] = $wp_filesystem->get_contents( $content_file_dir.'010_body.min.css' );
if ($css[10] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'010_body.min.css' );
  $css[10] = $css_remote['body'];
}


$mod = get_theme_mod('simple_days_font_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[4];
if ( ! empty( $mod ) ) {
  $css[10] = str_replace( '#555',$mod,$css[10]);
}


$mod = get_theme_mod('simple_days_background_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[4];
if ( ! empty( $mod ) ) {
  $css[10] = str_replace( '#fafafa',$mod,$css[10]);
}


$font_body = $font_headings = $font_site_title = $font_post_title = '';

$google_font_body_jp = get_theme_mod( 'simple_days_font_body_google_jp','none');
$font_body_jp = get_theme_mod( 'simple_days_font_body_jp','none');
$google_font_body = get_theme_mod( 'simple_days_font_body_google','none');
if( $google_font_body_jp != 'none'){
  $font_body = '"'.$google_font_body_jp.'"';
}else if($font_body_jp != 'none'){
  $font_body = $font_body_jp;
}else if($google_font_body != 'none'){
  $font_body = $google_font_body;
}else if(get_theme_mod( 'simple_days_font_body','none') != 'none'){
  $font_body = get_theme_mod( 'simple_days_font_body');
}

$google_font_headings_jp = get_theme_mod( 'simple_days_font_headings_google_jp','none');
$font_headings_jp = get_theme_mod( 'simple_days_font_headings_jp','none');
$google_font_headings = get_theme_mod( 'simple_days_font_headings_google','none');
if( $google_font_headings_jp != 'none'){
  $font_headings = '"'.$google_font_headings_jp.'"';
}else if($font_headings_jp != 'none'){
  $font_headings = $font_headings_jp;
}else if($google_font_headings != 'none'){
  $font_headings = $google_font_headings;
}else if(get_theme_mod( 'simple_days_font_headings','none') != 'none'){
  $font_headings = get_theme_mod( 'simple_days_font_headings');
}

$google_font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_google_jp','none');
$font_site_title_jp = get_theme_mod( 'simple_days_font_site_title_jp','none');
$google_font_site_title = get_theme_mod( 'simple_days_font_site_title_google','none');
if( $google_font_site_title_jp != 'none'){
  $font_site_title = '"'.$google_font_site_title_jp.'"';
}else if($font_site_title_jp != 'none'){
  $font_site_title = $font_site_title_jp;
}else if($google_font_site_title != 'none'){
  $font_site_title = $google_font_site_title;
}else if(get_theme_mod( 'simple_days_font_site_title','none') != 'none'){
  $font_site_title = get_theme_mod( 'simple_days_font_site_title');
}

$google_font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_google_jp','none');
$font_post_title_jp = get_theme_mod( 'simple_days_font_post_title_jp','none');
$google_font_post_title = get_theme_mod( 'simple_days_font_post_title_google','none');
if( $google_font_post_title_jp != 'none'){
  $font_post_title = '"'.$google_font_post_title_jp.'"';
}else if($font_post_title_jp != 'none'){
  $font_post_title = $font_post_title_jp;
}else if($google_font_post_title != 'none'){
  $font_post_title = $google_font_post_title;
}else if(get_theme_mod( 'simple_days_font_post_title','none') != 'none'){
  $font_post_title = get_theme_mod( 'simple_days_font_post_title');
}

if($font_body != ''){
  $css[10] = str_replace( 'body{','body{font-family:'.$font_body.';',$css[10]);
}

if($font_headings != ''){
  $css[10] = $css[10].'h1,h2,h3,h4,h5,h6{font-family:'.$font_headings.';}';
}






$css[20] = $wp_filesystem->get_contents( $content_file_dir.'020_link.min.css' );
if ($css[20] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'020_link.min.css' );
  $css[20] = $css_remote['body'];
}

$mod = get_theme_mod('link_textcolor');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[20] = str_replace( '#07a',$mod,$css[20]);
}


$mod = get_theme_mod('link_hover_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[2];
if ( ! empty( $mod ) ) {
  $css[20] = str_replace( '#222',$mod,$css[20]);
}


$css[25] = $wp_filesystem->get_contents( $content_file_dir.'025_heading.min.css' );
if ($css[25] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'025_heading.min.css' );
  $css[25] = $css_remote['body'];
}


$css[30] = $wp_filesystem->get_contents( $content_file_dir.'030_wp_base.min.css' );
if ($css[30] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'030_wp_base.min.css' );
  $css[30] = $css_remote['body'];
}


$border_angle = array('top' , 'right' , 'bottom' , 'left');
$side_footer = array('sidebar' => '#sidebar','footer' => '#site_f');
foreach ($side_footer as $s_f_name => $s_f_c_name) {

  $mod = get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_text_size',18);
  if( ! empty( $mod ) ) $css[30] =  str_replace( $s_f_c_name.' .widget_title{font-size:18',$s_f_c_name.' .widget_title{font-size:'.$mod,$css[30]);

  $mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_text_color');
  if ( ! empty( $mod ) ) $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{color:'.$mod.';',$css[30]);

  $mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_text_position','left');
  if ( $mod != 'left' ) $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{text-align:'.$mod.';',$css[30]);

  $mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_background_color');
  if ( ! empty( $mod ) ) $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{background:'.$mod.';',$css[30]);

  foreach ($border_angle as $value) {
    $mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_'.$value.'_style','none');
    if($mod != 'none'){
      $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{border-'.$value.':'.$mod.' '.get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_'.$value.'_width',1).'px '.get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_'.$value.'_color').';',$css[30]);
    }
  }

  
  $p_m = array('padding','margin');
  foreach ($p_m as $value) {
    $mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_top',0);
    $mod2 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_right',0);
    $mod3 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_bottom',0);
    $mod4 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_'.$value.'_left',0);

    if($mod + $mod2 + $mod3 + $mod4 != 0){
      if($mod != 0)$mod = $mod.'px';
      if($mod2 != 0)$mod2 = $mod2.'px';
      if($mod3 != 0)$mod3 = $mod3.'px';
      if($mod4 != 0)$mod4 = $mod4.'px';
      if($value == 'margin')$css[30] = str_replace( 'margin-bottom:10px}','}',$css[30]);
      if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
        $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{'.$value.':'.$mod.';',$css[30]);
      }elseif($mod == $mod3 && $mod2 == $mod4){
        $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{'.$value.':'.$mod.' '.$mod2.';',$css[30]);
      }elseif($mod != $mod3 && $mod2 == $mod4){
        $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[30]);
      }else{
        $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[30]);
      }
    }

  }


  
  $mod = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_top_left',0);
  $mod2 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_top_right',0);
  $mod3 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_bottom_left',0);
  $mod4 = get_theme_mod('simple_days_widget_title_'.$s_f_name.'_border_radius_bottom_right',0);

  if($mod + $mod2 + $mod3 + $mod4 != 0){
    if($mod != 0)$mod = $mod.'px';
    if($mod2 != 0)$mod2 = $mod2.'px';
    if($mod3 != 0)$mod3 = $mod3.'px';
    if($mod4 != 0)$mod4 = $mod4.'px';
    if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
      $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{border-radius:'.$mod.';',$css[30]);
    }elseif($mod == $mod3 && $mod2 == $mod4){
      $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{border-radius:'.$mod.' '.$mod2.';',$css[30]);
    }elseif($mod != $mod3 && $mod2 == $mod4){
      $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[30]);
    }else{
      $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[30]);
    }
  }

  if(get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon',false)){
    $css[30] =  str_replace( $s_f_c_name.' .widget_title{',$s_f_c_name.' .widget_title{position:relative;',$css[30]);
    $css[30] =  $css[30].$s_f_c_name.' .widget_title:after{position:absolute;content:\'\';top:100%;left:'.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_position',30).'px;border:'.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_width',15).'px solid transparent;border-top:'.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_height',15).'px solid '.get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon_color').';width:0;height:0;}';


  }



}








if($skin != 'none'){
  $css[30] = str_replace( 'blockquote{background:#fafafa;border:1px solid #eee','blockquote{background:#fafafa;border:1px solid '.$skin_color[1],$css[30]);
  $css[30] = str_replace( 'blockquote{background:#fafafa','blockquote{background:'.$skin_color[5],$css[30]);
  $css[30] = str_replace( 'table,th,td{border:1px solid #eee','table,th,td{border:1px solid '.$skin_color[1],$css[30]);
  $css[30] = str_replace( 'tbody tr:nth-child(odd){background:#eee','tbody tr:nth-child(odd){background:'.$skin_color[5],$css[30]);
  $css[30] = str_replace( 'input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="number"],input[type="tel"],input[type="range"],input[type="date"],input[type="month"],input[type="week"],input[type="time"],input[type="datetime"],input[type="datetime-local"],input[type="color"],textarea{color:#555;background:#fff;border:1px solid #eee','input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="number"],input[type="tel"],input[type="range"],input[type="date"],input[type="month"],input[type="week"],input[type="time"],input[type="datetime"],input[type="datetime-local"],input[type="color"],textarea{color:#555;background:#fff;border:1px solid '.$skin_color[1],$css[30]);
  $css[30] = str_replace( 'button,input[type="button"],input[type="submit"]{background:#333','button,input[type="button"],input[type="submit"]{background:'.$skin_color[1],$css[30]);
  $css[30] = $css[30].'button:hover,input[type="button"]:hover,input[type="submit"]:hover{background:'.$skin_color[3].'}';



  $css[30] = str_replace( '.widget_calendar tbody a{background:#07a;color:#fff','.widget_calendar tbody a{background:#07a;color:'.$skin_color[11],$css[30]);

  $css[30] = str_replace( '.widget_calendar tbody a{background:#07a','.widget_calendar tbody a{background:'.$skin_color[1],$css[30]);
  $css[30] = str_replace( '.widget_calendar tbody a:hover,.widget_calendar tbody a:focus{background:#222','.widget_calendar tbody a:hover,.widget_calendar tbody a:focus{background:'.$skin_color[2],$css[30]);
  $css[30] = str_replace( '.search_field{border:solid 1px #eee','.search_field{border:solid 1px '.$skin_color[1],$css[30]);

  $css[30] = str_replace( '.search_submit{background:#333;color:#fff','.search_submit{background:#333;color:'.$skin_color[11],$css[30]);
  $css[30] = str_replace( '.search_submit{background:#333','.search_submit{background:'.$skin_color[1],$css[30]);

  $css[30] = str_replace( '.wp-caption{border:1px solid #eee;background:#fafafa','.wp-caption{border:1px solid #eee;background:'.$skin_color[4],$css[30]);
  $css[30] = str_replace( '.wp-caption{border:1px solid #eee','.wp-caption{border:1px solid '.$skin_color[1],$css[30]);


  $css[30] = str_replace( '.page-links>span{background:#333;color:#fff','.page-links>span{background:#333;color:'.$skin_color[11],$css[30]);
  $css[30] = str_replace( '.page-links>span{background:#333','.page-links>span{background:'.$skin_color[1],$css[30]);
  $css[30] = str_replace( '.page-links a,.page-links>span{border:1px solid #eee','.page-links a,.page-links>span{border:1px solid '.$skin_color[1],$css[30]);



}






$css[40] = $wp_filesystem->get_contents( $content_file_dir.'040_sd_base.min.css' );
if ($css[40] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'040_sd_base.min.css' );
  $css[40] = $css_remote['body'];
}

if (get_theme_mod( 'simple_days_header_shadow',false)) {
  $css[40] = str_replace( '#h_wrap{','#h_wrap{-webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);-webkit-border-radius:2px;border-radius:2px;',$css[40]);
}


$mod = get_theme_mod('simple_days_logo_image_height');
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '.header_logo{max-width:300px;max-height:60','.header_logo{max-width:300px;max-height:'.$mod,$css[40]);
}
$mod = get_theme_mod('simple_days_logo_image_width');
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '.header_logo{max-width:300','.header_logo{max-width:'.$mod,$css[40]);
}


$mod = get_theme_mod('blog_name');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
if(! empty( $mod ) && $font_site_title != ''){
  $css[40] = str_replace( '.title_text{','.title_text{font-family:'.$font_site_title.';color:'.$mod.';',$css[40]);
  //$css[40] = $css[40].'.site_title a{font-family:'.$font_site_title.';color:'.$mod.'}';
}elseif(empty( $mod ) && $font_site_title != ''){
  $css[40] = str_replace( '.title_text{','.title_text{font-family:'.$font_site_title.';',$css[40]);
  //$css[40] = $css[40].'.site_title a{font-family:'.$font_site_title.'}';
}elseif(!empty( $mod ) && $font_site_title == ''){
  $css[40] = str_replace( '.title_text{','.title_text{color:'.$mod.';',$css[40]);
  //$css[40] = $css[40].'.site_title a{color:'.$mod.'}';
}

  //if ( !is_active_sidebar( 'footer-1' ) && !is_active_sidebar( 'footer-2' ) && !is_active_sidebar( 'footer-3' )){
    //$css[40] = str_replace( '.f_widget_wrap{background:#474747;','.f_widget_wrap{background:transparent;',$css[40]);
  //}else{
$mod = get_theme_mod('footer_widget_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '.f_widget_wrap{background:#474747;','.f_widget_wrap{background:'.$mod.';',$css[40]);
}
$mod = get_theme_mod('footer_widget_textcolor');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '#d4d4d4',$mod,$css[40]);
}
$mod = get_theme_mod('footer_widget_linkcolor');
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '#222',$mod,$css[40]);
}
if($skin != 'none'){
  $css[40] = str_replace( '.f_widget_wrap a:not(.icon_base):not(.to_top):hover:not(.non_hover){color:#222','.f_widget_wrap a:not(.icon_base):not(.to_top):hover:not(.non_hover){color:'.$skin_color[2],$css[40]);
  $css[40] = str_replace( '.f_widget_wrap a:not(.icon_base):not(.to_top){color:#fff','.f_widget_wrap a:not(.icon_base):not(.to_top){color:'.$skin_color[11],$css[40]);
}



  //}


if($skin != 'none'){
  $css[40] = str_replace( '.credit_wrap{background:#33363b;color:#777','.credit_wrap{background:#33363b;color:'.$skin_color[4],$css[40]);
}
$mod = get_theme_mod('footer_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '.credit_wrap{background:#33363b','.credit_wrap{background:'.$mod,$css[40]);
}

$mod = get_theme_mod('oh_wrap_bg_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '#oh_wrap{background:#33363b','#oh_wrap{background:'.$mod,$css[40]);
}


$mod = get_theme_mod('header_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[40] = $css[40].'#h_wrap{background:'.$mod.'}';
}

$mod = get_theme_mod('header_nav_h2_bg_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '.nav_h2{background:#f1f1f1','.nav_h2{background:'.$mod,$css[40]);
}

$mod = get_theme_mod('f_menu_wrap_bg_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '.f_menu_wrap{background:#f1f1f1','.f_menu_wrap{background:'.$mod,$css[40]);
}

$mod = get_theme_mod('humberger_menu_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
if ( ! empty( $mod ) ) {
  $css[40] = str_replace( '.humberger:before,.humberger:after{background:#555','.humberger:before,.humberger:after{background:'.$mod,$css[40]);

  $css[40] = str_replace( '.humberger:before{-webkit-box-shadow:#555 0 9px 0;box-shadow:#555','.humberger:before{-webkit-box-shadow:#555 0 9px 0;box-shadow:'.$mod,$css[40]);

  $css[40] = str_replace( '.humberger:before{-webkit-box-shadow:#555','.humberger:before{-webkit-box-shadow:'.$mod,$css[40]);
}

if($skin != 'none'){


  $css[40] = str_replace( '.search_m{','.search_m{color:'.$skin_color[11].';',$css[40]);

  $css[40] = str_replace( '.credit_wrap a{color:#fff','.credit_wrap a{color:'.$skin_color[11],$css[40]);


    //$css[40] = $css[40] . '.credit_wrap a{color:'.$skin_color[2].'}';
  $css[40] = $css[40] . '.menu_base a{color:'.$skin_color[11].'}';
  $css[40] = $css[40] . '#menu_f>li>a,.nav_h2 #menu_h>li>a{color:'.$skin_color[3].'}';

}

if($skin != 'none'){

}

$i = 1;
$awsome_b = $awsome_a = $icomoon_b = $icomoon_a = '';
$icon_before_after = 'before';
while($i <= 10){
 $icon_color = '';

 $icon_content = get_theme_mod( 'simple_days_menu_bar_h_icon_'.$i,'none');
 if($icon_content != 'none'){
   if(get_theme_mod( 'simple_days_menu_bar_h_icon_color_'.$i,'') != '')$icon_color = 'color:'.get_theme_mod( 'simple_days_menu_bar_h_icon_color_'.$i,'').';';
   
   if(get_theme_mod( 'simple_days_menu_bar_h_icon_after_'.$i,false)){
     $icon_before_after = 'after';
     if(substr($icon_content, 0, 1) == 'e')$icomoon_a = ',icomoon';
     $awsome_a = '1';
   }else{
     if(substr($icon_content, 0, 1) == 'e')$icomoon_b = ',icomoon';
     $awsome_b = '1';
   }
   
   $css[40] = $css[40]. '#menu_h>li:nth-child('.$i.')>a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.$icon_content.'"}';
 }
 $icon_before_after = 'before';
 $i++;
}

$i = 1;
while($i <= 10){
 $icon_color = '';
 $icon_content = get_theme_mod( 'simple_days_menu_bar_f_icon_'.$i,'none');
 if($icon_content != 'none'){
   if(get_theme_mod( 'simple_days_menu_bar_f_icon_color_'.$i,'') != '')$icon_color = 'color:'.get_theme_mod( 'simple_days_menu_bar_f_icon_color_'.$i,'').';';
   
   if(get_theme_mod( 'simple_days_menu_bar_f_icon_after_'.$i,false)){
     $icon_before_after = 'after';
     if(substr($icon_content, 0, 1) == 'e')$icomoon_a = ',icomoon';
     $awsome_a = '1';
   }else{
     if(substr($icon_content, 0, 1) == 'e')$icomoon_b = ',icomoon';
     $awsome_b = '1';
   }

   $css[40] = $css[40]. '#menu_f>li:nth-child('.$i.')>a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.$icon_content.'"}';
 }
 $icon_before_after = 'before';
 $i++;
}

if($awsome_b == '1'){
 $css[40] = $css[40]. '.menu_base>li>a:before{font:16px/1 FontAwesome'.$icomoon_b.';display:inline-block;margin-right:4px;}';
}
if($awsome_a == '1'){
 $css[40] = $css[40]. '.menu_base>li>a:after{font:16px/1 FontAwesome'.$icomoon_a.';display:inline-block;margin-left:4px;}';
}

if( get_theme_mod( 'simple_days_sticky_header',false)){
 $css[40] = $css[40]. '.h_sticky{position:-webkit-sticky;position:sticky;top:0;z-index:9}';
}

$mod = get_theme_mod( 'simple_days_humberger_menu_spin','1125');
if( $mod != '1125'){
 $css[40] = str_replace( '1125deg',$mod.'deg',$css[40]);
}
$mod = get_theme_mod( 'simple_days_humberger_menu_spin_speed',0.8);
if( $mod != 0.8){
 $css[40] = str_replace( '.8s',$mod.'s',$css[40]);
}
$mod = get_theme_mod( 'simple_days_humberger_menu_right',false);
if( $mod != false){
 $css[40] = $css[40]. '.title_wrap{-webkit-flex-direction:row-reverse;flex-direction:row-reverse}';

}


if( get_theme_mod( 'simple_days_alert_box',false)){
  $css[40] = $css[40]. '#h_alert{';
  if( get_theme_mod( 'simple_days_alert_box_bg_color','')){
    $css[40] = $css[40]. 'background:'.get_theme_mod( 'simple_days_alert_box_bg_color','').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_color','')){
    $css[40] = $css[40]. 'color:'.get_theme_mod( 'simple_days_alert_box_color','').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_text_position','center') != 'left'){
    $css[40] = $css[40]. 'text-align:'.get_theme_mod( 'simple_days_alert_box_text_position','center').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_text_size',16) != 16){
    $css[40] = $css[40]. 'font-size:'.get_theme_mod( 'simple_days_alert_box_text_size',16).'px;';
  }
  $alert_box_border['type'] = get_theme_mod( 'simple_days_alert_box_border_type','none');
  if( $alert_box_border['type'] != 'none' && !get_theme_mod( 'simple_days_alert_box_border_inside',false)){
    $alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
    $css[40] = $css[40]. 'border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','');
  }
  $css[40] = $css[40]. '}#h_alert span{vertical-align:text-bottom}';
  if( $alert_box_border['type'] != 'none' && get_theme_mod( 'simple_days_alert_box_border_inside',false)){
    $alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
    $css[40] = $css[40]. '#h_alert_box{padding:0 10px;display:inline-block;border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','').'}';
  }
}








if(get_theme_mod('simple_days_back_to_top_button',true)){
  $css[41] = $wp_filesystem->get_contents( $content_file_dir.'041_sd_to_top.min.css' );
  if ($css[41] == ''){
    $css_remote = wp_remote_get( $content_file_dir.'041_sd_to_top.min.css' );
    $css[41] = $css_remote['body'];
  }
  if (get_theme_mod( 'simple_days_header_shadow',true) or get_theme_mod( 'simple_days_box_style','flat') == 'shadow') {
    $css[41] = str_replace( 'border-radius:50px 50px 0 0}','border-radius:50px 50px 0 0;box-shadow:0 4px 16px black}',$css[41]);
  }

  $mod = get_theme_mod('to_top_color');
  if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[3];
  if ( ! empty( $mod ) ) {
    $css[41] = str_replace( '.to_top{background:#ccc;color:#777','.to_top{background:#ccc;color:'.$mod,$css[41]);
  }
  $mod = get_theme_mod('to_top_bg_color');
  if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[5];
  if ( ! empty( $mod ) ) {
    $css[41] = str_replace( '.to_top{background:#ccc','.to_top{background:'.$mod,$css[41]);
  }
  $mod = get_theme_mod('to_top_hover_color');
  if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
  if ( ! empty( $mod ) ) {
    $css[41] = str_replace( '.to_top:hover{color:#fff','.to_top:hover{color:'.$mod,$css[41]);
  }
  $mod = get_theme_mod('to_top_bg_hover_color');
  if ( ! empty( $mod ) ) {
    $css[41] = str_replace( '.to_top:hover{','.to_top:hover{'.$mod.';',$css[41]);
  }

}


$css[50] = $wp_filesystem->get_contents( $content_file_dir.'050_sd_index.min.css' );
if ($css[50] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'050_sd_index.min.css' );
  $css[50] = $css_remote['body'];
}
if(get_theme_mod( 'simple_days_index_thumbnail','left') == 'right'){
  $css[50] = str_replace( '.post_card_thum{','.post_card_thum{-webkit-box-ordinal-group:3;-ms-flex-order:3;-webkit-order:3;order:3;',$css[50]);
}


$border_angle = array('top' , 'right' , 'bottom' , 'left');


$mod = get_theme_mod( 'simple_days_index_title_text_size');
if( ! empty( $mod ) ) $css[50] =  str_replace( '.post_card_title{font-size:25.5','.post_card_title{font-size:'.$mod,$css[50]);

$mod = get_theme_mod('simple_days_index_title_text_color');
if ( ! empty( $mod ) ) $css[50] =  $css[50].'.entry_title{color:'.$mod.'}';
$mod = get_theme_mod('simple_days_index_title_text_hover_color');
if ( ! empty( $mod ) ) $css[50] =  $css[50].'.entry_title:hover{color:'.$mod.'}';

$mod = get_theme_mod('simple_days_index_title_text_position','left');
if ( $mod != 'left' ) $css[50] =  str_replace( '.post_card_title{','.post_card_title{text-align:'.$mod.';',$css[50]);

$mod = get_theme_mod('simple_days_index_title_background_color');
if ( ! empty( $mod ) ) $css[50] =  str_replace( '.post_card_title{','.post_card_title{background:'.$mod.';',$css[50]);

foreach ($border_angle as $value) {
  $mod = get_theme_mod('simple_days_index_title_border_'.$value.'_style','none');
  if($mod != 'none'){
    $css[50] =  str_replace( '.post_card_title{','.post_card_title{border-'.$value.':'.$mod.' '.get_theme_mod('simple_days_index_title_border_'.$value.'_width',1).'px '.get_theme_mod('simple_days_index_title_border_'.$value.'_color').';',$css[50]);
  }
}


$p_m = array('padding','margin');
foreach ($p_m as $value) {
  $mod = get_theme_mod('simple_days_index_title_'.$value.'_top',0);
  $mod2 = get_theme_mod('simple_days_index_title_'.$value.'_right',0);
  $mod3 = get_theme_mod('simple_days_index_title_'.$value.'_bottom',0);
  $mod4 = get_theme_mod('simple_days_index_title_'.$value.'_left',0);

  if($mod + $mod2 + $mod3 + $mod4 != 0){
    if($mod != 0)$mod = $mod.'px';
    if($mod2 != 0)$mod2 = $mod2.'px';
    if($mod3 != 0)$mod3 = $mod3.'px';
    if($mod4 != 0)$mod4 = $mod4.'px';
    if($value == 'margin')$css[50] = str_replace( 'margin-bottom:10px}','}',$css[50]);
    if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
      $css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.';',$css[50]);
    }elseif($mod == $mod3 && $mod2 == $mod4){
      $css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.' '.$mod2.';',$css[50]);
    }elseif($mod != $mod3 && $mod2 == $mod4){
      $css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[50]);
    }else{
      $css[50] =  str_replace( '.post_card_title{','.post_card_title{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[50]);
    }
  }

}



$mod = get_theme_mod('simple_days_index_title_border_radius_top_left',0);
$mod2 = get_theme_mod('simple_days_index_title_border_radius_top_right',0);
$mod3 = get_theme_mod('simple_days_index_title_border_radius_bottom_left',0);
$mod4 = get_theme_mod('simple_days_index_title_border_radius_bottom_right',0);

if($mod + $mod2 + $mod3 + $mod4 != 0){
  if($mod != 0)$mod = $mod.'px';
  if($mod2 != 0)$mod2 = $mod2.'px';
  if($mod3 != 0)$mod3 = $mod3.'px';
  if($mod4 != 0)$mod4 = $mod4.'px';
  if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
    $css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.';',$css[50]);
  }elseif($mod == $mod3 && $mod2 == $mod4){
    $css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.' '.$mod2.';',$css[50]);
  }elseif($mod != $mod3 && $mod2 == $mod4){
    $css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[50]);
  }else{
    $css[50] =  str_replace( '.post_card_title{','.post_card_title{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[50]);
  }
}

if(get_theme_mod( 'simple_days_index_title_balloon',false)){
  $css[50] =  str_replace( '.post_card_title{','.post_card_title{position:relative;',$css[50]);
  $css[50] =  $css[50].'.post_card_title:after{position:absolute;content:\'\';top:100%;left:'.get_theme_mod( 'simple_days_index_title_balloon_position',30).'px;border:'.get_theme_mod( 'simple_days_index_title_balloon_width',15).'px solid transparent;border-top:'.get_theme_mod( 'simple_days_index_title_balloon_height',15).'px solid '.get_theme_mod( 'simple_days_index_title_balloon_color').';width:0;height:0;}';


}













$css[51] = $wp_filesystem->get_contents( $content_file_dir.'051_sd_index_category.min.css' );
if ($css[51] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'051_sd_index_category.min.css' );
  $css[51] = $css_remote['body'];
}
$mod = get_theme_mod('simple_days_index_category_bg_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[51] = str_replace( 'background:#333','background:'.$mod,$css[51]);
}

$mod = get_theme_mod('simple_days_index_category_text_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
if ( ! empty( $mod ) ) {
  $css[51] = str_replace( 'color:#fff','color:'.$mod,$css[51]);
}

$mod = get_theme_mod('simple_days_index_category_border_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[51] = str_replace( 'border:1px solid #333','border:1px solid '.$mod,$css[51]);
}




$mod = get_theme_mod('simple_days_index_category_bg_hover_color');
if ( ! empty( $mod ) ) {
  $css[51] = str_replace( 'background:#707070','background:'.$mod,$css[51]);
}

$mod = get_theme_mod('simple_days_index_category_text_hover_color');
if ( ! empty( $mod ) ) {
  $css[51] = str_replace( '.post_card_category:hover{','.post_card_category:hover{color:'.$mod.';',$css[51]);
}

$mod = get_theme_mod('simple_days_index_category_border_hover_color');
if ( ! empty( $mod ) ) {
  $css[51] = str_replace( 'border-color:#707070','border-color:'.$mod,$css[51]);
}

if(get_theme_mod( 'simple_days_index_category_position','right') == 'left'){
  $css[51] = str_replace( 'right:0;','left:0; '.$mod,$css[51]);
}



$css[52] = $wp_filesystem->get_contents( $content_file_dir.'052_sd_index_date.min.css' );
if ($css[52] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'052_sd_index_date.min.css' );
  $css[52] = $css_remote['body'];
}

if(get_theme_mod( 'simple_days_top_date_wrap','1') == '2'){
  $css[52] = str_replace( 'border-radius:50%','border-radius:2px',$css[52]);
}

$mod = get_theme_mod('simple_days_index_date_bg_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[52] = str_replace( '#333',$mod,$css[52]);
}

$mod = get_theme_mod('simple_days_index_date_text_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
if ( ! empty( $mod ) ) {
  $css[52] = str_replace( 'color:#fff','color:'.$mod,$css[52]);
}

$mod = get_theme_mod('simple_days_index_date_separator_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
if ( ! empty( $mod ) ) {
  $css[52] = str_replace( 'solid #fff','solid '.$mod,$css[52]);
}

if(get_theme_mod( 'simple_days_index_date_position','left') == 'right'){
  $css[52] = str_replace( 'left:0;','right:0; '.$mod,$css[52]);
}


$css[53] = $wp_filesystem->get_contents( $content_file_dir.'053_sd_index_more.min.css' );
if ($css[53] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'053_sd_index_more.min.css' );
  $css[53] = $css_remote['body'];
}

$mod = get_theme_mod( 'simple_days_read_more_position','right');
if( $mod != 'right' && $mod != 'none'){
  $css[53] = str_replace( 'text-align:right','text-align:'.$mod,$css[53]);
}

$mod = get_theme_mod('simple_days_index_read_more_text_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[53] = str_replace( '.more_read{','.more_read{color:'.$mod.';',$css[53]);
}
$mod = get_theme_mod('simple_days_index_read_more_bg_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[11];
if ( ! empty( $mod ) ) {
  $css[53] = str_replace( '.more_read{','.more_read{background:'.$mod.';',$css[53]);
}
$mod = get_theme_mod('simple_days_index_read_more_border_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[53] = str_replace( 'border:1px solid #eee','border:1px solid '.$mod,$css[53]);
}


$mod = get_theme_mod('simple_days_index_read_more_border_hover_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[53] = str_replace( '.more_read:hover{background:#222;color:#fff;border-color:#222','.more_read:hover{background:#222;color:#fff;border-color:'.$mod,$css[53]);
}
$mod = get_theme_mod('simple_days_index_read_more_text_hover_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[12];
if ( ! empty( $mod ) ) {
  $css[53] = str_replace( '.more_read:hover{background:#222;color:#fff','.more_read:hover{background:#222;color:'.$mod.';',$css[53]);
}
$mod = get_theme_mod('simple_days_index_read_more_bg_hover_color');
if ( empty( $mod ) && $skin != 'none') $mod = $skin_color[1];
if ( ! empty( $mod ) ) {
  $css[53] = str_replace( '.more_read:hover{background:#222','.more_read:hover{background:'.$mod.';',$css[53]);
}


$css[60] = $wp_filesystem->get_contents( $content_file_dir.'060_sd_post.min.css' );
if ($css[60] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'060_sd_post.min.css' );
  $css[60] = $css_remote['body'];
}

if($font_post_title != ''){
  $css[60] = str_replace( '.post_title{','.post_title{font-family:'.$font_post_title.';',$css[60]);
}
if(get_theme_mod( 'simple_days_breadcrumbs_display','left') == 'right'){
  $css[60] = str_replace( '.breadcrumb{','.breadcrumb{text-align:right;',$css[60]);
}

if(get_theme_mod( 'simple_days_popular_post_view_position','right') != 'right'){
  $css[60] =  $css[60].'.page_view{text-align:'.get_theme_mod( 'simple_days_popular_post_view_position','right').'}';
}

if(get_theme_mod( 'simple_days_posts_author_position','right') == 'left'){
  $css[60] =  $css[60].'.post_author{text-align:left}';
}
if(get_theme_mod( 'simple_days_posts_date_position','right') == 'left'){
  $css[60] =  $css[60].'.post_date{text-align:left}';
}
if(get_theme_mod( 'simple_days_page_author_position','none') == 'left'){
  $css[60] =  $css[60].'.page_author{text-align:left}';
}
if(get_theme_mod( 'simple_days_page_date_position','none') == 'left'){
  $css[60] =  $css[60].'.page_date{text-align:left}';
}

$i = 2;
$border_angle = array('top' , 'right' , 'bottom' , 'left');
$heading_font_size = array(0,36,30,24,18,14,12);
while ( $i < 7) {

  $mod = get_theme_mod( 'simple_days_post_heading_'.$i.'_text_size',$heading_font_size[$i]);
  if($mod != $heading_font_size[$i]) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{font-size:'.$mod.'px;',$css[60]);

  $mod = get_theme_mod('simple_days_post_heading_'.$i.'_text_color');
  if ( ! empty( $mod ) ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{color:'.$mod.';',$css[60]);

  $mod = get_theme_mod('simple_days_post_heading_'.$i.'_text_position','left');
  if ( $mod != 'left' ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{text-align:'.$mod.';',$css[60]);

  $mod = get_theme_mod('simple_days_post_heading_'.$i.'_background_color');
  if ( ! empty( $mod ) ) $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{background:'.$mod.';',$css[60]);

  foreach ($border_angle as $value) {
    $mod = get_theme_mod('simple_days_post_heading_'.$i.'_border_'.$value.'_style','none');
    if($mod != 'none'){
      $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-'.$value.':'.$mod.' '.get_theme_mod('simple_days_post_heading_'.$i.'_border_'.$value.'_width',1).'px '.get_theme_mod('simple_days_post_heading_'.$i.'_border_'.$value.'_color').';',$css[60]);
    }
  }

  
  $p_m = array('padding','margin');
  foreach ($p_m as $value) {
    $mod = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_top',0);
    $mod2 = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_right',0);
    $mod3 = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_bottom',0);
    $mod4 = get_theme_mod('simple_days_post_heading_'.$i.'_'.$value.'_left',0);

    if($mod + $mod2 + $mod3 + $mod4 != 0){
      if($mod != 0)$mod = $mod.'px';
      if($mod2 != 0)$mod2 = $mod2.'px';
      if($mod3 != 0)$mod3 = $mod3.'px';
      if($mod4 != 0)$mod4 = $mod4.'px';
      if($value == 'margin' && $i == 2)$css[60] = str_replace( 'margin:26px 0}','}',$css[60]);
      if($value == 'margin' && $i == 3)$css[60] = str_replace( 'margin:26px 0 4px}','}',$css[60]);
      if($value == 'margin' && $i == 4)$css[60] = str_replace( 'margin-bottom:13px}','}',$css[60]);
      if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
        $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.';',$css[60]);
      }elseif($mod == $mod3 && $mod2 == $mod4){
        $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.' '.$mod2.';',$css[60]);
      }elseif($mod != $mod3 && $mod2 == $mod4){
        $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.' '.$mod2.' '.$mod3.';',$css[60]);
      }else{
        $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{'.$value.':'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[60]);
      }
    }

  }


  
  $mod = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_top_left',0);
  $mod2 = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_top_right',0);
  $mod3 = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_bottom_left',0);
  $mod4 = get_theme_mod('simple_days_post_heading_'.$i.'_border_radius_bottom_right',0);

  if($mod + $mod2 + $mod3 + $mod4 != 0){
    if($mod != 0)$mod = $mod.'px';
    if($mod2 != 0)$mod2 = $mod2.'px';
    if($mod3 != 0)$mod3 = $mod3.'px';
    if($mod4 != 0)$mod4 = $mod4.'px';
    if($mod == $mod2 && $mod2 == $mod3 && $mod3 == $mod4){
      $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.';',$css[60]);
    }elseif($mod == $mod3 && $mod2 == $mod4){
      $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.' '.$mod2.';',$css[60]);
    }elseif($mod != $mod3 && $mod2 == $mod4){
      $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.' '.$mod2.' '.$mod3.';',$css[60]);
    }else{
      $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{border-radius:'.$mod.' '.$mod2.' '.$mod3.' '.$mod4.';',$css[60]);
    }
  }

  if(get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon',false)){
    $css[60] =  str_replace( 'post_body>h'.$i.'{','post_body>h'.$i.'{position:relative;',$css[60]);
    $css[60] =  $css[60].'#post_body h'.$i.':after{position:absolute;content:\'\';top:100%;left:'.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_position',30).'px;border:'.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_width',15).'px solid transparent;border-top:'.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_height',15).'px solid '.get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon_color').';width:0;height:0;}';


  }


  ++$i;
}


if($skin != 'none'){
  $css[60] = str_replace( '.cat_tag_wrap:hover{border-color:#222','.cat_tag_wrap:hover{border-color:'.$skin_color[2],$css[60]);

  $css[60] = str_replace( '.nav_link_pre,.nav_link_next{background:#f2f2f2','.nav_link_pre,.nav_link_next{background:'.$skin_color[5],$css[60]);
  $css[60] = str_replace( '.nav_link_pre,.nav_link_next{','.nav_link_pre,.nav_link_next{color:'.$skin_color[3].';',$css[60]);
  $css[60] = str_replace( '.nav_link_pre:hover,.nav_link_next:hover{border-color:#222','.nav_link_pre:hover,.nav_link_next:hover{border-color:'.$skin_color[2],$css[60]);

  $css[60] = str_replace( '.tab_item{border-bottom:3px solid #fafafa;background:#fafafa','.tab_item{border-bottom:3px solid #fafafa;background:'.$skin_color[4],$css[60]);
  $css[60] = str_replace( '.tab_item{border-bottom:3px solid #fafafa','.tab_item{border-bottom:3px solid '.$skin_color[4],$css[60]);

  $css[60] = str_replace( '.tab_content{background:#f2f2f2','.tab_content{background:'.$skin_color[5],$css[60]);

  $css[60] = str_replace( '.tabs input:checked+.tab_item{background:#f2f2f2;border-bottom:3px solid #f2f2f2','.tabs input:checked+.tab_item{background:#f2f2f2;border-bottom:3px solid '.$skin_color[5],$css[60]);

  $css[60] = str_replace( '.tabs input:checked+.tab_item{background:#f2f2f2','.tabs input:checked+.tab_item{background:'.$skin_color[5],$css[60]);

  $css[60] = str_replace( '.author_lp li a{','.author_lp li a{color:'.$skin_color[3].';',$css[60]);

}



$css[70] = $wp_filesystem->get_contents( $content_file_dir.'070_sd_alert_box.min.css' );
if ($css[70] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'070_sd_alert_box.min.css' );
  $css[70] = $css_remote['body'];
}

$css[80] = $wp_filesystem->get_contents( $content_file_dir.'080_sd_sns.min.css' );
if ($css[80] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'080_sd_sns.min.css' );
  $css[80] = $css_remote['body'];
}

$css[90] = $wp_filesystem->get_contents( $content_file_dir.'090_sd_sitemap.min.css' );
if ($css[90] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'090_sd_sitemap.min.css' );
  $css[90] = $css_remote['body'];
}

$css[100] = $wp_filesystem->get_contents( $content_file_dir.'100_sd_toc.min.css' );
if ($css[100] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'100_sd_toc.min.css' );
  $css[100] = $css_remote['body'];
}
if($skin != 'none'){
  $css[100] = str_replace( '.s_d_toc{background:#f2f2f2','.s_d_toc{background:'.$skin_color[5],$css[100]);

  $css[100] = str_replace( '.labbel_hide,.labbel_view{color:#07a','.labbel_hide,.labbel_view{color:'.$skin_color[1],$css[100]);

}




$css[110] = $wp_filesystem->get_contents( $content_file_dir.'110_sd_blog_card.min.css' );
if ($css[110] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'110_sd_blog_card.min.css' );
  $css[110] = $css_remote['body'];
}
if($skin != 'none'){
  $css[110] = str_replace( '.s_d_bc{background:#f2f2f2','.s_d_bc{background:'.$skin_color[5],$css[110]);

}




$css[120] = $wp_filesystem->get_contents( $content_file_dir.'120_sd_cta.min.css' );
if ($css[120] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'120_sd_cta.min.css' );
  $css[120] = $css_remote['body'];
}

$css[130] = $wp_filesystem->get_contents( $content_file_dir.'130_sd_profile.min.css' );
if ($css[130] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'130_sd_profile.min.css' );
  $css[130] = $css_remote['body'];
}

$css[140] = $wp_filesystem->get_contents( $content_file_dir.'140_sd_dd_widget.min.css' );
if ($css[140] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'140_sd_dd_widget.min.css' );
  $css[140] = $css_remote['body'];
}

$css[150] = $wp_filesystem->get_contents( $content_file_dir.'150_sd_post_list.min.css' );
if ($css[150] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'150_sd_post_list.min.css' );
  $css[150] = $css_remote['body'];
}

$css[160] = $wp_filesystem->get_contents( $content_file_dir.'160_sd_google_ad.min.css' );
if ($css[160] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'160_sd_google_ad.min.css' );
  $css[160] = $css_remote['body'];
}

$mod = get_theme_mod('simple_days_google_ad_labeling_position');
if ( ! empty( $mod ) ) $css[160] =  str_replace( '.ad_labeling{text-align:right','.ad_labeling{text-align:'.$mod,$css[160]);



$css[200] = $wp_filesystem->get_contents( $content_file_dir.'200_sd_flex.min.css' );
if ($css[200] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'200_sd_flex.min.css' );
  $css[200] = $css_remote['body'];
}

$mod = get_theme_mod( 'simple_days_humberger_menu_right',false);
if( $mod != false){
 //$css[200] = str_replace( '.title_wrap,.nav_link a,.author_profile_box{-webkit-box-orient:horizontal','.nav_link a,.author_profile_box{-webkit-box-orient:horizontal',$css[200]);
}



$css[400] = $wp_filesystem->get_contents( $content_file_dir.'400_sd_tablet.min.css' );
if ($css[400] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'400_sd_tablet.min.css' );
  $css[400] = $css_remote['body'];
}
$mod = get_theme_mod('simple_days_site_title_size',24);
if ( $mod != 24 ) {
  $css[400] = str_replace( '.title_text{font-size:24','.title_text{font-size:'.$mod,$css[400]);
}





$css[600] = $wp_filesystem->get_contents( $content_file_dir.'600_sd_pc.min.css' );
if ($css[600] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'600_sd_pc.min.css' );
  $css[600] = $css_remote['body'];
}

if(get_theme_mod( 'simple_days_sidebar_layout','3') == '1'){
  $css[600] = str_replace( '#sidebar{-ms-flex-order:3;-webkit-order:3;order:3;margin:20px 0 0 30px;','#sidebar{-webkit-box-ordinal-group:1;-ms-flex-order:1;-webkit-order:1;order:1;margin:20px 30px 0 0;',$css[600]);
}



$mod = get_theme_mod( 'simple_days_menu_layout','1');
$mod2 = get_theme_mod( 'simple_days_menu_layout_title_position','center');
$mod3 = get_theme_mod( 'simple_days_menu_layout_menu_position','left');
$mod4 = get_theme_mod( 'simple_days_tagline_position','none');



if( $mod4 == 'left' || $mod4 == 'right'){

  if( $mod4 == 'right'){
    $css[600] =  str_replace( '.tagline{padding:0','.tagline{padding:0 0 0 10px',$css[600]);
  }
  if( $mod4 == 'left'){
    $css[600] =  str_replace( '.tagline{padding:0','.tagline{padding:0 10px 0 0',$css[600]);
  }
}




if($mod == '1' || $mod == '2'){
  $css[600] = str_replace( '}}','}.h_widget{flex:0 0 auto}}',$css[600]);
}
if($mod == '1'){

  if( $mod4 == 'top' || $mod4 == 'bottom'){

    $css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 auto 0 0',$css[600]);
    $css[600] = str_replace( '.tagline{','.tagline{margin:0 auto 0 0;',$css[600]);
  }
}
if($mod == '2'){
  $css[600] = str_replace( '.title_tag{padding:5px 20px 5px 0','.title_tag{padding:5px 0 5px 20px',$css[600]);

  $css[600] = str_replace( '#nav_h{padding:0 0 0 20px','#nav_h{padding:0 20px 0 0',$css[600]);

  $css[600] = str_replace( '}}','}.a_w,#h_flex{-webkit-flex-direction:row-reverse;flex-direction:row-reverse}}',$css[600]);
  $css[600] =  str_replace( '.lo_list .post_card,.a_w,.h_widget,#h_flex','.lo_list .post_card,.h_widget',$css[600]);

  $css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 0 0 auto',$css[600]);
  $css[600] = str_replace( '.header_logo{margin:0','.header_logo{margin:0 0 0 auto',$css[600]);
  $css[600] = str_replace( '.tagline{','.tagline{margin:0 0 0 auto;',$css[600]);
  $css[600] = str_replace( '.title_tag{','.title_tag{margin:0 0 0 auto;',$css[600]);

}
if($mod == '3'){
  $css[600] =  str_replace( '#h_flex{max-width:1280px','#h_flex{-webkit-flex-direction:column;flex-direction:column',$css[600]);
  $css[600] =  str_replace( '.lo_list .post_card,.a_w,.h_widget,#h_flex','.lo_list .post_card,.a_w,.h_widget',$css[600]);
}
if($mod == '4'){
  $css[600] =  str_replace( '#h_flex{max-width:1280px','#h_flex{-webkit-flex-direction:column-reverse;flex-direction:column-reverse',$css[600]);
  $css[600] =  str_replace( '.lo_list .post_card,.a_w,.h_widget,#h_flex','.lo_list .post_card,.a_w,.h_widget',$css[600]);
}


if($mod == '3' || $mod == '4'){

  $css[600] = str_replace( '-webkit-align-self:center;-ms-align-self:center;align-self:center','',$css[600]);
  $css[600] = str_replace( '#nav_h{padding:0 0 0 20px','#nav_h{padding:0',$css[600]);

  if($mod2 == 'left'){
    $css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 auto 0 0',$css[600]);
    if( $mod4 == 'top' || $mod4 == 'bottom'){
      $css[600] = str_replace( '.tagline{','.tagline{margin:0 auto 0 0;',$css[600]);
    }
  }
  if($mod2 == 'center'){
    $css[600] = str_replace( '.title_tag{padding:5px 20px 5px 0','.title_tag{padding:5px 0',$css[600]);
    $css[600] = str_replace( '.title_tag{','.title_tag{margin:0 auto;',$css[600]);

    $css[600] = str_replace( '}}','}.h_widget{position:absolute;right:0;top:0;bottom:0}}',$css[600]);

    if( $mod4 == 'top' || $mod4 == 'bottom'){

      $css[600] =  str_replace( '{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',',.site_title,.tagline{-webkit-box-pack:center;-ms-flex-pack:center;-webkit-justify-content:center;justify-content:center',$css[600]);

    }


  }
  if($mod2 == 'right'){
    $css[600] = str_replace( '.title_tag{padding:5px 20px 5px 0','.title_tag{padding:5px 0 5px 20px',$css[600]);
    $css[600] = str_replace( '}}','}.a_w{-webkit-flex-direction:row-reverse;flex-direction:row-reverse}}',$css[600]);
    $css[600] =  str_replace( '{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',',.title_wrap{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',$css[600]);
    if( $mod4 == 'none'){
      $css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 0 0 auto',$css[600]);
    }elseif( $mod4 == 'top' || $mod4 == 'bottom'){
      $css[600] = str_replace( '.site_title{margin:0','.site_title{margin:0 0 0 auto',$css[600]);
      $css[600] = str_replace( '.tagline{','.tagline{margin:0 0 0 auto;',$css[600]);

    }else{

    }

  }
  if($mod3 == 'center'){
    $css[600] = str_replace( '}}','}#menu_h{-webkit-justify-content:center;justify-content:center}}',$css[600]);
  }
  if($mod3 == 'right'){
    $css[600] = str_replace( '{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',',#menu_h{-webkit-box-pack:end;-ms-flex-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end',$css[600]);
  }
}

if( $mod4 == 'left' || $mod4 == 'right'){
  $css[600] = str_replace( '{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;-webkit-flex-direction:row;flex-direction:row}',',.title_tag{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;-webkit-flex-direction:row;flex-direction:row}',$css[600]);
}












$mod = get_theme_mod('simple_days_layout_header_height',54);
if ( $mod != 54 ) {
  $css[600] = str_replace( '#site_h{','#site_h{height:'.$mod.'px;',$css[600]);
}

if($skin != 'none'){
  $css[600] = str_replace( '.nav_base li[class*="children"]>ul{background:#fff','.nav_base li[class*="children"]>ul{background:'.$skin_color[1],$css[600]);
  //$css[600] =  $css[600].'.nav_base>ul>li>a:hover{color:'.$skin_color[2].'}';
  $css[600] = str_replace( '}}','}.nav_base>ul>li>a:hover{color:'.$skin_color[2].'}}',$css[600]);
  $css[600] = str_replace( '.menu_base .sub-menu li:hover,.menu_base .children li:hover{background:#222','.menu_base .sub-menu li:hover,.menu_base .children li:hover{background:'.$skin_color[3],$css[600]);

  $css[600] = str_replace( '10px solid #ccc','10px solid '.$skin_color[4],$css[600]);

  $css[600] = str_replace( 'border-left-color:#333','border-left-color:'.$skin_color[4],$css[600]);


  $css[600] = str_replace( 'border-right-color:#333','border-right-color:'.$skin_color[4],$css[600]);

}




$css[900] = $wp_filesystem->get_contents( $content_file_dir.'900_sd_retina.min.css' );
if ($css[900] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'900_sd_retina.min.css' );
  $css[900] = $css_remote['body'];
}

$css[950] = $wp_filesystem->get_contents( $content_file_dir.'950_sd_common.min.css' );
if ($css[950] == ''){
  $css_remote = wp_remote_get( $content_file_dir.'950_sd_common.min.css' );
  $css[950] = $css_remote['body'];
}


if(get_theme_mod( 'simple_days_box_style','flat') == 'shadow'){
  $css[951] = $wp_filesystem->get_contents( $content_file_dir.'951_sd_box_shadow.min.css' );
  if ($css[951] == ''){
    $css_remote = wp_remote_get( $content_file_dir.'951_sd_box_shadow.min.css' );
    $css[951] = $css_remote['body'];
  }

}


$output_css = '';
foreach($css as $key => $value){
  $output_css .= $value;
}

$upload_dir = wp_upload_dir();
$dir = $upload_dir['basedir'].'/simple_days_cache/';
if ( !$wp_filesystem->is_dir($dir) ) {
  $wp_filesystem->mkdir($dir, 0777, true);
  $wp_filesystem->chmod($dir, 0777);
}
$wp_filesystem->put_contents($upload_dir['basedir'].'/simple_days_cache/style.min.css', $output_css, FS_CHMOD_FILE);

  //メンテナンスモード解除
$wp_filesystem->delete($maintenance_file);

function get_skin_color($skin){
  $skin_color = array();
  $skin_color[11] = '#fff';
  $skin_color[12] = '#fff';
  switch ($skin){
    case 'apple_green':
    $skin_color[1] = '#8fc186';
    $skin_color[2] = '#2d3e4b';
    $skin_color[3] = '#4f9044';
    $skin_color[4] = '#f3f7f3';
    $skin_color[5] = '#d1e2bd';
    break;
    case 'black_coffee':
    $skin_color[1] = '#272822';
    $skin_color[2] = '#999';
    $skin_color[3] = '#0A0A0A';
    $skin_color[4] = '#eee';
    $skin_color[5] = '#d8d8d8';
    break;
    case 'blue_ocean':
    $skin_color[1] = '#09c';
    $skin_color[2] = '#2d3e4b';
    $skin_color[3] = '#157eac';
    $skin_color[4] = '#f1f4f8';
    $skin_color[5] = '#cae5ef';
    break;
    case 'blue_yellow':
    $skin_color[1] = '#06609e';
    $skin_color[2] = '#f2df09';
    $skin_color[3] = '#9a8033';
    $skin_color[4] = '#dedede';
    $skin_color[5] = '#eee';
    $skin_color[12] = $skin_color[2];
    break;
    case 'brown_bread':
    $skin_color[1] = '#ab5533';
    $skin_color[2] = '#ffb777';
    $skin_color[3] = '#5d2e1c';
    $skin_color[4] = '#845b3e';
    $skin_color[5] = '#bf7c5c';
    $skin_color[12] = $skin_color[2];
    break;
    case 'cinnamon':
    $skin_color[1] = '#be8f68';
    $skin_color[2] = '#281404';
    $skin_color[3] = '#8E745F';
    $skin_color[4] = '#C99F80';
    $skin_color[5] = '#ffe9df';
    break;
    case 'grape_juice':
    $skin_color[1] = '#7e6f9a';
    $skin_color[2] = '#533560';
    $skin_color[3] = '#3b2246';
    $skin_color[4] = '#e4e4e4';
    $skin_color[5] = '#d5cbff';
    break;
    case 'gray_horse':
    $skin_color[1] = '#717171';
    $skin_color[2] = '#67daf9';
    $skin_color[3] = '#484848';
    $skin_color[4] = '#828282';
    $skin_color[5] = '#d8d8d8';
    $skin_color[12] = $skin_color[2];
    break;
    case 'moss_green':
    $skin_color[1] = '#777e41';
    $skin_color[2] = '#A9BA18';
    $skin_color[3] = '#373D01';
    $skin_color[4] = '#E4EAAB';
    $skin_color[5] = '#E2ED87';
    break;
    case 'orange':
    $skin_color[1] = '#ef810f';
    $skin_color[2] = '#D35400';
    $skin_color[3] = '#F96509';
    $skin_color[4] = '#FDF2E7';
    $skin_color[5] = '#F8CD9F';
    break;
    case 'petrole':
    $skin_color[1] = '#007d7f';
    $skin_color[2] = '#004949';
    $skin_color[3] = '#006363';
    $skin_color[4] = '#7A9B9B';
    $skin_color[5] = '#75AFAF';
    break;
    case 'red_orange':
    $skin_color[1] = '#e53b2b';
    $skin_color[2] = '#5a2222';
    $skin_color[3] = '#960d00';
    $skin_color[4] = '#f7f7f7';
    $skin_color[5] = '#e8e8e8';
    break;
    case 'rose_peche':
    $skin_color[1] = '#e75685';
    $skin_color[2] = '#820A32';
    $skin_color[3] = '#66263B';
    $skin_color[4] = '#E5C9D3';
    $skin_color[5] = '#FFA0A2';
    break;
    case 'yellow_mustard':
    $skin_color[1] = '#ffd700';
    $skin_color[2] = '#2d3e4b';
    $skin_color[3] = '#ffa400';
    $skin_color[4] = '#ffe876';
    $skin_color[5] = '#fff9d7';
    $skin_color[11] = '#000';
    break;
    default:
  }
  return $skin_color;
  }//end of get_skin_color
