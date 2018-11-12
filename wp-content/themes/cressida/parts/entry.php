<?php
/**
 * Main template for displaying a post within a feed
 *
 * @package Cressida
 */
$cressida_blog_feed_readmore_show  = cressida_get_option( 'cressida_blog_feed_readmore_show' );
$cressida_blog_feed_readmore_label = cressida_get_option( 'cressida_blog_feed_readmore_label' );
$cressida_example_content          = cressida_get_option( 'cressida_example_content' );

if ( has_post_thumbnail() || $cressida_example_content == 1 ) :
	$cressida_post_class = 'entry col-md-6 col-xs-12 matcheight has-thumbnail';
else :
	$cressida_post_class = 'entry col-md-6 col-xs-12 matcheight no-thumbnail';
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $cressida_post_class ) ); ?>>

	<?php cressida_entry_thumbnail( 'cressida-archive', true ); ?>

	<div class="entry-archive-content">
		<?php
			cressida_get_entry_first_category();
			cressida_entry_separator( 'categories-date' );
			cressida_entry_date();
			cressida_entry_title();

			if ( $cressida_blog_feed_readmore_show ) :
				// Translators: 1. Permalink, 2. Title attribute, 3. Link label
				printf( __( '<a href="%1$s" class="entry-read-more" title="%2$s">%3$s</a>', 'cressida' ),
					esc_url( get_permalink() ),
					the_title_attribute( 'echo=0' ),
					esc_html( $cressida_blog_feed_readmore_label )
				);
			endif;
		?>
	</div>

	<?php
		/**
		 * Get video modal for video post format
		 */
		get_template_part( 'parts/entry', 'video-modal' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->