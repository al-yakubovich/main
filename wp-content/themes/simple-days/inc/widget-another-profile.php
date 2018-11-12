<?php
/**
 * Widget Another Profile
 *
 * @package Simple Days
 */


class simple_days_another_profile_widget extends WP_Widget {

	
	function __construct() {

    add_action('admin_enqueue_scripts', array($this, 'scripts'));

		parent::__construct(
			's_d_another_profile', // Base ID
			esc_html__( '[Simple Days] Another Profile', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support another profile for Widget', 'simple-days' ), ) // Args
		);

	}

	public function widget( $args, $instance ) {

    $settings = array();

    $settings['title'] = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'About me', 'simple-days');
    $settings['name'] = ! empty( $instance['name'] ) ? $instance['name'] : '';
    $profile_image = ! empty( $instance['profile_img_url'] ) ? $instance['profile_img_url'] : '';
    $settings['profile_img_id'] = ! empty( $instance['profile_img_id'] ) ? $instance['profile_img_id'] : '';
    $settings['profile_img_shape'] = ! empty( $instance['profile_img_shape'] ) ? $instance['profile_img_shape'] : 'circle';
    $bg_image = ! empty( $instance['profile_bg_img_url'] ) ? $instance['profile_bg_img_url'] : '';
    $settings['profile_bg_img_id'] = ! empty( $instance['profile_bg_img_id'] ) ? $instance['profile_bg_img_id'] : '';
    $settings['profile_text'] = ! empty( $instance['profile_text'] ) ? $instance['profile_text'] : '';
    $settings['profile_read_more_url'] = ! empty( $instance['profile_read_more_url'] ) ? $instance['profile_read_more_url'] : '';
    $settings['profile_read_more_text'] = ! empty( $instance['profile_read_more_text'] ) ? $instance['profile_read_more_text'] : esc_html__( 'Read More', 'simple-days' );
    $settings['profile_read_more_blank'] = ! empty( $instance['profile_read_more_blank'] ) ? (bool)$instance['profile_read_more_blank'] : false;
    $sns_info['icon_shape']  = ! empty( $instance['sns_icon_shape'] ) ? $instance['sns_icon_shape'] : 'icon_square';
    $sns_info['icon_size']  = ! empty( $instance['sns_icon_size'] ) ? $instance['sns_icon_size'] : '';

    $sns_info['icon_user_color']  = ! empty( $instance['icon_user_color'] ) ? $instance['icon_user_color'] : '';
    $sns_info['icon_user_hover_color']  = ! empty( $instance['icon_user_hover_color'] ) ? $instance['icon_user_hover_color'] : '';

    $sns_info['icon_tooltip']  = ! empty( $instance['sns_icon_tooltip'] ) ? (bool)$instance['sns_icon_tooltip'] : false;

	  echo $args['before_widget'];
	  //echo esc_html(apply_filters( 'widget_title', $instance['profile_title'] ));



	  echo '<div class="pf_box pf_another_box"><h3 class="widget_title">'.esc_html($settings['title']).'</h3><div class="pf_box_wrap"><div class="pf_bg_img_wrap"><div class="pf_bg fit_box_img_wrap'.($bg_image == '' && $profile_image != ''  ? ' bg_no_img' : '').($bg_image == '' && $profile_image == ''  ? ' pf_no_bg_no_img' : '').'">';
      if($bg_image != ''){
        echo '<'.(is_amp() ? 'amp-img layout="responsive"':'img').' src="'.esc_url($bg_image).'" height="160" width="310" alt="'.esc_html($settings['name']).'" />';
      }
	  echo '</div><div class="pf_img_wrap'.($bg_image == '' ? ' pf_no_bg' : '').($bg_image != '' && $profile_image == '' ? ' pf_bg_no_img' : '').'">';
      if($profile_image != ''){
        echo '<div class="pf_img pf_img_shape_'.esc_attr($settings['profile_img_shape']).' fit_box_img_wrap"><'.(is_amp() ? 'amp-img layout="responsive"':'img').' src="'.esc_url($profile_image).'" height="120" width="120" class="" alt="background" /></div>';
      }
	  echo '</div></div><span class="pf_name">'.esc_html($settings['name']).'</span><div class="pf_wrap'.($bg_image == '' ? ' pf_no_bg' : '').'"><p class="pf_txt">'.($settings['profile_text']);
      if($settings['profile_read_more_url'] != ''){
        echo '<br /><a href="'.esc_url($settings['profile_read_more_url']).'" class="pf_rm"'.($settings['profile_read_more_blank'] == true ? ' target="_blank"' : '').'>'.esc_html($settings['profile_read_more_text']).'</a>';
      }



      $sns_info['icon_color'] = $sns_info['icon_hover_color'] = '';
      if($sns_info['icon_user_color'] != ''){
        $sns_info['icon_color'] = ' sns_user_c';
        $sns_info['icon_user_color'] = '--user_c:'. $sns_info['icon_user_color'] .'; --user_bc:'. $sns_info['icon_user_color'] .';';
      }
      if($sns_info['icon_user_hover_color'] != ''){
        $sns_info['icon_hover_color'] = ' sns_user_hc';
        $sns_info['icon_user_hover_color'] = ' --user_hc:'. $sns_info['icon_user_hover_color'] .'; --user_hbc:'. $sns_info['icon_user_hover_color'] .';';
      }

      $sns_info['icon_tooltip']  = $sns_info['icon_tooltip'] == true ? ' sns_tooltip' : '';
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
        $sns_info['icon'][$i] = ! empty( $instance['sns_icon_'.$i] ) ? esc_attr( $instance['sns_icon_'.$i] ) : 'none';
        $sns_info['url'][$i] = ! empty( $instance['sns_url_'.$i] ) ? esc_attr( $instance['sns_url_'.$i] ) : '';
        ++$i;
      }
      $sns_info['loop'] = 5;

