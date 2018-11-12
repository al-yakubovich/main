<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Authorize
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php 
						/* translators: Shows search results for (search input) */
						printf( esc_html__( 'Search Results for: %s', 'authorize' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h1>
			</header>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'components/post/content', 'search' );

			endwhile;

			get_template_part( 'components/navigation/navigation', 'post' );

		else :

			get_template_part( 'components/post/content', 'none' );

		endif; ?>

		</main>
	</section>
<?php
get_sidebar( 'sidebar-inside' );
get_footer();