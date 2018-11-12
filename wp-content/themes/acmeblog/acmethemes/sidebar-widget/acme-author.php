<?php
/**
 * Custom author
 *
 * @package Acme Themes
 * @subpackage AcmeBlog
 */
if ( ! class_exists( 'acmeblog_author_widget' ) ) :
    /**
     * Class for adding author widget
     * A new way to add author
     * @package Acme Themes
     * @subpackage AcmeBlog
     * @since 1.1.0
     */
    class acmeblog_author_widget extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'acmeblog_author_title' => '',
            'acmeblog_author_image' => '',
            'acmeblog_author_link'  => '',
            'acmeblog_author_new_window' => 1,
            'acmeblog_author_short_disc'  => '',
        );
        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'acmeblog_author',
                /*Widget name will appear in UI*/
                __('AT Author', 'acmeblog'),
                /*Widget description*/
                array( 'description' => __( 'Add author with different options.', 'acmeblog' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            /*merging arrays*/
            $instance = wp_parse_args( (array) $instance, $this->defaults);
            $acmeblog_author_title  = esc_attr( $instance['acmeblog_author_title'] );
            $acmeblog_author_image  = esc_url( $instance['acmeblog_author_image'] );
            $acmeblog_author_link   = esc_url( $instance['acmeblog_author_link'] );
            $acmeblog_author_new_window = esc_attr( $instance['acmeblog_author_new_window'] );
            $acmeblog_author_short_disc = esc_attr( $instance['acmeblog_author_short_disc'] );
            ?>
            <p class="description">
                <?php
                _e('Note: Use square image. Recommended image size : 250 x 250', 'acmeblog' );
                ?>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'acmeblog_author_title' ); ?>"><?php _e( 'Title:', 'acmeblog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'acmeblog_author_title' ); ?>" name="<?php echo $this->get_field_name( 'acmeblog_author_title' ); ?>" type="text" value="<?php echo esc_attr( $acmeblog_author_title ); ?>" />
            </p>
            <h4><?php _e( 'Author Image', 'acmeblog' ); ?></h4>
            <p>
                <label for="<?php echo $this->get_field_id('acmeblog_author_image'); ?>">
                    <?php _e( 'Select Author Image', 'acmeblog' ); ?>
                </label>
                <?php
                $acmeblog_display_none = '';
                if ( empty( $acmeblog_author_image ) ){
                    $acmeblog_display_none = ' style="display:none;" ';
                }
                ?>
                <span class="img-preview-wrap" <?php echo esc_attr( $acmeblog_display_none ); ?>>
                    <img class="widefat" src="<?php echo esc_url( $acmeblog_author_image ); ?>" alt="<?php _e( 'Image preview', 'acmeblog' ); ?>"  />
                </span><!-- .ad-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('acmeblog_author_image'); ?>" id="<?php echo $this->get_field_id('acmeblog_author_image'); ?>" value="<?php echo esc_url( $acmeblog_author_image ); ?>" />
                <input type="button" value="<?php _e( 'Upload Image', 'acmeblog' ); ?>" class="button media-image-upload" data-title="<?php _e( 'Select Author Image','acmeblog'); ?>" data-button="<?php _e( 'Select Author Image','acmeblog'); ?>"/>
                <input type="button" value="<?php _e( 'Remove Image', 'acmeblog' ); ?>" class="button media-image-remove" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'acmeblog_author_short_disc' ); ?>"><?php _e( 'Author Short Disc:', 'acmeblog' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'acmeblog_author_short_disc' ); ?>" name="<?php echo $this->get_field_name( 'acmeblog_author_short_disc' ); ?>"><?php echo esc_attr( $acmeblog_author_short_disc ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'acmeblog_author_link' ); ?>"><?php _e( 'Link URL:', 'acmeblog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'acmeblog_author_link' ); ?>" name="<?php echo $this->get_field_name( 'acmeblog_author_link' ); ?>" type="text" value="<?php echo esc_attr( $acmeblog_author_link ); ?>" />
            </p>
            <p>
                <input id="<?php echo $this->get_field_id( 'acmeblog_author_new_window' ); ?>" name="<?php echo $this->get_field_name( 'acmeblog_author_new_window' ); ?>" type="checkbox" <?php checked( 1 == $acmeblog_author_new_window ? $instance['acmeblog_author_new_window'] : 0); ?> />
                <label for="<?php echo $this->get_field_id( 'acmeblog_author_new_window' ); ?>"><?php _e( 'Open in new window', 'acmeblog' ); ?></label>
            </p>
            <hr />
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['acmeblog_author_title'] = ( isset( $new_instance['acmeblog_author_title'] ) ) ?  sanitize_text_field( $new_instance['acmeblog_author_title'] ): '';
            $instance['acmeblog_author_image'] = ( isset( $new_instance['acmeblog_author_image'] ) ) ?  esc_url( $new_instance['acmeblog_author_image'] ): '';
            $instance['acmeblog_author_link'] = ( isset( $new_instance['acmeblog_author_link'] ) ) ?  esc_url( $new_instance['acmeblog_author_link'] ): '';
            $instance['acmeblog_author_short_disc'] = ( isset( $new_instance['acmeblog_author_short_disc'] ) ) ?  wp_kses_post( $new_instance['acmeblog_author_short_disc'] ): '';
            $instance['acmeblog_author_new_window'] = isset($new_instance['acmeblog_author_new_window'])? 1 : 0;

            return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        function widget( $args, $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);
            $acmeblog_author_title      = apply_filters( 'widget_title', $instance['acmeblog_author_title'], $instance, $this->id_base );
            $acmeblog_author_image      = esc_url( $instance['acmeblog_author_image'] );
            $acmeblog_author_link       = esc_url( $instance['acmeblog_author_link'] );
            $acmeblog_author_new_window = esc_attr( $instance['acmeblog_author_new_window'] );
            $acmeblog_author_short_disc = wp_kses_post( $instance['acmeblog_author_short_disc'] );

            echo $args['before_widget'];

            if ( !empty($acmeblog_author_title) ) {
                echo $args['before_title'] . $acmeblog_author_title . $args['after_title'];
            }
            $ad_content_image = '';
            if ( ! empty( $acmeblog_author_image ) ) {
                /*creating add*/
                $img_html = '<img src="' . $acmeblog_author_image . '"/>';
                $link_open = '';
                $link_close = '';
                if ( ! empty( $acmeblog_author_link ) ) {
                    $target_text = ( 1 == $acmeblog_author_new_window ) ? ' target="_blank" ' : '';
                    $link_open = '<a href="' .  $acmeblog_author_link . '" ' . $target_text . '>';
                    $link_close = '</a>';
                }
                $ad_content_image = $link_open . $img_html .  $link_close.$acmeblog_author_short_disc;
            }
            if ( !empty( $ad_content_image ) ) {
                echo '<div class="acmeblog-author-widget">';
                echo $ad_content_image;
                echo '</div>';
            }
            echo $args['after_widget'];
        }
    }
endif;

if ( ! function_exists( 'acmeblog_author_widget' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 1.0
     *
     * @param null
     * @return void
     *
     */
    function acmeblog_author_widget() {
        register_widget( 'acmeblog_author_widget' );
    }
endif;
add_action( 'widgets_init', 'acmeblog_author_widget' );