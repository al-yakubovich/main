<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_attr_e( 'Nothing Found', 'mystem' ); ?></h1>
	</header>

	<div class="page-content hentry">		
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php
					/* translators: %s is url to new post */
					printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mystem' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_attr_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mystem' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php esc_attr_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mystem' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>		
	</div>
</section>
