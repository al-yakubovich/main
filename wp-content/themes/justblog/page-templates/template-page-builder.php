<?php
/**
 * Template Name: Page Builder
 * Special template for anyone using a page builder plugin.
 * No sidebars are included except the Bottom sidebars and the banner.
 * Page Builders offer the ability to create your own sidebars.
 *
 * @package JustBlog 
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">               
    		
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/page/content', 'pagebuilder' );
					endwhile;
				endif;
			?>				
 
		</main>
</div>

<?php get_footer(); ?>    