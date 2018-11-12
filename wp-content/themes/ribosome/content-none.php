<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package Ribosome
 */

?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php esc_attr_e( 'Nothing Found', 'ribosome' ); ?></h1>
		</header>

		<div class="entry-content">
			<p><?php esc_attr_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'ribosome' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
