<?php

function actions_disable_header() {
	// Get our post
	global $post;
	if ( isset( $post ) ? get_post_meta( $post->ID, '_actions_site_header', true ) : '' ) {
		remove_action( 'actions_header_elements', 'actions_site_branding', 20 );
	}
}
add_action( 'template_redirect', 'actions_disable_header' );

function actions_disable_menu() {
	// Get our post
	global $post;
	if ( isset( $post ) ? get_post_meta( $post->ID, '_actions_site_menu', true ) : '' ) {
		remove_action( 'actions_header_elements', 'actions_primary_navigation', 40 );		
	}
}
add_action( 'template_redirect', 'actions_disable_menu' );

function actions_disable_title() {
	// Get our post
	global $post;
	if ( isset( $post ) ? get_post_meta( $post->ID, '_actions_page_title', true ) : '' ) {
		remove_action( 'actions_page_elements', 'actions_page_header', 10 );
		remove_action( 'post_header', 'actions_post_header', 	20 );
		remove_action( 'actionshomepage_entry_top', 'actionshomepage_entry_header', 10 );
	}
}
add_action( 'template_redirect', 'actions_disable_title' );

function actions_disable_footer() {
	// Get our post
	global $post;
	if ( isset( $post ) ? get_post_meta( $post->ID, '_actions_site_footer', true ) : '' ) {
		remove_action( 'actions_footer_elements', 'actions_footer_credit', 20 );
	}
}
add_action( 'template_redirect', 'actions_disable_footer' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @since Actions 2.0.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function actions_dev_body_classes( $classes ) {
	// Get our post/page control settings
	$meta = get_post_meta( get_the_ID() );
	
	// Here we check that we have a layout selection and if not return the default
	if ( isset( $meta['_actions_layout_options'][0] ) && $meta['_actions_layout_options'][0] !== '' ) {
	$content_layout = $meta['_actions_layout_options'][0];
	} else {
		$content_layout = 'content-sidebar';
	}
	
	// Here we check if we are using the page builder so that we can add the necessary classes to our page.
	if ( isset( $meta['_actions_builder_options'][0] ) && $meta['_actions_builder_options'][0] !== '' ) {
	$page_builder = $meta['_actions_builder_options'][0];
	} else {
		$page_builder = '';
	}
	// Adds a class of sidebar-right to sites when option to place sidebar on the right is selected (this is the default layout).
	if ( 'content-sidebar' === $content_layout ) {
		$classes[] = 'sidebar-right';
	}
	// Adds a class of sidebar-left to sites when option to place sidebar on the left is selected.
	if ( 'sidebar-content' === $content_layout ) {
		$classes[] = 'sidebar-left';
	}
	// Adds a class of no-sidebar to sites without active sidebar.
	if ( 'content' === $content_layout ) {
		$classes[] = 'no-sidebar';
	}
	
	// Full width content
	if ( isset( $meta['_actions_fullwidth_content'][0] ) && $meta['_actions_fullwidth_content'][0] !== '' ) {
		$classes[] = 'full-width-content';
	}
	
	// Actions Page Builder Classes
	if ( 'builder-standard' === $page_builder ) {
		$classes[] =  'builder-standard-content';
	}
	
	if ( 'builder-blank' === $page_builder ) {
		$classes[] =  'builder-blank-content';		
	}

	return $classes;	
	
}
add_filter( 'body_class', 'actions_dev_body_classes' );

function actions_page_builder() {
	// Get our post
	global $post;
	$page_builder = get_post_meta( get_the_ID(), '_actions_builder_options', true );
	if ( 'builder-blank' === $page_builder ) {
		remove_action( 'actions_content_body_before',	'actions_body_top',				10 );
		remove_action( 'actions_content_body_after',	'actions_body_bottom',			10 );
		remove_action( 'actions_header_elements', 		'actions_site_branding', 		20 );
		remove_action( 'actions_header_elements',		'actions_primary_navigation', 	40 );
		remove_action( 'actions_page_elements',			'actions_page_header', 			10 );
		remove_action( 'actions_page_elements',			'actions_display_comments',		30 );
		remove_action( 'actions_footer_elements',		'actions_footer_credit', 		20 );
	}
	
	if ( 'builder-standard' === $page_builder ) {
		remove_action( 'actions_content_body_before',	'actions_body_top',				10 );
		remove_action( 'actions_content_body_after',	'actions_body_bottom',			10 );
		remove_action( 'actions_page_elements',			'actions_page_header', 			10 );
		remove_action( 'actions_page_elements',			'actions_display_comments',		30 );
	}
}
add_action( 'template_redirect', 'actions_page_builder' );