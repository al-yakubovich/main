<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loose
 */

?>
<div class=" col-xs-12 col-md-6 masonry">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( has_post_format( 'image' ) ) :
			get_the_image(
				 array(
					 'scan' => true,
					 'scan_raw' => true,
					 'size' => 'medium',
				 )
				);
		elseif ( has_post_thumbnail() ) :
		?>
			<div class="featured-image">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'medium' ); ?>   
			</a>
			</div>
		<?php endif; ?>
		<?php echo loose_post_format_icon( get_the_ID() ); // WPCS: XSS OK. ?>
		<?php
		if ( ! has_post_format( 'aside' ) && ! has_post_format( 'link' ) && ! has_post_format( 'quote' ) && ! has_post_format( 'image' ) ) :
			?>
			<div class="featured-image-cat">
				<?php the_category( __( '<span> &#124; </span>', 'loose' ) ); ?>
			</div>
		<?php
		endif;
			loose_the_title();
			loose_the_content();
			loose_entry_meta();
		?>
	</header><!-- .entry-header -->
	</article><!-- #post-## -->
</div>
