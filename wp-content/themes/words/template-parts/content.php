<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package words
 */
 global $words_theme_options;
  $blog_content = absint($words_theme_options['words-blog-content']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if( has_post_thumbnail( ) ){
		?>
		<!--post thumbnal options-->
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumb-->
	<?php
	}
	?>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php words_show_post_meta(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<?php if( $blog_content == 1 ){ ?>
		<div class="entry-content">
		  <?php the_content(); ?>
	   </div><!-- .entry-content -->	

	<?php } else {  ?>
		<div class="entry-content">
		  <?php the_excerpt(); ?>
	    </div><!-- .entry-content -->

	<?php } ?>		
</article><!-- #post-## -->
