<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package loose
 */

get_header(); ?>
<div class="row">
		<div id="primary" class="content-area col-lg-8
		<?php
		if ( ! get_theme_mod( 'single_post_sidebar', 1 ) ) {
echo ' col-lg-offset-2'; }
?>
">
		<main id="main" class="site-main row" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			loose_single_before_content();

			get_template_part( 'template-parts/content-single', get_post_format() );
			?>
					
			<?php
			if ( get_theme_mod( 'single_post_navigation', 1 ) ) :

							the_post_navigation(
									array(
										'prev_text'          => '<div class="loose-previous-article">' . esc_html( get_theme_mod( 'single_post_navigation_previous_label', __( 'Previous article', 'loose' ) ) ) . '</div><div class="loose-previous-article-title">%title</div>',
										'next_text'          => '<div class="loose-next-article">' . esc_html( get_theme_mod( 'single_post_navigation_next_label', __( 'Next article', 'loose' ) ) ) . '</div><div class="loose-next-article-title">%title</div>',
										'in_same_term' => wp_validate_boolean( get_theme_mod( 'single_post_navigation_only_category', 0 ) ),
									)
							);

						endif;
						?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if ( get_theme_mod( 'single_post_sidebar', 1 ) ) {
get_sidebar(); }
?>
</div><!-- .row -->
<?php get_footer(); ?>
