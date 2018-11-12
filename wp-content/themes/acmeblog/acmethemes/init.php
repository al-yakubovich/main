<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since AcmeBlog 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('acmeblog_file_directory') ){

    function acmeblog_file_directory( $file_path ){
        $located = locate_template( $file_path );
        if( '' != $located ){
            return $located;
        }
        return false;
    }
}

/**
 * Check empty or null
 *
 * @since AcmeBlog 1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('acmeblog_is_null_or_empty') ){
	function acmeblog_is_null_or_empty( $str ){
		return ( !isset($str) || trim($str)==='' );
	}
}

/*file for library*/
require_once acmeblog_file_directory('acmethemes/library/tgm/class-tgm-plugin-activation.php');

/*
* file for customizer theme options
*/
require_once acmeblog_file_directory('acmethemes/customizer/customizer.php');

/*
* file for additional functions files
*/
require_once acmeblog_file_directory('acmethemes/functions.php');

/*
* files for hooks
*/
require_once acmeblog_file_directory('acmethemes/hooks/tgm.php');

require_once acmeblog_file_directory('acmethemes/hooks/slider-selection.php');

require_once acmeblog_file_directory('acmethemes/hooks/slider-side.php');

require_once acmeblog_file_directory('acmethemes/hooks/header.php');

require_once acmeblog_file_directory('acmethemes/hooks/social-links.php');

require_once acmeblog_file_directory('acmethemes/hooks/dynamic-css.php');

require_once acmeblog_file_directory('acmethemes/hooks/footer.php');

require_once acmeblog_file_directory('acmethemes/hooks/comment-forms.php');

require_once acmeblog_file_directory('acmethemes/hooks/excerpts.php');

require_once acmeblog_file_directory('acmethemes/hooks/related-posts.php');

require_once acmeblog_file_directory('acmethemes/hooks/acme-demo-setup.php');

/*
* file for sidebar and widgets
*/
require_once acmeblog_file_directory('acmethemes/sidebar-widget/acme-author.php');

require_once acmeblog_file_directory('acmethemes/sidebar-widget/sidebar.php');

/*
* file for core functions imported from functions.php while downloading Underscores
*/
require_once acmeblog_file_directory('acmethemes/core.php');

/**
 * Implement Custom Metaboxes
 */
require_once acmeblog_file_directory('acmethemes/metabox/metabox.php');

/*themes info*/
require_once acmeblog_file_directory('acmethemes/at-theme-info/class-at-theme-info.php');