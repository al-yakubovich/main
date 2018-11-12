<?php
/**
 * actions engine room
 *
 * @package actions
 */

/**
 * Initialize all the good things.
 */
require_once ( trailingslashit( get_template_directory() ) . 'inc/init.php' );

require_once ( trailingslashit( get_template_directory() ) . 'inc/framework.php' );

require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/class-customize.php' );

require_once( trailingslashit( get_template_directory() ) . 'elementor/custom.php' );
require_once( trailingslashit( get_template_directory() ) . 'elementor/helper-functions.php' );

function actions_new_elements() {
	if ( ! version_compare( PHP_VERSION, '5.2', '>=' ) ) {
		return;
	}
	require_once( trailingslashit( get_template_directory() ) . 'elementor/widgets/contact-form.php' );

}
add_action( 'elementor/widgets/widgets_registered', 'actions_new_elements' );

// For each version release, the priority needs to decrement by 1. This is so that
// we can load newer versions earlier than older versions when there's a conflict.
add_action( 'init', 'actionsmb_loader_100', 9999 );

if ( ! function_exists( 'actionsmb_loader_100' ) ) {

	/**
	 * Loader function.  Note to change the name of this function to use the
	 * current version number of the plugin.  `1.0.0` is `100`, `1.3.4` = `134`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	function actionsmb_loader_100() {

		// If not in the admin, bail.
		if ( ! is_admin() )
			return;

		// If ActionsMB hasn't been loaded, let's load it.
		if ( ! defined( 'ACTIONSMB_LOADED' ) ) {
			define( 'ACTIONSMB_LOADED', true );

			require_once( trailingslashit( get_template_directory() ) . 'inc/class-actionsmb.php' );
		}
	}
}

require_once ( trailingslashit( get_template_directory() ) . 'inc/actionsmb.php' );
require_once ( trailingslashit( get_template_directory() ) . 'inc/mb-functions.php' );

/**
 * Note: Do not add any custom code here. Please use a custom plugin or child theme so that your customizations aren't lost during updates.
 * http://wpdevhq.com/theme-customisations
 */