<?php
/**
 * The default template for displaying content
 *
 * @package Salinger
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php

		if ( is_sticky() && is_home() ) {

			get_template_part( SALINGER_TEMPLATE_PARTS . 'sticky' );

		} else {

			if ( is_home() && get_theme_mod( 'salinger_full_content_homepage_and_archive', '' ) == '' ) { // Excerpts.

				get_template_part( SALINGER_TEMPLATE_PARTS . 'content-archive-excerpts' );

			} else { // Full content.

				$featured_image_in_post = get_theme_mod( 'salinger_featured_image_in_post' );

				if ( 'before_post_title' === $featured_image_in_post && has_post_thumbnail() ) {
					the_post_thumbnail( 'full' );
				}
				?>

				<header class="entry-header">
					<?php
					the_title( '<h2 class="entry-title full-content-homepage"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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

					wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'salinger' ), 'after' => '</div>' ) );
					?>

				</div><!-- .entry-content -->

				<footer class="entry-meta">

					<div class="entry-taxonomies-single">

					<span class="entry-meta-categories">
						<span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?>
					</span>&nbsp;&nbsp;&nbsp;

					<?php
					$post_tags = get_the_term_list( $post->ID, 'post_tag' );

					if ( $post_tags ) {
						?>
						<span class="entry-meta-tags">
							<span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ', '' ); ?>
						</span>
						<?php
					}
					?>

					<div style="float:right;">
						<?php edit_post_link( __( 'Edit', 'salinger' ), '<span class="edit-link">', '</span>' ); ?>
					</div>

				</div><!-- .entry-taxonomies-single -->

			</footer><!-- .entry-meta -->
			<?php
			}
		} // if is_sticky && is_home.

		?>

	</article><!-- #post -->
