<?php
/**
 * Widget Recent Posts thumbnail
 *
 * @package Simple Days
 */
  $ontouchstart = '';
  if(!is_amp()) $ontouchstart = ' ontouchstart=""';

  $pp_value = '';
  if(get_query_var( 'popular_post_style')){
    $i = get_query_var( 'popular_post_count');
    $pp_value = '<div class="s_d_pl_ra s_d_pl_ab">'.$i.'</div>';
  }
//var_dump($posts);
    echo '<li class="s_d_pl_li_thum mb10 opa7">'.$pp_value.'<a href="' . esc_url(get_permalink(  )) . '" class="non_hover"><div class="s_d_pl_li_thum_title">'.esc_html(mb_strimwidth(get_the_title(), 0, 48, "...", 'UTF-8')).'</div><div class="fit_box_img_wrap s_d_pl_li_thum_box">';
    if(!has_post_thumbnail()) {
      preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", get_the_content(), $matches);
      if(isset($matches [1] [0])){
        echo '<'.( (is_amp() )?'amp-img layout="responsive"':'img').' src="'. esc_url($matches [1] [0]) .'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="640" height="480" alt="'.esc_html(get_the_title()).'" />';
      }else{
        echo '<'.( (is_amp()) ?'amp-img layout="responsive"':'img').' src="'. esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png')) .'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="640" height="480" alt="No image available" />';
      }
    }else{
      //the_post_thumbnail(array(640, 480));
      $thumurl = wp_get_attachment_image_src( get_post_thumbnail_id() , 'medium' );
      echo '<'.( (is_amp() )?'amp-img layout="responsive"':'img').' src="'.esc_url($thumurl[0]).'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="'.esc_attr($thumurl[1]).'" height="'.esc_attr($thumurl[2]).'" alt="'.esc_html(get_the_title()).'" title="'.esc_html(get_the_title()).'" />';
    }
    echo '</div></a></li>';
