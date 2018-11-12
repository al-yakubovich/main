<?php 
/**
 ************************************************************************************************************************
 * White Spektrum - custom-header.php
 ************************************************************************************************************************
 * @package     White Spektrum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  Table of Content
 ************************************************************************************************************************
 *  1.0 - Inc (Custom Header)
 *  2.0 - Inc (Custom Header Styles)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Inc (Custom Header)
 ************************************************************************************************************************
 */
function white_spektrum_load_custom_header() {
    /**
     ********************************************************************************************************************
     * Enable and activate add_theme_support('custom-header', $args);. This feature allows the use of custom header to 
     * display images.
     ********************************************************************************************************************
     */
    $args = array(
        'default-text-color'    => '111111',
        'default-image'         => get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/images/header-image.jpg' ),
        'height'                => 300,
        'max-width'             => 2000,
        'width'                 => 1170,
        'flex-height'           => false,
        'flex-width'            => false,
    );
    add_theme_support('custom-header', $args);
    register_default_headers(array(
        'header-image' => array(
            'url'           => '%s/vendor/benlumia007/backdrop-core/assets/images/header-image.jpg',
            'thumbnail_url' => '%s/vendor/benlumia007/backdrop-core/assets/images/header-image.jpg',
            'description'   => esc_html__( 'Header Image', 'white-spektrum' )
    )));
}
add_action( 'after_setup_theme', 'white_spektrum_load_custom_header' );

/**
 ************************************************************************************************************************
 *  2.0 - Inc (Custom Header Styles)
 ************************************************************************************************************************
 */
function white_spektrum_custom_header_styles_setup() {
    $text_color = get_header_textcolor();
    if ($text_color == get_theme_support( 'custom-header', 'default-text-color' ) ) {
        return;
    }
    $value = display_header_text() ? sprintf( 'color: #%s', esc_html( $text_color ) ) : 'display: none;';
    $custom_css = "
        .site-title a,
        .site-description {
            {$value}
        }
    ";
    wp_add_inline_style( 'backdrop-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'white_spektrum_custom_header_styles_setup' );


function white_spektrum_header_image_inline_style_setup() {
    $header_image = esc_url( get_theme_mod( 'header_image', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/images/header-image.jpg' ) ) );
    $custom_css = "
        .site-header.header-image{
            background: url({$header_image});
            background-repeat: no-repeat;
            padding: 7.188em;
        }
    ";
    wp_add_inline_style('backdrop-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'white_spektrum_header_image_inline_style_setup');