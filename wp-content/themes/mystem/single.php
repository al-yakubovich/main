<?php
	/**
		* The Template for displaying all single posts.
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part( 'content/content', 'single' ); ?>
		
		<?php if ( ! empty( get_theme_mod( 'mystem_post_navigation', '1' ) ) ) : ?>
		<?php mystem_post_nav(); ?>
		<?php endif; ?>
		
		<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
		?>
		
		<?php endwhile; // end of the loop. ?>
		
	</main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
