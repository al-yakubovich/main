<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package our_blog
 */

get_header();
?>
<section class="middle-content homepage2">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="list-blog">
					<div class="row">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'our-blog' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'our-blog' ); ?></p>
						</div><!-- .page-content -->
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<?php get_sidebar();?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
