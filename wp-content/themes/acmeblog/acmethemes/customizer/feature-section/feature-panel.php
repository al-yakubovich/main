<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'acmeblog-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Section Options', 'acmeblog' ),
    'description'    => __( 'Customize your awesome site feature section ', 'acmeblog' )
) );

/*
* file for feature slider category
*/
require_once acmeblog_file_directory('acmethemes/customizer/feature-section/feature-category.php');

/*
* file for feature side
*/
require_once acmeblog_file_directory('acmethemes/customizer/feature-section/feature-side.php');

/*
* file for feature section enable
*/
require_once acmeblog_file_directory('acmethemes/customizer/feature-section/feature-enable.php');