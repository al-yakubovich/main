<?php
/**
 * PureMag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PureMag
 */

define( 'PUREMAG_PROURL', 'https://themesdna.com/puremag-pro-wordpress-theme/' );
define( 'PUREMAG_CONTACTURL', 'https://themesdna.com/contact/' );
define( 'PUREMAG_THEMEOPTIONSDIR', get_template_directory() . '/inc/admin' );

require_once( PUREMAG_THEMEOPTIONSDIR . '/customizer.php' );

function puremag_get_option($option) {
    $puremag_options = get_option('puremag_options');
    if ((is_array($puremag_options)) && (array_key_exists($option, $puremag_options))) {
        return $puremag_options[$option];
    }
    else {
        return '';
    }
}

if ( ! function_exists( 'puremag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function puremag_setup() {
    
    global $wp_version;

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on PureMag, use a find and replace
     * to change 'puremag' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'puremag', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'puremag-featured-image',  668, 334, true );
        add_image_size( 'puremag-medium-image',  480, 360, true );
        add_image_size( 'puremag-small-image',  230, 230, true );
        add_image_size( 'puremag-mini-image',  100, 100, true );
    }

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    'primary' => __('Primary Menu', 'puremag')
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    $markup = array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' );
    add_theme_support( 'html5', $markup );

    add_theme_support( 'custom-logo', array(
        'height'      => 90,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Support for Custom Header
    add_theme_support( 'custom-header', apply_filters( 'puremag_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => '333333',
    'width'                  => 1060,
    'height'                 => 200,
    'flex-height'            => true,
        'wp-head-callback'       => 'puremag_header_style',
        'uploads'                => true,
    ) ) );

    // Set up the WordPress core custom background feature.
    $background_args = array(
            'default-color'          => 'e4e0db',
            'default-image'          => get_template_directory_uri() .'/assets/images/background.png',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'     => 'auto',
            'default-attachment'     => 'fixed',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => 'admin_head_callback_func',
            'admin-preview-callback' => 'admin_preview_callback_func',
    );
    add_theme_support( 'custom-background', apply_filters( 'puremag_custom_background_args', $background_args) );
    
    // Support for Custom Editor Style
    add_editor_style( 'css/editor-style.css' );

    add_theme_support( 'woocommerce' );

}
endif;
add_action( 'after_setup_theme', 'puremag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function puremag_content_width() {
    $content_width = 668;

    if ( is_page_template( 'template-full-width-page.php' ) ) {
        $content_width = 1028;
    }
    if ( is_404() ) {
        $content_width = 1028;
    }

    $GLOBALS['content_width'] = apply_filters( 'puremag_content_width', $content_width );
}
add_action( 'template_redirect', 'puremag_content_width', 0 );

require_once get_template_directory() . '/inc/functions/enqueue-scripts.php';
require_once get_template_directory() . '/inc/functions/widgets-init.php';
require_once get_template_directory() . '/inc/functions/author-bio-box.php';
require_once get_template_directory() . '/inc/functions/postmeta.php';
require_once get_template_directory() . '/inc/functions/posts-navigation.php';
require_once get_template_directory() . '/inc/functions/menu.php';
require_once get_template_directory() . '/inc/functions/other.php';
require_once get_template_directory() . '/inc/admin/custom.php';