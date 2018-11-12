<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Salinger
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( SALINGER_TEMPLATE_PARTS . 'content-page' );
				comments_template( '', true );
			endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php

if ( ! class_exists( 'WooCommerce' ) ) {
	get_sidebar();
} else {
	if ( is_cart() || is_checkout() || is_account_page() ) {
		if ( get_theme_mod( 'salinger_remove_woocommerce_sidebar', '' ) == '' ) {
			get_sidebar( 'shop' );
		}
	} else {
		get_sidebar();
	}
}

get_footer();
