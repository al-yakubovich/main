<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plaser
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content','single');

			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'plaser' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'plaser' ),
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'plaser' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'plaser' ),
			) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
