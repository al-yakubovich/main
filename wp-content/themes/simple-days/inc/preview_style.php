<?php
defined('ABSPATH') or die("Please don't run this script.");
/**
 * Preview Style
 *
 * @package Simple Days
 */














function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
  $return = '';
  $mod = get_theme_mod($mod_name);
  if ( ! empty( $mod ) ) {
    $return = sprintf('%s { %s:%s; }',
      $selector,
      $style,
      $prefix.$mod.$postfix
    );
    if ( $echo ) {
      echo esc_attr($return);
    }
  }
  return $return;
}

?>



<!--Customizer CSS-->
<style type="text/css">
<?php 
generate_css('body', 'color', 'simple_days_font_color');
generate_css('body', 'background', 'simple_days_background_color');
generate_css('a', 'color', 'link_textcolor');
generate_css('a:hover:not(.non_hover)', 'color', 'link_hover_color');
generate_css('.title_text', 'color', 'blog_name');
generate_css('#h_wrap', 'background', 'header_color');
generate_css('.f_widget_wrap', 'background', 'footer_widget_color');
generate_css('.f_widget_wrap', 'color', 'footer_widget_textcolor');
generate_css('.f_widget_wrap a:not(.icon_base):not(.to_top)', 'color', 'footer_widget_linkcolor');
generate_css('.credit_wrap', 'background', 'footer_color');
generate_css('.nav_h2', 'background', 'header_nav_h2_bg_color');
generate_css('.f_menu_wrap', 'background', 'f_menu_wrap_bg_color');
generate_css('#oh_wrap', 'background', 'oh_wrap_bg_color');
generate_css('.to_top', 'color: ', 'to_top_color');
generate_css('.to_top', 'background: ', 'to_top_bg_color');
generate_css('.to_top:hover', 'color: ', 'to_top_hover_color');
generate_css('.to_top:hover', 'background: ', 'to_top_bg_hover_color');

generate_css('.ad_labeling', 'text-align: ', 'simple_days_google_ad_labeling_position');

generate_css('.post_card_category', 'color: ', 'simple_days_index_category_text_color');
generate_css('.post_card_category', 'border-color: ', 'simple_days_index_category_border_color');
generate_css('.post_card_category', 'background: ', 'simple_days_index_category_bg_color');
generate_css('.post_card_category:hover', 'color: ', 'simple_days_index_category_text_hover_color');
generate_css('.post_card_category:hover', 'border-color: ', 'simple_days_index_category_border_hover_color');
generate_css('.post_card_category:hover', 'background: ', 'simple_days_index_category_bg_hover_color');

generate_css('.more_read', 'color', 'simple_days_index_read_more_text_color');
generate_css('.more_read', 'border-color', 'simple_days_index_read_more_border_color');
generate_css('.more_read', 'background', 'simple_days_index_read_more_bg_color');
generate_css('.more_read:hover', 'color', 'simple_days_index_read_more_text_hover_color');
generate_css('.more_read:hover', 'border-color', 'simple_days_index_read_more_border_hover_color');
generate_css('.more_read:hover', 'background', 'simple_days_index_read_more_bg_hover_color');

generate_css('.header_logo', 'max-width', 'simple_days_logo_image_width','','px');
generate_css('.header_logo', 'max-height', 'simple_days_logo_image_height','','px');

