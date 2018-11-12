<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Salinger loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @since Salinger 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content border-none">
		<div id="content" role="main">

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( SALINGER_TEMPLATE_PARTS . 'content-page' );
				comments_template( '', true );
			endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>