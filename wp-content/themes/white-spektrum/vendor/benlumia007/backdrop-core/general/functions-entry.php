<?php
/**
 ************************************************************************************************************************
 * Backdrop Core - functions-entry.php
 ************************************************************************************************************************
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 * namespace define
 ************************************************************************************************************************
 */
namespace Benlumia007\Backdrop\Entry;

/**
 ************************************************************************************************************************
 *  Table of Content
 ************************************************************************************************************************
 *  1.0 - General (Post Thumbnail)
 *  2.0 - General (Posted On)
 *  3.0 - General (Timestamp)
 *  4.0 - General (Title)
 *  5.0 - General (Taxonomies)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - General (Post Thumbnail)
 ************************************************************************************************************************
 */
function display_entry_post_thumbnail() {
    echo output_entry_post_thumbnail();
}

function output_entry_post_thumbnail() {
    if ( has_post_thumbnail() ) {
        $size = 'no-sidebar' === get_theme_mod( 'global_layout', 'no-sidebar' ) ? 'large' : 'medium';
        the_post_thumbnail( "backdrop-{$size}-thumbnails" );
    }
}

/**
 ************************************************************************************************************************
 *  2.0 - General (Posted On)
 ************************************************************************************************************************
 */
function display_entry_posted_on() {
    echo output_entry_posted_on();
}

function output_entry_posted_on() {
    $avatar_size = apply_filters( 'author_avatar_size', 80 );
    
    $date = sprintf(
        '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        get_the_date( get_option('date_format') )
    );
    $author = sprintf(
        '<a href="%1$s" title="%2$s">%3$s</a>',
        esc_url( get_author_posts_url( get_the_author_meta('ID') ) ),
        esc_attr( sprintf(__( 'View all posts by %s', 'backdrop'), get_the_author() ) ),
        get_the_author()
    );
    printf(
        '<span class="byline"><span class="author vcard">%1$s</span>',
        get_avatar( get_the_author_meta( 'user_email' ), $avatar_size )
    );
    printf(
        '<span class="by-author"><b>%1$s</b></span><span class="published"><b>%2$s</b></span>',
        $author,
        $date
    );
}

/**
 ************************************************************************************************************************
 *  3.0 - General (Timestamp)
 ************************************************************************************************************************
 */
function display_entry_timestamp() {
    echo output_entry_timestamp();
}

function output_entry_timestamp() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
    );
    
	return sprintf(
		__('<span class="screen-reader-text">Posted on</span> %s', 'backdrop'),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
}

/**
 ************************************************************************************************************************
 *  4.0 - General (Title)
 ************************************************************************************************************************
 */
function display_entry_title() {
    echo output_entry_title();
}

function output_entry_title() {
    if ( is_single() ) {
        the_title('<h1 class="entry-title">', '</h1>');
    } elseif ( is_front_page() && is_home() ) {
        the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>');
    } else {
        the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h1>');
    }
}

/**
 ************************************************************************************************************************
 *  5.0 - General (Taxonomies)
 ************************************************************************************************************************
 */
function display_entry_taxonomies() {
    echo output_entry_taxonomies();
}

function output_entry_taxonomies() {
    $cat_list = get_the_category_list(__( ' | ', 'backdrop') );
    $tag_list = get_the_tag_list('', __( ' | ', 'backdrop') );
    if ($cat_list) {
        printf( '<div class="cat-link"><i class="fa fa-folder-open-o"></i> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
        __( ' Posted In', 'backdrop' ),  
        $cat_list
        );
    }
    if ($tag_list) {
        printf( '<div class="tag-link"><i class="fa fa-tags"></i> %1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
        __( ' Tagged', 'backdrop' ),  
        $tag_list 
        );
    }
}