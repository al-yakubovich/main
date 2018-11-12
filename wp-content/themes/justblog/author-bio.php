<?php
/**
 * The template for displaying Author bios
 * @package JustBlog
 */
?>

<div id="author-info">
	<div id="author-avatar">
		<?php	$author_bio_avatar_size = apply_filters( 'justblog_author_bio_avatar_size', 100 );
			echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div>

	<div id="author-description">
		<h3 id="author-title"><?php echo get_the_author(); ?></h3>

		<p id="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a id="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( 
				/* translators: %s: author name */
				esc_html__( 'Read articles by %s', 'justblog' ), get_the_author() ); ?>
			</a>
		</p>

	</div>
</div>
