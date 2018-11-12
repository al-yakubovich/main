<?php
/**
 * The default template for displaying the full post
 * @package JustBlog
*/
?>

<?php get_template_part( 'template-parts/sidebars/sidebar', 'breadcrumbs' ); ?>

<?php
while ( have_posts() ) : the_post(); ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
		<?php	the_title( '<h1 class="entry-title">', '</h1>' );	?>	
		
		<?php if ( 'post' === get_post_type() ) {
			echo '<ul class="entry-meta">';
					justblog_posted_on();
			echo '</ul>';
			};
		 ?>
		 
	</header>
	
	<?php	if( esc_attr(get_theme_mod( 'justblog_show_single_featured', 1 ) ) ) :  
	echo '<div class="post-thumbnail">';		
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));
		
	if( esc_attr(get_theme_mod( 'justblog_show_featured_captions', true ) ) ) {			
		$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
		  if(!empty($get_description) ) {
			  //If description is not empty show the div
		  echo '<div class="post-caption-container"><p class="post-caption">' . esc_html( $get_description ) . '</p></div>';
		  }
	}			
	echo '</div>';			
	endif; 
	?>

	<div class="entry-content">
		<?php	the_content();
		
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'justblog' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>	
	</div>
	
	<?php if ( esc_attr(get_theme_mod( 'justblog_show_post_tags', 1 )) ) : ?>		
		<div class="entry-footer">
			<?php	justblog_entry_footer();	?>
		</div>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-inset' ); ?>

</article>


<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) && esc_attr(get_theme_mod( 'justblog_show_author_bio', true ) ) ) :
		get_template_part( 'author-bio' );
	endif;
?>

<?php
	// Related Posts.
	if( esc_attr(get_theme_mod( 'justblog_show_related_posts', true ) ) ) :
	 get_template_part( 'inc/related-posts' );
	endif;
?>
					  
<?php 	// single post navigation
	if ( esc_attr(get_theme_mod( 'justblog_show_post_nav', 1 )) ) :
		get_template_part( 'template-parts/navigation/navigation', 'post' );
	endif;
?>	

<?php 
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>