$i = 2;
while ( $i < 5) {
  generate_css('#post_body > h'.$i, 'font-size', 'simple_days_post_heading_'.$i.'_text_size','','px');
  generate_css('#post_body > h'.$i, 'color', 'simple_days_post_heading_'.$i.'_text_color');
  generate_css('#post_body > h'.$i, 'background', 'simple_days_post_heading_'.$i.'_background_color');
  generate_css('#post_body > h'.$i, 'border-top-style', 'simple_days_post_heading_'.$i.'_border_top_style');
  generate_css('#post_body > h'.$i, 'border-top-width', 'simple_days_post_heading_'.$i.'_border_top_width','','px');
  generate_css('#post_body > h'.$i, 'border-top-color', 'simple_days_post_heading_'.$i.'_border_top_color');
  generate_css('#post_body > h'.$i, 'text-align', 'simple_days_post_heading_'.$i.'_text_position');
  generate_css('#post_body > h'.$i, 'border-right-style', 'simple_days_post_heading_'.$i.'_border_right_style');
  generate_css('#post_body > h'.$i, 'border-right-width', 'simple_days_post_heading_'.$i.'_border_right_width','','px');
  generate_css('#post_body > h'.$i, 'border-right-color', 'simple_days_post_heading_'.$i.'_border_right_color');
  generate_css('#post_body > h'.$i, 'border-bottom-style', 'simple_days_post_heading_'.$i.'_border_bottom_style');
  generate_css('#post_body > h'.$i, 'border-bottom-width', 'simple_days_post_heading_'.$i.'_border_bottom_width','','px');
  generate_css('#post_body > h'.$i, 'border-bottom-color', 'simple_days_post_heading_'.$i.'_border_bottom_color');
  generate_css('#post_body > h'.$i, 'border-left-style', 'simple_days_post_heading_'.$i.'_border_left_style');
  generate_css('#post_body > h'.$i, 'border-left-width', 'simple_days_post_heading_'.$i.'_border_left_width','','px');
  generate_css('#post_body > h'.$i, 'border-left-color', 'simple_days_post_heading_'.$i.'_border_left_color');
  generate_css('#post_body > h'.$i, 'border-top-left-radius', 'simple_days_post_heading_'.$i.'_border_radius_top_left','','px');
  generate_css('#post_body > h'.$i, 'border-top-right-radius', 'simple_days_post_heading_'.$i.'_border_radius_top_right','','px');
  generate_css('#post_body > h'.$i, 'border-bottom-left-radius', 'simple_days_post_heading_'.$i.'_border_radius_bottom_left','','px');
  generate_css('#post_body > h'.$i, 'border-bottom-right-radius', 'simple_days_post_heading_'.$i.'_border_radius_bottom_right','','px');
  generate_css('#post_body > h'.$i, 'padding-top', 'simple_days_post_heading_'.$i.'_padding_top','','px');
  generate_css('#post_body > h'.$i, 'padding-right', 'simple_days_post_heading_'.$i.'_padding_right','','px');
  generate_css('#post_body > h'.$i, 'padding-bottom', 'simple_days_post_heading_'.$i.'_padding_bottom','','px');
  generate_css('#post_body > h'.$i, 'padding-left', 'simple_days_post_heading_'.$i.'_padding_left','','px');
  generate_css('#post_body > h'.$i, 'margin-top', 'simple_days_post_heading_'.$i.'_margin_top','','px');
  generate_css('#post_body > h'.$i, 'margin-right', 'simple_days_post_heading_'.$i.'_margin_right','','px');
  generate_css('#post_body > h'.$i, 'margin-bottom', 'simple_days_post_heading_'.$i.'_margin_bottom','','px');
  generate_css('#post_body > h'.$i, 'margin-left', 'simple_days_post_heading_'.$i.'_margin_left','','px');


  if(get_theme_mod( 'simple_days_post_heading_'.$i.'_balloon',false)){
    echo '#post_body > h'.$i.'{position:relative}';
    echo '#post_body > h'.$i.':after{position: absolute;content: "";top: 100%;left: 30px;border: 15px solid transparent;border-top: 15px solid ;width: 0;height: 0;}'."\n";
  }
  generate_css('#post_body > h'.$i.':after', 'border-top-color', 'simple_days_post_heading_'.$i.'_balloon_color');
  generate_css('#post_body > h'.$i.':after', 'left', 'simple_days_post_heading_'.$i.'_balloon_position','','px');
  generate_css('#post_body > h'.$i.':after', 'border-width', 'simple_days_post_heading_'.$i.'_balloon_width','','px');
  generate_css('#post_body > h'.$i.':after', 'border-top-width', 'simple_days_post_heading_'.$i.'_balloon_height','','px');

  ++$i;
}

