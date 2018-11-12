<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package Authorize
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-image">
		<?php
		/* Output the featured image. */

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'thumbnail' );
		}
		?>
	</div>

	<div class="featured-text">
		<h2 class="entry-title entry-header">
			<a href="<?php echo the_permalink()?>"><?php the_title() ?></a>
		</h2>

		<?php the_excerpt() ?>

		<div class="widgetLink moreinfo_link">
			<a href="<?php echo the_permalink()?>">
			<?php echo __( 'More &hellip;', 'authorize' ); ?></a>
		</div>
	</div>
</article>
