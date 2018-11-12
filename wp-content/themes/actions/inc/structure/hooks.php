<?php
/**
 * actions hooks
 *
 * @package actions
 */

/**
 * General
 * @see  actions_setup()
 * @see  actions_widgets_init()
 * @see  actions_scripts()
 * @see  actions_header_widget_region()
 * @see  actions_get_sidebar()
 */
add_action( 'after_setup_theme',	 'actions_setup' );
add_action( 'widgets_init',			 'actions_widgets_init' );
add_action( 'wp_enqueue_scripts',	 'actions_scripts',				 10 );
add_action( 'actions_sidebar',		 'actions_get_sidebar',			 10 );

/**
 * Header
 * @see  actions_skip_links()
 * @see  actions_secondary_navigation()
 * @see  actions_site_branding()
 * @see  actions_primary_navigation()
 */
add_action( 'actions_header_elements',	'actions_skip_links', 		  0 );
add_action( 'actions_header_elements',  'actions_header_widgets',	  5 );
add_action( 'actions_header_elements',  'actions_top_header',		  10 );
add_action( 'actions_header_elements',  'actions_site_branding',	  20 );
add_action( 'actions_header_elements',  'actions_primary_navigation', 40 );
add_action( 'actions_header_elements',  'actions_bottom_header',	  50 );

add_action( 'actions_header_extras',    'actions_header_widget',	  20 );

add_action( 'actions_content_body_before',    'actions_body_top',		      10 );
add_action( 'actions_content_body_after',     'actions_body_bottom',		  10 );

/**
 * Content
 * @see  actions_footer_widgets()
 * @see  actions_credit()
 */
add_action( 'actions_content_wrapper_start',  'actions_top_wrapper',          	10 );
add_action( 'actions_before_content_wrapper', 'actions_top_wrapper',          	10 );
add_action( 'actions_after_content_wrapper',  'actions_bottom_wrapper',       	10 );
add_action( 'actions_content_wrapper_end',    'actions_bottom_wrapper',       	10 );

/**
 * Sidebar
 * @see  actions_footer_widgets()
 * @see  actions_credit()
 */
add_action( 'actions_before_sidebar',	      'actions_top_sidebar',          	10 );
add_action( 'actions_after_sidebar',	      'actions_bottom_sidebar',       	10 );

/**
 * Footer Wrapper
 * @see  actions_footer_top()
 * @see  actions_footer_bottom()
 */
add_action( 'actions_footer_open',	          'actions_footer_top',           	10 );
add_action( 'actions_footer_close',	          'actions_footer_bottom',        	10 );

/**
 * Footer
 * @see  actions_footer_widgets()
 * @see  actions_credit()
 */
add_action( 'actions_footer_elements_before', 'actions_footer_before',	      	10 );
add_action( 'actions_footer_elements',        'actions_footer_credit',		  	20 );
add_action( 'actions_footer_elements_after',  'actions_footer_after',	      	10 );
add_action( 'actions_footer_elements_after',  'actions_footer_after',	      	10 );

/**
 * Posts - index/home
 * @see  actions_post_header()
 * @see  actions_post_meta()
 * @see  actions_post_content()
 * @see  actions_paging_nav()
 * @see  actions_single_post_header()
 * @see  actions_post_nav()
 * @see  actions_display_comments()
 */ 


add_action( 'actions_index_elements',	  'actions_post_content',		  	10 );
add_action( 'actions_index_elements',	  'actions_paging_nav',		      	20 );
add_action( 'actions_index_content_none', 'actions_content_none',		  	10 );

add_action( 'post_while_before', 'actions_archive_title', 					20 );

add_action( 'post_header', 		 'actions_post_header', 					20 );
add_action( 'post_while_before', 'actions_search_header', 					20 );
add_action( 'entry_top', 		 'actions_post_thumbnail',					10 );
add_action( 'entry_top', 		 'actions_post_meta',						20 );


/**
 * Single Post
 */
add_action( 'actions_single_post_elements',	  'actions_post_content',		10 );
add_action( 'actions_single_post_elements',	  'actions_display_comments',	20 );
add_action( 'actions_single_post_elements',	  'actions_post_nav',			30 );

add_action( 'entry_bottom', 	'actions_page_links', 	 20 );

/**
 * Pages
 * @see  actions_page_header()
 * @see  actions_page_content()
 * @see  actions_display_comments()
 */
add_action( 'actions_page_elements', 		  'actions_post_thumbnail',	  	5 );
add_action( 'actions_page_elements', 		  'actions_page_header',		10 );
add_action( 'actions_page_elements', 		  'actions_page_content',		20 );
add_action( 'actions_page_elements', 	      'actions_display_comments',	30 );

/**
 * Extras
 * @see  actions_setup_author()
 * @see  actions_body_classes()
 * @see  actions_page_menu_args()
 */
add_filter( 'body_class',			         'actions_body_classes' );
add_filter( 'wp_page_menu_args',	         'actions_page_menu_args' );