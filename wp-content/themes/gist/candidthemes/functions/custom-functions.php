<?php

/**
 * Add sidebar class in body
 *
 * @since Gist 1.0.0
 *
 */

add_filter('body_class', 'gist_custom_class');
function gist_custom_class($classes)
{
    $classes[] = 'ct-sticky-sidebar';
    global $gist_theme_options;
    $sidebar = $gist_theme_options['gist-sidebar-options'];
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}

/**
 * Goto Top functions
 *
 * @since Gist 1.0.0
 *
 */

if (!function_exists('gist_go_to_top')) :
    function gist_go_to_top()
    {
        ?>
        <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'gist'); ?>">
            <i class="fa fa-angle-double-up"></i>
        </a>
    <?php
    } endif;


/**
 * Adds sidebar based on customizer option
 *
 *  @since Gist 1.0.0
 */
if (!function_exists('gist_sidebar')) :
    function gist_sidebar()
    {
        global $gist_theme_options;
        $sidebar = $gist_theme_options['gist-sidebar-options'];
        if (($sidebar == 'right-sidebar') || ($sidebar == 'left-sidebar')) {
            get_sidebar();
        }
    }
endif;


/**
 * Post Thumbnail
 *
 *  @since Gist 1.0.0
 */
if (!function_exists('gist_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function gist_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'gist-large-thumb' ); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>
            <?php
            $image_size = 'gist-small-thumb';
            global $gist_theme_options;
            $image_location = $gist_theme_options['gist-blog-featured-image'];
            if( $image_location == 'full-image' ){
                $image_size = 'gist-large-thumb';
            }
            if ($image_location != 'hide-image'):
                ?>
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php

                    the_post_thumbnail( $image_size, array(
                        'class' => $image_location,
                        'alt' => the_title_attribute(array(
                                'echo' => false,
                            )
                        )
                    ));
                    ?>
                </a>
            <?php
            endif;
            ?>

        <?php endif; // End is_singular().
    }
endif;

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 */
if ( !function_exists('gist_excerpt_more') ) :
function gist_excerpt_more( $more ) {
    if(!is_admin() ){
        return '';
    }
}
endif;
add_filter('excerpt_more', 'gist_excerpt_more');

/**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if ( !function_exists('gist_alter_excerpt') ) :
    function gist_alter_excerpt( $length ){
        if(is_admin() ){
            return $length;
        }
        global $gist_theme_options;
        $excerpt_length = $gist_theme_options['gist-blog-excerpt-length'];
        if( !empty( $excerpt_length ) ){
            return $excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'gist_alter_excerpt');


/**
 * Display related posts from same category
 *
 * @since Gist 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('gist_related_post') ) :

    function gist_related_post( $post_id ) {

        global $gist_theme_options;
        if( 0 == $gist_theme_options['gist-related-post'] ){
            return;
        }
        $categories = get_the_category( $post_id );
        if ($categories) {
            $category_ids = array();
             $category = get_category($category_ids);
             $categories  = get_the_category( $post_id );
                foreach ( $categories as $category ){
                    $category_ids[]  = $category->term_id;                        
                }
            $count = $category->category_count;
            if($count > 1 ){ ?>
            <div class="related-pots-block">
                <h2 class="widget-title">
                    <?php _e( 'Related Posts', 'gist' ) ?>
                </h2>
                <ul class="related-post-entries clear">
                    <?php
                    $gist_cat_post_args = array(
                        'category__in'       => $category_ids,
                        'post__not_in'       => array($post_id),
                        'post_type'          => 'post',
                        'posts_per_page'     => 3,
                        'post_status'        => 'publish',
                        'ignore_sticky_posts'=> true
                    );
                    $gist_featured_query = new WP_Query( $gist_cat_post_args );

                    while ( $gist_featured_query->have_posts() ) : $gist_featured_query->the_post();
                        ?>
                        <li>
                            <?php
                            if ( has_post_thumbnail() ):
                                ?>
                                <figure class="widget-image">
                                    <a href="<?php the_permalink()?>">
                                        <?php the_post_thumbnail('gist-small-thumb'); ?>
                                    </a>
                                </figure>
                            <?php
                            endif;
                            ?>
                            <div class="featured-desc">
                                <a href="<?php the_permalink()?>">
                                    <h2 class="title">
                                       <?php the_title(); ?>
                                    </h2>
                                </a>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div> <!-- .related-post-block -->
        <?php
    }
        }
    }
endif;
add_action( 'gist_related_posts', 'gist_related_post', 10, 1 );


/**
 * Displays the custom header image below the navigation menu
*/
if (!function_exists('gist_header_image')) :
    function gist_header_image(){
        $has_header_image = has_header_image();
        if (!empty( $has_header_image )) {
            ?>
            <div id="headimg" class="header-image">
                <img src="<?php header_image(); ?>"
                     srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_custom_header()->attachment_id, 'full')); ?>"
                     width="<?php echo esc_attr(get_custom_header()->width); ?>"
                     height="<?php echo esc_attr(get_custom_header()->height); ?>"
                     alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </div>
        <?php
        }
    }
endif;

/**
 * Functions to manage breadcrumbs
*/
if (!function_exists('gist_breadcrumb_options')) :
function gist_breadcrumb_options(){
    global $gist_theme_options;
    if( 1 == $gist_theme_options['gist-extra-breadcrumb']){
        gist_breadcrumbs();
    }
}
endif;

/**
 * BreadCrumb Settings
 */
if( ! function_exists( 'gist_breadcrumbs' ) ):
    function gist_breadcrumbs() {
        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require get_template_directory() . '/candidthemes/assets/framework/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false
        );
       global $gist_theme_options;

        $gist_you_are_here_text = esc_html( $gist_theme_options['gist-breadcrumb-text'] );
        if( !empty( $gist_you_are_here_text ) ){
            $gist_you_are_here_text = "<span class='breadcrumb'>".$gist_you_are_here_text."</span>";
        }
        echo "<div class='breadcrumbs init-animate clearfix'>".$gist_you_are_here_text."<div id='gist-breadcrumbs' class='clearfix'>";
        breadcrumb_trail( $breadcrumb_args );
        echo "</div></div>";
    }
endif;
/**
 * Post Navigation Function
 *
 * @since Gist 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('gist_posts_navigation') ) :
    function gist_posts_navigation() {
        global $gist_theme_options;
        $gist_pagination_option = $gist_theme_options['gist-blog-pagination-type-options'];
        if( 'default' == $gist_pagination_option ){
            the_posts_navigation();
        }
        else{
            echo"<div class='candid-pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'gist'),
                'next_text' => __('Next &raquo;', 'gist'),
            ));
            echo "<div>";
        }
    }
endif;
add_action( 'gist_action_navigation', 'gist_posts_navigation', 10 );