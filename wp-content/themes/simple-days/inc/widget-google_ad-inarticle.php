<?php
/**
 * Widget Google AdSense inarticle
 *
 * @package Simple Days
 */


class simple_days_google_ad_inarticle_widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			's_d_go_ina', // Base ID
			esc_html__( '[Simple Days] Google AdSense In-article', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support a In-article ad unit for Google AdSense.', 'simple-days' ), ) // Args
		);
	}

	
	
	
	

	public function widget( $args, $instance ) {
		$data = array();


		$data['client'] = get_theme_mod( 'simple_days_google_ad_publisher_id' , '');
		$data['slot'] = get_theme_mod( 'simple_days_google_ad_data_ad_slot_inarticle' , '');


		if ( $data['client'] != '' && ( $data['slot'] != '' || !empty( $instance['data_ad_slot'] ) ) ){
			echo str_replace(' simple_days_box_shadow' , '' , $args['before_widget']);
			$data['labeling'] = get_theme_mod( 'simple_days_google_ad_labeling' , '0');
			if ($data['labeling'] == '1'){
				$data['labeling'] = esc_html__( 'Advertisements', 'simple-days' );
			}else if ($data['labeling'] == '2'){
				$data['labeling'] = esc_html__( 'Sponsored Links', 'simple-days' );
			}else{
				$data['labeling'] = '';
			}
			
			if(!empty( $instance['data_ad_slot'] ))$data['slot'] = $instance['data_ad_slot'];

			echo '<div class="ad_box ad_inarticle" itemscope itemtype="https://schema.org/WPAdBlock">';

			if ( $data['labeling'] != '' ) {
				echo '<div class="ad_labeling">' . esc_html($data['labeling']) . '</div>';
			}

			echo '<div class="ad_wrap clearfix">';






			if(is_amp()){
				$settings['data_ad_slot_res'] = ! empty( $instance['data_ad_slot_res'] ) ? $instance['data_ad_slot_res'] : '';
				if ( $settings['data_ad_slot_res'] == '')$data['slot_res'] = get_theme_mod( 'simple_days_google_ad_data_ad_slot' , '');
				if ( $data['slot_res'] != ''){

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


				echo apply_filters( 'widget_text',
					'<ins class="adsbygoogle"
					style="display:block; text-align:center;"
					data-ad-layout="in-article"
					data-ad-format="fluid"
					data-ad-client="'.$data['client'].'"
					data-ad-slot="'.$data['slot'].'">
					</ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>'
				);
			}
			echo '</div></div>';
			echo $args['after_widget'];
		}
	}


	
	
	

	public function form( $instance ) {
		$settings['data_ad_slot'] = ! empty( $instance['data_ad_slot'] ) ? $instance['data_ad_slot'] : '';
		$settings['data_ad_slot_res'] = ! empty( $instance['data_ad_slot_res'] ) ? $instance['data_ad_slot_res'] : '';


		//https://support.google.com/adsense/answer/7183212
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot' ) ); ?>"><?php  echo sprintf(esc_html__( 'Your %s ad unit\'s ID(data-ad-slot):', 'simple-days'),esc_html_x('In-article', 'google_ad', 'simple-days')) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'data_ad_slot' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['data_ad_slot'] ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'data_ad_slot' ) ); ?>"><?php esc_html_e( 'If empty this slot, then take precedence from customizer setting.', 'simple-days' ); ?></label>
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
		return $instance;
	}

} // class simple_days_google_ad_inarticle_widget
