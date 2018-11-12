<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gst
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<section class="error-404 not-found text-center">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'ERROR 404', 'gist' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e(  'Oops! That page can&rsquo;t be found.' , 'gist' ); ?></p>

					<?php
						get_search_form();


					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
