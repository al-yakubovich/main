<?php

/*-----------------------------------------------------------------------------------*/
/* PARENT STYLE */
/*-----------------------------------------------------------------------------------*/  

if (!function_exists('polarlite_enqueue_parent_theme_style')) {
	
	function polarlite_enqueue_parent_theme_style() {
	
		wp_enqueue_style( 'polarlite-parent-style', get_stylesheet_directory_uri() . '/style.css' );
	
	}
	 
	add_action( 'wp_enqueue_scripts', 'polarlite_enqueue_parent_theme_style' );
	
}

/*-----------------------------------------------------------------------------------*/
/* CUSTOMIZE OVERRIDE */
/*-----------------------------------------------------------------------------------*/  

if (!function_exists('polarlite_customize_register')) {

	function polarlite_customize_register($wp_customize) {
		
		$wp_customize->remove_control( 'suevafree_body_layout' );

	}
	
	add_action('customize_register','polarlite_customize_register', 11);
	
}

/*-----------------------------------------------------------------------------------*/
/* BODY CLASS */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('polarlite_body_class')) {
	
	function polarlite_body_class($classes) {
	
		$unset_key = array_search('minimal_layout', $classes);
		if ( false !== $unset_key ) {
			unset( $classes[$unset_key] );
		}
	
		return $classes;
		
	}
	
	add_filter('body_class', 'polarlite_body_class', 11);
	
}

?>