    echo '</p><div class="pf_sns_wrap">';

    echo '<ul class="sns_link_icon'.esc_attr($sns_info['opacity']).'">';
      set_query_var( 'social_info', $sns_info );
      get_template_part( 'inc/social', 'output' );
    echo '</ul>';

	  echo '</div></div></div></div>';
    echo $args['after_widget'];
	}
	public function form( $instance ) {
    $settings = array();

    $settings['title'] = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'About me', 'simple-days');
    $settings['name'] = ! empty( $instance['name'] ) ? $instance['name'] : '';
    $settings['profile_img_url'] = ! empty( $instance['profile_img_url'] ) ? $instance['profile_img_url'] : '';
    $settings['profile_img_id'] = ! empty( $instance['profile_img_id'] ) ? $instance['profile_img_id'] : '';
    $settings['profile_img_shape'] = ! empty( $instance['profile_img_shape'] ) ? $instance['profile_img_shape'] : 'circle';
    $settings['profile_bg_img_url'] = ! empty( $instance['profile_bg_img_url'] ) ? $instance['profile_bg_img_url'] : '';
    $settings['profile_bg_img_id'] = ! empty( $instance['profile_bg_img_id'] ) ? $instance['profile_bg_img_id'] : '';
    $settings['profile_text'] = ! empty( $instance['profile_text'] ) ? $instance['profile_text'] : '';
    $settings['profile_read_more_url'] = ! empty( $instance['profile_read_more_url'] ) ? $instance['profile_read_more_url'] : '';
    $settings['profile_read_more_text'] = ! empty( $instance['profile_read_more_text'] ) ? $instance['profile_read_more_text'] : esc_html__( 'Read More', 'simple-days' );
    $settings['profile_read_more_blank'] = ! empty( $instance['profile_read_more_blank'] ) ?  (bool) $instance['profile_read_more_blank'] : false;
    $settings['sns_icon_shape']  = ! empty( $instance['sns_icon_shape'] ) ? $instance['sns_icon_shape'] : 'icon_square';
    $settings['sns_icon_size']  = ! empty( $instance['sns_icon_size'] ) ? $instance['sns_icon_size'] : '';
    $settings['icon_user_color']  = ! empty( $instance['icon_user_color'] ) ? $instance['icon_user_color'] : '';
    $settings['icon_user_hover_color']  = ! empty( $instance['icon_user_hover_color'] ) ? $instance['icon_user_hover_color'] : '';
    $settings['sns_icon_tooltip']  = ! empty( $instance['sns_icon_tooltip'] ) ? (bool) $instance['sns_icon_tooltip'] : false;





    get_template_part( 'inc/social', 'list' );
    $social = get_query_var('social_list');
