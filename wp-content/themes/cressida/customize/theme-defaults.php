<?php
/**
 * Cressida theme defaults
 *
 * @package Cressida
 */

/**
 * General settings
 */
$cressida_defaults['cressida_footer_copyright'] = esc_html__('Copyright &copy; ', 'cressida'). date('Y');
$cressida_defaults['cressida_example_content']  = 1;

/**
 * Site Identity
 */
$cressida_defaults['cressida_image_logo_show'] = 0;
$cressida_defaults['cressida_text_logo']       = get_bloginfo( 'name', 'display' );
$cressida_defaults['cressida_tagline_show']    = 1;
/**
 * Header Image
 */
$cressida_defaults['cressida_custom_header'] = esc_url( get_theme_file_uri( '/sample/images/header.jpg' ) );
/**
 * Banner setting
 */
$cressida_defaults['cressida_banner_heading']     = get_bloginfo( 'name', 'display' );
$cressida_defaults['cressida_banner_description'] = get_bloginfo( 'description', 'display' );
$cressida_defaults['cressida_banner_label']       = esc_html__( 'Button Label', 'cressida' );
$cressida_defaults['cressida_banner_url']         = esc_url( home_url( '/' ) );
/**
 * Frontpage > Banner / Slider
 */
$cressida_defaults['cressida_frontpage_banner']                     = 'banner';
$cressida_defaults['cressida_frontpage_posts_slider_posts']['post'] = 1; // Hello World

/**
 * Frontpage > Featured Posts
 */
$cressida_defaults['cressida_frontpage_featured_posts_show']    = 0;
$cressida_defaults['cressida_frontpage_featured_posts_heading'] = esc_html__( 'Featured Posts', 'cressida' );
for ( $cressida_i = 1; $cressida_i < 3; $cressida_i++ ) {
	$cressida_defaults['cressida_frontpage_featured_posts_post_' . $cressida_i] = 1;
}
/**
 * Frontpage > Highlight Post 1
 */
$cressida_defaults['cressida_frontpage_highlight_post_1_show']       = 0;
$cressida_defaults['cressida_frontpage_highlight_post_1_id']         = 1;
$cressida_defaults['cressida_frontpage_highlight_post_1_background'] = 'light';
/**
 * Frontpage > Promo Category 1
 */
$cressida_defaults['cressida_section_frontpage_promo_category_1_show']     = 0;
$cressida_defaults['cressida_section_frontpage_promo_category_1_category'] = '1'; // Uncategorized
$cressida_defaults['cressida_section_frontpage_promo_category_1_number']   = 2;
/**
 * Frontpage > Posts Strip
 */
$cressida_defaults['cressida_section_frontpage_posts_strip_show']     = 0;
$cressida_defaults['cressida_section_frontpage_posts_strip_category'] = '1'; // Uncategorized
/**
 * Frontpage > Featured Links
 */
$cressida_defaults['cressida_frontpage_featured_links_show']   = 0;
for ( $cressida_link_i = 1; $cressida_link_i < 4; $cressida_link_i++ ) {
	$cressida_defaults['cressida_frontpage_featured_links_page_' . $cressida_link_i] = 2;
}
/**
 * Frontpage > Sidebar
 */
$cressida_defaults['cressida_frontpage_sidebar_toggle'] = 'off';
/**
 * Blog feed
 */
$cressida_defaults['cressida_blog_feed_heading']        = esc_html__( 'Recent Posts', 'cressida' );
$cressida_defaults['cressida_blog_feed_meta_show']      = 1;
$cressida_defaults['cressida_blog_feed_category_show']  = 1;
$cressida_defaults['cressida_blog_feed_date_show']      = 0;
$cressida_defaults['cressida_blog_feed_readmore_show']  = 1;
$cressida_defaults['cressida_blog_feed_readmore_label'] = esc_html__( 'View Post &raquo;', 'cressida' );
/**
 * Posts
 */
$cressida_defaults['cressida_posts_meta_show']           = 1;
$cressida_defaults['cressida_posts_date_show']           = 1;
$cressida_defaults['cressida_posts_category_show']       = 1;
$cressida_defaults['cressida_posts_tags_show']           = 1;
$cressida_defaults['cressida_posts_featured_image_show'] = 1;
$cressida_defaults['cressida_posts_nav_show']            = 1;
/**
 * Pages
 */
$cressida_defaults['cressida_pages_featured_image_show'] = 1;
/**
 * Sample images
 */
/* Slider, Banner, Full 1170x550 */
$cressida_defaults['cressida_slide_sample'][] = esc_url( get_theme_file_uri( '/sample/images/1170x550/1170x550-1.jpg' ) );
$cressida_defaults['cressida_slide_sample'][] = esc_url( get_theme_file_uri( '/sample/images/1170x550/1170x550-2.jpg' ) );
$cressida_defaults['cressida_slide_sample'][] = esc_url( get_theme_file_uri( '/sample/images/1170x550/1170x550-3.jpg' ) );
$cressida_defaults['cressida_slide_sample'][] = esc_url( get_theme_file_uri( '/sample/images/1170x550/1170x550-4.jpg' ) );
/* Slider, Banner with sidebar 790x530 */
$cressida_defaults['cressida_slide_sidebar_sample'][] = esc_url( get_theme_file_uri( '/sample/images/790x530/790x530-1.jpg' ) );
$cressida_defaults['cressida_slide_sidebar_sample'][] = esc_url( get_theme_file_uri( '/sample/images/790x530/790x530-2.jpg' ) );
$cressida_defaults['cressida_slide_sidebar_sample'][] = esc_url( get_theme_file_uri( '/sample/images/790x530/790x530-3.jpg' ) );
$cressida_defaults['cressida_slide_sidebar_sample'][] = esc_url( get_theme_file_uri( '/sample/images/790x530/790x530-4.jpg' ) );
/* Archive 760x1100 */
$cressida_defaults['cressida_archive_sample'][] = esc_url( get_theme_file_uri( '/sample/images/760x1100/760x1100-1.jpg' ) );
$cressida_defaults['cressida_archive_sample'][] = esc_url( get_theme_file_uri( '/sample/images/760x1100/760x1100-2.jpg' ) );
$cressida_defaults['cressida_archive_sample'][] = esc_url( get_theme_file_uri( '/sample/images/760x1100/760x1100-3.jpg' ) );
$cressida_defaults['cressida_archive_sample'][] = esc_url( get_theme_file_uri( '/sample/images/760x1100/760x1100-4.jpg' ) );