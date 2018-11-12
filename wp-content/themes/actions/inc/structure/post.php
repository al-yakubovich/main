<?php
/**
 * Template functions used for posts.
 *
 * @package actions
 */

if ( ! function_exists( 'actions_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function actions_post_header() { ?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {			
			the_title( '<h1 class="entry-title" itemprop="name headline">', '</h1>' );
		} else {
			the_title( sprintf( '<h1 class="entry-title" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );			
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'actions_search_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function actions_search_header() { 
		if ( is_search() ) { ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'actions' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
		</header><!-- .page-header -->
	<?php }
	}
}

if ( ! function_exists( 'actions_archive_title' ) ) {
/**
 * Build the archive title
 *
 * @since 1.3.24
 */
	function actions_archive_title() {
	
	?>
	<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
		<?php do_action( 'actions_before_archive_title' ); ?>
		<h1 class="page-title">
			<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
					single_tag_title();

				elseif ( is_author() ) :
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					*/
					the_post();
					echo get_avatar( get_the_author_meta( 'ID' ), 75 );
					printf( '<span class="vcard">' . get_the_author() . '</span>' );
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'actions' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'actions' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'actions' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'actions' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'actions');

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'actions' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'actions' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'actions' );

				else :
					//_e( 'Archives', 'actions' );

				endif;
			?>
		</h1>
		<?php do_action( 'actions_after_archive_title' ); ?>
		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
			
			if ( get_the_author_meta('description') && is_author() ) : // If a user has filled out their decscription show a bio on their entries
				echo '<div class="author-info">' . get_the_author_meta('description') . '</div>';
			endif;
		?>
		<?php do_action( 'actions_after_archive_description' ); ?>
	</header><!-- .page-header -->
	<?php
	}
}

if ( ! function_exists( 'actions_post_meta' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0.0
	 */
	function actions_post_meta() {
		if ( 'post' == get_post_type() ) { ?>
			<div class="entry-meta">
			    <?php actions_posted_on(); ?>
			</div>
	<?php }
	}
}	

if ( ! function_exists( 'actions_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0.0
	 */
	function actions_post_content() { 
	    do_action( 'post_while_before' );
		
		while ( have_posts() ) : the_post(); ?>
		    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		        <?php do_action('post_header' ); ?>
		        <div class="entry-content">
		        <?php
				/*
				 * @see  actions_post_thumbnail()
				 * @see  actions_post_meta()
				 */
		        do_action( 'entry_top' );		            

		        if ( is_search() ) {
					the_excerpt();
				} else {
				the_content(
			        sprintf(
				        __( 'Continue reading %s', 'actions' ),
				        '<span class="screen-reader-text">' . esc_url( get_the_title() ) . '</span>'
			        )
		        );
				}
		
		        wp_link_pages( array(
			        'before' => '<div class="page-links">' . __( 'Pages:', 'actions' ),
			        'after'  => '</div>',
		        ) );
		        ?>
		        </div><!-- .entry-content -->
		    </article><!-- #post-## -->
        <?php 
		endwhile;		
	}
}

if ( ! function_exists( 'actions_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function actions_paging_nav() {
    // Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'actions' ),
			'next_text'          => __( 'Next page', 'actions' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'actions' ) . ' </span>',
		) );
	}
}

if ( ! function_exists( 'actions_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function actions_post_nav() {		
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post: ', 'actions' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post:', 'actions' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post: ', 'actions' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post:', 'actions' ) . '</span> ' .
				'<span class="post-title">%title</span>',
		) );
	}
}