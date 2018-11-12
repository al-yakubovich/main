<?php
/**
 * Widget Recent Posts with thumbnail
 *
 * @package Simple Days
 */


class simple_days_recent_posts_with_thumbnail_widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			'simple_days_recent_posts_with_thumbnail_widget', // Base ID
			esc_html__( '[Simple Days] Recent Posts with thumbnail', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support Recent Posts with thumbnail for Widget', 'simple-days' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {

	  //echo esc_html(apply_filters( 'widget_title', $instance['popular_post_title'] ));
      $title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__('Recent Posts', 'simple-days');
      $post_not_in = !empty( $instance['post_not_in'] ) ? $instance['post_not_in'] : '';
      $category_not_in = !empty( $instance['category_not_in'] ) ? $instance['category_not_in'] : '';
      $include_page  = !empty( $instance['include_page'] ) ? $instance['include_page'] : '';
      $number_post = !empty( $instance['number_post'] ) ? absint( $instance['number_post'] ) : 5 ;
      $display_style  = ! empty( $instance['display_style'] ) ? $instance['display_style'] : '3';


      $include_page  = $include_page == '1' ? array( 'post', 'page') : 'post';
      $post_not_in = explode(',', $post_not_in);
      $category_not_in = explode(',', $category_not_in);

      $popular_args = array(
        'offset' => 0,
        'order' => 'DESC',
        'orderby' => 'date',
        'post_type' => $include_page,
        'post__not_in' => $post_not_in,
        'category__not_in' => $category_not_in,
        'posts_per_page' => $number_post,
        'ignore_sticky_posts' => true,
      );

      $posts = new WP_Query( $popular_args );
//var_dump($posts);
      if ( $posts->have_posts() ) {
        set_query_var( 'popular_post_style', false );
        echo $args['before_widget'];
        if ( $title ) {
          echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }


        echo '<div class="s_d_pl_box">';
        echo '<ul class="s_d_pl_ul">';



        // The loop
        if( $display_style=='1'){

          while ( $posts->have_posts() ) {
            $posts->the_post();
            get_template_part( 'template-parts/widget-post_list','list');
          }

        }else if( $display_style=='2'){
          while ( $posts->have_posts() ) {
            $posts->the_post();
            get_template_part( 'template-parts/widget-post_list','thum');
          }
        }else if( $display_style=='3'){
          while ( $posts->have_posts() ) {
            $posts->the_post();
            get_template_part( 'template-parts/widget-post_list','with_thum');
          }
        }
        // Reset post data
        wp_reset_postdata();
        echo '</ul></div>';
        echo $args['after_widget'];
    }

	}
	public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $post_not_in = ! empty( $instance['post_not_in'] ) ? $instance['post_not_in'] : '';
    $category_not_in = !empty( $instance['category_not_in'] ) ? $instance['category_not_in'] : '';
    $number_post   = ! empty( $instance['number_post'] ) ? $instance['number_post'] : 5 ;
    $display_style  = ! empty( $instance['display_style'] ) ? $instance['display_style'] : '3';
    $include_page  = ! empty( $instance['include_page'] ) ? $instance['include_page'] : '';
    $archive_rank  = ! empty( $instance['archive_rank'] ) ? $instance['archive_rank'] : '';
    ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'number_post' ) ); ?>"><?php esc_html_e( 'Number of shown post', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_post' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_post' ) ); ?>" type="number" step="1" min="1" max="20" value="<?php echo esc_attr( $number_post ); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>">
        <?php esc_html_e( 'Display style', 'simple-days' ); ?></label><br />
      <label for="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>_1">
        <input id="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>_1" name="<?php echo esc_attr( $this->get_field_name( 'display_style' ) ); ?>" type="radio" value="1" <?php checked( '1', $display_style ); ?>/>
      <?php esc_html_e( 'List', 'simple-days' ); ?></label>
      <label for="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>_2">
        <input id="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>_2" name="<?php echo esc_attr( $this->get_field_name( 'display_style' ) ); ?>" type="radio" value="2" <?php checked( '2', $display_style ); ?>/>
      <?php esc_html_e( 'Thumbnail', 'simple-days' ); ?></label>
      <label for="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>_3">
        <input id="<?php echo esc_attr( $this->get_field_id( 'display_style' ) ); ?>_3" name="<?php echo esc_attr( $this->get_field_name( 'display_style' ) ); ?>" type="radio" value="3" <?php checked( '3', $display_style ); ?>/>
      <?php esc_html_e( 'List &#43; Thumbnail', 'simple-days' ); ?></label>
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'category_not_in' ) ); ?>"><?php esc_html_e( ' Disappear when you type category id.', 'simple-days' ); ?><br /><?php esc_html_e( ' Multiple id must be seperated by a comma.', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category_not_in' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category_not_in' ) ); ?>" type="text" value="<?php echo esc_attr( $category_not_in ); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'post_not_in' ) ); ?>"><?php esc_html_e( ' Disappear when you type post id.', 'simple-days' ); ?><br /><?php esc_html_e( ' Multiple id must be seperated by a comma.', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_not_in' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_not_in' ) ); ?>" type="text" value="<?php echo esc_attr( $post_not_in ); ?>">
    </p>
    <p>
      <input id="<?php echo esc_attr( $this->get_field_id( 'include_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'include_page' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $include_page ); ?>/>
      <label for="<?php echo esc_attr( $this->get_field_id( 'include_page' ) ); ?>"><?php esc_html_e( 'include page', 'simple-days' ); ?></label>
    </p>
    <?php
	}
	public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
    $instance['archive_rank'] = ! empty( $new_instance['archive_rank'] ) ? absint( $new_instance['archive_rank'] ) : '';
    $instance['include_page'] = ! empty( $new_instance['include_page'] ) ? absint( $new_instance['include_page'] ) : '';
    $instance['display_style'] = ! empty( $new_instance['display_style'] ) ? absint( $new_instance['display_style'] ) : '3';
    $instance['number_post'] = ! empty( $new_instance['number_post'] ) ? absint( $new_instance['number_post'] ) : 5 ;
    $instance['post_not_in'] = ! empty( $new_instance['post_not_in'] ) ? sanitize_text_field( $new_instance['post_not_in'] ) : '';
    $instance['category_not_in'] = ! empty( $new_instance['category_not_in'] ) ? sanitize_text_field( $new_instance['category_not_in'] ) : '';
    return $instance;
	}

} // class simple_days_recent_posts_with_thumbnail_widget
