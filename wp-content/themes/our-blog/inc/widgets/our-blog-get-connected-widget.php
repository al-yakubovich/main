<?php
/**
 * Widget for Get Connected.
 *
 * @package Our_Blog
 * @since 1.0.0
*/

class Our_Blog_Get_Connected extends WP_Widget {
/**
     * Register widget with WordPress.
     */
public function __construct() {
  $widget_ops = array( 
    'classname'                     => 'our_blog_get_connected',
    'description'                   => __( 'Display Get Connected in sidebar', 'our-blog' ),
    'customize_selective_refresh'   => true,
  );
  parent::__construct( 'our_blog_get_connected', __( 'Our Blog: Get Connected', 'our-blog' ), $widget_ops );
}

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

      $fields = array(
        'get_connected_title' => array(
          'our_blog_widgets_name'         => 'get_connected_title',
          'our_blog_widgets_title'        => 'Title',
          'our_blog_widgets_default'      => 'Stay Connected',  
          'our_blog_widgets_field_type'   => 'text'
        ),
        'get_connected_facebook_url' => array(
          'our_blog_widgets_name'         => 'get_connected_facebook_url',
          'our_blog_widgets_title'        => 'Facebook Url',
          'our_blog_widgets_default'      => 'https://www.facebook.com/',  
          'our_blog_widgets_field_type'   => 'url'
        ),
        'get_connected_twitter_url' => array(
          'our_blog_widgets_name'         => 'get_connected_twitter_url',
          'our_blog_widgets_title'        => 'Twitter Url',
          'our_blog_widgets_default'      => 'https://twitter.com/',  
          'our_blog_widgets_field_type'   => 'url'
        ),
        'get_connected_google_plus_url' => array(
          'our_blog_widgets_name'         => 'get_connected_google_plus_url',
          'our_blog_widgets_title'        => 'Google Plus Url',
          'our_blog_widgets_default'      => 'https://plus.google.com',  
          'our_blog_widgets_field_type'   => 'url'
        ),
        'get_connected_pinterest_url' => array(
          'our_blog_widgets_name'         => 'get_connected_pinterest_url',
          'our_blog_widgets_title'        => 'Pinterest Url',
          'our_blog_widgets_default'      => 'https://www.pinterest.com/',  
          'our_blog_widgets_field_type'   => 'url'
        ),
        'get_connected_instagram_url' => array(
          'our_blog_widgets_name'         => 'get_connected_instagram_url',
          'our_blog_widgets_title'        => 'Instagram Url',
          'our_blog_widgets_default'      => 'https://www.instagram.com/',  
          'our_blog_widgets_field_type'   => 'url'
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
      $title = empty( $instance['get_connected_title'] ) ? '' : $instance['get_connected_title'];
      $facebook = empty( $instance['get_connected_facebook_url'] ) ? '#' : $instance['get_connected_facebook_url'];
      $twitter = empty( $instance['get_connected_twitter_url'] ) ? '#' : $instance['get_connected_twitter_url'];
      $google_plus = empty( $instance['get_connected_google_plus_url'] ) ? '#' : $instance['get_connected_google_plus_url'];
      $pinterest = empty( $instance['get_connected_pinterest_url'] ) ? '#' : $instance['get_connected_pinterest_url'];
      $instagram = empty( $instance['get_connected_instagram_url'] ) ? '#' : $instance['get_connected_instagram_url'];
      ?>
      <div class="get-connected block">
        <div class="side-title">
          <h3><?php echo esc_html($title);?></h3>
        </div>
        <ul class="social-icon">
          <li><a href="<?php echo esc_url($facebook);?>"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
          <li><a href="<?php echo esc_url($twitter);?>"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
          <li><a href="<?php echo esc_url($google_plus);?>"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
          <li><a href="<?php echo esc_url($pinterest);?>"><span class="fa fa-pinterest" aria-hidden="true"></span></a></li>
          <li><a href="<?php echo esc_url($instagram);?>"><span class="fa fa-instagram" aria-hidden="true"></span></a></li>
        </ul>
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