$side_footer = array('sidebar' => '#sidebar','footer' => '#site_f');
foreach ($side_footer as $s_f_name => $s_f_c_name) {
  generate_css($s_f_c_name.' .widget_title', 'font-size', 'simple_days_widget_title_'.$s_f_name.'_text_size','','px');
  generate_css($s_f_c_name.' .widget_title', 'color', 'simple_days_widget_title_'.$s_f_name.'_text_color');
  generate_css($s_f_c_name.' .widget_title', 'background', 'simple_days_widget_title_'.$s_f_name.'_background_color');
  generate_css($s_f_c_name.' .widget_title', 'border-top-style', 'simple_days_widget_title_'.$s_f_name.'_border_top_style');
  generate_css($s_f_c_name.' .widget_title', 'border-top-width', 'simple_days_widget_title_'.$s_f_name.'_border_top_width','','px');
  generate_css($s_f_c_name.' .widget_title', 'border-top-color', 'simple_days_widget_title_'.$s_f_name.'_border_top_color');
  generate_css($s_f_c_name.' .widget_title', 'text-align', 'simple_days_widget_title_'.$s_f_name.'_text_position');
  generate_css($s_f_c_name.' .widget_title', 'border-right-style', 'simple_days_widget_title_'.$s_f_name.'_border_right_style');
  generate_css($s_f_c_name.' .widget_title', 'border-right-width', 'simple_days_widget_title_'.$s_f_name.'_border_right_width','','px');
  generate_css($s_f_c_name.' .widget_title', 'border-right-color', 'simple_days_widget_title_'.$s_f_name.'_border_right_color');
  generate_css($s_f_c_name.' .widget_title', 'border-bottom-style', 'simple_days_widget_title_'.$s_f_name.'_border_bottom_style');
  generate_css($s_f_c_name.' .widget_title', 'border-bottom-width', 'simple_days_widget_title_'.$s_f_name.'_border_bottom_width','','px');
  generate_css($s_f_c_name.' .widget_title', 'border-bottom-color', 'simple_days_widget_title_'.$s_f_name.'_border_bottom_color');
  generate_css($s_f_c_name.' .widget_title', 'border-left-style', 'simple_days_widget_title_'.$s_f_name.'_border_left_style');
  generate_css($s_f_c_name.' .widget_title', 'border-left-width', 'simple_days_widget_title_'.$s_f_name.'_border_left_width','','px');
  generate_css($s_f_c_name.' .widget_title', 'border-left-color', 'simple_days_widget_title_'.$s_f_name.'_border_left_color');
  generate_css($s_f_c_name.' .widget_title', 'border-top-left-radius', 'simple_days_widget_title_'.$s_f_name.'_border_radius_top_left','','px');
  generate_css($s_f_c_name.' .widget_title', 'border-top-right-radius', 'simple_days_widget_title_'.$s_f_name.'_border_radius_top_right','','px');
  generate_css($s_f_c_name.' .widget_title', 'border-bottom-left-radius', 'simple_days_widget_title_'.$s_f_name.'_border_radius_bottom_left','','px');
  generate_css($s_f_c_name.' .widget_title', 'border-bottom-right-radius', 'simple_days_widget_title_'.$s_f_name.'_border_radius_bottom_right','','px');
  generate_css($s_f_c_name.' .widget_title', 'padding-top', 'simple_days_widget_title_'.$s_f_name.'_padding_top','','px');
  generate_css($s_f_c_name.' .widget_title', 'padding-right', 'simple_days_widget_title_'.$s_f_name.'_padding_right','','px');
  generate_css($s_f_c_name.' .widget_title', 'padding-bottom', 'simple_days_widget_title_'.$s_f_name.'_padding_bottom','','px');
  generate_css($s_f_c_name.' .widget_title', 'padding-left', 'simple_days_widget_title_'.$s_f_name.'_padding_left','','px');
  generate_css($s_f_c_name.' .widget_title', 'margin-top', 'simple_days_widget_title_'.$s_f_name.'_margin_top','','px');
  generate_css($s_f_c_name.' .widget_title', 'margin-right', 'simple_days_widget_title_'.$s_f_name.'_margin_right','','px');
  generate_css($s_f_c_name.' .widget_title', 'margin-bottom', 'simple_days_widget_title_'.$s_f_name.'_margin_bottom','','px');
  generate_css($s_f_c_name.' .widget_title', 'margin-left', 'simple_days_widget_title_'.$s_f_name.'_margin_left','','px');


  if(get_theme_mod( 'simple_days_widget_title_'.$s_f_name.'_balloon',false)){
    echo $s_f_c_name.' .widget_title'.'{position:relative}';
    echo $s_f_c_name.' .widget_title'.':after{position: absolute;content: "";top: 100%;left: 30px;border: 15px solid transparent;border-top: 15px solid ;width: 0;height: 0;}'."\n";
  }
  generate_css($s_f_c_name.' .widget_title'.':after', 'border-top-color', 'simple_days_widget_title_'.$s_f_name.'_balloon_color');
  generate_css($s_f_c_name.' .widget_title'.':after', 'left', 'simple_days_widget_title_'.$s_f_name.'_balloon_position','','px');
  generate_css($s_f_c_name.' .widget_title'.':after', 'border-width', 'simple_days_widget_title_'.$s_f_name.'_balloon_width','','px');
  generate_css($s_f_c_name.' .widget_title'.':after', 'border-top-width', 'simple_days_widget_title_'.$s_f_name.'_balloon_height','','px');

}

