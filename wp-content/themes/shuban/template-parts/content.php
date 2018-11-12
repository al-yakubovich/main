<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shuban
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="st-post-thumb">
			<?php the_post_thumbnail(); ?>
		</div>
		<!-- /.st-post-thumb -->
	<?php } ?>

	<footer class="entry-footer">
		<?php shuban_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php shuban_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php
		if ( is_single() ) :
	?>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shuban' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shuban' ),
					'after'  => '</div>',
				) );
			?>
		</div>
	<?php
		else :
	?>
		<div class="entry excerpt entry-summary">
			<?php if ( get_theme_mod( 'shuban_full_post_content' ) ) : ?>
				<?php the_content(); ?>
           	   <!-- full content -->
           	<?php else : ?>
	           	 <?php the_excerpt(); ?>
	           	<!-- Only excerpt -->
				<div class="text-center">
					<a href="<?php the_permalink(); ?>" class="read-post">Read Post</a>
				</div>
			 <!-- /.text-center -->
            <?php endif; ?>
		</div><!--/.entry-->
	<?php endif; ?>

</article><!-- #post-## -->
