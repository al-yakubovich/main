<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shuban
 */

get_header(); ?>

<?php  get_sidebar( 'left' ); ?>
<!-- /.st-sidebar-wrapper col-md-3 -->

<!-- Layout check -->

<?php
if ( is_active_sidebar( 'sidebar' ) && is_active_sidebar( 'sidebar-left' ) ) { ?>
    <div class="st-primary-wrapper col-md-6">
<?php
} elseif (  is_active_sidebar( 'sidebar' ) && !is_active_sidebar( 'sidebar-left' ) ) {   ?>
    <div class="st-primary-wrapper col-md-8">
<?php
} elseif (  !is_active_sidebar( 'sidebar' ) && is_active_sidebar( 'sidebar-left' ) ) {   ?>
    <div class="st-primary-wrapper col-md-8">
<?php
} else {  ?>
    <div class="st-primary-wrapper col-md-12">
<?php
} ?>
<!-- Layout check -->

    <div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<!-- /.st-primary-wrapper col-md-8 -->

<?php
get_sidebar();
get_footer();
