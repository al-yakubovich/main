<?php
/**
 * Function to sanitize number
 *
 * @since 1.0.0
 *
 * @param $acmeblog_input
 * @param $acmeblog_setting
 * @return int || float || numeric value
 *
 */
if ( ! function_exists( 'acmeblog_sanitize_number' ) ) :
	function acmeblog_sanitize_number ( $acmeblog_input, $acmeblog_setting ) {
		$acmeblog_sanitize_text = sanitize_text_field( $acmeblog_input );

		// If the input is an number, return it; otherwise, return the default
		return ( is_numeric( $acmeblog_sanitize_text ) ? $acmeblog_sanitize_text : $acmeblog_setting->default );
	}

endif;

/**
 * Sanitizing the checkbox
 *
 * @since AcmeBlog 1.0.0
 *
 * @param $checked
 * @return Boolean
 *
 */
if ( !function_exists('acmeblog_sanitize_checkbox') ) :
	function acmeblog_sanitize_checkbox( $checked ) {
		/*Boolean check.*/
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif;

/**
 * Sanitizing the page/post
 *
 * @since AcmeBlog 1.0.0
 *
 * @param $input user input value
 * @return sanitized output as $input
 *
 */
if ( !function_exists('acmeblog_sanitize_page') ) :
	function acmeblog_sanitize_page( $input ) {
		/*Ensure $input is an absolute integer.*/
		$page_id = absint( $input );
		/*If $page_id is an ID of a published page, return it; otherwise, return false*/
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );
	}
endif;

/**
 * Sanitizing the select callback example
 *
 * @since AcmeBlog 1.0.0
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('acmeblog_sanitize_select') ) :
	function acmeblog_sanitize_select( $input, $setting ) {

		/*Ensure input is a slug.*/
		$input = sanitize_text_field( $input );

		/*Get list of choices from the control associated with the setting.*/
		$choices = $setting->manager->get_control( $setting->id )->choices;

		/*If the input is a valid key, return it; otherwise, return the default.*/
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
endif;