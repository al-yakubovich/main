<?php

if ( ! function_exists( 'writer_blog_writer_cs_js' ) ) :

function writer_blog_writer_cs_js() {
    wp_enqueue_style('gfonts',writer_blog_fonts_url(), array(), '1.0.0');
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.0.0', 'all' );  
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'skeleton', get_template_directory_uri() . '/css/skeleton.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all' );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/js/jquery-owl.carousel.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'jquery-custom', get_template_directory_uri() . '/js/jquery-custom.js', array( 'jquery' ), '1.0.0', true );
}

endif;

add_action( 'wp_enqueue_scripts', 'writer_blog_writer_cs_js' );

if ( ! function_exists( 'writer_blog_writer_admin_scripts' ) ) :

function writer_blog_writer_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'jquery-admin-script', get_template_directory_uri() . '/js/jquery-admin-script.js', array( 'jquery' ) );
}

endif;

add_action( 'admin_enqueue_scripts', 'writer_blog_writer_admin_scripts' );