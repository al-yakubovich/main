<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage AcmeBlog
 */

/**
 * acmeblog_action_before_head hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_set_global -  0
 * @hooked acmeblog_doctype -  10
 */
do_action( 'acmeblog_action_before_head' );?>
	<head>

		<?php
		/**
		 * acmeblog_action_before_wp_head hook
		 * @since AcmeBlog 1.0.0
		 *
		 * @hooked acmeblog_before_wp_head -  10
		 */
		do_action( 'acmeblog_action_before_wp_head' );

		wp_head();
		?>
	</head>
<body <?php body_class();?>>

<?php
/**
 * acmeblog_action_before hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_page_start - 10
 * @hooked acmeblog_page_start - 15
 */
do_action( 'acmeblog_action_before' );

/**
 * acmeblog_action_before_header hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_skip_to_content - 10
 */
do_action( 'acmeblog_action_before_header' );

/**
 * acmeblog_action_header hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_after_header - 10
 */
do_action( 'acmeblog_action_header' );

/**
 * acmeblog_action_after_header hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked null
 */
do_action( 'acmeblog_action_after_header' );

/**
 * acmeblog_action_before_content hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_before_content - 10
 */
do_action( 'acmeblog_action_before_content' );