?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['title'] ); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Name', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['name'] ); ?>">
    </p>



    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'profile_img_url' ) ); ?>"><?php esc_html_e( 'Profile image', 'simple-days' ); ?></label>
      <div class="profile_img" style="width: 100%; height:auto;">
        <div class="<?php echo esc_attr($this->get_field_id( 'profile_img_id' ) ); ?>_placeholder" style="width: 100%; position: relative; text-align: center; cursor: default;border: 1px dashed #b4b9be;box-sizing: border-box;padding: 9px 0;line-height: 20px; margin: 10px 0;<?php if( !empty( $settings['profile_img_url'] ) ){echo 'display:none;';} ?>"><?php esc_html_e( 'No image selected', 'simple-days' ); ?></div>
        <img class="<?php echo esc_attr($this->get_field_id( 'profile_img_id' )); ?>_media_image custom_media_image" src="<?php if( !empty( $settings['profile_img_url'] ) ){echo esc_url($settings['profile_img_url']);} ?>" style="width: 100%; max-width: 120px; height:auto; margin-bottom: 10px;" />

      </div>
      <input type="hidden" type="text" class="<?php echo esc_attr($this->get_field_id( 'profile_img_id' )); ?>_media_id custom_media_id" name="<?php echo esc_attr($this->get_field_name( 'profile_img_id' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'profile_img_id' )); ?>" value="<?php echo esc_attr($settings['profile_img_id']); ?>" />
      <input type="hidden" type="text" class="<?php echo esc_attr($this->get_field_id( 'profile_img_id' )); ?>_media_url custom_media_url" name="<?php echo esc_attr($this->get_field_name( 'profile_img_url' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'profile_img_url' )); ?>" value="<?php echo esc_attr($settings['profile_img_url']); ?>" >
      <input type="button" value="<?php esc_html_e( 'Clear Image', 'simple-days' ); ?>" class="button <?php echo esc_attr($this->get_field_id( 'profile_img_id' )); ?>_remove-button custom_media_clear" id="<?php echo esc_attr($this->get_field_id( 'profile_img_id' )); ?>" style="<?php if( !empty( $settings['profile_img_url'] ) ){echo 'display:inline-block;';}else{echo 'display:none;';} ?>" />
      <input type="button" value="<?php esc_html_e( 'Select Image', 'simple-days' ); ?>" class="button upload-button custom_media_upload" id="<?php echo esc_attr($this->get_field_id( 'profile_img_id' )); ?>"/>
    </p>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'profile_img_shape' ) ); ?>">
        <?php esc_html_e( 'Profile image display shape', 'simple-days' ); ?></label><br />
      <select id="<?php echo esc_attr( $this->get_field_id( 'profile_img_shape' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profile_img_shape' )); ?>">
        <option <?php echo selected( $settings['profile_img_shape'], 'circle' ); ?> value="circle" ><?php esc_html_e( 'Circle', 'simple-days' ); ?></option>
        <option <?php echo selected( $settings['profile_img_shape'], 'square' ); ?> value="square" ><?php esc_html_e( 'Square', 'simple-days' ); ?></option>
      </select>
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_url' )); ?>"><?php esc_html_e( 'Background image', 'simple-days' ); ?></label>
      <div class="profile_bg_img" style="width: 100%; height:auto;">
        <div class="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>_placeholder" style="width: 100%; position: relative; text-align: center; cursor: default;border: 1px dashed #b4b9be;box-sizing: border-box;padding: 9px 0;line-height: 20px; margin: 10px 0; <?php if( !empty( $settings['profile_bg_img_url'] ) ){echo 'display:none;';} ?>"><?php esc_html_e( 'No image selected', 'simple-days' ); ?></div>
        <img class="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>_media_image custom_media_image" src="<?php if( !empty( $settings['profile_bg_img_url'] ) ){echo esc_url($settings['profile_bg_img_url']);} ?>" style="width: 100%; max-width: 316px; height:auto; margin-bottom: 10px;" />

      </div>
      <input type="hidden" type="text" class="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>_media_id custom_media_id" name="<?php echo esc_attr($this->get_field_name( 'profile_bg_img_id' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>" value="<?php echo esc_attr($settings['profile_bg_img_id']); ?>" />
      <input type="hidden" type="text" class="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>_media_url custom_media_url" name="<?php echo esc_attr($this->get_field_name( 'profile_bg_img_url' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_url' )); ?>" value="<?php echo esc_url($settings['profile_bg_img_url']); ?>" >
      <input type="button" value="<?php esc_html_e( 'Clear Image', 'simple-days' ); ?>" class="button <?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>_remove-button custom_media_clear" id="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>" style="<?php if( !empty( $settings['profile_bg_img_url'] ) ){echo 'display:inline-block;';}else{echo 'display:none;';} ?>" />
      <input type="button" value="<?php esc_html_e( 'Select Image', 'simple-days' ); ?>" class="button upload-button custom_media_upload" id="<?php echo esc_attr($this->get_field_id( 'profile_bg_img_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'profile_bg_img_id' )); ?>" />
    </p>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'profile_text' ) ); ?>">
        <?php esc_html_e( 'Profile text', 'simple-days' ); ?></label><br />
      <textarea id="<?php echo esc_attr($this->get_field_id( 'profile_text' )); ?>" rows="5" style="width:100%;" name="<?php echo esc_attr( $this->get_field_name( 'profile_text' ) ); ?>"><?php echo $settings['profile_text']; ?></textarea>
    </p>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'profile_read_more_url' ) ); ?>"><?php esc_html_e( 'Read more URL', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'profile_read_more_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profile_read_more_url' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['profile_read_more_url'] ); ?>">
    </p>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'profile_read_more_text' ) ); ?>"><?php esc_html_e( 'Read more text', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'profile_read_more_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profile_read_more_text' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['profile_read_more_text'] ); ?>">
    </p>
    <p>
      <input id="<?php echo esc_attr( $this->get_field_id( 'profile_read_more_blank' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profile_read_more_blank' ) ); ?>" type="checkbox" value="1" <?php checked( $settings['profile_read_more_blank'] ); ?>/>
      <label for="<?php echo esc_attr( $this->get_field_id( 'profile_read_more_blank' ) ); ?>"><?php esc_html_e( 'Read more link open new window.', 'simple-days' ); ?></label>
    </p>



    <hr>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'sns_icon_shape' ) ); ?>">
        <?php esc_html_e( 'Display style', 'simple-days' ); ?></label><br />
      <select id="<?php echo esc_attr( $this->get_field_id( 'sns_icon_shape' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sns_icon_shape' )); ?>">
