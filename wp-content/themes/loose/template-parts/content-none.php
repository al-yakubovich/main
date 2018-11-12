<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loose
 */

?>

<section class="no-results not-found col-md-12">

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
			<?php
				printf(
					 wp_kses( // translators: admin url.
					 __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'loose' ),
						 array(
							 'a' => array(
								 'href' => array(),
							 ),
						 )
					),
					esc_url( admin_url( 'post-new.php' ) )
					);
				?>
				</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php printf( '<span class="lead">%s</span><br/>%s', esc_html__( 'Sorry, but nothing matched your search terms.', 'loose' ), esc_html__( 'Please try again with some different keywords.', 'loose' ) ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php printf( '<span class="lead">%s</span><br/>%s', esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'loose' ), esc_html__( 'Perhaps searching can help.', 'loose' ) ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
