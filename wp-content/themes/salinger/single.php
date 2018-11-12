<?php
/**
 * The Template for displaying all single posts
 *
 * @package Salinger
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( SALINGER_TEMPLATE_PARTS . 'content-single' );

				if ( get_theme_mod( 'salinger_show_nav_single', 1 ) == 1 ) {
					?>
					<nav class="nav-single">
						<?php
						$args = array(
							'prev_text' => '<span class="meta-nav"><i class="fa fa-angle-double-left"></i></span> %title',
							'next_text' => '%title <span class="meta-nav"><i class="fa fa-angle-double-right"></i></span>',
							);
						the_post_navigation( $args );
						?>
					</nav><!-- .nav-single -->
					<?php
				} // salinger_show_nav_single.

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // end of the loop.
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>