<?php
/**
 * Template part for displaying page content in page.php
 * @package JustBlog
*/
?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
// featured image for pages
 if ( '' !== get_the_post_thumbnail() ) : 
		echo '<div class="post-thumbnail">';		
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));
		echo '</div>';
endif;		
?>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'justblog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'justblog' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-inset' ); ?>
	
</article>
