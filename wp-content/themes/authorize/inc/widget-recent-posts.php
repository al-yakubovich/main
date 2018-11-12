<?php
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */

 /**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

//Class authorize_recent_posts_widget extends WP_Widget_Recent_Posts {
Class authorize_recent_posts_widget extends WP_Widget {	
		
		function __construct() {
			parent::__construct(
				'authorize_recent_posts',
				esc_html__( 'Authorize - Recent Posts', 'authorize' ), // Name
				array( 'description' => esc_html__( 'Displays recent posts with Authorize formatting.', 'authorize' ), ) // Args
			);
		}

        function widget($args, $instance) {

                if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'authorize' );

            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number )
                $number = 2;
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent posts.
             */

            $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );

            if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            <div class="widgetRecentPost">
            <?php while ( $r->have_posts() ) : $r->the_post();?>
            <?php 
				$ID = get_the_ID();
				//Get meta
				$EntryType = get_post_meta($ID, 'authorize_entry_type', true );
				
				//Get Featured imge
				$PostImage = get_the_post_thumbnail($ID, 'thumbnail');
				
				if(empty($PostImage)){
					$PostImage = authorize_get_entrytype_image($EntryType);
				}
			
			?>
                <div class="authorize-recent-post">
                        <div class="widgetImage">
                            <?php echo $PostImage ?>
                        </div>
                       
                        <div class="widgetContent">
                            <h3><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : $ID; ?></a></h3>
                            <?php if ( $show_date ) : ?>
							<div class="post-date"> <?php echo get_the_date("M. j Y"); ?></div>
							<?php endif; ?>
                            <div class="widgetExcerpt">
                                <?php the_excerpt()?>
                            </div>

                            <div class="widgetLink">
                            	<a href="<?php the_permalink(); ?>"><?php echo __( 'More &hellip;', 'authorize' ); ?></a>
							</div>
                        </div>
					</a>
                </div>
            <?php endwhile; ?>
            </div>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

            endif;
        }
}

function authorize_recent_widget_registration() {
  //unregister_widget('WP_Widget_Recent_Posts');
  register_widget('authorize_recent_posts_widget');
}

add_action('widgets_init', 'authorize_recent_widget_registration');