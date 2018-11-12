<?php
/**
 * Template functions used for the site comments.
 *
 * @package actions
 */

if ( ! function_exists( 'actions_display_comments' ) ) {
	/**
	 * Actions display comments
	 * @since  1.0.0
	 */
	function actions_display_comments() {
		if ( post_password_required() ) {
	        return;
        }
		
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}