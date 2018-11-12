<?php
/**
 * Widget Recent Posts List
 *
 * @package Simple Days
 */
  $pp_value = '';
  if(get_query_var( 'popular_post_style')){
    $i = get_query_var( 'popular_post_count');
    $pp_value = '<div class="s_d_pl_ra s_d_pl_center">'.$i.'</div>';
  }

  echo '<li class="s_d_pl_li s_d_pl_li_border">'.$pp_value.'<a href="' . esc_url(get_permalink()) . '" class="s_d_pl_title p5">'.esc_html(mb_strimwidth(get_the_title(), 0, 48, "...", 'UTF-8')).'</a></li>';
