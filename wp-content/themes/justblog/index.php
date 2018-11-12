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
 * @package JustBlog
 */
 
 $bloglayout = get_theme_mod( 'justblog_blog_layout', 'blog1' );
 
get_header(); ?>


<?php // grid no sidebars
if ( $bloglayout == 'blog8')  : ?>

	<div id="primary" class="content-area col-lg-8 order-lg-2">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-banner' ); ?>
		<?php get_template_part( 'template-parts/layouts/blog', 'grid' ); ?></main>
	</div>
	<div class="col-lg-4 order-3 order-lg-1">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
	</div>

<?php // grid with right sidebar
elseif ( $bloglayout == 'blog7')  : ?>

	<div id="primary" class="content-area col-lg-8">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-banner' ); ?>
		<?php get_template_part( 'template-parts/layouts/blog', 'grid' ); ?></main>
	</div>
	<div class="col-lg-4">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
	</div>

<?php // grid blog no sidebars
elseif ( $bloglayout == 'blog6')  : ?>

	<div id="primary" class="content-area col-lg-12">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'layouts/blog', 'grid' ); ?></main>
	</div>

<?php // standard blog left sidebar
elseif ( $bloglayout == 'blog2')  : ?>

	<div id="primary" class="content-area col-lg-8 order-lg-2">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-banner' ); ?>
		<?php get_template_part( 'template-parts/layouts/blog', 'default' ); ?></main>
	</div>
	<div class="col-lg-4 order-3 order-lg-1">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
	</div>		
	
<?php // standard blog right sidebar
else : ?>

	<div id="primary" class="content-area col-lg-8">
		<main id="main" class="site-main <?php echo esc_attr( $bloglayout ); ?>">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'post-banner' ); ?>
		<?php get_template_part( 'template-parts/layouts/blog', 'default' ); ?></main>
	</div>
	<div class="col-lg-4">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
	</div>
	
<?php endif; ?>

	
<?php
get_footer();
