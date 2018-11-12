<?php
/**
 * The template for displaying Search Results pages
 *
 * @package Salinger
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
			<?php
			if ( have_posts() ) :
				?>
				<header class="archive-header">
					<h1><?php printf( esc_html__( 'Search Results for: %s', 'salinger' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php 
				while ( have_posts() ) :
					the_post();
					get_template_part( SALINGER_TEMPLATE_PARTS . 'content-archive' );
				endwhile;

				salinger_the_posts_pagination();
			else :
				?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'salinger' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'salinger' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
				<?php
			endif;
				?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
