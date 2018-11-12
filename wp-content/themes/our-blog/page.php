<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif;

						endwhile; // End of the loop.
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
