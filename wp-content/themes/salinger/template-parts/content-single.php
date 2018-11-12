<?php
/**
 * The template used for displaying content in single.php
 *
 * @package Salinger
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	do_action( 'salinger_before_post_title' );

	$featured_image_in_post = get_theme_mod( 'salinger_featured_image_in_post' );

	if ( 'before_post_title' === $featured_image_in_post && has_post_thumbnail() ) {
		the_post_thumbnail( 'full' );
	}
	?>

	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		?>

		<div class='entry-info'>
			<span class="author-in-full-posts"><i class="fa fa-user"></i> <?php salinger_entry_author(); ?></span>
			<span class="date-in-full-posts">
				&nbsp;&nbsp;<i class="fa fa-calendar-o"></i> <?php salinger_entry_date(); ?>
			</span>
			<span class="comments-in-full-posts">
				&nbsp;&nbsp;<i class="fa fa-comment-o"></i> <?php comments_popup_link(); ?>
			</span>
		</div><!-- .entry-info -->

	</header><!-- .entry-header -->

	<?php
	if ( is_active_sidebar( 'salinger-sidebar-before-entry-content' ) ) {
		?>
		<div class="before-entry-content-widget-area">
			<?php dynamic_sidebar( 'salinger-sidebar-before-entry-content' ); ?>
		</div>
		<?php
	}
	?>

	<div class="entry-content">
		<?php
		if ( $featured_image_in_post == 'after_post_title' && has_post_thumbnail() ) {
			?>
			<div class="featured-image-in-post">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
			<?php
		}

		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'salinger' ) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'salinger' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php

	if ( is_active_sidebar( 'salinger-sidebar-after-entry-content' ) ) {
		?>
		<div class="after-entry-content-widget-area">
			<?php dynamic_sidebar( 'salinger-sidebar-after-entry-content' ); ?>
		</div>
		<?php
	}
	?>

	<footer class="entry-meta">
		<div class="entry-taxonomies-single">
			<span class="entry-meta-categories"><span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?>&nbsp;&nbsp;&nbsp;</span>

			<?php
			$post_tags = get_the_term_list( $post->ID, 'post_tag' );
			if ( $post_tags ) {
				?>
				<span class="entry-meta-tags"><span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ', '' ); ?></span>
				<?php
			}
			?>

			<div style="float:right;">
				<?php edit_post_link( __( 'Edit', 'salinger' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		</div><!-- .entry-meta -->

		<?php
		// Related posts.
		if ( get_theme_mod( 'salinger_related_posts', '' ) == 1 ) {
			get_template_part( SALINGER_TEMPLATE_PARTS . 'related-posts' );
		}
		// Author info.
		if ( get_the_author_meta( 'description' ) ) {
			get_template_part( SALINGER_TEMPLATE_PARTS . 'author-info-box' );
		}
		?>

	</footer>
</article>
