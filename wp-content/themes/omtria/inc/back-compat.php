<?php

/**
 * Omtria only works with WordPress 4.1 or later
 */

if (!function_exists('omtria_switch_theme')) {
    function omtria_switch_theme()
    {
        switch_theme(WP_DEFAULT_THEME, WP_DEFAULT_THEME);
        unset($_GET['activated']);
        add_action('admin_notices', 'omtria_upgrade_notice');
    }
}
add_action('after_switch_theme', 'omtria_switch_theme');


if (!function_exists('omtria_upgrade_notice')) {
    function omtria_upgrade_notice()
    {
        $message = sprintf(__('Omtria Theme requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'omtria'), $GLOBALS['wp_version']);
        printf('<div class="error"><p>%s</p></div>', $message);
    }
}


if (!function_exists('omtria_customize')) {
    function omtria_customize()
    {
        wp_die(sprintf(__('Omtria Theme requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'omtria'), $GLOBALS['wp_version']), '', array(
            'back_link' => true,
        ));
    }
}
add_action('load-customize.php', 'omtria_customize');


if (!function_exists('omtria_preview')) {
    function omtria_preview()
    {
        if (isset($_GET['preview'])) {
            wp_die(sprintf(__('Omtria Theme requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'omtria'), $GLOBALS['wp_version']));
        }
    }
}
add_action('template_redirect', 'omtria_preview');
