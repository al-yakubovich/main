<?php
/**
 * Widget Profile
 *
 * @package Simple Days
 */


class simple_days_profile_widget extends WP_Widget {

	
	function __construct() {
    add_action('admin_enqueue_scripts', array($this, 'scripts'));

		parent::__construct(
			'simple_days_profile_widget', // Base ID
			esc_html__( '[Simple Days] Profile', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support profile for Widget', 'simple-days' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
	  echo $args['before_widget'];
	  //echo esc_html(apply_filters( 'widget_title', $instance['profile_title'] ));
      $bg_image = get_theme_mod( 'simple_days_profile_background_image' , '');
      $profile_image = get_theme_mod( 'simple_days_profile_image' , '');


	  echo '<div class="pf_box"><h3 class="widget_title">'.esc_html(get_theme_mod( 'simple_days_profile_title' , esc_html__( 'About me', 'simple-days'))).'</h3><div class="pf_box_wrap"><div class="pf_bg_img_wrap"><div class="pf_bg fit_box_img_wrap'.($bg_image == '' && $profile_image != ''  ? ' bg_no_img' : '').($bg_image == '' && $profile_image == ''  ? ' pf_no_bg_no_img' : '').'">';
      if($bg_image != ''){
        echo '<'.(is_amp() ? 'amp-img layout="responsive"':'img').' src="'.esc_url($bg_image).'" height="160" width="310" alt="'.esc_html(get_theme_mod( 'simple_days_profile_name' , '')).'" />';
      }
	  echo '</div><div class="pf_img_wrap'.($bg_image == '' ? ' pf_no_bg' : '').($bg_image != '' && $profile_image == '' ? ' pf_bg_no_img' : '').'">';
      if($profile_image != ''){
        echo '<div class="pf_img pf_img_shape_'.esc_attr(get_theme_mod( 'simple_days_profile_image_wrap' , 'circle')).' fit_box_img_wrap"><'.(is_amp() ? 'amp-img layout="responsive"':'img').' src="'.esc_url($profile_image).'" height="120" width="120" class="" alt="background" /></div>';
      }
	  echo '</div></div><span class="pf_name">'.esc_html(get_theme_mod( 'simple_days_profile_name' , '')).'</span><div class="pf_wrap'.($bg_image == '' ? ' pf_no_bg' : '').'"><p class="pf_txt">'.(get_theme_mod( 'simple_days_profile_text' , ''));
      if(get_theme_mod( 'simple_days_profile_read_more_url' , '') != ''){
        echo '<br /><a href="'.esc_url(get_theme_mod( 'simple_days_profile_read_more_url' , '')).'" class="pf_rm"'.(get_theme_mod( 'simple_days_profile_read_more_blank' , false) == true ? ' target="_blank"' : '').'>'.esc_html(get_theme_mod( 'simple_days_profile_read_more_text' , esc_html__( 'Read More', 'simple-days' ))).'</a>';
      }
    echo '</p><div class="pf_sns_wrap">';


      $sns_info['icon_shape'] = get_theme_mod( 'simple_days_profile_social_link_shape','icon_square');
      $sns_info['icon_size'] = get_theme_mod( 'simple_days_profile_social_link_size','');

      $sns_info['icon_user_color']  = get_theme_mod( 'simple_days_profile_social_icon_color','');
      $sns_info['icon_user_hover_color']  = get_theme_mod( 'simple_days_profile_social_icon_hover_color','');
      $sns_info['icon_color'] = $sns_info['icon_hover_color'] = '';
      if($sns_info['icon_user_color'] != ''){
        $sns_info['icon_color'] = ' sns_user_c';
        $sns_info['icon_user_color'] = '--user_c:'. $sns_info['icon_user_color'] .'; --user_bc:'. $sns_info['icon_user_color'] .';';
      }
      if($sns_info['icon_user_hover_color'] != ''){
        $sns_info['icon_hover_color'] = ' sns_user_hc';
        $sns_info['icon_user_hover_color'] = ' --user_hc:'. $sns_info['icon_user_hover_color'] .'; --user_hbc:'. $sns_info['icon_user_hover_color'] .';';
      }


      $sns_info['icon_tooltip']  = get_theme_mod( 'simple_days_profile_social_icon_tooltip',false) == true ? ' sns_tooltip' : '';
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
      //$sns_icon = array();
      while($i <= 5){
        $sns_info['share'][$i] = $sns_info['url'][$i] = '';
      	$sns_info['icon'][$i] = get_theme_mod( 'simple_days_profile_social_icon_'.$i,'none');
      	$sns_info['account'][$i] = get_theme_mod( 'simple_days_social_account_'.$sns_info['icon'][$i],'');
      	$sns_info['icon'][$i] == 'feedly' ? $sns_info['account'][$i] = 'feedly' : '';
        $sns_info['icon'][$i] == 'rss' ? $sns_info['account'][$i] = 'rss' : '';
        ++$i;
      }
      $sns_info['loop'] = 5;

    echo '<ul class="sns_link_icon'.esc_attr($sns_info['opacity']).'">';
      set_query_var( 'social_info', $sns_info );
      get_template_part( 'inc/social', 'output' );

	  echo '</ul>';
    echo '</div></div></div></div>';
    echo $args['after_widget'];
	}
	public function form( $instance ) {

	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		return $instance;
	}

  public function scripts($hook){
    if ($hook == 'widgets.php' || $hook == 'customize.php') {
      wp_enqueue_style( 'wp-color-picker');
      wp_enqueue_script( 'wp-color-picker');

      if(is_customize_preview()){
        wp_enqueue_script('simple_days_widget-color-picker', SIMPLE_DAYS_THEME_URI . '/assets/js/customizer/color-picker-customizer.min.js', array('jquery'));
      }else{
        wp_enqueue_script('simple_days_widget-color-picker', SIMPLE_DAYS_THEME_URI . '/assets/js/customizer/color-picker-widget.min.js', array('jquery'));
      }
    }

  }


} // class simple_days_profile_widget
