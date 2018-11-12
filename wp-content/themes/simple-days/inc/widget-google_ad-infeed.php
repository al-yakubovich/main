<?php
/**
 * Widget Google AdSense infeed
 *
 * @package Simple Days
 */


class simple_days_google_ad_infeed_widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			's_d_go_inf', // Base ID
			esc_html__( '[Simple Days] Google AdSense In-feed', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support a In-feed ad unit for Google AdSense.', 'simple-days' ), ) // Args
		);
	}

	
	
	
	

	public function widget( $args, $instance ) {
		$data = array();


		$data['client'] = get_theme_mod( 'simple_days_google_ad_publisher_id' , '');
		$data['slot'] = get_theme_mod( 'simple_days_google_ad_data_ad_slot_infeed' , '');
		$data['layout_key'] = get_theme_mod( 'simple_days_google_ad_data_ad_layout_key_infeed' , '');
		$data['slot_mobile'] = get_theme_mod( 'simple_days_google_ad_data_ad_slot_infeed_mobile' , '');
		$data['layout_key_mobile'] = get_theme_mod( 'simple_days_google_ad_data_ad_layout_key_infeed_mobile' , '');

		if ( $data['client'] != '' && ( ($data['slot'] != '' || !empty( $instance['data_ad_slot'] )) && ($data['layout_key'] != '' || !empty( $instance['data_ad_layout_key'] )) ) || ( ($data['slot_mobile'] != '' || !empty( $instance['data_ad_slot_mobile'] )) && ($data['layout_key_mobile'] != '' || !empty( $instance['data_ad_layout_key_mobile'] )) )){
			//echo $args['before_widget'];
			$data['labeling'] = get_theme_mod( 'simple_days_google_ad_labeling' , '0');
			if ($data['labeling'] == '1'){
				$data['labeling'] = esc_html__( 'Advertisements', 'simple-days' );
			}else if ($data['labeling'] == '2'){
				$data['labeling'] = esc_html__( 'Sponsored Links', 'simple-days' );
			}else{
				$data['labeling'] = '';
			}
			
			if(!empty( $instance['data_ad_slot'] ))$data['slot'] = $instance['data_ad_slot'];
			if(!empty( $instance['data_ad_layout_key'] ))$data['layout_key'] = $instance['data_ad_layout_key'];
			if(!empty( $instance['data_ad_slot_mobile'] ))$data['slot_mobile'] = $instance['data_ad_slot_mobile'];
			if(!empty( $instance['data_ad_layout_key_mobile'] ))$data['layout_key_mobile'] = $instance['data_ad_layout_key_mobile'];

			echo '<div class="ad_box ad_infeed simple_days_box_shadow" itemscope itemtype="https://schema.org/WPAdBlock">';






			if(is_amp()){
				$settings['data_ad_slot_res'] = ! empty( $instance['data_ad_slot_res'] ) ? $instance['data_ad_slot_res'] : '';


				if ( $settings['data_ad_slot_res'] == '') $data['slot_res'] = get_theme_mod( 'simple_days_google_ad_data_ad_slot' , '');

				if ( $data['slot_res'] != ''){
					if ( $data['labeling'] != '' ) {
						echo '<div class="ad_labeling">' . esc_html($data['labeling']) . '</div>';
					}
					echo apply_filters( 'widget_text',
						'<amp-ad width="100vw" height=320
						type="adsense"
						data-ad-client="'.$data['client'].'"
						data-ad-slot="'.$data['slot_res'].'"
						data-auto-format="rspv"
						data-full-width>
						<div overflow></div>
						</amp-ad>' );
				}
			}else{
				if(wp_is_mobile() && ( $data['slot_mobile'] != '' && $data['layout_key_mobile'] != '')){
					$data['layout_key'] = $data['layout_key_mobile'];
					$data['slot'] = $data['slot_mobile'];
				}
				if($data['layout_key'] != '' && $data['slot'] != ''){
					echo apply_filters( 'widget_text',
						'<ins class="adsbygoogle"
						style="display:block"
						data-ad-format="fluid"
						data-ad-layout-key="'.$data['layout_key'].'"
						data-ad-client="'.$data['client'].'"
						data-ad-slot="'.$data['slot'].'">
						</ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>'
					);
				}
			}
			echo '</div>';
			//echo $args['after_widget'];
		}
	}


	
	
	

	public function form( $instance ) {
		$settings['data_ad_slot'] = ! empty( $instance['data_ad_slot'] ) ? $instance['data_ad_slot'] : '';
		$settings['data_ad_layout_key'] = ! empty( $instance['data_ad_layout_key'] ) ? $instance['data_ad_layout_key'] : '';
		$settings['data_ad_slot_res'] = ! empty( $instance['data_ad_slot_res'] ) ? $instance['data_ad_slot_res'] : '';
		$settings['data_ad_slot_mobile'] = ! empty( $instance['data_ad_slot_mobile'] ) ? $instance['data_ad_slot_mobile'] : '';
		$settings['data_ad_layout_key_mobile'] = ! empty( $instance['data_ad_layout_key_mobile'] ) ? $instance['data_ad_layout_key_mobile'] : '';

		//https://support.google.com/adsense/answer/7183212
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot' ) ); ?>"><?php  echo sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_ad_slot' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['data_ad_slot'] ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot' ) ); ?>"><?php esc_html_e( 'If empty this slot, then take precedence from customizer setting.', 'simple-days' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_layout_key' ) ); ?>"><?php  echo sprintf(esc_html__( 'Your %s ad unit\'s layout key(data-ad-layout-key):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_ad_layout_key' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_ad_layout_key' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['data_ad_layout_key'] ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_layout_key' ) ); ?>"><?php esc_html_e( 'If empty this key, then take precedence from customizer setting.', 'simple-days' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_mobile' ) ); ?>"><?php echo esc_html_x('For Mobile', 'google_ad', 'simple-days'); ?><?php  echo sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_mobile' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_ad_slot_mobile' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['data_ad_slot_mobile'] ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_mobile' ) ); ?>"><?php esc_html_e( 'If empty this slot, then take precedence from customizer setting.', 'simple-days' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_layout_key_mobile' ) ); ?>"><?php echo esc_html_x('For Mobile', 'google_ad', 'simple-days'); ?><?php  echo sprintf(esc_html__( 'Your %s ad unit\'s layout key(data-ad-layout-key):', 'simple-days'),esc_html_x('In-feed', 'google_ad', 'simple-days')); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_ad_layout_key_mobile' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_ad_layout_key_mobile' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['data_ad_layout_key_mobile'] ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_layout_key_mobile' ) ); ?>"><?php esc_html_e( 'If empty this key, then take precedence from customizer setting.', 'simple-days' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_res' ) ); ?>"><?php echo esc_html_x('For AMP:', 'google_ad', 'simple-days'); ?><?php  echo sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('Responsive', 'google_ad', 'simple-days')); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_res' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_ad_slot_res' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['data_ad_slot_res'] ); ?>">

			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_res' ) ); ?>"><?php esc_html_e( 'If empty this slot, then take precedence from customizer setting.', 'simple-days' ); ?></label>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_res' ) ); ?>"><?php esc_html_e( 'Enter either ,', 'simple-days' ); ?></label>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_res' ) ); ?>"><?php esc_html_e( 'Enable AMP when switching AMP ad.', 'simple-days' ); ?></label>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_res' ) ); ?>"><?php esc_html_e( 'If both empty,', 'simple-days' ); ?></label>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot_res' ) ); ?>"><?php esc_html_e( 'Enable AMP when none ad.', 'simple-days' ); ?></label>
		</p>
		<?php
	}


	

	

	
	

	

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['data_ad_slot'] = ( ! empty( $new_instance['data_ad_slot'] ) ) ? sanitize_text_field( $new_instance['data_ad_slot'] ) : '';
		$instance['data_ad_slot_res'] = ( ! empty( $new_instance['data_ad_slot_res'] ) ) ? sanitize_text_field( $new_instance['data_ad_slot_res'] ) : '';
		$instance['data_ad_layout_key'] = ! empty( $new_instance['data_ad_layout_key'] )  ? sanitize_text_field($new_instance['data_ad_layout_key']) : '';
		$instance['data_ad_slot_mobile'] = ( ! empty( $new_instance['data_ad_slot_mobile'] ) ) ? sanitize_text_field( $new_instance['data_ad_slot_mobile'] ) : '';
		$instance['data_ad_layout_key_mobile'] = ! empty( $new_instance['data_ad_layout_key_mobile'] )  ? sanitize_text_field($new_instance['data_ad_layout_key_mobile']) : '';
		return $instance;
	}

} // class simple_days_google_ad_infeed_widget
