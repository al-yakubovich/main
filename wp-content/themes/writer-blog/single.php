<?php
/**
 * The template for displaying all single posts
 *
 **/

get_header(); ?>

<?php if ( get_theme_mod( 'ct-post-sidebar-setting' ) == 'none' ): ?>
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
		<?php if ( get_theme_mod( 'ct-post-sidebar-setting' ) == 'left' ): ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

		<!-- if no sidebar is set -->
		<?php if ( get_theme_mod( 'ct-post-sidebar-setting' ) == 'none'): ?>
			<div class="offset-by-one ten columns">
		<?php else: ?>
			<div class="eight columns">
		<?php endif; ?>
				<?php
					/* Start the Loop */
					if ( have_posts() ) : while ( have_posts() ) : the_post();
				
						get_template_part( 'template-parts/post/content', 'single' );
						
					endwhile;
				?>

				<div class="pagination-single">
					<div class="pagination-nav">
						<?php $prev_post = get_adjacent_post( false, '', false ); ?>
		 					<?php if ( is_a( $prev_post, 'WP_Post' ) ) { ?>
								<a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>" class="btn prev"></a>
							<?php } ?>

						<?php $next_post = get_adjacent_post( false, '', true ); ?>
		 					<?php if ( is_a( $next_post, 'WP_Post' ) ) { ?>
								<a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>" class="btn next"></a>
							<?php } ?>
					</div><!-- /.pagination-nav -->
				</div><!-- /.pagination-single-->

				<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;// End of comments loop.

					endif;// End of the loop.
				?>

			</div><!-- /.columns -->

		<!-- if right sidebar is set -->
		<?php if ( get_theme_mod( 'ct-post-sidebar-setting', 'right' ) == 'right' ): ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
	</div><!-- /.row -->
</div><!-- /.container -->
<?php get_footer(); ?>