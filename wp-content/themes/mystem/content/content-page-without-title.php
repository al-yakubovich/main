<?php
/**
 * The template used for displaying page content without title
 *
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0.9
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mystem' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>
