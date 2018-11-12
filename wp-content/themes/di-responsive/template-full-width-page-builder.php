<?php
/**
 * Template Name: Full Width for Page Builder
 *
 */
?>

<?php get_header( 'full-width-page-builder' ); ?>

	<?php
	while( have_posts() ) : the_post();
		
		get_template_part( 'template-parts/content-page', 'full-width-page-builder' );

		comments_template();
		
	endwhile;
	?>

<?php get_footer( 'full-width-page-builder' ); ?>
