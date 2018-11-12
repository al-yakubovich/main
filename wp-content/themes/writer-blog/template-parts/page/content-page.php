<?php
/**
 * Template part for displaying page content in page
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="block">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="content-image">
				<img src="<?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?>" alt="image" />
			</div><!-- /.content-image -->
		<?php endif; ?>
		<div class="sub-block">
			<?php the_title( '<h2>', '</h2>' ); ?>
			<div class="post-content">
				<?php
					the_content();
				?>
				<?php
					wp_link_pages(
						array(
							'before'      => '<div class="link-pages">' . __( 'Continue Reading:', 'writer-blog' ),
							'after'       => '</div>',
							'link_before' => '<span class="page-numbers">',
							'link_after'  => '</span>',
						)
					);
				?>
			</div><!-- .post-content -->
		</div><!-- /.sub-block -->
	</div><!-- /.block -->
</article>