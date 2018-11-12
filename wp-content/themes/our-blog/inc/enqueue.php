<?php
function our_blog_scripts() {
	// Google font
	wp_enqueue_style( 'google-font-1', 'https://fonts.googleapis.com/css?family=Pacifico', array(), '' );

	wp_enqueue_style( 'google-font-2', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i', array(), '' );

	wp_enqueue_style( 'google-font-3', 'https://fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i', array(), '' );

	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '4.1.1' );

	// fontawesome Css
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.7.0' );


	// Jquery Smartmenus Bootstrap 4
	wp_enqueue_style( 'jquery-smartmenus-bootstrap-4', get_template_directory_uri() .'/assets/css/jquery.smartmenus.bootstrap-4.css', array(), '4.0.0' );

	// Slick CSS
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick.css', array(), '1.9.0' );

	// Slick Theme CSS
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/assets/css/slick-theme.css', array(), '1.9.0' );

	// sidenav
	wp_enqueue_style( 'our-blog-sidenav', get_template_directory_uri() .'/assets/css/sidenav.css', array(), '4.7.0' );

	wp_enqueue_style( 'our-blog-style', get_stylesheet_uri() );

	// Poper JS
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '3.3.1', true ); 

	// bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.1', true );

	// jquery smartmenus
	wp_enqueue_script( 'jquery-smartmenus', get_template_directory_uri() . '/assets/js/jquery.smartmenus.min.js', array('jquery'), '3.3.1', true );

	// Jquery smartmenus bootstrap 4
	wp_enqueue_script( 'jquery-smartmenus-bootstrap-4', get_template_directory_uri() . '/assets/js/jquery.smartmenus.bootstrap-4.min.js', array('jquery'), '3.3.1', true );

	// Slick Js
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '3.3.1', true );

	// sidenav js
	wp_enqueue_script( 'sidenav', get_template_directory_uri() . '/assets/js/sidenav.min.js', array('jquery'), '3.3.1', true );


	// Main JS
	wp_enqueue_script( 'our-blog-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '3.3.1', true );
	wp_enqueue_script( 'our-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'our-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'our_blog_scripts' );?>

