<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<?php if ( get_theme_mod( 'ct-page-sidebar-setting' ) == 'none' ): ?>
	<div class="row">
		<div class="offset-by-one ten columns">
			<?php writer_blog_breadcrumb_switcher(); ?>
		</div>
	</div>
<?php else: ?>
	<?php writer_blog_breadcrumb_switcher(); ?>
<?php endif; ?>

<div class="container no-header-bg body-container">
	<div class="row">
		<!-- if left sidebar is set -->
		<?php if ( get_theme_mod( 'ct-page-sidebar-setting' ) == 'left' ): ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

		<!-- if no sidebar is set -->
		<?php if ( get_theme_mod( 'ct-page-sidebar-setting' ) == 'none' ): ?>
			<div class="offset-by-one ten columns">
		<?php else: ?>
			<div class="eight columns">
		<?php endif; ?>

			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>

		</div><!-- /.columns -->
		
		<!-- if right sidebar is set -->
		<?php if ( get_theme_mod( 'ct-page-sidebar-setting', 'right' ) == 'right' ): ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
	</div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer();