<?php
/**
 * Display featured slider
 *
 * @since AcmeBlog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('acmeblog_default_slider') ) :
    function acmeblog_default_slider(){
        ?>
        <li>
            <a href="#">
                <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ); ?>"/>
            </a>
            <div class="slider-desc">
                <div class="slider-details">
                    <a href="#">
                        <div class="slide-title">
                            <?php _e('Welcome to AcmeBlog','acmeblog'); ?>
                        </div>
                    </a>
                </div>
                <?php
                echo '<div class="slide-caption">'.__('A Professional Blog Theme','acmeblog').'</div>';
                ?>
            </div>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ); ?>"/>
            </a>
            <div class="slider-desc">
                <div class="slider-details">
                    <a href="#">
                        <div class="slide-title">
                            <?php _e('Slider Setting','acmeblog'); ?>
                        </div>
                    </a>
                </div>
                <?php
                echo '<div class="slide-caption">'.__('Goto Appearance > Customize > Featured Section Options, for setting up feature slider and featured options','acmeblog').'</div>';
                ?>
            </div>
        </li>
        <?php
    }
endif;

/**
 * Featured Slider display function
 *
 * @since AcmeBlog 1.1.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'acmeblog_display_feature_slider' ) ) :

    function acmeblog_display_feature_slider( ){

        global $acmeblog_customizer_all_values;
        $acmeblog_feature_cat = $acmeblog_customizer_all_values['acmeblog-feature-cat'];
	    $acmeblog_slider_number = absint( $acmeblog_customizer_all_values['acmeblog-feature-slider-post-number']);
	    $sticky = get_option( 'sticky_posts' );
        if ( 0 != $acmeblog_feature_cat ) {
            $acmeblog_cat_post_args = array(
                'cat'                 => $acmeblog_feature_cat,
                'posts_per_page'      => $acmeblog_slider_number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'post__not_in' => $sticky,
                'ignore_sticky_posts' => true
            );
            $slider_query = new WP_Query($acmeblog_cat_post_args);
            if ($slider_query->have_posts()):
                while ($slider_query->have_posts()): $slider_query->the_post();
                    if (has_post_thumbnail()) {
                        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                    } else {
                        $image_url[0] = get_template_directory_uri() . '/assets/img/no-image-690-400.jpg';
                    }
                    ?>
                    <li>
                        <?php
                        acmeblog_list_category();
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url( $image_url[0] ); ?>"/>
                        </a>
                        <div class="slider-desc">
                            <div class="above-slider-details">
                                <?php
                                $archive_year  = get_the_date('Y');
                                $archive_month = get_the_date('m');
                                $archive_day   = get_the_date('d');
                                ?>
                                <a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo esc_html( get_the_date('F d, Y') ); ?>
                                </a>
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
                                    <i class="fa fa-user"></i>
                                    <?php echo esc_html( get_the_author() ); ?>
                                </a>
                                <?php comments_popup_link( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' );?>
                            </div>
                            <div class="slider-details">
                                <div class="slide-title">
                                    <?php the_title(); ?>
                                </div>
                                <?php
                                $read_more = $acmeblog_customizer_all_values['acmeblog-feature-slider-read-more'];
                                if( !empty( $read_more )){
	                                ?>
                                    <a href="<?php the_permalink()?>" class="read-more">
		                                <?php echo  esc_html( $read_more );?>
                                    </a>
	                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
                endif;
        }
        else{
            acmeblog_default_slider();
        }
    }
endif;

/**
 * Display featured slider
 *
 * @since AcmeBlog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('acmeblog_feature_slider') ) :
    function acmeblog_feature_slider() {
        ?>
        <div class="slider-section">
            <ul class="home-bxslider">
                <?php acmeblog_display_feature_slider(); ?>
            </ul>
        </div>
        <?php
    }
endif;
add_action( 'acmeblog_action_feature_slider', 'acmeblog_feature_slider', 0 );