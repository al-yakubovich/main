<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package our_blog
 */

get_header();
?>
<section class="middle-content homepage2">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="list-blog">
					<div class="row">
						<?php
						if ( have_posts() ) :

							
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );
							endwhile;
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</div>
					<?php our_blog_portfolio_bs_pagination();?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<?php get_sidebar();?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
