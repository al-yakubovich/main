<?php
/**
 * Category feed
 *
 * @package Cressida
 */
?>
<div id="category-feed" class="section-feed-category">

	<div class="row">
		<?php
			/**
			 * The Loop
			 */
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry col-md-3 col-sm-6 col-xs-12' ); ?>>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
						<?php cressida_entry_thumbnail( 'cressida-archive', true ); ?>
					</a>

					<div class="entry-vertical-content">
						<?php
							/* Title */
							cressida_entry_title();
							/* Excerpt */
							cressida_entry_excerpt();
						?>
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php
					/**
					 * Get video modal for video post format
					 */
					get_template_part( 'parts/entry', 'video-modal' );

			endwhile; endif;
		?>
	</div><!-- row -->
</div><!-- section-feed -->

<?php
	/**
	 * Posts navigation
	 */
	get_template_part( 'parts/archive', 'navigation' );