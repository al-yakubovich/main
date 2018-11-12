<?php
/**
 * The main template file.
 *
 * Used to display the homepage when home.php doesn't exist.
 */
?>
<?php get_header(); ?>
	<div id="page" class="home-page">
		<div id="content" class="article">
			<?php if ( have_posts() ) :
				$feather_magazine_full_posts = get_theme_mod('feather_magazine_full_posts');
				while ( have_posts() ) : the_post();
					feather_magazine_archive_post();
				endwhile;
				feather_magazine_post_navigation();
			endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
		</div>
		<?php get_footer(); ?>
