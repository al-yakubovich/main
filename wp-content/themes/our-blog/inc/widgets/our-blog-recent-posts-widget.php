   <?php
/**
 * Widget for Get Connected.
 *
 * @package Our_Blog
 * @since 1.0.0
*/

class Our_Blog_Recent_Posts extends WP_Widget {
/**
     * Register widget with WordPress.
     */
public function __construct() {
  $widget_ops = array( 
    'classname'                     => 'our_blog_recent_posts',
    'description'                   => __( 'Display Latest Posts', 'our-blog' ),
    'customize_selective_refresh'   => true,
  );
  parent::__construct( 'our_blog_recent_posts', __( 'Our Blog: Latest Posts', 'our-blog' ), $widget_ops );
}

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

      $fields = array(
        'latest_posts_title' => array(
          'our_blog_widgets_name'         => 'latest_posts_title',
          'our_blog_widgets_title'        => 'Title',
          'our_blog_widgets_default'      => 'Latest Posts',  
          'our_blog_widgets_field_type'   => 'text'
        ),
        'latest_posts_number' => array(
          'our_blog_widgets_name'         => 'latest_posts_number',
          'our_blog_widgets_title'        => 'Number',
          'our_blog_widgets_default'      => 4,
          'our_blog_widgets_field_type'   => 'number'
        )
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
      $title = empty( $instance['latest_posts_title'] ) ? '' : $instance['latest_posts_title'];
      $number = empty( $instance['latest_posts_number'] ) ? 4 : $instance['latest_posts_number'];
      ?>
      <div class="latest-post block">
        <div class="side-title">
          <h3><?php echo esc_html($title);?></h3>
        </div>
        <?php 
        $the_query = new WP_Query('showposts='. $number .'&orderby=post_date&order=desc');  
        while ($the_query->have_posts()) : $the_query->the_post(); 
          ?>
          <div class="media">
            <a href="<?php the_permalink();?>" class="img-holder mr-3"><?php the_post_thumbnail('our-blog-latest-posts-90x80');?></a>
            <div class="media-body">
              <a href="<?php the_permalink();?>"><h6 class="mt-0"><?php the_title();?></h6></a>
              <div class="bl-date">
                <span><?php echo get_the_date( 'j F, Y'); ?></span>
              </div>
            </div>
          </div>
          <?php
        endwhile; 
        ?>
      </div>
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
     * @uses    our_blog_widgets_show_widget_field()        defined in es-widget-fields.php
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
