<?php
/**
 * Widget TOC
 *
 * @package Simple Days
 */


class simple_days_toc_widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			'simple_days_toc_widget', // Base ID
			esc_html__( '[Simple Days] TOC', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support table of contents for Widget', 'simple-days' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
		$simple_days_toc_html = '';
		$simple_days_toc_html = get_query_var('simple_days_toc_html');

		if ($simple_days_toc_html != ''){
		  //echo $args['before_widget'];
          echo apply_filters( 'widget_text',$simple_days_toc_html );
		  //echo $args['after_widget'];
		}
	}
	public function form( $instance ) {

	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();

	}

} // class simple_days_toc_widget
