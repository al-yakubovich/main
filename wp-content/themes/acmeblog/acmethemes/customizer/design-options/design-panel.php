<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'acmeblog-design-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'acmeblog' )
) );

$wp_customize->get_section( 'background_image' )->panel = 'acmeblog-design-panel';
$wp_customize->get_section( 'background_image' )->priority = 50;

/*
* file for default layout
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/default-layout.php');

/*
* file for sidebar layout
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');

/*
* file for front page sidebar layout options
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/front-page-sidebar-layout.php');

/*
* file for front archive sidebar layout options
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/archive-sidebar-layout.php');

/*
* file for sticky sidebar
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/sticky-sidebar.php');
/*
* file for blog layout
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/blog-layout.php');

/*
* file for color options
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/colors-options.php');

/*
* file for custom css
*/
require_once acmeblog_file_directory('acmethemes/customizer/design-options/custom-css.php');