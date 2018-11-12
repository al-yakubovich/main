<?php
/**
 * Widget doropdown archives
 *
 * @package Simple Days
 */


class simple_days_dd_archives_widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			'simple_days_dd_archives_widget', // Base ID
			esc_html__( '[Simple Days] Archives', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Drop Down Archives widget without JavaScript', 'simple-days' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
      $title = esc_html( ! empty( $instance['title'] ) ? $instance['title'] : '' );
      $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

	  echo $args['before_widget'];

      if ( $title ) {
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
      }

      echo '<div class="dd_widget"><input type="checkbox" id="toggle_dd_archives"><label for="toggle_dd_archives">'.esc_html__( 'Select Month', 'simple-days' ).'</label><ul>'.preg_replace('/<li><a\shref=[\'"]([^\'"]+)[\'"]>([^\'"]+)<\/a><\/li>/iu','<a href="$1"><li>$2</li></a>',wp_get_archives(array('echo'=>0))).'</ul></div>';
      echo $args['after_widget'];
	}
	public function form( $instance ) {
        $settings = array();
		$settings['title'] = ! empty( $instance['title'] ) ? $instance['title'] : '';

		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'simple-days' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $settings['title'] ); ?>">
		</p>
		<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		return $instance;
	}

} // class simple_days_dd_archives_widget
