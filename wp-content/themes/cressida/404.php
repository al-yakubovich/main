<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Cressida
 */
get_header(); ?>

<div class="container container--background">
	<article id="post-0" class="entry entry-404">
		<div class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( '404', 'cressida' ); ?></h1>
			<h3><?php esc_html_e( 'Page Not Found', 'cressida' ); ?></h3>
		</div><!-- entry-header -->
	</article><!-- entry entry-404 -->
</div><!-- container -->

<?php get_footer();