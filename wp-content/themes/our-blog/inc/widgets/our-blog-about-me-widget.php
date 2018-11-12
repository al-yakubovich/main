
<?php
/**
 * Widget for About me.
 *
 * @package Our_Blog
 * @since 1.0.0
 */

class Our_Blog_About_Me extends WP_Widget {
/**
     * Register widget with WordPress.
     */
public function __construct() {
	$widget_ops = array( 
		'classname'                     => 'our_blog_about_me',
		'description'                   => __( 'Display about me in sidebar', 'our-blog' ),
		'customize_selective_refresh'   => true,
	);
	parent::__construct( 'our_blog_about_me', __( 'Our Blog: About me', 'our-blog' ), $widget_ops );
}

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

    	$fields = array(
    		'section_page_id' => array(
    			'our_blog_widgets_name'         => 'section_page_id',
    			'our_blog_widgets_title'        => __( 'Select Page', 'our-blog' ),
    			'our_blog_widgets_default'      => '',  
    			'our_blog_widgets_field_type'   => 'dropdown_pages'
    		),
    	);
    	return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
    	extract( $args );
    	if( empty( $instance ) ) {
    		return ;
    	}

    	$our_blog_page_id  = empty( $instance['section_page_id'] ) ? '' : $instance['section_page_id'];
    	$queried_post = get_post( $our_blog_page_id );
    	$img_url	=	get_the_post_thumbnail_url( $our_blog_page_id, 'our-blog-about-me-288x158' );
    	?>
    	<div class="about-me block">
    		<?php if($queried_post->post_title):?>
    			<div class="side-title">
    				<h3><?php echo esc_html($queried_post->post_title); ?></h3>
    			</div>
    		<?php endif;?>
    		<?php if($img_url):?>
    			<div class="img-holder">
    				<img src="<?php echo esc_url($img_url);?>" alt="">
    			</div>
    		<?php endif;?>
    		<?php if($queried_post->post_content):?>
    			<p><?php echo esc_html($queried_post->post_content); ?></p>
    		<?php endif;?>
    	</div>
    	<?php  
    	wp_reset_postdata();
    	?>
    	<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    our_blog_widgets_updated_field_value()      defined in es-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
    	$instance = $old_instance;

    	$widget_fields = $this->widget_fields();

        // Loop through fields
    	foreach ( $widget_fields as $widget_field ) {

    		extract( $widget_field );

            // Use helper function to get updated field values
    		$instance[$our_blog_widgets_name] = our_blog_widgets_updated_field_value( $widget_field, $new_instance[$our_blog_widgets_name] );
    	}

    	return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    our_blog_widgets_show_widget_field() defined in widget-fields.php
     */
    public function form( $instance ) {
    	$widget_fields = $this->widget_fields();
        // Loop through fields
    	foreach ( $widget_fields as $widget_field ) {
            // Make array elements available as variables
    		extract( $widget_field );

    		if ( empty( $instance ) && isset( $our_blog_widgets_default ) ) {
    			$our_blog_widgets_field_value = $our_blog_widgets_default;
    		} elseif( empty( $instance ) ) {
    			$our_blog_widgets_field_value = '';
    		} else {
    			$our_blog_widgets_field_value = wp_kses_post( $instance[$our_blog_widgets_name] );
    		}
    		our_blog_widgets_show_widget_field( $this, $widget_field, $our_blog_widgets_field_value );
    	}
    }
}?>
