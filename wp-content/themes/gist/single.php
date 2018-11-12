<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gist
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="breadcrumbs">
                <?php gist_breadcrumb_options(); ?>
            </div>
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

            /**
             * gist_related_posts hook
             * @since Gist 1.0.0
             *
             * @hooked gist_related_posts -  10
             */
            do_action( 'gist_related_posts' ,get_the_ID() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
gist_sidebar();
get_footer();
