<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Author profile
 *
 * @package Simple Days
 */

?>
<!--Author profile-->
<div class="tabs">
  <input id="author_profile" type="radio" name="tab_item" checked>
  <label class="tab_item opa7 simple_days_box_shadow" for="author_profile"><?php echo esc_attr__('About the author','simple-days'); ?></label>
  <input id="author_latest_post" type="radio" name="tab_item">
  <label class="tab_item opa7 simple_days_box_shadow" for="author_latest_post"><?php echo esc_attr__('Latest posts','simple-days'); ?></label>
  <div id="author_profile_content" class="tab_content simple_days_box_shadow" >
    <div class="author_profile_box">
      <div class="author_avatar">
        <<?php echo ( is_amp() ? 'amp-img layout="responsive"' : 'img' ); ?> src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" width="96" height="96" />
        <?php //echo get_avatar( get_the_author_meta('ID') , 64); ?>
      </div>
      <div class="author_info mra">
        <span class="author_name"><?php the_author_meta('nickname'); ?></span>
        <?php echo wpautop(get_the_author_meta('user_description')); ?>
<?php
          $simple_days_social_user_profile = get_the_author_meta( 'simple_days_social_user_profile');
          if(!empty($simple_days_social_user_profile)){

              $simple_days_social_option = array('icon_shape','icon_size','icon_user_color','icon_user_hover_color','icon_tooltip');
              foreach ($simple_days_social_option as $value) {
                if(isset($simple_days_social_user_profile[$value])){
                  $sns_info[$value] = $simple_days_social_user_profile[$value];
                }else{
                  $sns_info[$value] = '';
                }
              }

              if($sns_info['icon_shape'] == '') $sns_info['icon_shape']  = 'icon_square';

      $sns_info['icon_color'] = $sns_info['icon_hover_color'] = '';
      if($sns_info['icon_user_color'] != ''){
        $sns_info['icon_color'] = ' sns_user_c';
        $sns_info['icon_user_color'] = '--user_c:'. $sns_info['icon_user_color'] .'; --user_bc:'. $sns_info['icon_user_color'] .';';
      }
      if($sns_info['icon_user_hover_color'] != ''){
        $sns_info['icon_hover_color'] = ' sns_user_hc';
        $sns_info['icon_user_hover_color'] = ' --user_hc:'. $sns_info['icon_user_hover_color'] .'; --user_hbc:'. $sns_info['icon_user_hover_color'] .';';
      }


              if($sns_info['icon_tooltip'] != '') $sns_info['icon_tooltip']  = ' sns_tooltip';
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

              while($i <= 5){
                $sns_info['account'][$i] = $sns_info['share'][$i] = '';

                $sns_info['icon'][$i] = $sns_url[$i] = '';
                if(isset($simple_days_social_user_profile['sns_icon_'.$i])){
                  $sns_info['icon'][$i] = $simple_days_social_user_profile['sns_icon_'.$i];
                }
                if(isset($simple_days_social_user_profile['sns_url_'.$i])){
                  $sns_info['url'][$i] = $simple_days_social_user_profile['sns_url_'.$i];
                }
                ++$i;
              }

              $sns_info['loop'] = 5;


              echo '<ul class="sns_link_icon'.esc_attr($sns_info['opacity']).' sns_ap mb0">';
                set_query_var( 'social_info', $sns_info );
                get_template_part( 'inc/social', 'output' );
              echo '</ul>';
          }

?>


      </div>
    </div>
  </div>
  <div id="author_latest_post_content" class="tab_content simple_days_box_shadow" >
    <div class="author_profile_box">
      <div class="author_avatar">
        <<?php echo ( is_amp() ? 'amp-img layout="responsive"' : 'img' ); ?> src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" width="96" height="96" />
        <?php //echo get_avatar( get_the_author_meta('ID') , 64); ?>
      </div>
  <?php if(get_option( 'fresh_site' ) != 1):
      $post_args = array(
        'author'  => get_the_author_meta('ID'),
        'orderby'   => 'date',
        'numberposts'     => '5',
        'post_type' => 'post',
      );
      $posts = get_posts($post_args);
      if (!empty($posts) ) { ?>
      <ul class="author_lp m0">
      <?php foreach( $posts as $post ) : setup_postdata($post); ?>
          <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <span><?php echo get_the_date();?></span></li>
      <?php endforeach;
            wp_reset_postdata(); ?>
      </ul>
    <?php } endif;?>
    </div>
  </div>
</div>
<!--/Author profile-->
