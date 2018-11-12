<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Salinger
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php do_action( 'salinger_before_page_title' ); ?>

		<header class="entry-header">
			<h1 class="entry-title page-title"><?php the_title(); ?></h1>
		</header>

		<?php
		// Show widget area only on pages with default template.
		if ( ! is_page_template() && is_active_sidebar( 'salinger-sidebar-before-entry-content' ) ) {
			?>
			<div class="before-entry-content-widget-area">
				<?php dynamic_sidebar( 'salinger-sidebar-before-entry-content' ); ?>
			</div>
			<?php
		}
		?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'salinger' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<?php
		// Show widget area only on pages with default template.
		if ( ! is_page_template() && is_active_sidebar( 'salinger-sidebar-after-entry-content' ) ) {
			?>
			<div class="after-entry-content-widget-area">
				<?php dynamic_sidebar( 'salinger-sidebar-after-entry-content' ); ?>
			</div>
			<?php
		}
		?>

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'salinger' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
