<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Shuban
 */

if ( ! function_exists( 'shuban_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function shuban_posted_on() {
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

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

	echo '<span class="posted-on meta-span"><i class="fa fa-calendar-check-o"></i>' . $posted_on . '</span><span class="byline meta-span"><i class="fa fa-user-o"></i>' . $byline . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link  meta-span"><i class="fa fa-comments-o"></i>';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'shuban' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'shuban' ) );
	if ( $tags_list ) {
		echo '<span class="tags-links meta-span"><i class="fa fa-tags"></i>';
		echo wp_kses( $tags_list, array('a' => array(
	        'href' => array(),
	        'title' => array()
	    ),) );
		echo '</span>';
	}

}
endif;

if ( ! function_exists( 'shuban_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function shuban_entry_footer() {

	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( __( ' <span class="cat-sep">&#166;</span> ', 'shuban' ) );
		if ( $categories_list && shuban_categorized_blog() ) {
			echo '<span class="cat-links">';
			echo wp_kses( $categories_list, array('a' => array(
		        'href' => array(),
		        'title' => array()
		    ),) );
			echo '</span>';
		}
	}

	edit_post_link(
		esc_html__( 'Edit', 'shuban' ),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function shuban_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'shuban_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'shuban_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so shuban_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so shuban_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in shuban_categorized_blog.
 */
function shuban_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'shuban_categories' );
}
add_action( 'edit_category', 'shuban_category_transient_flusher' );
add_action( 'save_post',     'shuban_category_transient_flusher' );
