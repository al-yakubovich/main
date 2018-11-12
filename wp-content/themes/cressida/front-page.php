<?php
/**
 * The front page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cressida
 */
get_header(); ?>

	<div class="container container--background">

		<?php if ( ! is_paged() ) : ?>
			<div class="frontpage-hero">
				<?php if ( is_active_sidebar( 'sidebar-frontpage-top' ) ) : ?>
					<div class="row">
						<div class="col-lg-8 col-xs-12 sidebar-on">
							<?php endif; // is_active_sidebar( 'sidebar-frontpage-top' )

								/**
								 * Banner / Slider section
								 */
								get_template_part( 'parts/frontpage', 'hero' );

							if ( is_active_sidebar( 'sidebar-frontpage-top' ) ) : ?>
						</div><!-- col-lg-8 col-xs-12 sidebar-on -->

						<div class="widget-area widget-area-sidebar widget-area-frontpage-hero col-lg-4 col-xs-12" role="complementary">
							<?php dynamic_sidebar( 'sidebar-frontpage-top' ); ?>
						</div><!-- widget-area widget-area-sidebar col-lg-4 col-xs-12 -->
					</div><!-- row -->
				<?php endif; // is_active_sidebar( 'sidebar-frontpage-top' ) ?>
			</div><!-- frontpage-hero-->
		<?php endif; // ! is_paged() ?>

		<div class="row frontpage-content">
			<div class="col-lg-8 col-xs-12 sidebar-on">
				<?php
					if ( ! is_paged() ) :
						/**
						 * Featured posts
						 */
						get_template_part( 'parts/frontpage-featured', 'posts' );
					endif; // ! is_paged()
					/**
					 * Frontpage set to Static page
					 */
					if ( get_option( 'show_on_front' ) == 'page' ) :
						/**
						 * Get page content and frontpage sidebar
						 */
						?>

						<div class="entry-header no-featured-image">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div><!-- entry-header -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div><?php
					/**
					 * Frontpage set to Latest posts
					 */
					elseif ( get_option( 'show_on_front' ) == 'posts' ) :
						/**
						 * Blog feed
						 */
						get_template_part( 'parts/feed' );
					endif; //get_option( 'show_on_front' )
				?>
			</div><!-- col-lg-8 col-xs-12 sidebar-on -->

			<?php get_sidebar(); ?>
		</div><!-- row -->
	</div><!-- container --><?php

	if ( ! is_paged() ) :
		/**
		 * Highlight post 1
		 */
		get_template_part( 'parts/frontpage-highlight-1' );
		/**
		 * Promo Category 1
		 */
		get_template_part( 'parts/frontpage-promo-1' );
		/**
		 * Posts Strip
		 */
		get_template_part( 'parts/frontpage-posts-strip' );
		/**
		 * Featured Links
		 */
		get_template_part( 'parts/frontpage-featured-links' );
	endif; // ! is_paged()

get_footer();
