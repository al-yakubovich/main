<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loose
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12' ); ?>>
	
	<header class="entry-header row">
			
		<?php the_title( '<h1 class="entry-title col-xs-12">', '</h1>' ); ?>
		<div class="entry-meta  col-xs-12">
			<?php loose_posted_on(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="row">
		
	<div class="entry-content col-md-10 col-md-push-2">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				 array(
					 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'loose' ),
					 'after'  => '</div>',
				 )
				);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer col-md-12">
		<?php loose_entry_footer(); ?>
	</footer><!-- .entry-footer -->
		
	</div><!-- .row -->
		
</article><!-- #post-## -->

