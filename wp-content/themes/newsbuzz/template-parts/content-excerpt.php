
<?php
/**
 * Template part for displaying posts.
 *
 * Please browse readme.txt for credits and forking information
 * @package newsbuzz
 */

?>
<div class="article-grid-single">
	<article id="post-<?php the_ID(); ?>"  <?php post_class('post-content'); ?>>

		<div class="row post-feed-wrapper">

<?php if ( has_post_thumbnail() ) : ?>
			<?php
			if ( is_sticky() && is_home() && ! is_paged() ) {
				printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'newsbuzz' ) );
			} ?>
<?php else : ?>
	<?php
			if ( is_sticky() && is_home() && ! is_paged() ) {
				printf( '<span class="no-bg-image sticky-post">%s</span>', __( 'Featured', 'newsbuzz' ) );
			} ?>
	<?php endif; ?>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-xs-12 post-thumbnail-wrap">
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<div class="post-thumbnail" style="background-image: url('<?php echo $thumb['0'];?>')"></div>
				</a>
			</div>
		<?php else : ?>
		<div class="no-image-featured"></div>
	<?php endif; ?>



	<div class="blog-feed-contant">
		<header class="entry-header">	
			<?php $categories = get_the_category();
			if ( ! empty( $categories ) ) {
				echo ' <a class="entry-header-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a> ';
			} ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				&nbsp;<h5 class="entry-date"> <?php newsbuzz_posted_on(); ?></h5>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<span class="screen-reader-text"><?php the_title();?></span>

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>
<?php endif; // is_single() ?>
</header><!-- .entry-header -->

<div class="entry-summary">

	<?php the_excerpt(); ?>
</div><!-- .entry-summary -->		   	
</div>
</div>


</article><!-- #post-## -->
</div>