<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cressida
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-xs-12 sidebar-on">
				<?php get_template_part( 'parts/feed' ); ?>
			</div><!-- col-lg-8 col-xs-12 sidebar-on -->

			<?php get_sidebar(); ?>
		</div><!-- row -->
	</div><!-- container -->

<?php get_footer();
