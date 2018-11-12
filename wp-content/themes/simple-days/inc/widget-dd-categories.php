<?php
/**
 * Widget doropdown categories
 *
 * @package Simple Days
 */


class simple_days_dd_categories_widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			'simple_days_dd_categories_widget', // Base ID
			esc_html__( '[Simple Days] Categories', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Drop Down Categories widget without JavaScript', 'simple-days' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
      $title = esc_html( ! empty( $instance['title'] ) ? $instance['title'] : '' );
      $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

	  echo $args['before_widget'];

      if ( $title ) {
        echo $args['before_title'] . esc_html($title) . $args['after_title'];
      }

      echo '<div class="dd_widget"><input type="checkbox" id="toggle_dd_categories"><label for="toggle_dd_categories">'.esc_html__( 'Select Category', 'simple-days' ).'</label><ul>';
	  $match = wp_dropdown_categories(array('echo'=>0,'hierarchical'=>1));
	  $match = str_replace("<select  name='cat' id='cat' class='postform' >",'',$match);
	  $match = str_replace('</select>','',$match);
	  preg_match_all('/<option\sclass=[\'"][^\'"]+[\'"]\svalue=[\'"]([^\'"]+)[\'"]>([^\'"]+)<\/option>/iu',$match,$match);
      if (isset($match) && is_array($match)) {
        $i=0;
        while ($i < count($match[1])) {
          echo '<a href="'.esc_url(get_category_link($match[1][$i])).'"><li>'.esc_html($match[2][$i]).'</li></a>'."\n";
          $i++;
        }
      }



      echo '</ul></div>';
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

} // class simple_days_dd_categories_widget
