<?php
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package JustBlog
 */

get_header(); ?>

<div id="primary" class="content-area col-lg-12">
	<main id="main" class="site-main ">
		
		<div class="error_box">
			<p class="error_type"><?php esc_html_e( '404', 'justblog' ); ?></p>
		</div>
		<h1 class="error_text"><?php esc_html_e( 'Not found!', 'justblog' ); ?></h1>			

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Try searching.', 'justblog' ); ?></p>
			<?php get_search_form(); ?>
		</div>	
	
	</main>
</div>

<?php
get_footer();
