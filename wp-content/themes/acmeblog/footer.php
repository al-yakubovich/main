<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage AcmeBlog
 */

/**
 * acmeblog_action_after_content hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_after_content - 10
 */
do_action( 'acmeblog_action_after_content' );

/**
 * acmeblog_action_before_footer hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked null
 */
do_action( 'acmeblog_action_before_footer' );

/**
 * acmeblog_action_footer hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_footer - 10
 */
do_action( 'acmeblog_action_footer' );

/**
 * acmeblog_action_after_footer hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked null
 */
do_action( 'acmeblog_action_after_footer' );

/**
 * acmeblog_action_after hook
 * @since AcmeBlog 1.0.0
 *
 * @hooked acmeblog_page_end - 10
 */
do_action( 'acmeblog_action_after' );

wp_footer(); ?>
</body>
</html>