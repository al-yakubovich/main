<?php
/**
 * Implementation of the Custom Widget - About
 *
 * @package Shuban
 */


 add_action( 'widgets_init', 'shuban_load_latest_posts_widget' );

 function shuban_load_latest_posts_widget() {
 	register_widget( 'shuban_latest_posts_widget' );
 }

 class shuban_latest_posts_widget extends WP_Widget {

 	/**
 	 * Widget setup.
 	 */
 	function __construct() {
 		/* Widget settings. */
 		$widget_ops = array( 'classname' => 'shuban_latest_posts_widget', 'description' => esc_html__('A widget to display recent posts as per your choice.', 'shuban') );

 		/* Widget control settings. */
 		$control_ops = array( 'width' => 350, 'height' => 350, 'id_base' => 'shuban_latest_posts_widget' );

 		/* Create the widget. */
 		parent::__construct( 'shuban_latest_posts_widget', esc_html__('ShubanPro - Latest Posts', 'shuban'), $widget_ops, $control_ops );
 	}

 	/**
 	 * How to display the widget on the screen.
 	 */
 	function widget( $args, $instance ) {
 		extract( $args );

 		$title = apply_filters('widget_title', $instance['title'] );
 		$categories = $instance['categories'];
 		$number = $instance['number'];
 		$date = $instance['date'];

 		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories);

 		$loop = new WP_Query($query);
 		if ($loop->have_posts()) :

 		/* Before widget (defined by themes). */
 		echo $before_widget;

 		/* Display the widget title if one was input (before and after defined by themes). */
 		if ( $title )
 			echo $before_title . $title . $after_title;

 		?>
            <div class="card-block">
	            <?php  while ($loop->have_posts()) : $loop->the_post(); ?>

                    <div class="side-pop media">

     					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
     					<div class="media-left">
     						<a href="<?php echo get_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'media-object recent-post-img' ) ); ?></a>
     					</div>
     					<?php endif; ?>

     					<div class="media-body">
     						<h5 class="media-heading"><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h5>
                            <?php if(!$date) : ?><h6><span class="rp-date"><i class="fa fa-calendar text-muted mr-2"></i> <?php the_time( get_option('date_format') ); ?></span></h6><?php endif; ?>
     						<h6><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="rp-author"><i class="fa fa-user-o text-muted mr-2"></i> <?php echo esc_html( get_the_author() ); ?></span></a></h6>
     					</div>

     				</div>

	            <?php endwhile; ?>
            </div>
 			<?php wp_reset_postdata(); ?>
 			<?php endif; ?>

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
 		$instance['categories'] = $new_instance['categories'];
 		$instance['number'] = strip_tags( $new_instance['number'] );
 		$instance['date'] = strip_tags( $new_instance['date'] );

 		return $instance;
 	}


 	function form( $instance ) {

 		/* Set up some default widget settings. */
 		$defaults = array( 'title' => esc_html__('Latest Posts', 'shuban'), 'number' => 5, 'categories' => '', 'date' => false);
 		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

 		<!-- Widget Title: Text Input -->
 		<p>
 			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'shuban'); ?></label>
 			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
 		</p>

 		<!-- Category -->
 		<p>
 		<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Filter by Category', 'shuban' ); ?>:</label>
 		<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
 			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
 			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
 			<?php foreach($categories as $category) { ?>
 			<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
 			<?php } ?>
 		</select>
 		</p>

 		<!-- Number of posts -->
 		<p>
 			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:', 'shuban'); ?></label>
 			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
 		</p>

 		<p>
 			<label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( 'Hide Date', 'shuban' ); ?>:</label>
 			<input type="checkbox" id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" <?php checked( (bool) $instance['date'], true ); ?> />
 		</p>


 	<?php
 	}
 }

 ?>
