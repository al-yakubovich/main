<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Authorize
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
			<?php

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

			?>

				<div class="post-archive shadow-border-grey">
					<?php get_template_part( 'components/post/content', get_post_format() ); ?>
				</div>
			<?php endwhile;

			the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => __( '&laquo;', 'authorize' ),
				'next_text' => __( '&raquo;', 'authorize' ),
			) );

		else :

				get_template_part( 'components/post/content', 'none' );

		endif;
		?>
		</main>
	</div>
<?php
get_sidebar( 'sidebar-inside' );
get_footer();
