<?php
/**
 * Template file for the default blog content
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JustBlog
 */
 
?>

<?php if (is_archive() ) : ?>
	<header id="page-header">
	<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="description lead">', '</div>' );
	?>
	</header>	
<?php else : ?>
	<header id="page-header" class="screen-reader-text">
		<h2 class="page-title"><?php esc_html_e( 'Posts', 'justblog' ); ?></h2>
	</header>
<?php endif; ?>

		<?php if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>			

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
					<div class="entry-content-wrapper">
					<header class="entry-header">	
						
						<?php
						if ( is_single() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} elseif ( is_front_page() && is_home() ) {
							the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}		
						if ( 'post' === get_post_type()) {
							echo '<ul class="entry-meta">';
								if ( is_single() ) {
									justblog_posted_on();
								} else {
									justblog_time_link();
								};
							echo '</ul>';
						};
						?>								
					</header>
						
					<?php if ( '' !== get_the_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php esc_url(the_permalink()); ?>">			
								<?php 
								if ( esc_attr(get_theme_mod( 'justblog_default_thumbnails', false )) ) :
									the_post_thumbnail( 'justblog-default' );  
								else :
									the_post_thumbnail( 'post-thumbnails' ); 
								endif;				
								?>
							</a>				
								
							<?php if( esc_attr(get_theme_mod( 'justblog_show_featured_captions', true ) ) ) {			
							$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
							  if(!empty($get_description) ) {
								  //If description is not empty show the div
							  echo '<div class="post-caption-container"><p class="post-caption">' . esc_html( $get_description ) . '</p></div>';
							  }
							  }
							?>	
							
						</div>
					<?php endif; ?>
					
					<div class="entry-content">
						<?php
						if ( esc_attr(get_theme_mod( 'justblog_use_excerpt', 1 )) ) :
							the_excerpt();
						else :
						
							the_content( sprintf(
							/* translators: %s: Name of current post */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'justblog' ),
								get_the_title()
							) );

							wp_link_pages( array(
								'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'justblog' ),
								'after'       => '</div>',
								'link_before' => '<span class="page-number">',
								'link_after'  => '</span>',
							) );
							endif;
						?>
					</div>

					<footer class="entry-footer">
					
					</footer>
					</div>
				</article>			
			<?php
			endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif; ?>
