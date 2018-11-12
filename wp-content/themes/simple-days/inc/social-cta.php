<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Social CTA
 *
 * @package Simple Days
 * @since 0.4.1
 * @version 0.0.2
 */
  $ontouchstart = '';
  if(!is_amp()) $ontouchstart = ' ontouchstart=""';


  $get_locale = get_locale();
  $get_locale == 'ja' ? $get_locale = 'ja_JP' : '';
  $facebook_id = get_theme_mod( 'simple_days_social_account_facebook' , '');
  $facebook_app_id = get_theme_mod( 'simple_days_social_account_facebook_app_id' , '');
  $twitter_id = get_theme_mod( 'simple_days_social_account_twitter' , '');
?>
<div class="s_d_cta_box simple_days_box_shadow">

  <div class="cta_box_bg fit_box_img_wrap">
  <<?php echo (is_amp()?'amp-img layout="responsive"':'img'); ?> src="<?php if ( has_post_thumbnail()) {echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ));}else{echo esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/blank.png');} ?>" class="scale_13 trans_10"<?php echo esc_attr($ontouchstart); ?> width="640" height="480" />
  </div>
  <div class="cta_box_wrap">
    <div class="cta_box_thum fit_box_img_wrap">
      <<?php echo (is_amp()?'amp-img layout="responsive"':'img'); ?> src="<?php if ( has_post_thumbnail()) {echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ));}else{echo esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'));} ?>" class="scale_13 trans_10"<?php echo esc_attr($ontouchstart); ?> width="640" height="480" />
    </div>
    <div class="cta_box_like_wrap<?php echo (get_theme_mod( 'simple_days_social_cta_gradation',false) == true ? ' cta_box_gra' : '') ?>">
      <p class="cta_box_like_text"><?php echo esc_html(get_theme_mod( 'simple_days_social_cta_heading_text' , esc_html__('Follow us', 'simple-days'))); ?></p>

      <div class="cta_box_social">
<?php if(get_theme_mod( 'simple_days_social_cta_facebook',false) == true && $facebook_id != ''){ ?>
        <div class="cta_box_fa">
<?php if(get_theme_mod( 'simple_days_social_cta_facebook_script',false) == true && !is_amp()){ ?>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/<?php echo esc_attr($get_locale); ?>/sdk.js#xfbml=1&version=v3.0&appId=<?php echo esc_attr($facebook_app_id); ?>&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php }
      if(!is_amp()){ ?>
          <div class="fb-like" data-href="https://www.facebook.com/<?php echo esc_attr($facebook_id); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
  <?php  }else{ ?>
          <amp-facebook-like width=100 height=28
    layout="fixed"
    data-layout="button_count"
    data-action="like"
    data-size="large"
    data-show-faces="false"
    data-share="false"
    data-locale="<?php echo esc_attr($get_locale); ?>"
    data-href="https://www.facebook.com/<?php echo esc_attr($facebook_id); ?>/">
</amp-facebook-like>

  <?php  } ?>

        </div>
<?php } ?>
<?php if(get_theme_mod( 'simple_days_social_cta_twitter',false) == true && $twitter_id != ''){ ?>
        <div class="cta_box_tw">
  <?php if(!is_amp()){ ?>
          <a href="https://twitter.com/<?php echo esc_attr(str_replace( '@' , '' , $twitter_id )); ?>" class="twitter-follow-button" data-show-count="true" data-size="large" data-show-screen-name="false">Follow <?php echo esc_attr('@' . str_replace( '@' , '' , $twitter_id )); ?></a><script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <?php  }else{ ?>
          <a href="https://twitter.com/intent/follow?screen_name=<?php echo esc_attr(str_replace( '@' , '' , $twitter_id )); ?>" class="s_d_tw_but non_hover"><i class="icomoon icon-twitter"></i> <?php echo esc_html_x('Follow', 'cta_twitter_follow' ,'simple-days'); ?></a>
  <?php  } ?>
        </div>
<?php } ?>
      </div>
      <p class="cta_box_like_text"><?php echo esc_html(get_theme_mod( 'simple_days_social_cta_end_text' , esc_html__('We will keep you updated', 'simple-days'))); ?></p>
    </div>
  </div>
</div>