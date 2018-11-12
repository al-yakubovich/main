<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package actions
 */

/**
 * Check whether the Actions Customizer settings ar enabled
 * @return boolean
 * @since  1.1.2
 */
function is_actions_customizer_enabled() {
	return apply_filters( 'actions_customizer_enabled', true );
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function actions_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function actions_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	/**
	 * What is this?!
	 * Take the blue pill, close this file and forget you saw the following code.
	 * Or take the red pill, filter actions_make_me_cute and see how deep the rabbit hole goes...
	 */
	$cute	= apply_filters( 'actions_make_me_cute', false );

	if ( true === $cute ) {
		$classes[] = 'actions-cute';
	}

	return $classes;
}

/**
 * Schema type
 * @return string schema itemprop type
 */
function actions_html_tag_schema() {
	$schema 	= 'http://schema.org/';
	$type 		= 'WebPage';

	// Is single post
	if ( is_singular( 'post' ) ) {
		$type 	= 'Article';
	}

	// Is author page
	elseif ( is_author() ) {
		$type 	= 'ProfilePage';
	}

	// Is search results page
	elseif ( is_search() ) {
		$type 	= 'SearchResultsPage';
	}

	echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}

/**
 * Merge array of attributes with defaults, and apply contextual filter on array.
 *
 * The contextual filter is of the form `actions_attr_{context}`.
 *
 * @since 2.0.0
 *
 * @param  string $context    The context, to build filter name.
 * @param  array  $attributes Optional. Extra attributes to merge with defaults.
 *
 * @return array Merged and filtered attributes.
 */
function actions_parse_attr( $context, $attributes = array() ) {

    $defaults = array(
        'class' => sanitize_html_class( $context ),
    );

    $attributes = wp_parse_args( $attributes, $defaults );

    //* Contextual filter
    return apply_filters( "actions_attr_{$context}", $attributes, $context );

}

/**
 * Build list of attributes into a string and apply contextual filter on string.
 *
 * The contextual filter is of the form `actions_attr_{context}_output`.
 *
 * @since 2.0.0
 *
 * @uses actions_parse_attr() Merge array of attributes with defaults, and apply contextual filter on array.
 *
 * @param  string $context    The context, to build filter name.
 * @param  array  $attributes Optional. Extra attributes to merge with defaults.
 *
 * @return string String of HTML attributes and values.
 */
function actions_attr( $context, $attributes = array() ) {

    $attributes = actions_parse_attr( $context, $attributes );

    $output = '';

    //* Cycle through attributes, build tag attribute string
    foreach ( $attributes as $key => $value ) {

		if ( ! $value ) {
			continue;
		}

		if ( true === $value ) {
			$output .= esc_html( $key ) . ' ';
		} else {
			$output .= sprintf( '%s="%s" ', esc_html( $key ), esc_attr( $value ) );
		}

    }

    $output = apply_filters( "actions_attr_{$context}_output", $output, $attributes, $context );

    return trim( $output );

}

/**
 * Determine if HTML5 is activated by the child theme.
 *
 * @since 2.0.0
 *
 * @return bool True if current theme supports html5, false otherwise.
 */
function actions_html5() {

	return current_theme_supports( 'html5' );

}

/**
 * Determine if theme support actions-accessibility is activated by the child theme.
 * Assumes the presence of a screen-reader-text class in the stylesheet (required generated class as from WordPress 4.2)
 *
 * Adds screen-reader-text by default.
 * Skip links to primary navigation, main contant, sidebars and footer, semantic headings and a keyboard accessible drop-down-menu
 * can be added as extra features as: 'skip-links', 'headings', 'drop-down-menu'
 *
 * @since 2.2.0
 *
 * @param string $arg Optional. Specific accessibility feature to check for support. Default is screen-reader-text.
 *
 * @return bool True if current theme supports actions-accessibility, or an specific feature of it, false otherwise.
 */
function actions_a11y( $arg = 'screen-reader-text' ) {

	//* No a11y if not html5
	if ( ! actions_html5() ) {
		return false;
	}

	$feature = 'actions-accessibility';

	if ( 'screen-reader-text' === $arg ) {
		return current_theme_supports( $feature );
	}

	$support = get_theme_support( $feature );

	// No support for feature.
	if ( ! $support ) {
		return false;
	}

	// No args passed in to add_theme_support(), so accept none.
	if ( ! isset( $support[0] ) ) {
		return false;
	}

	// Support for specific arg found.
	if ( in_array( $arg, $support[0] ) ) {
		return true;
	}

}