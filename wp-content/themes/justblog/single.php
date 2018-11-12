<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package JustBlog
 */

$singlelayout = get_theme_mod( 'justblog_single_layout', 'single1' ); 
get_header(); ?>

<?php // single no sidebars
if ( $singlelayout == 'single3')  : ?>

	<div id="primary" class="content-area col-lg-12">
		<main id="main" class="site-main <?php echo esc_attr( $singlelayout ); ?>"><?php get_template_part( 'template-parts/post/content', 'single' ); ?></main>
	</div>
	
<?php // single left sidebar
elseif ( $singlelayout == 'single2')  : ?>

	<div id="primary" class="content-area col-lg-8 order-lg-2">
		<main id="main" class="site-main <?php echo esc_attr( $singlelayout ); ?>"><?php get_template_part( 'template-parts/post/content', 'single' ); ?></main>
	</div>
	<div class="col-lg-4 order-3 order-lg-1">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>       
	</div>	
	
<?php // single right sidebar
else : ?>

	<div id="primary" class="content-area col-lg-8">
		<main id="main" class="site-main <?php echo esc_attr( $singlelayout ); ?>">
		<?php get_template_part( 'template-parts/post/content', 'single' ); ?></main>
	</div>
	<div class="col-lg-4">
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
	</div>
	
<?php endif; ?>


<?php
get_footer();
