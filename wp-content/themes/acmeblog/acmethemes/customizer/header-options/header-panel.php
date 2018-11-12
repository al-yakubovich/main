<?php
/*adding header options panel*/
$wp_customize->add_panel( 'acmeblog-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Options', 'acmeblog' ),
    'description'    => __( 'Customize your awesome site header ', 'acmeblog' )
) );

/*
* file for header logo options
*/
require_once acmeblog_file_directory('acmethemes/customizer/header-options/header-logo.php');

/*
* file for header date options
*/
require_once acmeblog_file_directory('acmethemes/customizer/header-options/header-date.php');

/*
* file for header social options
*/
require_once acmeblog_file_directory('acmethemes/customizer/header-options/social-options.php');

/*
* file for header menu options
*/
require_once acmeblog_file_directory('acmethemes/customizer/header-options/menu-option.php');