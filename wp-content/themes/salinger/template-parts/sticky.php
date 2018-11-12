<?php
/**
 * The default template for displaying sticky posts
 *
 * @package Salinger
 */

?>

<span class="sticky-excerpt-label">
	<?php echo esc_html( get_theme_mod( 'salinger_sticky_post_label', __( 'Featured', 'salinger' ) ) ); ?>
</span>

<div class="excerpt-wrapper sticky-excerpt">
	<div class="excerpt-main-content clear">
		<?php
		if ( has_post_thumbnail() ) {
			?>
			<div class="wrapper-excerpt-thumbnail sticky-excerpt-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" >

					<?php
					if ( get_theme_mod( 'salinger_thumbnail_rounded', '' ) == '' ) {
						the_post_thumbnail( 'salinger-thumbnail-4x3' );
					} else {
						the_post_thumbnail( 'salinger-thumbnail-1x1' );
					}
					?>

				</a>
			</div>
			<?php
		}
		?>

		<div class="wrapper-excerpt-content">

			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>

			<?php the_excerpt(); ?>

		</div><!-- .wrapper-excerpt-content -->
	</div><!-- excerpt-main-content -->

	<footer class="entry-meta">
		<div class="entry-taxonomies-excerpt">

			<span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?>

			<?php
			$post_tags = get_the_term_list( $post->ID, 'post_tag' );
			if ( $post_tags ) {
				?>
			&nbsp;&nbsp;&nbsp;<span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ', '' );
			}
			?>

			<div style="float:right;"><?php edit_post_link( __( 'Edit', 'salinger' ), '<span class="edit-link">', '</span>' ); ?></div>

		</div><!-- .entry-meta-term -->

	</footer>
</div><!-- .excerpt-wrapper -->
