<?php
/**
 *Recommended way to include parent theme styles.
 *(Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 */
/**
 * Loads the child theme textdomain.
 */
function blog_path_load_language() {
    load_child_theme_textdomain( 'blog-path' );
}
add_action( 'after_setup_theme', 'blog_path_load_language' );

/**
* Enqueue Style
*/
function blog_path_style() {
    wp_enqueue_style( 'gist-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'blog-path-style',get_stylesheet_directory_uri() . '/style.css',array('gist-style') );
    wp_enqueue_style('blog-path-google-fonts', '//fonts.googleapis.com/css?family=Playfair+Display');
    wp_enqueue_script('blog-path-custom', get_stylesheet_directory_uri() . '/assets/js/blog-path-custom.js', array(), '20151215', true);
}
add_action( 'wp_enqueue_scripts', 'blog_path_style' );
/**
 * Gist Theme Customizer default value
 *
 * @package Gist
 */
if ( !function_exists('gist_default_theme_options') ) :
    function gist_default_theme_options() {

        $default_theme_options = array(
            'gist_primary_color' => '#d6002a',
            'gist-footer-copyright'=> esc_html__('All Right Reserved 2018','blog-path'),
            'gist-footer-gototop' => 1,
            'gist-sticky-sidebar'=> 1,
            'gist-sidebar-options'=>'right-sidebar',
            'gist-font-url'=> esc_url('//fonts.googleapis.com/css?family=Hind', 'blog-path'),
            'gist-font-family' => esc_html__('Hind','blog-path'),
            'gist-font-size'=> 16,
            'gist-font-line-height'=> 2,
            'gist-letter-spacing'=> 0,
            'gist-blog-excerpt-options'=> 'excerpt',
            'gist-blog-excerpt-length'=> 25,
            'gist-blog-featured-image'=> 'full-image',
            'gist-blog-meta-options'=> 1,
            'gist-blog-read-more-options' => esc_html__('Continue Reading','blog-path'),
            'gist-blog-related-post-options'=> 1,
            'gist-blog-pagination-type-options'=>'numeric',
            'gist-related-post'=> 0,
            'gist-single-featured'=> 1,
            'gist-footer-social' => 0,
            'gist-extra-breadcrumb' => 1,
            'gist-breadcrumb-text' => esc_html__('You Are Here','blog-path')
        );
        return apply_filters( 'gist_default_theme_options', $default_theme_options );
    }
endif;
        
/* Option to hide Related Post on Index Page*/
function blog_path_customize_register( $wp_customize ) {

$default = gist_default_theme_options();
$wp_customize->add_setting( 'gist_theme_options[gist-blog-related-post-options]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $default['gist-blog-related-post-options'],
    'sanitize_callback' => 'gist_sanitize_checkbox'
) );
$wp_customize->add_control( 'gist_theme_options[gist-blog-related-post-options]', array(
    'label'         => __( 'Hide Related Post on Blog Listing Page', 'blog-path' ),
    'description'   => __( 'It will hide on Blog, Archive and Search Page', 'blog-path' ),
    'section'       => 'gist_blog_section',
    'settings'      => 'gist_theme_options[gist-blog-related-post-options]',
    'type'          => 'checkbox'
) );
}
add_action( 'customize_register', 'blog_path_customize_register' );


/**
 * Display related posts from same category
 *
 * @since Gist 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('blog_path_page_related_post') ) :

    function blog_path_page_related_post( $post_id ) {

        global $gist_theme_options;
        if( 0 == $gist_theme_options['gist-blog-related-post-options'] ){
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
            if($count > 1 ){
            ?>
            <div class="blog-related-pots-block">
                <h3 class="blog-related-post-title">
                    <?php _e( 'You May Also Like', 'blog-path' ) ?>
                </h3>
                <ul class="blog-related-post-entries clear">
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
                                    <h4 class="related-title">
                                       <?php the_title(); ?>
                                    </h4>
                                </a>
                                <?php echo get_the_date();?>
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
add_action( 'blog_path_page_related_posts', 'blog_path_page_related_post', 10, 1 );