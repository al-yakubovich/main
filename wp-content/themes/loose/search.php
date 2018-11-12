<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package loose
 */

get_header(); ?>
	 <div class="row">
	<div id="primary" class="content-area
	<?php
	$loose_home_page_layout = get_theme_mod( 'home_page_layout', 'masonry' );
											echo ( empty( $loose_home_page_layout ) ) ? ' col-md-12' : ' col-lg-8';
											if ( ! empty( $loose_home_page_layout ) && ! is_active_sidebar( 'sidebar-1' ) ) :
echo ' col-lg-push-2';
											endif;
											?>
											">

		<?php if ( have_posts() ) : ?>

			<div class="loose-page-intro">
						<h2>
						<?php
						// translators: search term.
						printf( esc_html__( 'Search Results for: %s', 'loose' ), '<span>' . get_search_query() . '</span>' );
						?>
						</h2>
			</div>
		<main id="main" class="site-main row masonry-container" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content-home', get_theme_mod( 'home_page_layout', 'masonry' ) );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
				</main><!-- #main -->

		<?php else : ?>
				<div class="loose-page-intro">
						<?php echo esc_html__( 'Nothing Found', 'loose' ); ?>
				</div>
		<main id="main" class="site-main row" role="main">
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
				</main><!-- #main -->
		<?php endif; ?>


	</div><!-- #primary -->

<?php
if ( ! empty( $loose_home_page_layout ) ) {
get_sidebar();}
?>
	</div><!-- .row -->
<?php get_footer(); ?>
