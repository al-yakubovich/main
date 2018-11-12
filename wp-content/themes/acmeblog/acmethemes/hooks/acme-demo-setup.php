<?php
if( !function_exists( 'acmeblog_demo_nav_data') ){
    function acmeblog_demo_nav_data(){
        $demo_navs = array(
            'primary'  => 'Primary Menu'
        );
        return $demo_navs;
    }
}
add_filter('acme_demo_setup_nav_data','acmeblog_demo_nav_data');


if( !function_exists( 'acmeblog_update_image_size') ){
	function acmeblog_update_image_size(){
		/*Thumbnail Size*/
		update_option( 'thumbnail_size_w', 500 );
		update_option( 'thumbnail_size_h', 280 );
		update_option( 'thumbnail_crop', 1 );

		/*Medium Image Size*/
		update_option( 'medium_size_w', 690 );
		update_option( 'medium_size_h', 400 );

		/*Large Image Size*/
		update_option( 'large_size_w', 1080 );
		update_option( 'large_size_h', 530 );
	}
}
add_action( 'acme_demo_setup_before_import', 'acmeblog_update_image_size' );
add_action( 'wp_ajax_acme_demo_setup_before_import', 'acmeblog_update_image_size' );