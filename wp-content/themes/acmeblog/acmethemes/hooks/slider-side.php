<?php
/**
 * Feature slider side posts and ads
 *
 * @since AcmeBlog 1.1.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('acmeblog_feature_side') ) :

    function acmeblog_feature_side() {

        global $acmeblog_customizer_all_values;
        echo '<div class="besides-slider">';
        /*Featured Post Beside Slider*/
        $acmeblog_beside_slider_ids = array();
        if( -1 != $acmeblog_customizer_all_values['acmeblog-feature-post-one'] ){
            $acmeblog_beside_slider_ids[] = $acmeblog_customizer_all_values['acmeblog-feature-post-one'];
        }
        if( -1 != $acmeblog_customizer_all_values['acmeblog-feature-post-two'] ){
            $acmeblog_beside_slider_ids[] = $acmeblog_customizer_all_values['acmeblog-feature-post-two'];
        }
        if( !empty($acmeblog_beside_slider_ids) ){
            $beside_post_args = array(
                'post_type'         => 'post',
                'posts_per_page'    => 2,
                'post__in'          => $acmeblog_beside_slider_ids,
                'orderby'           => 'post__in',
                'ignore_sticky_posts' => true
            );
            $beside_query = new WP_Query($beside_post_args);
            if ($beside_query->have_posts()) {
                while ($beside_query->have_posts()) {
                    $beside_query->the_post();
                    if (has_post_thumbnail()) {
                        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-thumbnail');
                    }
                    else {
                        $image_url[0] = get_template_directory_uri() . '/assets/img/no-image-330-195.jpg';
                    }
                    ?>
                    <div class="beside-post clearfix">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="beside-thumb clearfix">
                                <img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php echo esc_attr( the_title_attribute() ); ?>" title="<?php echo esc_attr( the_title_attribute() ); ?>" />
                                <div class="overlay"></div>
                            </figure>
                        </a>
                        <div class="beside-caption clearfix">
                            <h3 class="post-title">
                                <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="post-date">
                                <?php
                                $archive_year  = get_the_date('Y');
                                $archive_month = get_the_date('m');
                                $archive_day   = get_the_date('d');
                                ?>
                                <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo esc_attr( get_the_date('F d, Y') ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_postdata();
        }
        else{
            ?>
            <div class="beside-post clearfix">
                <figure class="beside-thumb clearfix">
                    <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-330-195.jpg" ); ?>"/>
                </figure>
                <div class="acme-default beside-caption clearfix">
                    <h3 class="acme-default post-title">
                        <?php _e('Select post', 'acmeblog' );?>
                    </h3>
                    <div class="post-date">
                        <?php _e(' Goto Appearance > Customize > Featured Section Options', 'acmeblog' );?>
                    </div>
                </div>
            </div>
            <div class="beside-post clearfix">
                <figure class="beside-thumb clearfix">
                    <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-330-195.jpg" ); ?>"/>
                </figure>
                <div class="acme-default beside-caption clearfix">
                    <h3 class="post-title">
                        <?php _e('Select another post', 'acmeblog' );?>
                    </h3>
                    <div class="post-date">
                        <?php _e(' Goto Appearance > Customize > Featured Section Options', 'acmeblog' );?>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div><!-- .beides-block -->';
    }
endif;
add_action( 'acmeblog_action_feature_side', 'acmeblog_feature_side', 0 );