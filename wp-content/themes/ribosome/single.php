<?php
/**
 * The Template for displaying all single posts
 *
 * @package Ribosome
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				
                <?php if(get_theme_mod('ribosome_show_nav_single', 1) == 1) { ?>
                
				<nav class="nav-single">
					<div class="wrapper-navigation-below">
						<?php
						$args = array(
							'prev_text' => '<span class="meta-nav"><i class="fa fa-angle-double-left"></i></span> %title',
							'next_text' => '%title <span class="meta-nav"><i class="fa fa-angle-double-right"></i></span>',
							);
						the_post_navigation($args);
						?>
					</div><!-- .wrapper-navigation-below -->
				</nav><!-- .nav-single -->
                
                <?php } // ribosome_show_nav_single() ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>