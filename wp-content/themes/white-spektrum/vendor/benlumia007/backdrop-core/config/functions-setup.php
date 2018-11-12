<?php
/**
 ************************************************************************************************************************
 * Backdrop Core - functions-setup.php
 ************************************************************************************************************************
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 * namespace define
 ************************************************************************************************************************
 */
namespace Benlumia007\Backdrop\Config;

/**
 ************************************************************************************************************************
 * Table fo Content
 ************************************************************************************************************************
 *  1.0 - Config (Theme Setup)
 *  2.0 - Config (Content Width)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Config (Theme Setup)
 ************************************************************************************************************************
 */
function theme_setup() {
    /**
     ********************************************************************************************************************
     * add_theme_support( 'title-tag' );. This feature should be used in place of wp_title();.
     ********************************************************************************************************************
     */
    add_theme_support( 'title-tag' );

    /**
     ********************************************************************************************************************
     * add_theme_support( 'automatic-feed-links' );. This feature when enabled allows feed links for posts and comments 
     * in the head of the theme. Thi feature should be used in place of the deprected automatic_feed_links();      
     ********************************************************************************************************************
     */
    add_theme_support( 'automatic-feed-links' ); 

    /**
     ********************************************************************************************************************
     * add_theme_support( 'html5', $args );. This feature when enabled allows the use of HTML5 markup for comment list,
     * comment forms, search forms, gallery, and captions.      
     ********************************************************************************************************************
     */
    add_theme_support( 'html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
    ) ); 

    /**
     ********************************************************************************************************************
     * register_nav_menus( array() );. This feature when enabled, allows you to create multiple menus inside of primary and
     * secondary navigation. The social navigtion is used to display most of the social networks.     
     ********************************************************************************************************************
     */
    register_nav_menus( array(
        'primary'    => esc_html__( 'Primary Navigation', 'backdrop' ),
        'secondary'  => esc_html__( 'Secondary Navigation', 'backdrop' ),
        'social'     => esc_html__( 'Social Navigation', 'backdrop' )
    )); 

    /**
     ********************************************************************************************************************
     * add_theme_support( 'post-thumbnails' );. This feature when enabled, allows you to set up featured images also known
     * as post thumbnails. If you need to use conditionl, please use has_post_thumbnail.  
     ********************************************************************************************************************
     */
    add_theme_support( 'post-thumbnails' );

    /**
     ********************************************************************************************************************
     * add_image_size( 'backdrop-small-thumbnails', 300, 300, true );. This should be used whenever sees fit.
     ********************************************************************************************************************
     */
    add_image_size( 'backdrop-small-thumbnails', 300, 300, true );

    /**
     ********************************************************************************************************************
     * add_image_size( 'backdrop-medium-thumbnails', 810, 396, true );. This should be used whenever sees fit.
     ********************************************************************************************************************
     */
    add_image_size( 'backdrop-medium-thumbnails', 810, 396, true );

    /**
     ********************************************************************************************************************
     * add_image_size( 'backdrop-large-thumbnails', 1170, 582, true );. This should be used whenever sees fit.
     ********************************************************************************************************************
     */
    add_image_size( 'backdrop-large-thumbnails', 1170, 582, true );
}
add_action('after_setup_theme', __NAMESPACE__ . "\\theme_setup");

/**
 ************************************************************************************************************************
 *  2.0 - Config (Content Width)
 ************************************************************************************************************************
 */
function content_width() {
	$GLOBALS['content_width'] = apply_filters('content_width', 810);
}
add_action('after_setup_theme', __NAMESPACE__ . "\\content_width", 0);