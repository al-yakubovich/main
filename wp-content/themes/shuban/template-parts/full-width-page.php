<?php
/**
 * Template Name: Full Width Page Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shuban
 */

get_header(); ?>

	<div class="st-primary-wrapper col-md-12">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<!-- /.st-primary-wrapper col-md-12 -->

<?php

get_footer();
