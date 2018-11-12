<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shuban
 */

get_header();

get_sidebar( 'left' ); ?>
<!-- left side -->

<!-- Layout check -->
<?php
if ( is_active_sidebar( 'sidebar' ) && is_active_sidebar( 'sidebar-left' ) ) { ?>
    <div class="st-primary-wrapper col-md-6">
<?php
}
elseif (  is_active_sidebar( 'sidebar' ) && !is_active_sidebar( 'sidebar-left' ) ) {   ?>
    <div class="st-primary-wrapper col-md-8">
<?php
} elseif (  !is_active_sidebar( 'sidebar' ) && is_active_sidebar( 'sidebar-left' ) ) {   ?>
    <div class="st-primary-wrapper col-md-8">
<?php
}  else {  ?>
    <div class="st-primary-wrapper col-md-12">
<?php
}  ?>
<!-- Layout check -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h2 class="page-title">', '</h2>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
 </div>
	<!-- /.st-primary-wrapper col-md-8 -->

<?php
get_sidebar();
get_footer();
