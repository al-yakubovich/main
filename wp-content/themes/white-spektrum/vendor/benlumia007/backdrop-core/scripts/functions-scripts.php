<?php
/**
 ************************************************************************************************************************
 *  Backdrop Core - functions-scripts.php
 ************************************************************************************************************************
 *  @package        Backdrop
 *  @copyright      Copyright (C) 2018. Benjamin Lu
 *  @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 *  @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  namespace define
 ************************************************************************************************************************
 */
namespace Benlumia007\Backdrop\Scripts;

/**
 ************************************************************************************************************************
 *  Table of Content
 ************************************************************************************************************************
 *  1.0 - Scripts (Enqueue Scripts and Styles)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Scripts (Enqueue Scripts and Styles)
 ************************************************************************************************************************
 */
function enqueue_scripts() {
    /**
     ********************************************************************************************************************
     *  This is the main stylesheet that is being enqueue. This should be used rather than using @import stylesheets. The
     *  The other such as normalize and screen is also being enqueue as part of the framework so there's no need to enqueue
     *  again in the theme.
     ********************************************************************************************************************
     */
    wp_enqueue_style( 'backdrop-style', get_stylesheet_uri() );
    wp_enqueue_style( 'backdrop-normalize', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/dist/css/normalize.css' ), '10012018' );
    wp_enqueue_style( 'backdrop-screen', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/dist/css/screen.css' ), '10012018' );

    /**
     ********************************************************************************************************************
     *  This will load local Google Fonts as part of the theme. Fira Sans and Merriweather. For more information regarding
     *  this feature, please go to the following url.
     *  (https://google-webfonts-helper.herokuapp.com/fonts)
     ********************************************************************************************************************
     */
    wp_enqueue_style( 'backdrop-custom-fonts', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/fonts/custom-fonts.css' ), '10012018', true );

    /**
     ********************************************************************************************************************
     *  Add Font Awesome 4.7 locally. For more information about Font Awesome, please navigate to the url below. 
     *  (https://font-awesome.com)
     ********************************************************************************************************************
     */
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/font-awesome/css/font-awesome.css' ), '10012018', true );

    /**
     ********************************************************************************************************************
     *  This mainly for the primary navigation. THis allows to use click the dropdown for multiple depths.
     ********************************************************************************************************************
     */
    wp_enqueue_script( 'backdrop-navigation', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/dist/js/navigation.js' ), array( 'jquery' ), '10012018', true );
    wp_localize_script( 'backdrop-navigation', 'backdropScreenReaderText', array(
        'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'backdrop' ) . '</span>',
        'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'backdrop' ) . '</span>',
    ));

    /**
     ********************************************************************************************************************
     *  THis allows users to comment by clicking on reply so that it gets nested.
     ********************************************************************************************************************
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . "\\enqueue_scripts" );