<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */

get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mystem' ); ?></h1>
				</header>

				<div class="page-content hentry">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Try using the search form below.', 'mystem' ); ?></p>
					
					<div class="page_search">
						<?php get_search_form(); ?>
					</div>
				</div>
			</section>

		</main>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
