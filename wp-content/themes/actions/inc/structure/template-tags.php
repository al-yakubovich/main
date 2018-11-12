<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 */

if ( ! function_exists( 'actions_paging_nav' ) ) {
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function actions_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	    <nav class="navigation paging-navigation" role="navigation">
		    <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'actions' ); ?></h1>
		    <div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			    <div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'actions' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'actions' ) ); ?></div>
			<?php endif; ?>

		    </div>
	    </nav>
	<?php
}
}

if ( ! function_exists( 'actions_post_nav' ) ) {
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function actions_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'actions' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '%title', 'Previous post link', 'actions' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '%title ', 'Next post link', 'actions' ) );
			?>
		</div>
	</nav>
	<?php
}
}

if ( ! function_exists( 'actions_posted_on' ) ) {
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function actions_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	?>
	<span class="byline">
		<?php
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
		?>
	</span>
	<span class="posted-on">
		<?php
		printf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		);
		?>
	</span>
	<?php 
	    if ( 'post' === get_post_type() ) {
		    actions_entry_taxonomies();
	    }
	
	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Comments', 'actions' ), __( '1 Comment', 'actions' ), __( '% Comments', 'actions' ) ); ?></span>
	<?php endif;
}
}

/**
 * Returns true if a blog has more than 1 category.
 */
function actions_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so actions_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so actions_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in actions_categorized_blog.
 */
function actions_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'actions_category_transient_flusher' );
add_action( 'save_post',     'actions_category_transient_flusher' );

if ( ! function_exists( 'actions_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size
	 * @since 1.5.0
	 */
	function actions_post_thumbnail( $size ) {
		if ( has_post_thumbnail() ) { ?>
		    <div class="featured-image">
		        <?php the_post_thumbnail( $size, array( 'itemprop' => 'image' ) ); ?>
		    </div>
		<?php
		}
	}
}

if ( ! function_exists( 'actions_entry_taxonomies' ) ) {
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own actions_entry_taxonomies() function to override in a child theme.
 *
 * @since Actions 1.0
 */
function actions_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'actions' ) );
	if ( $categories_list && actions_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'actions' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'actions' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'actions' ),
			$tags_list
		);
	}
}
}

function actions_excerpt_more($more) {
    global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...Continue Reading</a>';
}
add_filter('excerpt_more', 'actions_excerpt_more');