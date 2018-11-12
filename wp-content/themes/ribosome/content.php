<?php
/**
 * The default template for displaying content
 *
 * @package Ribosome
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if ( is_sticky() && is_home() ) {
			get_template_part( RIBOSOME_TEMPLATE_PARTS . 'sticky' );
		} else {
			if ( is_single() ) {
				do_action( 'ribosome_above_single_post_title', $post->ID );
			}
			if ( is_single() || ( is_home() && get_theme_mod( 'ribosome_contenido_completo_entradas_pp', '' ) == 1 ) ) :
				?>
				<header class="entry-header">
					<div class="entry-title-subtitle">
						<?php if ( is_single() ) { ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php } else { ?>
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php } ?>

						<!-- Author, date and comments -->
						<div class='sub-title'>
							<div class="autor-fecha">
								<span class="autor-in-full-posts"><i class="fa fa-user"></i> <?php ribosome_entry_author(); ?></span>
								<span class="fecha-in-full-posts">
									&nbsp;&nbsp;<i class="fa fa-calendar-o"></i> <?php ribosome_entry_date(); ?>
								</span>
								<span class="comments-in-full-posts">
									&nbsp;&nbsp;<i class="fa fa-comment-o"></i> <?php comments_popup_link(); ?>
								</span>
							</div><!-- autor-fecha -->
						</div><!-- .sub-title -->
					</div><!-- .entry-title-subtitle -->
				</header><!-- .entry-header -->
		<?php endif; // is_single. ?>

		<!-- Subtitle widget area -->
		<?php if ( is_single() ) { ?>
			<div class="sub-title-widget-area">
				<?php if ( ! dynamic_sidebar( 'wt-sub-title' ) ) {} ?>
			</div><!-- .sub-title-widget-area -->
		<?php } ?>

		<?php
		if ( ( is_search() || is_category() || is_tag() || is_author() || is_archive() )
		|| ( is_home() && get_theme_mod( 'ribosome_contenido_completo_entradas_pp', '' ) == '' ) ) : // Only display Excerpts.
			?>
			<div class="excerpt-wrapper"><!-- Excerpt -->

				<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" >
							<div class="wrapper-excerpt-thumbnail">
								<?php
								if ( get_theme_mod( 'ribosome_thumbnail_rounded', '' ) == '' ) {
									the_post_thumbnail( 'ribosome-excerpt-thumbnail' );
								} else {
									the_post_thumbnail( 'ribosome-excerpt-thumbnail-rounded' );
								}
								?>
							</div>
						</a>
				<?php endif; ?>

				<header class="entry-header">
					<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
					<?php
					if ( get_theme_mod( 'ribosome_show_meta_in_excerpts', '' ) == 1 ) {
						?>
						<div class='sub-title'>
							<div class="autor-fecha">
								<span class="autor-in-excerpts"><i class="fa fa-user"></i> <?php ribosome_entry_author(); ?></span>
								<span class="fecha-in-excerpts">
									&nbsp;&nbsp;<i class="fa fa-calendar-o"></i> <?php ribosome_entry_date(); ?>
								</span>
								<span class="comments-in-excerpts">
									&nbsp;&nbsp;<i class="fa fa-comment-o"></i> <?php comments_popup_link(); ?>
								</span>
							</div><!-- autor-fecha -->
						</div><!-- .sub-title -->
					<?php } ?>
				</header>

				<?php the_excerpt(); ?>

			</div><!-- .excerpt-wrapper -->

		<?php else : ?>

			<div class="entry-content">
				<?php
				if ( get_theme_mod( 'ribosome_featured_image_below_title', '' ) == 1 && has_post_thumbnail() ) {
					?>
					<div style="text-align:center; margin-bottom:14px; margin-bottom:1rem;">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
					<?php
				}

				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ribosome' ) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'ribosome' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

		<?php endif; ?>

		<footer class="entry-meta">
			<!-- Post end widget area -->
			<?php if ( is_single() ) : ?>
				<div class="post-end-widget-area">
					<?php if ( ! dynamic_sidebar( 'wt-post-end' ) ) {} ?>
				</div>
			<?php endif; ?>

			<?php
			if ( is_single() || ( is_home() && get_theme_mod( 'ribosome_contenido_completo_entradas_pp', '' ) == 1 ) ) {
				?>
				<div class="entry-meta-term-single">
				<?php
			} else {
				?>
				<div class="entry-meta-term-excerpt">
				<?php
			}
			?>

				<span class="entry-meta-categories"><span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?>&nbsp;&nbsp;&nbsp;</span>

				<?php
				$post_tags = get_the_term_list( $post->ID, 'post_tag' );
				if ( $post_tags ) {
					?>
					<span class="entry-meta-tags"><span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ', '' ); ?></span>
					<?php
				}
				?>

				<div style="float:right;"><?php edit_post_link( __( 'Edit', 'ribosome' ), '<span class="edit-link">', '</span>' ); ?></div>
			</div><!-- .entry-meta-term -->

			<?php
			// Related posts.
			if ( is_single() && get_theme_mod( 'ribosome_related_posts', '' ) == 1 ) {
				get_template_part( RIBOSOME_TEMPLATE_PARTS . 'related-posts' );
			}
			// Author info.
			if ( is_singular() && get_the_author_meta( 'description' ) ) {
				get_template_part( RIBOSOME_TEMPLATE_PARTS . 'author-info-box' );
			}
		} // (else) if ( is_sticky() && is_home() ).
		?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
