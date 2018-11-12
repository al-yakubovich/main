<?php
/**
 * Implementation of the Custom Widget - About
 *
 * @package Shuban
 */

add_action( 'widgets_init', 'shuban_load_about_widget' );

function shuban_load_about_widget() {
	register_widget( 'shuban_about_widget' );
}


class shuban_about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'shuban_about_widget', 'description' => esc_html__('About Widget to display about author or company.', 'shuban') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 350, 'height' => 450, 'id_base' => 'shuban_about_widget' );

		/* Create the widget. */
		parent::__construct( 'shuban_about_widget', esc_html__('ShubanPro - About Widget', 'shuban'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$image = $instance['image'];
		$image_link = $instance['image_link'];
		$description = $instance['description'];
		$autograph = $instance['autograph'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
		?>

			<div class="shuban-about-widget">

				<?php if($image) : ?>
				<div class="shuban-about-img">
					<?php if($image_link) : ?><a href="<?php echo esc_url($image_link); ?>" target="_blank"><?php endif; ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($title); ?>" /><?php if($image_link) : ?></a><?php endif; ?>
				</div>
				<?php endif; ?>

				<div class="card-block">
                    <?php if($description) : ?>
    				<p><?php echo wp_kses_post($description); ?></p>
    				<?php endif; ?>

    				<?php if($autograph) : ?>
    				<span class="shuban-about-autograph"><img src="<?php echo esc_url($autograph); ?>" alt="<?php echo esc_html($title); ?>" /></span>
    				<?php endif; ?>
				</div>

			</div>

		<?php

		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['image_link'] = strip_tags( $new_instance['image_link'] );
		$instance['description'] = $new_instance['description'];
		$instance['autograph'] = strip_tags( $new_instance['autograph'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'About Me', 'image' => '', 'description' => '', 'autograph' => '', 'image_link' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'shuban' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />
		</p>

		<!-- image url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Image URL', 'shuban' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter the image URL you want to use. You can upload your image via Media > Add New', 'shuban' ); ?></small>
		</p>

		<!-- image link -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image_link' ); ?>"><?php esc_html_e( 'Image Link', 'shuban' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'image_link' ); ?>" name="<?php echo $this->get_field_name( 'image_link' ); ?>" value="<?php echo $instance['image_link']; ?>" style="width:96%;" /><br />
			<small><?php esc_html_e( 'Enter a link you want the about me image to go to.', 'shuban' ); ?></small>
		</p>

		<!-- description -->
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( 'About me text', 'shuban' ); ?>:</label>
			<textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" style="width:95%;" rows="6"><?php echo $instance['description']; ?></textarea>
		</p>

		<!-- autograph url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'autograph' ); ?>"><?php esc_html_e( 'Autograph Image URL', 'shuban' ); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'autograph' ); ?>" name="<?php echo $this->get_field_name( 'autograph' ); ?>" value="<?php echo $instance['autograph']; ?>" style="width:96%;" /><br />
		</p>


	<?php
	}
}

?>
