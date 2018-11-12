<?php
/**
 * File to load the custom-sidebar folder
 *
 * @package Gist
 */
/**
 * Load files
 */

require get_template_directory() . '/candidthemes/custom-widgets/widget-init.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-author-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-featured-posts-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-social-widget.php';

require get_template_directory() . '/candidthemes/functions/custom-functions.php';
require get_template_directory() . '/candidthemes/functions/dynamic-css.php';
require get_template_directory() . '/candidthemes/functions/sanitize-functions.php';
require get_template_directory() . '/candidthemes/customizer-pro/class-customize.php';