generate_css('.post_card_title', 'font-size', 'simple_days_index_title_text_size','','px');
generate_css('.entry_title', 'color', 'simple_days_index_title_text_color');
generate_css('.entry_title:hover', 'color', 'simple_days_index_title_text_hover_color');
generate_css('.post_card_title', 'background', 'simple_days_index_title_background_color');
generate_css('.post_card_title', 'border-top-style', 'simple_days_index_title_border_top_style');
generate_css('.post_card_title', 'border-top-width', 'simple_days_index_title_border_top_width','','px');
generate_css('.post_card_title', 'border-top-color', 'simple_days_index_title_border_top_color');
generate_css('.post_card_title', 'text-align', 'simple_days_index_title_text_position');
generate_css('.post_card_title', 'border-right-style', 'simple_days_index_title_border_right_style');
generate_css('.post_card_title', 'border-right-width', 'simple_days_index_title_border_right_width','','px');
generate_css('.post_card_title', 'border-right-color', 'simple_days_index_title_border_right_color');
generate_css('.post_card_title', 'border-bottom-style', 'simple_days_index_title_border_bottom_style');
generate_css('.post_card_title', 'border-bottom-width', 'simple_days_index_title_border_bottom_width','','px');
generate_css('.post_card_title', 'border-bottom-color', 'simple_days_index_title_border_bottom_color');
generate_css('.post_card_title', 'border-left-style', 'simple_days_index_title_border_left_style');
generate_css('.post_card_title', 'border-left-width', 'simple_days_index_title_border_left_width','','px');
generate_css('.post_card_title', 'border-left-color', 'simple_days_index_title_border_left_color');
generate_css('.post_card_title', 'border-top-left-radius', 'simple_days_index_title_border_radius_top_left','','px');
generate_css('.post_card_title', 'border-top-right-radius', 'simple_days_index_title_border_radius_top_right','','px');
generate_css('.post_card_title', 'border-bottom-left-radius', 'simple_days_index_title_border_radius_bottom_left','','px');
generate_css('.post_card_title', 'border-bottom-right-radius', 'simple_days_index_title_border_radius_bottom_right','','px');
generate_css('.post_card_title', 'padding-top', 'simple_days_index_title_padding_top','','px');
generate_css('.post_card_title', 'padding-right', 'simple_days_index_title_padding_right','','px');
generate_css('.post_card_title', 'padding-bottom', 'simple_days_index_title_padding_bottom','','px');
generate_css('.post_card_title', 'padding-left', 'simple_days_index_title_padding_left','','px');
generate_css('.post_card_title', 'margin-top', 'simple_days_index_title_margin_top','','px');
generate_css('.post_card_title', 'margin-right', 'simple_days_index_title_margin_right','','px');
generate_css('.post_card_title', 'margin-bottom', 'simple_days_index_title_margin_bottom','','px');
generate_css('.post_card_title', 'margin-left', 'simple_days_index_title_margin_left','','px');


if(get_theme_mod( 'simple_days_index_title_balloon',false)){
  echo '.post_card_title'.'{position:relative}';
  echo '.post_card_title'.':after{position: absolute;content: "";top: 100%;left: 30px;border: 15px solid transparent;border-top: 15px solid ;width: 0;height: 0;}'."\n";
}
generate_css('.post_card_title'.':after', 'border-top-color', 'simple_days_index_title_balloon_color');
generate_css('.post_card_title'.':after', 'left', 'simple_days_index_title_balloon_position','','px');
generate_css('.post_card_title'.':after', 'border-width', 'simple_days_index_title_balloon_width','','px');
generate_css('.post_card_title'.':after', 'border-top-width', 'simple_days_index_title_balloon_height','','px');




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
  echo 'body{font-family:'.$font_body.';}';
}
if($font_headings != ''){
  echo 'h1,h2,h3,h4,h5,h6{font-family:'.$font_headings.';}';
}
if($font_site_title != ''){
  echo '.title_text{font-family:'.$font_site_title.';}';
}

