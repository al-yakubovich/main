<?php
/**
 * The template for displaying pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cressida
 */
get_header();

$cressida_has_featured_image = cressida_singular_has_featured_image();

$cressida_featured_image_class = cressida_set_conditional_class(
	$cressida_has_featured_image,
	'has-featured-image',
	'no-featured-image'
);
?>

<div class="container container--background">
	<div class="row">

		<div class="col-lg-8 col-xs-12 sidebar-on">
			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-full' ); ?>>

						<div class="entry-header <?php echo esc_attr( $cressida_featured_image_class ); ?>">
							<?php cressida_entry_header_singular(); ?>
						</div><!-- entry-header -->

						<div class="entry-content">
							<?php
								the_content();
								wp_link_pages();
							?>
						</div><!-- entry-content -->
					</article>

				<?php endwhile; endif;
			?>
		</div><!-- col-lg-8 col-xs-12 sidebar-on -->

		<?php get_sidebar(); ?>

	</div><!-- row -->
</div><!-- container -->

<?php get_footer();
