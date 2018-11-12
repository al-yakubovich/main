<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AcmeThemes
 * @subpackage AcmeBlog
 */
global $acmeblog_customizer_all_values;
$acmeblog_get_image_sizes_options = $acmeblog_customizer_all_values['acmeblog-blog-archive-image-size'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php acmeblog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php
	if (
		has_post_thumbnail() &&
		( $acmeblog_customizer_all_values['acmeblog-blog-archive-layout'] == 'left-image' ||
		  $acmeblog_customizer_all_values['acmeblog-blog-archive-layout'] == 'large-image' )
	) {
		?>
		<!--post thumbnal options-->
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
                <?php
                the_post_thumbnail( $acmeblog_get_image_sizes_options);
                ?>
			</a>
		</div><!-- .post-thumb-->
		<?php
	}
	?>
	<div class="entry-summary entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<footer class="entry-footer">
		<?php acmeblog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->