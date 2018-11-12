<?php
/**
 * Frontpage Highlight Post 1
 *
 * @package Cressida
 */
$cressida_frontpage_highlight_post_1_show = cressida_get_option( 'cressida_frontpage_highlight_post_1_show' );

if ( ! $cressida_frontpage_highlight_post_1_show ) {
	return;
}

$cressida_background = cressida_get_option( 'cressida_frontpage_highlight_post_1_background' );
$cressida_post       = cressida_get_option( 'cressida_frontpage_highlight_post_1_id' );

$cressida_args = array(
	'posts_per_page' => 1,
	'post_type'      => 'post',
	'p'              => $cressida_post
);

$cressida_query = new WP_Query( $cressida_args );

if ( $cressida_query->have_posts() ) :
	while ( $cressida_query->have_posts() ) : $cressida_query->the_post(); ?>

	<div class="frontpage-highlight frontpage-highlight-1 frontpage-highlight-<?php echo esc_attr( $cressida_background ); ?>">
		<div class="container">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry row no-gutters justify-content-between align-items-center' ); ?>>
				<div class="col-lg-4 col-xs-12">
					<div class="entry-highlight-content">
						<?php
							/* Title */
							cressida_entry_title();

							/* Remove global excerpt filter and apply the highlight one */
							remove_filter( 'excerpt_length', 'cressida_excerpt_length', 999 );
							add_filter( 'excerpt_length', 'cressida_highlight_excerpt_length', 999 );
							cressida_entry_excerpt();
							remove_filter( 'excerpt_length', 'cressida_highlight_excerpt_length', 999 );
							add_filter( 'excerpt_length', 'cressida_excerpt_length', 999 );
						?>
					</div>
				</div>
				<div class="col-lg-7 col-xs-12">
					<?php cressida_entry_thumbnail( 'cressida-slider', true ); ?>
				</div>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div><!-- container -->
	</div><!-- frontpage-highlight-1 -->

	<?php
		/**
		 * Get video modal for video post format
		 */
		get_template_part( 'parts/entry', 'video-modal' );

	endwhile;
	wp_reset_postdata();
endif;
