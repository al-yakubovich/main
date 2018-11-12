<?php
/**
 * Template Name: Right Column
 * @package JustBlog
*/

get_header(); ?>
		
<div id="primary" class="content-area col-lg-8">

	<main id="main" class="site-main ">
	
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-banner' ); ?>
					
			<?php while ( have_posts() ) : the_post(); 
			get_template_part( 'template-parts/page/content', 'page' ); 
			if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif;
			endwhile; ?>	
		
	</main>

</div>

<div class="col-lg-4">        
<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>    
</div>

<?php 
get_footer();