<?php
/**
 * Template part for displaying a message that posts cannot be found
 * @package JustBlog
*/

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'justblog' ); ?></h1>
	</header>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( 
			/* translators: %1$s: link to create post */
			__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'justblog' ), esc_url( admin_url( 'post-new.php' ) ) ) ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'justblog' ); ?></p>
			<?php
				get_search_form();
		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->