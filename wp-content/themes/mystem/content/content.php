<?php
	/**
		* generic content display
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
<?php
// display featured image
if ( has_post_thumbnail() && ! empty( get_theme_mod( 'mystem_featured_image', '1' ) ) ) :?>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'featured-img', array(
		'class' => 'featured-img',
	) );?></a>
	<?php
		endif;
		?>
	<header class="entry-header">
		<h4 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php mystem_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>
	
	<?php // show excerpts on search results and main content if options is selected ?>
	<?php if ( is_search() || get_theme_mod( 'mystem_post_content' ) == 'excerpt' ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
	<?php else : ?>
	<div class="entry-content">			
		<?php
			$more = get_theme_mod( 'mystem_read_more' ) . '<i class="fa fa-arrow-circle-o-right"></i>';
			the_content( $more );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mystem' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php endif;?>
</article>
