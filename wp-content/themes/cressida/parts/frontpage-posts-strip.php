<?php
/**
 * Frontpage Posts Strip
 *
 * @package Cressida
 */
$cressida_section_frontpage_posts_strip_show = cressida_get_option( 'cressida_section_frontpage_posts_strip_show' );

if ( ! $cressida_section_frontpage_posts_strip_show ) {
	return;
}

$cressida_category = cressida_get_option( 'cressida_section_frontpage_posts_strip_category' );

$cressida_args = array(
	'posts_per_page' => 6,
	'post_type'      => 'post',
	'category__in'   => array( $cressida_category )
);

$cressida_query = new WP_Query( $cressida_args );

if ( $cressida_query->have_posts() && $cressida_query->found_posts > 5 ) : ?>

	<div class="frontpage-posts-strip row no-gutters">

		<?php while ( $cressida_query->have_posts() ) : $cressida_query->the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry col-lg col-md-4 col-sm-6 col-xs-12' ); ?>>
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

		endwhile;
		wp_reset_postdata();
	?>

	</div><!-- frontpage-posts-strip -->

<?php else :
	/**
	 * Show message in customizer preview if selected
	 * category has less than 6 posts.
	 */
	if ( is_customize_preview() ) :
		echo '<h2 class="text-center my-5">';
		esc_html_e( 'Selected category does not contain enough posts.', 'cressida' );
		echo '</h2>';
	endif; // is_customize_preview()
endif;