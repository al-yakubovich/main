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

	<div class="container container--background">
		<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
	</div><!-- container -->

	<div class="container container--background container--category-feed">
		<?php get_template_part( 'parts/feed', 'category' ); ?>
	</div><!-- container -->

<?php get_footer();
