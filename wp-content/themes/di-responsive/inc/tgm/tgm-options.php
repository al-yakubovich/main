<?php
/**
 * Include the TGM_Plugin_Activation class. (included in init.php)
 */

function di_responsive_register_required_plugins() {
	
	$plugins = array(
		
		array(
			'name'      => __( 'Elementor Page Builder', 'di-responsive'),
			'slug'      => 'elementor',
			'required'  => false,
		),
		
		array(
			'name'      => __( 'WooCommerce (For E-Commerce)', 'di-responsive'),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		
		array(
			'name'      => __( 'Contact Form 7 (For Forms)', 'di-responsive'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

		array(
			'name'      => __( 'One Click Demo Import', 'di-responsive'),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),

		array(
			'name'      => __( 'Regenerate Thumbnails', 'di-responsive'),
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),
		
	);
	
	
	$config = array(
		'id'           => 'di-responsive',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'di-responsive-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'di_responsive_register_required_plugins' );

