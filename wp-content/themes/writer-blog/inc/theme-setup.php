<?php

// Register Navigation Menu
function writer_blog_register_menu() {
  register_nav_menus( array (
    'header_menu' => 'Header Menu',
	'mobile_menu' => 'Mobile Menu'
 ) ); 
}
add_action( 'init', 'writer_blog_register_menu' );

register_nav_menus( array (
    'header_menu' => 'Header Menu',
	'mobile_menu' => 'Mobile Menu'
 ) ); 
/**
 * Adds theme support for featured image
 */
add_theme_support( 'post-thumbnails' );
/*
 * Make theme available for translation.
 */
load_theme_textdomain( 'writer-blog' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
 * Adds theme support for automatically adding document title by wordpress
 */
add_theme_support( 'title-tag' );