if($font_post_title != ''){
  echo '.post_title{font-family:'.$font_post_title.';}';
}

if(get_theme_mod( 'simple_days_box_style','flat') == 'shadow'){
  echo ' .simple_days_box_shadow{-webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);-webkit-border-radius:2px;border-radius:2px}.to_top{box-shadow: 0px 4px 16px rgba(0, 0, 0, 1)}';
}elseif (get_theme_mod( 'simple_days_header_shadow',true)) {
  echo ' #h_wrap{-webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);box-shadow:0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2);-webkit-border-radius:2px;border-radius:2px}.to_top{box-shadow: 0px 4px 16px rgba(0, 0, 0, 1)}';
}
?>
<?php $read_more_position = get_theme_mod( 'simple_days_read_more_position','right');
if( $read_more_position != 'right' && $read_more_position != 'none'){
 echo '.more_read_box{text-align:'.($read_more_position == 'center' ? 'center' : 'left').'}';
}
if(get_theme_mod( 'simple_days_index_thumbnail','left') == 'right'){
 echo '.post_card_thum{-webkit-box-ordinal-group:3;-ms-flex-order:3;-webkit-order:3;order:3;}';
}
if(get_theme_mod( 'simple_days_index_date_position','left') == 'right'){
 echo '.post_card_date{left:auto;right:0;}';
}
if(get_theme_mod( 'simple_days_index_category_position','right') == 'left'){
 echo '.post_card_category{right:auto;left:0;}';
}
if(get_theme_mod( 'simple_days_posts_author_position','right') == 'left'){
 echo '.post_author{text-align:left}';
}
if(get_theme_mod( 'simple_days_posts_date_position','right') == 'left'){
 echo '.post_date{text-align:left}';
}
if(get_theme_mod( 'simple_days_page_author_position','none') == 'left'){
 echo '.page_author{text-align:left}';
}
if(get_theme_mod( 'simple_days_page_date_position','none') == 'left'){
 echo '.page_date{text-align:left}';
}
if(get_theme_mod( 'simple_days_breadcrumbs_display','left') == 'right'){
 echo '.breadcrumb{text-align:right}';
}
if(get_theme_mod( 'simple_days_popular_post_view_position','right') != 'right'){
 echo '.page_view{text-align:'.get_theme_mod( 'simple_days_popular_post_view_position','right').'}';
}

$i = 1;
$j = 0;
if(is_customize_preview())$j = 1;       
$awsome_b = $awsome_a = $icomoon_b = $icomoon_a = '';
$icon_before_after = 'before';
while($i <= 10){
 $icon_color = '';
 $icon_content = get_theme_mod( 'simple_days_menu_bar_h_icon_'.$i,'none');
 if($icon_content != 'none'){

   if(get_theme_mod( 'simple_days_menu_bar_h_icon_color_'.$i,'') != '')$icon_color = 'color:'.get_theme_mod( 'simple_days_menu_bar_h_icon_color_'.$i,'').';';
   
   if(get_theme_mod( 'simple_days_menu_bar_h_icon_after_'.$i,false))$icon_before_after = 'after';
   echo '#menu_h > li:nth-child('.($i+$j).') > a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.get_theme_mod( 'simple_days_menu_bar_h_icon_'.$i).'"}';

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
   
   if(get_theme_mod( 'simple_days_menu_bar_f_icon_after_'.$i,false))$icon_before_after = 'after';

   echo '#menu_f > li:nth-child('.($i+$j).') > a:'.$icon_before_after.'{'.$icon_color.'content:"\\'.get_theme_mod( 'simple_days_menu_bar_f_icon_'.$i).'"}';

 }
 $icon_before_after = 'before';
 $i++;
}

   //if($awsome_b == '1'){
echo '.menu_base > li > a:before {font:16px/1 FontAwesome,icomoon;display:inline-block;margin-right:4px;}';
   //}
   //if($awsome_a == '1'){
