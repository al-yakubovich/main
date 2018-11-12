<?php
/**
 * Author info box for single post
 *
 * @package Ribosome
 */

?>
<div class="author-info">
	<div class="author-avatar">
		<?php
		/** This filter is documented in author.php */
		$author_bio_avatar_size = apply_filters( 'ribosome_author_bio_avatar_size', 90 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->
	<div class="author-description">
		<h2><?php printf( __( 'About %s', 'ribosome' ), get_the_author() ); ?></h2>
		<p><?php the_author_meta( 'description' ); ?></p>
		<div class="author-link">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'ribosome' ), get_the_author() ); ?>
			</a>
		</div><!-- .author-link	-->
	</div><!-- .author-description -->
</div><!-- .author-info -->
