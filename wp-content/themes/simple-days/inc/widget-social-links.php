<?php
/**
 * Widget Social Link
 *
 * @package Simple Days
 */


class simple_days_social_links_widget extends WP_Widget {

	
	function __construct() {
    add_action('admin_enqueue_scripts', array($this, 'scripts'));

		parent::__construct(
			'simple_days_social_links_widget', // Base ID
			esc_html__( '[Simple Days] Social Links', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support Social Links for Widget', 'simple-days' ), ) // Args
		);
	}



    public function widget( $args, $instance ) {

      $title = esc_html( ! empty( $instance['title'] ) ? $instance['title'] : '' );
      $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
      $sns_info['icon_shape']  = ! empty( $instance['display_style'] ) ? $instance['display_style'] : 'icon_square';
      $sns_info['icon_size']  = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '';
      $sns_info['icon_user_color']  = ! empty( $instance['icon_user_color'] ) ? $instance['icon_user_color'] : '';
      $sns_info['icon_user_hover_color']  = ! empty( $instance['icon_user_hover_color'] ) ? $instance['icon_user_hover_color'] : '';
      $sns_info['icon_color'] = $sns_info['icon_hover_color'] = '';
      if($sns_info['icon_user_color'] != ''){
        $sns_info['icon_color'] = ' sns_user_c';
        $sns_info['icon_user_color'] = '--user_c:'. $sns_info['icon_user_color'] .'; --user_bc:'. $sns_info['icon_user_color'] .';';
      }
      if($sns_info['icon_user_hover_color'] != ''){
        $sns_info['icon_hover_color'] = ' sns_user_hc';
        $sns_info['icon_user_hover_color'] = ' --user_hc:'. $sns_info['icon_user_hover_color'] .'; --user_hbc:'. $sns_info['icon_user_hover_color'] .';';
      }

      $sns_info['icon_tooltip']  = ! empty( $instance['icon_tooltip'] ) ? ' sns_tooltip' : '';
      $sns_info['icon_tooltip']  = $sns_info['icon_shape'] == 'icon_rectangle' || $sns_info['icon_shape'] == 'icon_hollow_rectangle' ? '' : $sns_info['icon_tooltip'];
      //$sns_info['icon_tooltip'] = $sns_info['icon_shape'] == 'icon_rectangle' || $sns_info['icon_shape'] == 'icon_hollow_rectangle' ? '' : ' sns_tooltip';
      //$sns_info['opacity'] = ($sns_info['icon_shape'] == 'icon_rectangle' && $sns_info['icon_color'] == '') || ($sns_info['icon_shape'] == 'icon_hollow_rectangle' && $sns_info['icon_color'] == '') ? ' sns_opacity' : '';
      //$sns_link_id = preg_replace('/[^0-9]/', '', $this->id);
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
        $sns_info['share'][$i] = $sns_info['url'][$i] = '';
        $sns_info['icon'][$i] = ! empty( $instance['icon_'.$i] ) ? $instance['icon_'.$i] : 'none';
        $sns_info['account'][$i] = get_theme_mod( 'simple_days_social_account_'.$sns_info['icon'][$i],'');
        $sns_info['icon'][$i] == 'feedly' ? $sns_info['account'][$i] = 'feedly' : '';
        $sns_info['icon'][$i] == 'rss' ? $sns_info['account'][$i] = 'rss' : '';
        ++$i;
      }
      $sns_info['loop'] = 10;


      echo $args['before_widget'];
      if ( $title ) {
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
      }
      echo '<div class="social_list">';


      echo '<ul class="sns_link_icon'.esc_attr($sns_info['opacity']).'">';
        set_query_var( 'social_info', $sns_info );
        get_template_part( 'inc/social', 'output' );
      echo '</ul>';

      echo '</div>';
      echo $args['after_widget'];
	}
	public function form( $instance ) {
    $settings = array();

		$settings['title'] = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$settings['display_style']  = ! empty( $instance['display_style'] ) ? $instance['display_style'] : 'icon_square';
		$settings['icon_size']  = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '';
    $settings['icon_tooltip']  = ! empty( $instance['icon_tooltip'] ) ? $instance['icon_tooltip'] : '';
    $settings['icon_user_color']  = ! empty( $instance['icon_user_color'] ) ? $instance['icon_user_color'] : '';
    $settings['icon_user_hover_color']  = ! empty( $instance['icon_user_hover_color'] ) ? $instance['icon_user_hover_color'] : '';

		$i = 1;
    while($i <= 10){
      $settings['icon_'.$i] = ! empty( $instance['icon_'.$i] ) ? $instance['icon_'.$i] : 'none';
      $i++;
    }


    get_template_part( 'inc/social', 'list' );
    $social = get_query_var('social_list');
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'simple-days' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'social_links_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['title'] ); ?>">
		</p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>">
        <?php esc_html_e( 'Display style', 'simple-days' ); ?></label><br />
      <select id="<?php echo esc_attr( $this->get_field_id( 'display_style' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_style' )); ?>">
<?php
      foreach ($social['shape_list'] as $key => $value) {
        echo '<option '. selected( $settings['display_style'], $key ) .' value="'.esc_attr($key).'" >'.esc_html($value).'</option>';
      }
?>
	  </select>
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>">
        <?php esc_html_e( 'Icon Size', 'simple-days' ); ?></label><br />
      <select id="<?php echo esc_attr( $this->get_field_id( 'icon_size' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_size' )); ?>">
<?php
      foreach ($social['size_list'] as $key => $value) {
        echo '<option '. selected( $settings['icon_size'], $key ) .' value="'.esc_attr($key).'" >'.esc_html($value).'</option>';
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
      <input id="<?php echo esc_attr( $this->get_field_id( 'icon_tooltip' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_tooltip' ) ); ?>" type="checkbox" value="1" <?php checked( $settings['icon_tooltip'] ); ?>/>
      <label for="<?php echo esc_attr( $this->get_field_id( 'icon_tooltip' ) ); ?>"><?php esc_html_e( 'Tool tip', 'simple-days' ); ?></label>
    </p>

    <p>
      <span class="customize-control-title"><?php esc_html_e( 'How to show social icon', 'simple-days' ) ?></span>
    </p>
      <?php
      global $hook_suffix;
      if( 'customize.php' == $hook_suffix ){
        $setting_url = esc_js('javascript:wp.customize.section(\"simple_days_social_account_setting\").focus();' );
      }else{
        $setting_url = esc_url(admin_url('customize.php?autofocus[section]=simple_days_social_account_setting'));
      }
      
       echo sprintf(esc_html__( 'You must register your %1$s before you can show social links.', 'simple-days' ),'<a href="'.$setting_url.'">'.esc_html__( 'Social Account', 'simple-days' ).'</a>'); ?>


<?php
      $i = 1;
      while($i <= 10){
?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'icon_'.$i ) ); ?>">
        <?php  echo sprintf(esc_html__( 'Social Icon #%s', 'simple-days'),esc_html($i)); ?></label><br />
      <select id="<?php echo esc_attr($this->get_field_id( 'icon_'.$i )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_'.$i )); ?>">
      	<?php
          foreach($social['name_list'] as $sns_link_name => $sns_link_title){
          	$selected = selected( $settings['icon_'.$i], $sns_link_name, false );
            echo '<option '.esc_attr($selected).' value="'.esc_attr($sns_link_name).'" >'.esc_html($sns_link_title).'</option>';
          }
      	?>
	  </select>
    </p>



<?php
      $i++;
}
	}




	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['display_style'] = ! empty( $new_instance['display_style'] ) ? esc_attr( $new_instance['display_style'] ) : 'icon_square';
    $instance['icon_size'] = ! empty( $new_instance['icon_size'] ) ? esc_attr( $new_instance['icon_size'] ) : '';
    $instance['icon_user_color'] = ! empty( $new_instance['icon_user_color'] ) ? esc_attr( $new_instance['icon_user_color'] ) : '';
    $instance['icon_user_hover_color'] = ! empty( $new_instance['icon_user_hover_color'] ) ? esc_attr( $new_instance['icon_user_hover_color'] ) : '';
    $instance['icon_tooltip'] = ! empty( $new_instance['icon_tooltip'] ) ? esc_attr( $new_instance['icon_tooltip'] ) : '';
    $i = 1;
    while($i <= 10){
      $instance['icon_'.$i] = ! empty( $new_instance['icon_'.$i] ) ? esc_attr( $new_instance['icon_'.$i] ) : 'none';
      $i++;
    }
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



} // class simple_days_social_links_widget
