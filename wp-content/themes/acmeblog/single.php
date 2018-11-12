<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Acme Themes
 * @subpackage AcmeBlog
 */
get_header();
global $acmeblog_customizer_all_values;
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
        while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();
			/**
			 * acmeblog_related_posts hook
			 * @since AcmeBlog 1.0.0
			 *
			 * @hooked acmeblog_related_posts_belo -  10
			 */
			do_action( 'acmeblog_related_posts' ,get_the_ID() );

			// If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar( 'left' );
get_sidebar();
get_footer();