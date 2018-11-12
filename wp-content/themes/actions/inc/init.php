<?php
/**
 * actions engine room
 *
 * @package actions
 */

/**
 * Setup.
 * Load our theme's setup functions.
 */
require_once( trailingslashit(get_template_directory()) . 'inc/functions/setup.php' );

/**
 * Customizer.
 * Let's fire up the customizer.
 */
require_once( trailingslashit(get_template_directory()) . 'inc/customizer/customizer.php' );

/**
 * Structure.
 * Template functions used throughout the theme.
 */
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/markup-functions.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/hooks.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/post.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/page.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/header.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/footer.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/comments.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/template-tags.php' );
require_once( trailingslashit(get_template_directory() ) . 'inc/structure/search.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
require_once( trailingslashit(get_template_directory() ) . 'inc/functions/extras.php' );