<?php
/**
 * Widget Recent Posts List with thumbnail
 *
 * @package Simple Days
 */
  $ontouchstart = '';
  if(!is_amp()) $ontouchstart = ' ontouchstart=""';
  $pp_value = '';
  if(get_query_var( 'popular_post_style')){
    $i = get_query_var( 'popular_post_count');
    $pp_value = '<div class="s_d_pl_ra s_d_pl_center">'.$i.'</div>';
  }
    //var_dump($posts);
    echo '<li class="s_d_pl_li pp_ranking_box_list_border mb10">'.$pp_value.'<a href="' . esc_url(get_permalink(  )) . '" class="fit_box_img_wrap s_d_pl_lithum_box opa7">';
    if(!has_post_thumbnail()) {
      preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", get_the_content(), $matches);
      if(isset($matches [1] [0])){
        echo '<'.( (is_amp() )?'amp-img layout="responsive"':'img').' src="'. esc_url($matches [1] [0]) .'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="640" height="480" alt="'.esc_html(get_the_title()).'" />';
      }else{
        echo '<'.( (is_amp()) ?'amp-img layout="responsive"':'img').' src="'. esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png')) .'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="640" height="480" alt="No image available" />';
      }
    }else{
      //the_post_thumbnail(array(640, 480));
      $thumurl = wp_get_attachment_image_src( get_post_thumbnail_id() , array(45,45) );
      echo '<'.( (is_amp() )?'amp-img layout="responsive"':'img').' src="'.esc_url($thumurl[0]).'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="'.esc_attr($thumurl[1]).'" height="'.esc_attr($thumurl[2]).'" alt="'.esc_html(get_the_title()).'" title="'.esc_html(get_the_title()).'" />';
    }
    echo '</a><a href="' . esc_url(get_permalink(  )) . '" class="s_d_pl_title">'.esc_html(mb_strimwidth(get_the_title(), 0, 64, "...", 'UTF-8')).'</a></li>';
