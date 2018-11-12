<?php
/**
 * Template file for the grid blog content
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
 
 $bloglayout = esc_attr(get_theme_mod( 'justblog_blog_layout', 'blog1' ));
 
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

<div class="row row-eq-height">	
<?php if ( have_posts() ) :
	/* Start the Loop */
	while ( have_posts() ) : the_post(); ?>
			
		<?php 
			// grid with sidebars
			if ( $bloglayout == 'blog7' || $bloglayout == 'blog8' )  :
				echo '<div class="col-lg-6">';				
			else :
			// grid without sidebars
				echo '<div class="col-lg-4">';
			endif; ?>
	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					<?php if ( '' !== get_the_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php esc_url(the_permalink()); ?>">			
								<?php 
								if ( esc_attr(get_theme_mod( 'justblog_grid_thumbnails', false )) ) :
									the_post_thumbnail( 'justblog-grid' );  
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
					
					<div class="card-body">
						<header class="card-title entry-header">
						<?php	
						if ( is_front_page() && is_home() ) {
							the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}		
					 ?>					
					 <?php			
						if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php justblog_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header>				
						<div class="entry-content">
							<?php	the_excerpt(); ?>
						</div>				
				
					</div>
					</article>
			  </div>
	
		
				
	<?php
	endwhile;
		
	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif; ?>
</div>

<?php the_posts_navigation(); ?>