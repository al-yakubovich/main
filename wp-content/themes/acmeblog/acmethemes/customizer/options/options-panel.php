<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'acmeblog-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'acmeblog' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'acmeblog' )
) );

/*
* file for header breadcrumb options
*/
require_once acmeblog_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require_once acmeblog_file_directory('acmethemes/customizer/options/search.php');