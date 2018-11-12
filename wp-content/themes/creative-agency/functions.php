<?php

function creative_agency_enqueue_style() {
	// Parent theme CSS.
    wp_enqueue_style( 'di-responsive-style-default', get_template_directory_uri() . '/style.css' );

    // Creative Agency css files.
    wp_enqueue_style( 'creative-agency-style',  get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap', 'font-awesome', 'di-responsive-style-default', 'di-responsive-style-core' ), wp_get_theme()->get('Version'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'creative_agency_enqueue_style' );

function creative_agency_plugins() {

	$plugins = array(
		array(
			'name'      => __( 'Yoast SEO', 'creative-agency'),
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'creative_agency_plugins' );



