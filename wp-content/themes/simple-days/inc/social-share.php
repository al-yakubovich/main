<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Social share
 *
 * @package Simple Days
 */




  $sns_info['icon_shape'] = get_theme_mod( 'simple_days_social_share','icon_square');
  $sns_info['icon_size'] = get_theme_mod( 'simple_days_social_share_size','');




      $sns_info['icon_user_color']  = get_theme_mod( 'simple_days_social_share_icon_color','');
      $sns_info['icon_user_hover_color']  = get_theme_mod( 'simple_days_social_share_icon_hover_color','');
      $sns_info['icon_color'] = $sns_info['icon_hover_color'] = '';
      if($sns_info['icon_user_color'] != ''){
        $sns_info['icon_color'] = ' sns_user_c';
        $sns_info['icon_user_color'] = '--user_c:'. $sns_info['icon_user_color'] .'; --user_bc:'. $sns_info['icon_user_color'] .';';
      }
      if($sns_info['icon_user_hover_color'] != ''){
        $sns_info['icon_hover_color'] = ' sns_user_hc';
        $sns_info['icon_user_hover_color'] = ' --user_hc:'. $sns_info['icon_user_hover_color'] .'; --user_hbc:'. $sns_info['icon_user_hover_color'] .';';
      }

  $sns_info['icon_tooltip']  = get_theme_mod( 'simple_days_social_share_icon_tooltip',false) == true  ? ' sns_tooltip' : '';
  $sns_info['icon_tooltip']  = $sns_info['icon_shape'] == 'icon_rectangle' || $sns_info['icon_shape'] == 'icon_hollow_rectangle' ? '' : $sns_info['icon_tooltip'];


  $sns_info['opacity'] = ($sns_info['icon_tooltip'] != ' sns_tooltip' && $sns_info['icon_hover_color'] == $sns_info['icon_color']) ? ' sns_opacity' : '';
  $sns_info['icon_attribute'] = "";
  if($sns_info['icon_shape'] == "icon_square" || $sns_info['icon_shape'] == "icon_circle" || $sns_info['icon_shape'] == "icon_character" || $sns_info['icon_shape'] == "icon_hollow_square" || $sns_info['icon_shape'] == "icon_hollow_circle"){
    $sns_info['icon_attribute'] = " icon_jc";
  }elseif($sns_info['icon_shape'] == "icon_rectangle" || $sns_info['icon_shape'] == "icon_hollow_rectangle"){
    $sns_info['icon_attribute'] = " icon_rec";
  }
      if($sns_info['icon_shape'] == "icon_hollow_square" || $sns_info['icon_shape'] == "icon_hollow_circle" || $sns_info['icon_shape'] == "icon_character" || $sns_info['icon_shape'] == "icon_hollow_rectangle"){
        $sns_info['icon_attribute'] .= " icon_bt";
      }
      if($sns_info['icon_shape'] == "icon_square" || $sns_info['icon_shape'] == "icon_circle" ||  $sns_info['icon_shape'] == "icon_rectangle"){
        $sns_info['icon_attribute'] .= " icon_nh";
      }


  $i = 1;
  while($i <= 10){
    $sns_info['account'][$i] = '';
    $sns_info['icon'][$i] = $sns_info['share'][$i] = get_theme_mod( 'simple_days_sns_share_'.$i,'none');
    $sns_info['url'][$i] = get_the_permalink();
    ++$i;
  }
  $sns_info['loop'] = 10;





?>

<div class="social_share_list">
  <h4><i class="fa <?php echo esc_attr(get_theme_mod( 'simple_days_social_share_title_icon','fa-share-alt')) ?>" aria-hidden="true"></i> <?php echo get_theme_mod( 'simple_days_social_share_title',esc_html__( 'Share this post' , 'simple-days' )); ?></h4>
  <ul class="sns_link_icon sns_share_icon <?php echo esc_attr($sns_info['opacity']); ?>">


<?php


                set_query_var( 'social_info', $sns_info );
                get_template_part( 'inc/social', 'output' );

?>
</ul></div>