<?php
      foreach ($social['shape_list'] as $key => $value) {
        echo '<option '. selected( $settings['sns_icon_shape'], $key ) .' value="'.esc_attr($key).'" >'.esc_html($value).'</option>';
      }
?>
      </select>
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'sns_icon_size' ) ); ?>">
        <?php esc_html_e( 'Icon Size', 'simple-days' ); ?></label><br />
      <select id="<?php echo esc_attr( $this->get_field_id( 'sns_icon_size' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sns_icon_size' )); ?>">
<?php
      foreach ($social['size_list'] as $key => $value) {
        echo '<option '. selected( $settings['sns_icon_size'], $key ) .' value="'.esc_attr($key).'" >'.esc_html($value).'</option>';
      }
?>
      </select>
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'icon_user_color' ) ); ?>" style="display:block;"><?php esc_html_e( 'Specifies the color of the icon.', 'simple-days'  ); ?></label>
      <input class="widefat color-picker" id="<?php echo esc_attr( $this->get_field_id( 'icon_user_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_user_color' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['icon_user_color'] ); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'icon_user_hover_color' ) ); ?>" style="display:block;"><?php esc_html_e( 'Specifies the color of hover.', 'simple-days'  ); ?></label>
      <input class="widefat color-picker" id="<?php echo esc_attr( $this->get_field_id( 'icon_user_hover_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_user_hover_color' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['icon_user_hover_color'] ); ?>" />
    </p>

    <p>
      <input id="<?php echo esc_attr( $this->get_field_id( 'sns_icon_tooltip' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sns_icon_tooltip' ) ); ?>" type="checkbox" value="1" <?php checked( $settings['sns_icon_tooltip'] ); ?>/>
      <label for="<?php echo esc_attr( $this->get_field_id( 'sns_icon_tooltip' ) ); ?>"><?php esc_html_e( 'Tool tip', 'simple-days' ); ?></label>
    </p>


