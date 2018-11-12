<?php
/**
 * AcmeBlog Theme Customizer.
 *
 * @package AcmeThemes
 * @subpackage AcmeBlog
 */

/*
* file for upgrade to pro
*/
require_once acmeblog_file_directory('acmethemes/customizer/customizer-pro/class-customize.php');

/*
* file for customizer core functions
*/
require_once acmeblog_file_directory('acmethemes/customizer/customizer-core.php');

/*
* file for customizer sanitization functions
*/
require_once acmeblog_file_directory('acmethemes/customizer/sanitize-functions.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function acmeblog_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = acmeblog_get_theme_options();

    /*defaults options*/
    $defaults = acmeblog_get_default_theme_options();

    /*
    * file for customizer custom controls classes
    */
	require_once acmeblog_file_directory('acmethemes/customizer/custom-controls.php');
    /*
     * file for feature panel of home page
     */
	require_once acmeblog_file_directory('acmethemes/customizer/feature-section/feature-panel.php');

    /*
    * file for header panel
    */
	require_once acmeblog_file_directory('acmethemes/customizer/header-options/header-panel.php');

    /*
    * file for customizer footer section
    */
	require_once acmeblog_file_directory('acmethemes/customizer/footer-section/footer-section.php');

    /*
    * file for design/layout panel
    */
	require_once acmeblog_file_directory('acmethemes/customizer/design-options/design-panel.php');

    /*
    * file for single post sections
    */
	require_once acmeblog_file_directory('acmethemes/customizer/single-posts/single-post-section.php');

    /*
     * file for options panel
     */
	require_once acmeblog_file_directory('acmethemes/customizer/options/options-panel.php');

    /*removing*/
    $wp_customize->remove_panel('header_image');
    $wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'acmeblog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function acmeblog_customize_preview_js() {
    wp_enqueue_script( 'acmeblog-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_preview_init', 'acmeblog_customize_preview_js' );

/**
 * Theme Update Script
 *
 * For backward compatibility
 */
function acmeblog_update_check() {

    global $wp_version;
    // Return if wp version less than 4.5
    if ( version_compare( $wp_version, '4.5', '<' ) ) {
        return;
    }
    $acmeblog_saved_theme_options = acmeblog_get_theme_options();
    $site_logo = '';
    if( isset( $acmeblog_saved_theme_options['acmeblog-header-logo'] )){
        $site_logo = esc_url( $acmeblog_saved_theme_options['acmeblog-header-logo'] );
    }
    if ( empty( $site_logo ) ) {
        return;
    }
    /*converting url into attachment ID*/
    $logo = attachment_url_to_postid( $site_logo );
    if ( is_int( $logo ) ) {
        set_theme_mod( 'custom_logo', attachment_url_to_postid( $site_logo ) );
        $acmeblog_saved_theme_options['acmeblog-header-logo'] = '';
        set_theme_mod( 'acmeblog_theme_options', $acmeblog_saved_theme_options );
    }
}
add_action( 'after_setup_theme', 'acmeblog_update_check' );