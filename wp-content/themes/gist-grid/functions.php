<?php
/**
 *Recommended way to include parent theme styles.
 *(Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 */
/**
 * Loads the child theme textdomain.
 */
function gist_gird_load_language() {
    load_child_theme_textdomain( 'gist-grid' );
}
add_action( 'after_setup_theme', 'gist_gird_load_language' );

/**
* Enqueue Style
*/
add_action( 'wp_enqueue_scripts', 'gist_grid_style' );
function gist_grid_style() {
	wp_enqueue_style( 'gist-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'gist-grid-style',get_stylesheet_directory_uri() . '/style.css',array('gist-style'));
}
/**
 * Gist Theme Customizer default value
 *
 * @package Gist
 */
if ( !function_exists('gist_default_theme_options') ) :
    function gist_default_theme_options() {

        $default_theme_options = array(
        	'gist_primary_color' => '#d6002a',
            'gist-footer-copyright'=> esc_html__('All Right Reserved 2018','gist-grid'),
            'gist-footer-gototop' => 1,
            'gist-sticky-sidebar'=> 1,
            'gist-sidebar-options'=>'right-sidebar',
            'gist-font-url'=> esc_url('//fonts.googleapis.com/css?family=Hind', 'gist-grid'),
            'gist-font-family' => esc_html__('Hind','gist-grid'),
            'gist-font-size'=> 16,
            'gist-font-line-height'=> 2,
            'gist-letter-spacing'=> 0,
            'gist-blog-excerpt-options'=> 'excerpt',
            'gist-blog-excerpt-length'=> 25,
            'gist-blog-featured-image'=> 'left-image',
            'gist-blog-meta-options'=> 0,
            'gist-blog-read-more-options' => esc_html__('Continue Reading','gist-grid'),
            'gist-blog-pagination-type-options'=>'numeric',
            'gist-related-post'=> 0,
            'gist-single-featured'=> 1,
            'gist-footer-social' => 0,
            'gist-extra-breadcrumb' => 1,
            'gist-breadcrumb-text' => esc_html__('You Are Here','gist-grid')
        );
        return apply_filters( 'gist_default_theme_options', $default_theme_options );
    }
endif;