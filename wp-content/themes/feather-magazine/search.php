<?php
/**
 * The template for displaying search results pages.
 *
 * @package feather Lite
 */

get_header(); ?>
	<div id="page" class="search-area">
		<div id="content" class="article">
			<?php if ( have_posts() ) :
				$feather_magazine_full_posts = get_theme_mod('feather_magazine_full_posts');
				while ( have_posts() ) : the_post();
					feather_magazine_archive_post();
				endwhile;
				feather_magazine_post_navigation();
			else : ?>
				<div class="single_post clear">
					<article id="content" class="article page">
						<header>
							<h1 class="title"><?php esc_html_e( 'Nothing Found', 'feather-magazine' ); ?></h1>
						</header>
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'feather-magazine' ); ?></p>
						<?php get_search_form(); ?>
					</article>
				</div>
			<?php endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
