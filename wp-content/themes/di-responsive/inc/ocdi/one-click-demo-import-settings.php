<?php

function di_responsive_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => __( 'Di Responsive Demo Site', 'di-responsive' ),
			'categories'                   => array( __( 'Di Responsive Demo Main', 'di-responsive' ) ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/ocdi/files/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/ocdi/files/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/ocdi/files/customizer.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory() ) . 'screenshot.png',
			'import_notice'                => __( 'Make sure Elementor Page Builder, Contact From 7, WooCommerce (optional) plugins are activated.', 'di-responsive' ),
			'preview_url'                  => 'http://demo.dithemes.com/di-responsive/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'di_responsive_ocdi_import_files' );

function di_responsive_after_import_setup() {
	// Assign menus to their locations.
	$primary_menu 	= get_term_by( 'slug', 'topmain', 'nav_menu' );
	$sidebar_menu 	= get_term_by( 'slug', 'sidemenu', 'nav_menu' );
	$topbar_menu 	= get_term_by( 'slug', 'topbar', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' 	=> $primary_menu->term_id,
			'sidebar' 	=> $sidebar_menu->term_id,
			'topbar' 	=> $topbar_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );


	// Set WooCommerce pages.
	if( class_exists( 'WooCommerce' ) ) {
		// Set shop page.
		$pagearr = get_page_by_path( 'shop' );
		if( $pagearr ) {
			$pageid = $pagearr->ID;
			update_option( 'woocommerce_shop_page_id', absint( $pageid ) );
		}

		// Set cart page.
		$pagearr = get_page_by_path( 'cart' );
		if( $pagearr ) {
			$pageid = $pagearr->ID;
			update_option( 'woocommerce_cart_page_id', absint( $pageid ) );
		}

		// Set checkout page.
		$pagearr = get_page_by_path( 'checkout' );
		if( $pagearr ) {
			$pageid = $pagearr->ID;
			update_option( 'woocommerce_checkout_page_id', absint( $pageid ) );
		}

		// Set my-account page.
		$pagearr = get_page_by_path( 'my-account' );
		if( $pagearr ) {
			$pageid = $pagearr->ID;
			update_option( 'woocommerce_myaccount_page_id', absint( $pageid ) );
		}
	}

}
add_action( 'pt-ocdi/after_import', 'di_responsive_after_import_setup' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