echo '.menu_base > li > a:after {font:16px/1 FontAwesome,icomoon;display:inline-block;margin-left:4px;}';
   //}

if( get_theme_mod( 'simple_days_alert_box',false)){
  echo '#h_alert{';
  if( get_theme_mod( 'simple_days_alert_box_bg_color','')){
    echo 'background:'.get_theme_mod( 'simple_days_alert_box_bg_color','').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_color','')){
    echo 'color:'.get_theme_mod( 'simple_days_alert_box_color','').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_text_position','center') != 'left'){
    echo 'text-align:'.get_theme_mod( 'simple_days_alert_box_text_position','center').';';
  }
  if( get_theme_mod( 'simple_days_alert_box_text_size',16) != 16){
    echo 'font-size:'.get_theme_mod( 'simple_days_alert_box_text_size',16).'px;';
  }
  $alert_box_border['type'] = get_theme_mod( 'simple_days_alert_box_border_type','none');
  if( $alert_box_border['type'] != 'none' && !get_theme_mod( 'simple_days_alert_box_border_inside',false)){
    $alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
    echo 'border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','');
  }
  echo '}#h_alert span{vertical-align:text-bottom}';
  if( $alert_box_border['type'] != 'none' && get_theme_mod( 'simple_days_alert_box_border_inside',false)){
    $alert_box_border['width'] = get_theme_mod( 'simple_days_alert_box_border_width',1);
    echo '#h_alert_box{display:inline-block;border:'.$alert_box_border['type'].' '.$alert_box_border['width'].'px '.get_theme_mod( 'simple_days_alert_box_border_color','').'}';
  }
}else{
  echo '#h_alert{display:none;}';
}


$mod = get_theme_mod( 'simple_days_humberger_menu_spin','1125');
if( $mod != '1125'){
  echo '#t_menu:checked ~ div header div div div div .humberger:before{-webkit-transform:rotate('.$mod.'deg);transform:rotate('.$mod.'deg);}#t_menu:checked ~ div header div div div div .humberger:after{-webkit-transform:rotate(-'.$mod.'deg);transform:rotate(-'.$mod.'deg)}';
}
$mod = get_theme_mod( 'simple_days_humberger_menu_spin_speed',0.8);
if( $mod != 0.8){
 echo '.humberger:before,.humberger:after{-webkit-transition:-webkit-box-shadow .1s linear,-webkit-transform '.$mod.'s;transition:box-shadow .1s linear,transform '.$mod.'s}';
}

$mod = get_theme_mod( 'simple_days_humberger_menu_right',false);
if( $mod != false){
 echo '.title_wrap{-webkit-flex-direction:row-reverse;flex-direction:row-reverse}';
}


echo '@media screen and (min-width: 980px) {';


$mod = get_theme_mod( 'simple_days_site_title_size');
if ( ! empty( $mod ) ) {
  echo'.title_text{font-size:'.$mod.'px;}';
}







$mod = get_theme_mod( 'simple_days_menu_layout','1');
$mod2 = get_theme_mod( 'simple_days_menu_layout_title_position','center');
$mod3 = get_theme_mod( 'simple_days_menu_layout_menu_position','left');

$mod4 = get_theme_mod( 'simple_days_tagline_position','none');



if( $mod4 == 'left' || $mod4 == 'right'){
  echo'.title_tag{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;-webkit-flex-direction:row;flex-direction:row}';
}else{
  echo'.title_tag{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;-webkit-flex-direction:column;flex-direction:column;}';
  echo '.tagline{padding:0;}';
}
if( $mod4 == 'right'){
  echo '.tagline{padding:0 0 0 10px;}';
}
if( $mod4 == 'left'){
  echo '.tagline{padding:0 10px 0 0;}';

}

if($mod == '1' || $mod == '2'){
 echo '.title_wrap{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;margin-left:0;}#site_h{align-self:center;}.h_widget{position:relative}';
}

