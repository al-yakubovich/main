<?php
/**
 * Widget Popular Posts
 *
 * @package Simple Days
 */


class simple_days_popular_post_widget extends WP_Widget {

	
	function __construct() {
		parent::__construct(
			'simple_days_popular_post_widget', // Base ID
			esc_html__( '[Simple Days] Popular Posts', 'simple-days' ), // Name
			array( 'description' => esc_html__( 'Support popular posts for Widget', 'simple-days' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {

	  //echo esc_html(apply_filters( 'widget_title', $instance['popular_post_title'] ));
    $popular_post_title = !empty( $instance['popular_post_title'] ) ? $instance['popular_post_title'] : '';
    $post_not_in = !empty( $instance['post_not_in'] ) ? $instance['post_not_in'] : '';
    $category_not_in = !empty( $instance['category_not_in'] ) ? $instance['category_not_in'] : '';
    $time_period = !empty( $instance['time_period'] ) ? $instance['time_period'] : 'all';
    $include_page  = !empty( $instance['include_page'] ) ? $instance['include_page'] : '';
    $number_post = !empty( $instance['number_post'] ) ? absint( $instance['number_post'] ) : 5 ;
    $archive_rank  = ! empty( $instance['archive_rank'] ) ? $instance['archive_rank'] : '';
    $display_style  = ! empty( $instance['display_style'] ) ? $instance['display_style'] : '1';

    $count_key = '_simple_days_popular_posts_count_';
    $period_key = '_simple_days_popular_posts_period_';

switch ($time_period){
case 'all':
  $rank_name = esc_html__('Popular Posts', 'simple-days');
  $period_value = 10;
  break;
case 'yearly':
  $rank_name = esc_html__('Yearly Popular Posts', 'simple-days');
  $period_value = date('Y');
  break;
case 'monthly':
  $rank_name = esc_html__('Monthly Popular Posts', 'simple-days');
  $period_value = date('Y').date('n');
  break;
case 'weekly':
  $rank_name = esc_html__('Weekly Popular Posts', 'simple-days');
  $period_value = date('Y').date('W');
  break;
case 'daily':
  $rank_name = esc_html__('Daily Popular Posts', 'simple-days');
  $period_value = date('Y').date('n').date('j');
  break;
default:
  return;
}
    $rank_name = $popular_post_title != '' ? $popular_post_title : $rank_name;
    $include_page  = $include_page == '1' ? array( 'post', 'page') : 'post';
    $post_not_in = explode(',', $post_not_in);
    $category_not_in = explode(',', $category_not_in);
    $archive_pala = array();
    $archive_name = '';
    if($archive_rank == '1'){
      if(is_single()){
        $category = get_the_category();
        $archive_pala = array('category__in' => $category[0]->term_id);
        $archive_name = $category[0]->cat_name.' ';
      }
      if(is_category()){
        $archive_pala = array('category__in' => get_query_var('cat'));
        $archive_name = single_cat_title('', false).' ';
      }
      if(is_tag()){
        $archive_pala = array('tag__in' => get_query_var('tag_id'));
        $archive_name = single_tag_title('', false).' ';
      }
      if(is_author()){
        $archive_pala = array('author__in' => get_query_var('author'));
        global $wp_query;
        $curauth = $wp_query->get_queried_object();
        $archive_name = $curauth->display_name.' ';
      }
      /*if(is_year()){
        $archive_pala = array('date_query' => array(array('year'=> get_query_var('year')),);
      }
      if(is_month());
      if(is_day());*/
    }


    $popular_args = array(
      'post_type' => $include_page,
      'meta_key' => $count_key.$time_period,
      'post__not_in' => $post_not_in,
      'category__not_in' => $category_not_in,
      'posts_per_page' => $number_post,
      'ignore_sticky_posts' => true,
      'orderby' => 'meta_value_num',
      'meta_query' => array(
          array(
             'key' => $period_key.$time_period,
             'value' => $period_value,
             'compare' => '=')
      )
    );
    $popular_args = array_merge($popular_args,$archive_pala);
    $posts = new WP_Query( $popular_args );
//var_dump($posts);

    if ( $posts->have_posts() ) {
        set_query_var( 'popular_post_style', true );

        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($archive_name).esc_html($rank_name) . $args['after_title'];


        echo '<div class="s_d_pl_box">';
        echo '<ul class="s_d_pl_ul">';

  // The loop
        $i=1;

        // The loop
        if( $display_style=='1'){

          while ( $posts->have_posts() ) {
            $posts->the_post();
            set_query_var( 'popular_post_count', $i );
            get_template_part( 'template-parts/widget-post_list','list');
            ++$i;
          }

        }else if( $display_style=='2'){
          while ( $posts->have_posts() ) {
            $posts->the_post();
            set_query_var( 'popular_post_count', $i );
            get_template_part( 'template-parts/widget-post_list','thum');
            ++$i;
          }
        }else if( $display_style=='3'){
          while ( $posts->have_posts() ) {
            $posts->the_post();
            set_query_var( 'popular_post_count', $i );
            get_template_part( 'template-parts/widget-post_list','with_thum');
            ++$i;
          }
        }

      // Reset post data
      wp_reset_postdata();
      echo '</ul></div>';
      echo $args['after_widget'];
    }


	}
	public function form( $instance ) {
    $popular_post_title = ! empty( $instance['popular_post_title'] ) ? $instance['popular_post_title'] : '';
    $post_not_in = ! empty( $instance['post_not_in'] ) ? $instance['post_not_in'] : '';
    $category_not_in = !empty( $instance['category_not_in'] ) ? $instance['category_not_in'] : '';
    $time_period = ! empty( $instance['time_period'] ) ? $instance['time_period'] : 'all';
    $number_post   = ! empty( $instance['number_post'] ) ? $instance['number_post'] : 5 ;
    $display_style  = ! empty( $instance['display_style'] ) ? $instance['display_style'] : '1';
    $include_page  = ! empty( $instance['include_page'] ) ? $instance['include_page'] : '';
    $archive_rank  = ! empty( $instance['archive_rank'] ) ? $instance['archive_rank'] : '';
    ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'simple-days' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'popular_post_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'popular_post_title' ) ); ?>" type="text" value="<?php echo esc_attr( $popular_post_title ); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>">
        <?php esc_html_e( 'the time period', 'simple-days' ); ?></label><br />
      <label for="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_all">
        <input id="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_all" name="<?php echo esc_attr( $this->get_field_name( 'time_period' ) ); ?>" type="radio" value="all" <?php checked( 'all', $time_period ); ?>/>
      <?php esc_html_e( 'All', 'simple-days' ); ?></label>
      <label for="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_yearly">
        <input id="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_yearly" name="<?php echo esc_attr( $this->get_field_name( 'time_period' ) ); ?>" type="radio" value="yearly" <?php checked( 'yearly', $time_period ); ?>/>
      <?php esc_html_e( 'Yearly', 'simple-days' ); ?></label>
      <label for="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_monthly">
        <input id="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_monthly" name="<?php echo esc_attr( $this->get_field_name( 'time_period' ) ); ?>" type="radio" value="monthly" <?php checked( 'monthly', $time_period ); ?>/>
      <?php esc_html_e( 'Monthly', 'simple-days' ); ?></label>
      <label for="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_weekly">
        <input id="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_weekly" name="<?php echo esc_attr( $this->get_field_name( 'time_period' ) ); ?>" type="radio" value="weekly" <?php checked( 'weekly', $time_period ); ?>/>
      <?php esc_html_e( 'Weekly', 'simple-days' ); ?></label>
      <label for="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_daily">
        <input id="<?php echo esc_attr( $this->get_field_id( 'time_period' ) ); ?>_daily" name="<?php echo esc_attr( $this->get_field_name( 'time_period' ) ); ?>" type="radio" value="daily" <?php checked( 'daily', $time_period ); ?>/>
      <?php esc_html_e( 'Daily', 'simple-days' ); ?></label>
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'number_post' ) ); ?>"><?php esc_html_e( 'Display priorities', 'simple-days' ); ?></label>
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
    <p>
      <input id="<?php echo esc_attr( $this->get_field_id( 'archive_rank' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'archive_rank' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $archive_rank ); ?>/>
      <label for="<?php echo esc_attr( $this->get_field_id( 'archive_rank' ) ); ?>"><?php esc_html_e( 'Enable archive ranking in archive', 'simple-days' ); ?></label>
    </p>
    <?php
	}
	public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['popular_post_title'] = ( ! empty( $new_instance['popular_post_title'] ) ) ? sanitize_text_field( $new_instance['popular_post_title'] ) : '';
    $instance['archive_rank'] = ! empty( $new_instance['archive_rank'] ) ? absint( $new_instance['archive_rank'] ) : '';
    $instance['include_page'] = ! empty( $new_instance['include_page'] ) ? absint( $new_instance['include_page'] ) : '';
    $instance['display_style'] = ! empty( $new_instance['display_style'] ) ? absint( $new_instance['display_style'] ) : '1';
    $instance['number_post'] = ! empty( $new_instance['number_post'] ) ? absint( $new_instance['number_post'] ) : 5 ;
    $instance['time_period'] = ! empty( $new_instance['time_period'] ) ? sanitize_text_field( $new_instance['time_period'] ) : 'all' ;
    $instance['post_not_in'] = ! empty( $new_instance['post_not_in'] ) ? sanitize_text_field( $new_instance['post_not_in'] ) : '';
    $instance['category_not_in'] = ! empty( $new_instance['category_not_in'] ) ? sanitize_text_field( $new_instance['category_not_in'] ) : '';
    return $instance;
	}

} // class simple_days_profile_widget
