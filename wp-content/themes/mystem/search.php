<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
				<?php
				/* translators: %s is search term */
				printf( esc_attr_e( 'Search Results for: ', 'mystem' ) . '%s', '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content/content', 'search' ); ?>

			<?php endwhile; ?>

			<?php the_posts_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content/content', 'none' ); ?>

		<?php endif; ?>

		</main>
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
