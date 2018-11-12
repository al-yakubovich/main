<?php
/**
 * Implementation of the Custom Widget - Link Box
 *
 * @package Shuban
 */


 add_action( 'widgets_init', 'shuban_load_link_box_widget' );

 function shuban_load_link_box_widget() {
 	register_widget( 'shuban_link_box_widget' );
 }

 class shuban_link_box_widget extends WP_Widget {

 	/**
 	 * Widget setup.
 	 */
 	function __construct() {
 		/* Widget settings. */
 		$widget_ops = array( 'classname' => 'shuban_link_box_widget', 'description' => esc_html__('A widget to display link box.', 'shuban') );

 		/* Widget control settings. */
 		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'shuban_link_box_widget' );

 		/* Create the widget. */
 		parent::__construct( 'shuban_link_box_widget', esc_html__('ShubanPro - Link Box', 'shuban'), $widget_ops, $control_ops );
 	}

 	/**
 	 * How to display the widget on the screen.
 	 */
 	function widget( $args, $instance ) {
 		extract( $args );

 		$title = apply_filters('widget_title', $instance['title'] );
 		$image = $instance['image'];
 		$box_link = $instance['box_link'];
 		$link_text = $instance['link_text'];

 		/* Before widget (defined by themes). */
 		echo $before_widget;

 		/* Display the widget title if one was input (before and after defined by themes). */
 		if ( $title )
 			echo $before_title . $title . $after_title;

 		?>

            <div class="shuban-link-box">
                <?php if($image) : ?>
                    <?php if($box_link) : ?>
                        <a href="<?php echo esc_url( $box_link ); ?>">
                    <?php endif; ?>
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html( $link_text ); ?>" class="card-img rounded img-fluid">

                        <div class="card-img-overlay rounded d-flex align-items-center justify-content-center">
                            <h3 class="align-middle text-center mb-0"><?php echo esc_html( $link_text ); ?></h3>
                        </div>
                    <?php if($box_link) : ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

 		<?php

 		/* After widget (defined by themes). */
 		echo $after_widget;
 	}

 	/**
 	 * Update the widget settings.
 	 */
 	function update( $new_instance, $old_instance ) {
 		$instance = $old_instance;

 		/* Strip tags for title and name to remove HTML (important for text inputs). */
 		$instance['title'] = strip_tags( $new_instance['title'] );
 		$instance['image'] = $new_instance['image'];
 		$instance['box_link'] = strip_tags( $new_instance['box_link'] );
 		$instance['link_text'] = strip_tags( $new_instance['link_text'] );

 		return $instance;
 	}


 	function form( $instance ) {

 		/* Set up some default widget settings. */
 		$defaults = array( 'title' => '', 'image' => '', 'box_link' => '', 'link_text' => '');
 		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

 		<!-- Widget Title: Text Input -->
 		<p>
 			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'shuban'); ?></label>
 			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
 		</p>

        <!-- image url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image URL', 'shuban' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter the image URL you want to use. You can upload your image via Media > Add New', 'shuban' ); ?></small>
		</p>

        <!-- box link -->
		<p>
			<label for="<?php echo $this->get_field_id( 'box_link' ); ?>"><?php esc_html_e( 'Box Link', 'shuban' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'box_link' ); ?>" name="<?php echo $this->get_field_name( 'box_link' ); ?>" value="<?php echo $instance['box_link']; ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter a link you want the link box to go to.', 'shuban' ); ?></small>
		</p>

        <!-- link text -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php esc_html_e( 'Box Text', 'shuban' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" value="<?php echo $instance['link_text']; ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter text you want to display on the box.', 'shuban' ); ?></small>
		</p>


 	<?php
 	}
 }

 ?>
