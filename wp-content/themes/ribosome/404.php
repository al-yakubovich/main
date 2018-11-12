<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Ribosome
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_attr_e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'ribosome' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php esc_attr_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ribosome' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
