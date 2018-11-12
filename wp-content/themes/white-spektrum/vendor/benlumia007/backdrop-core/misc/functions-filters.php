<?php
/**
 ************************************************************************************************************************
 * Backdrop Core - functions-filters.php
 ************************************************************************************************************************
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  namespace define
 ************************************************************************************************************************
 */
namespace Benlumia007\Backdrop\Misc;

/**
 ************************************************************************************************************************
 *  Table of Content
 ************************************************************************************************************************
 *  1.0 - Misc (Excerpt More)
 *  2.0 - Misc (Excerpt Length)
 *  3.0 - Misc (Archive Title)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Misc (Excerpt More)
 ************************************************************************************************************************
 */
function custom_excerpt_more() {
    global $post;
    $more = 'more...';
    return '<a class="read-more" href="'. esc_url( get_permalink ($post->ID ) ) . '"> ( '. esc_html( $more ) .' )</a>';
}
add_filter( 'excerpt_more', __NAMESPACE__ . "\\custom_excerpt_more");

/**
 ************************************************************************************************************************
 *  2.0 - Misc (Excerpt Length)
 ************************************************************************************************************************
 */
function custom_excerpt_length() {
    if ( !is_admin() ) {
        return 50;
    }
}
add_filter( 'excerpt_length', __NAMESPACE__ . "\\custom_excerpt_length");

/**
 ************************************************************************************************************************
 *  3.0 - Misc (Archive Title)
 ************************************************************************************************************************
 */
function custom_archive_title() {
    if( is_category() ) {
        $title = '<h1 class="archive-title">' . esc_html__( 'Category', 'backdrop' ) . '</h1><span class="archive-description">' . single_cat_title( '', false ) . '</span>';
    } elseif ( is_tag() ) {
        $title = '<h1 class="archive-title">' . esc_html__( 'Tag', 'backdrop' ) . '</h1><span class="archive-description">' . single_tag_title( '', false ) . '</span>';
    } elseif ( is_author() ) {
        $title = '<h1 class="archive-title">' . esc_html__( 'Author', 'backdrop' ) . '</h1><span class="archive-description">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = '<h1 class="archive-title">' . esc_html__( 'Year', 'backdrop' ) . '</h1><span class="archive-description">' . get_the_date( _x( 'Y', 'yearly archives date format', 'backdrop' ) ) . '</span>';
    } elseif ( is_month() ) {
        $title = '<h1 class="archive-title">' . esc_html__( 'Month', 'backdrop' ) . '</h1><span class="archive-description">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'backdrop' ) ) . '</span>';
    } elseif ( is_day() ) {
        $title = '<h1 class="archive-title">' . esc_html__( 'Day', 'backdrop' ) . '</h1><span class="archive-description">' . get_the_date( _x( 'F j Y', 'daily archives date format', 'backdrop' ) ) . '</span>';
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title', 'backdrop' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title', 'backdrop' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = '<h1 class="archive-title">' . esc_html__( 'Archives', 'backdrop' ) . '</h1><span class="archive-description">' . post_type_archive_title( '', false ) . '</span>';
    } elseif ( is_tax() ) {
        $tax = get_taxonomy(get_queried_object()->taxonomy);
        $title = sprintf(__( '%1$s: %2$s', 'backdrop' ), $tax->labels->singular_name, single_term_title( '', false) );
    } else {
        $title = '<h1 class="archive-title">' . esc_html__( 'Archives', 'backdrop' ) . '</h1>';
    }
    return $title;
}
add_action( 'get_the_archive_title', __NAMESPACE__ . "\\custom_archive_title");