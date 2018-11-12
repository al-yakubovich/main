<?php

/**
 * Quicksand back compat functionality
 *
 * Prevents Quicksand from running on WordPress versions prior to $wp_min_version,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in $wp_min_version.
 *
 * @package WordPress
 * @subpackage quicksand
 */

/**
 * Prevent switching to Quicksand on old versions of WordPress.
 *
 * Switches to the default theme
 */
function quicksand_switch_theme() {
    switch_theme(WP_DEFAULT_THEME, WP_DEFAULT_THEME);

    unset($_GET['activated']);

    add_action('admin_notices', 'quicksand_upgrade_notice');
}

add_action('after_switch_theme', 'quicksand_switch_theme');

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Quicksand on WordPress versions prior to $wp_min_version.
 *
 * @global string $wp_version WordPress version.
 */
function quicksand_upgrade_notice() {
    global $wp_min_version;
    /* translators: WP-Version is put there */
    $message = sprintf(__('Quicksand requires at least WordPress version %1$s. You are running version %2$s. Please upgrade and try again.', 'quicksand'), $wp_min_version, $GLOBALS['wp_version']);
    printf(wp_kses_post('<div class="error"><p>%s</p></div>'), esc_html($message));
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to $wp_min_version
 *
 * @global string $wp_version WordPress version.
 */
function quicksand_customize() {
    global $wp_min_version;
    /* translators: WP-Version is put there */
    wp_die(esc_html(sprintf(__('Quicksand requires at least WordPress version %1$s. You are running version %2$s. Please upgrade and try again.', 'quicksand'), $wp_min_version, $GLOBALS['wp_version']), '', array(
        'back_link' => true,
    )));
}

//add_action(load-(page): runs when an administration menu page is loaded. 
add_action('load-customize.php', 'quicksand_customize');

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to $wp_min_version
 *
 * @global string $wp_version WordPress version.
 */
function quicksand_preview() {
    global $wp_min_version;
    if (isset($_GET['preview'])) {
        /* translators: WP-Version is put there */
        wp_die(esc_html(sprintf(__('Quicksand requires at least WordPress version %1$s. You are running version %2$s. Please upgrade and try again.', 'quicksand'), $wp_min_version, $GLOBALS['wp_version'])));
    }
}

add_action('template_redirect', 'quicksand_preview');