<?php
    $i = 1;
    while($i <= 5){
      $settings['sns_icon_'.$i] = ! empty( $instance['sns_icon_'.$i] ) ? esc_attr( $instance['sns_icon_'.$i] ) : 'none';
      $settings['sns_url_'.$i] = ! empty( $instance['sns_url_'.$i] ) ? esc_attr( $instance['sns_url_'.$i] ) : '';
?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'sns_icon_'.$i ) ); ?>">
        <?php  echo sprintf(esc_html__( 'Social Icon #%s', 'simple-days'),esc_html($i)); ?></label><br />
      <select id="<?php echo esc_attr($this->get_field_id( 'sns_icon_'.$i )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sns_icon_'.$i )); ?>">
        <?php
          foreach($social['name_list'] as $sns_link_name => $sns_link_title){
            $selected = selected( $settings['sns_icon_'.$i], $sns_link_name, false );
            echo '<option '.esc_attr($selected).' value="'.esc_attr($sns_link_name).'" >'.esc_html($sns_link_title).'</option>';
          }
        ?>
      </select>
      <br />
      <label for="<?php echo esc_attr( $this->get_field_id( 'sns_url_'.$i ) ); ?>">
        <?php  echo sprintf(esc_html__( 'Social URL #%s', 'simple-days'),esc_html($i)); ?></label><br />
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sns_url_'.$i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sns_url_'.$i ) ); ?>" type="text" value="<?php echo esc_attr( $settings['sns_url_'.$i] ); ?>">
    </p>


<?php
      $i++;
    }





	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();

    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['name'] = ( ! empty( $new_instance['name'] ) ) ? sanitize_text_field( $new_instance['name'] ) : '';
    $instance['profile_img_url'] = ( ! empty( $new_instance['profile_img_url'] ) ) ? esc_url( $new_instance['profile_img_url'] ) : '';
    $instance['profile_img_id'] = ( ! empty( $new_instance['profile_img_id'] ) ) ? sanitize_text_field( $new_instance['profile_img_id'] ) : '';
    $instance['profile_img_shape'] = ( ! empty( $new_instance['profile_img_shape'] ) ) ? sanitize_text_field( $new_instance['profile_img_shape'] ) : 'circle';
    $instance['profile_bg_img_url'] = ( ! empty( $new_instance['profile_bg_img_url'] ) ) ? esc_url( $new_instance['profile_bg_img_url'] ) : '';
    $instance['profile_bg_img_id'] = ( ! empty( $new_instance['profile_bg_img_id'] ) ) ? sanitize_text_field( $new_instance['profile_bg_img_id'] ) : '';
    $instance['profile_text'] = ( ! empty( $new_instance['profile_text'] ) ) ? sanitize_text_field( $new_instance['profile_text'] ) : '';
    $instance['profile_read_more_url'] = ( ! empty( $new_instance['profile_read_more_url'] ) ) ? esc_url( $new_instance['profile_read_more_url'] ) : '';
    $instance['profile_read_more_text'] = ( ! empty( $new_instance['profile_read_more_text'] ) ) ? sanitize_text_field( $new_instance['profile_read_more_text'] ) : '';
    $instance['profile_read_more_blank'] = ( ! empty( $new_instance['profile_read_more_blank'] ) ) ? (bool) $new_instance['profile_read_more_blank']  : false;

    $instance['sns_icon_shape'] = ! empty( $new_instance['sns_icon_shape'] ) ? esc_attr( $new_instance['sns_icon_shape'] ) : 'icon_square';
    $instance['sns_icon_size'] = ! empty( $new_instance['sns_icon_size'] ) ? esc_attr( $new_instance['sns_icon_size'] ) : '';
    $instance['icon_user_color'] = ! empty( $new_instance['icon_user_color'] ) ? esc_attr( $new_instance['icon_user_color'] ) : '';
    $instance['icon_user_hover_color'] = ! empty( $new_instance['icon_user_hover_color'] ) ? esc_attr( $new_instance['icon_user_hover_color'] ) : '';
    $instance['sns_icon_tooltip'] = ! empty( $new_instance['sns_icon_tooltip'] ) ? (bool) $new_instance['sns_icon_tooltip']  : false;
    $i = 1;
    while($i <= 5){
      $instance['sns_icon_'.$i] = ! empty( $new_instance['sns_icon_'.$i] ) ? esc_attr( $new_instance['sns_icon_'.$i] ) : 'none';
      $instance['sns_url_'.$i] = ! empty( $new_instance['sns_url_'.$i] ) ? esc_attr( $new_instance['sns_url_'.$i] ) : '';
      $i++;
    }
    return $instance;

	}

public function scripts($hook){


  if ($hook == 'widgets.php' || $hook == 'customize.php') {
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_media();
    wp_enqueue_script('simple_days_widget-uploader', SIMPLE_DAYS_THEME_URI . '/assets/js/customizer/widget-uploader.min.js', array('jquery'));
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
