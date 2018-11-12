<?php
/**
 * The default template for displaying sticky posts
 *
 * @package Ribosome
 */

?>

<span class="sticky-info"><?php esc_attr_e( 'Featured post', 'ribosome' ); ?></span>

<div class="excerpt-wrapper sticky-excerpt"><!-- Excerpt -->

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
	</header>

	<?php the_excerpt(); ?>

</div><!-- .excerpt-wrapper -->

<footer class="entry-meta">
	<div class="entry-meta-term-excerpt">

		<span class="term-icon"><i class="fa fa-folder-open"></i></span> <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?>

		<?php
		$post_tags = get_the_term_list( $post->ID, 'post_tag' );
		if ( $post_tags ) {
			?>
			&nbsp;&nbsp;&nbsp;<span class="term-icon"><i class="fa fa-tags"></i></span> <?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ', '' );
		}
			?>

		<div style="float:right;"><?php edit_post_link( __( 'Edit', 'ribosome' ), '<span class="edit-link">', '</span>' ); ?></div>

	</div><!-- .entry-meta-term -->
</footer>
