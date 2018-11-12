<?php
/**
 * Main template for displaying a post within a feed
 *
 * @package Cressida
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-featured col-md-6 col-xs-12' ); ?>>

	<div class="entry-featured-thumb">
		<?php
			cressida_entry_thumbnail( 'cressida-archive', true );

			get_template_part( 'parts/entry-shop-post' );
		?>
	</div><!-- entry-featured-thumb -->

	<div class="entry-featured-content matcheight">
		<?php
			/* Get first category */
			cressida_get_entry_first_category();
			/* Title */
			cressida_entry_title();
			/* Remove global excerpt filter and apply the featured one */
			remove_filter( 'excerpt_length', 'cressida_excerpt_length', 999 );
			add_filter( 'excerpt_length', 'cressida_featured_excerpt_length', 999 );
			cressida_entry_excerpt();
			remove_filter( 'excerpt_length', 'cressida_featured_excerpt_length', 999 );
			add_filter( 'excerpt_length', 'cressida_excerpt_length', 999 );
			cressida_read_more_link();
		?>
	</div>

	<?php
		/**
		 * Get video modal for video post format
		 */
		get_template_part( 'parts/entry', 'video-modal' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->