if($mod == '1'){
 echo '.a_w,#h_flex{flex-direction: row;}.title_wrap{padding-left:0px;}.h_widget{flex:0 0 auto}.title_wrap{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;margin-right:20px}#h_flex{width:100%;max-width:1280px;}#nav_h{padding:0 0 0 40px}.site_title{margin:0 auto 0 0}';
  if( $mod4 == 'top' || $mod4 == 'bottom'){
    echo '.site_title{margin:0 auto 0 0}';
  }
}elseif($mod == '2'){
 echo '.a_w,#h_flex{flex-direction: row-reverse;}.title_wrap{padding-left:20px;}.h_widget{flex:0 0 auto}.title_wrap{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;margin-right:0}#h_flex{width:100%;max-width:1280px;}#nav_h{padding:0 40px 0 0}.site_title{margin:0 0 0 auto}';
}elseif($mod == '3'){
 echo '.a_w{flex-direction: row;}#h_flex{-webkit-flex-direction:column;flex-direction:column;width:100%;max-width:none;}.title_wrap{padding-left:0;}.title_wrap{margin-right:auto}';
}elseif($mod == '4'){
 echo '.a_w{flex-direction: row;}#h_flex{-webkit-flex-direction:column-reverse;flex-direction:column-reverse;width:100%;max-width:none;}.title_wrap{padding-left:0;}.title_wrap{margin-right:auto}';
}

if($mod == '3' || $mod == '4'){
  echo'#site_h{align-self: auto;}#nav_h{padding:0}';
  if($mod2 == 'left'){
   echo '.title_wrap{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;margin-right:auto;margin-left:0;}.site_title{margin:0 auto 0 0}.h_widget{position:relative}.site_title{margin:0 auto 0 0}#site_h{align-self: auto;}';
  }
  if($mod2 == 'center'){
    
    $mod = get_theme_mod('simple_days_logo_image_height');
    if ( ! empty( $mod ) ) {
      echo '.header_logo{max-height:'.$mod.'px}';
    }
    echo '.title_wrap{-webkit-box-ordinal-group:0;-ms-flex-order:0;-webkit-order:0;order:0;margin:0 auto;width:auto;height:auto;}.site_title{margin:0 auto}.h_widget{position:absolute;right:0;top:0;bottom:0}';
    if( is_active_sidebar( 'header_widget' )){
      //echo '.site_title{height:40px}';
    }else{
      //echo '.site_title{height:40px;margin:0 auto}';
      //echo '.site_title{margin:0 auto}';
    }
  }
  if($mod2 == 'right'){
    echo '.title_wrap{-webkit-box-ordinal-group:2;-ms-flex-order:2;-webkit-order:2;order:2;margin-left:auto;margin-right:0;}.site_title{margin:0 0 0 auto}.h_widget{position:relative}';
    //.site_title{margin:0 0 0 auto}';
  }
  if($mod3 == 'left'){
    echo '#menu_h{-webkit-justify-content:flex-start;justify-content:flex-start;}';
  }
  if($mod3 == 'center'){
    echo '#menu_h{-webkit-justify-content:center;justify-content:center}';
  }
  if($mod3 == 'right'){
   echo '#menu_h{-webkit-justify-content:flex-end;justify-content:flex-end}';
  }
}










if(get_theme_mod( 'simple_days_sidebar_layout','3') == '1'){
  echo '#sidebar{-webkit-box-ordinal-group:1;-ms-flex-order:1;-webkit-order:1;order:1;margin:20px 30px 0 0}';
}

echo '}';



if ( !is_active_sidebar( 'footer-1' ) && !is_active_sidebar( 'footer-2' ) && !is_active_sidebar( 'footer-3' )){
 echo '.f_widget_wrap{background:transparent}';
}
?>
</style>


<?php
global $wp_customize;
if ( isset( $wp_customize ) ){ ?>

  <style type="text/css" id="body_hover_css"></style>
  <style type="text/css" id="more_read_hover_css"></style>
  <style type="text/css" id="post_card_category_hover_css"></style>
  <style type="text/css" id="heading_balloon_css"></style>
  <style type="text/css" id="footer_hover_css"></style>
  <style type="text/css" id="widget_title_css"></style>
  <style type="text/css" id="menu_layout_position"></style>


  <style type="text/css" id="etc_css"></style>
  <?php
  for ($i=1; $i <= 11; $i++) { ?>
    <style type="text/css" id="simple_days_menu_bar_h_icon_<?php echo $i; ?>"></style>
    <style type="text/css" id="simple_days_menu_bar_f_icon_<?php echo $i; ?>"></style>
    <?php
  }

}
?>

<!--/Customizer CSS-->