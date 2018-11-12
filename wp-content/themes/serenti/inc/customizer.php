<?php
/**
 * serenti theme Customizer
 *
 * @package serenti
 */

function serenti_theme_options( $wp_customize ) {
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register' , 'serenti_theme_options' );

/**
 * Options for WordPress Theme Customizer.
 */
function serenti_customizer( $wp_customize ) {

	global $serenti_site_layout, $serenti_thumbs_layout;

	/**
	 * Section: Color Settings
	 */

	// Change accent color
	$wp_customize->add_setting( 'serenti_accent_color', array(
		'default'        => '#d0c5c1',
		'sanitize_callback' => 'serenti_sanitize_hexcolor',
		'transport'  =>  'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'serenti_accent_color', array(
		'label'     => __('Accent color','serenti'),
		'section'   => 'colors',
		'priority'  => 1,
	)));

	// Change Links color
	$wp_customize->add_setting( 'serenti_links_color', array(
		'default'        => '#141415',
		'sanitize_callback' => 'serenti_sanitize_hexcolor',
		'transport'  =>  'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'serenti_links_color', array(
		'label'     => __('Links color','serenti'),
		'section'   => 'colors',
		'priority'  => 2,
	)));

	// Change hover color
	$wp_customize->add_setting( 'serenti_hover_color', array(
		'default'        => '#23527c',
		'sanitize_callback' => 'serenti_sanitize_hexcolor',
		'transport'  =>  'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'serenti_hover_color', array(
		'label'     => __('Links hover color','serenti'),
		'section'   => 'colors',
		'priority'  => 3,
	)));

	// Change buttons hover color
	$wp_customize->add_setting( 'serenti_buttons_hover_color', array(
		'default'        => '#d0c5c1',
		'sanitize_callback' => 'serenti_sanitize_hexcolor',
		'transport'  =>  'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'serenti_buttons_hover_color', array(
		'label'     => __('Links hover color','serenti'),
		'section'   => 'colors',
		'priority'  => 4,
	)));

	/**
	 * Section: Post Settings
	 */

	$wp_customize->add_section('serenti_post_section', 
		array(
			'priority' => 31,
			'title' => __('Post Settings', 'serenti'),
			'description' => __('change post settings', 'serenti'),
			)
		);

		// Post Thumbnail Layout
		$wp_customize->add_setting('serenti_thumbs_layout', array(
			'default' => 'landscape',
			'sanitize_callback' => 'serenti_sanitize_thumbs'
		));

		$wp_customize->add_control('serenti_thumbs_layout', array(
			'priority'  => 2,
			'label' => __('Thumbnail Layout', 'serenti'),
			'section' => 'serenti_post_section',
			'type'    => 'select',
			'description' => __('Choose post thumbnail layout', 'serenti'),
			'choices'    => $serenti_thumbs_layout
		));

	/**
	 * Section: Theme layout options
	 */

	$wp_customize->add_section('serenti_layout_section', 
		array(
			'priority' => 32,
			'title' => __('Layout options', 'serenti'),
			'description' => __('Choose website layout', 'serenti'),
			)
		);

		// Sidebar position
		$wp_customize->add_setting('serenti_sidebar_position', array(
			'default' => 'mz-sidebar-right',
			'sanitize_callback' => 'serenti_sanitize_layout'
		));

		$wp_customize->add_control('serenti_sidebar_position', array(
			'priority'  => 1,
			'label' => __('Website Layout Options', 'serenti'),
			'section' => 'serenti_layout_section',
			'type'    => 'select',
			'description' => __('Choose between different layout options to be used as default', 'serenti'),
			'choices'    => $serenti_site_layout
		));

		// checkbox center menu
		$wp_customize->add_setting( 'serenti_menu_center', array(
			'default'        => false,
			'transport'  =>  'refresh',
			'sanitize_callback' => 'serenti_sanitize_checkbox'
		) );

		$wp_customize->add_control( 'serenti_menu_center', array(
			'priority'  => 2,
			'label'     => __('Center Menu?','serenti'),
			'section'   => 'serenti_layout_section',
			'type'      => 'checkbox',
		) );

	/**
	 * Section: Change footer text
	 */

	// Change footer copyright text
	$wp_customize->add_setting( 'serenti_footer_text', array(
		'default'        => '',
		'sanitize_callback' => 'serenti_sanitize_input',
		'transport'  =>  'refresh',
	));

	$wp_customize->add_control( 'serenti_footer_text', array(
		'label'     => __('Footer Copyright Text','serenti'),
		'section'   => 'title_tagline',
		'priority'    => 31,
	));

	/**
	 * Section: Slider settings
	 */

	$wp_customize->add_section( 
		'serenti_slider_options', 
		array(
			'priority'    => 33,
			'title'       => __( 'Slider Settings', 'serenti' ),
			'capability'  => 'edit_theme_options',
			'description' => __('Change slider settings here.', 'serenti'), 
		) 
	);

		// chose category for slider
		$wp_customize->add_setting( 'serenti_slider_cat', array(
			'default' => 0,
			'transport'   => 'refresh',
			'sanitize_callback' => 'serenti_sanitize_slidercat'
		) );	

		$wp_customize->add_control( 'serenti_slider_cat', array(
			'priority'  => 1,
			'type' => 'select',
			'label' => __('Choose a category.', 'serenti'),
			'choices' => serenti_cats(),
			'section' => 'serenti_slider_options',
		) );

		// checkbox show/hide slider
		$wp_customize->add_setting( 'show_serenti_slider', array(
			'default'        => false,
			'transport'  =>  'refresh',
			'sanitize_callback' => 'serenti_sanitize_checkbox'
		) );

		$wp_customize->add_control( 'show_serenti_slider', array(
			'priority'  => 2,
			'label'     => __('Show Slider?','serenti'),
			'section'   => 'serenti_slider_options',
			'type'      => 'checkbox',
		) );

}

add_action( 'customize_register', 'serenti_customizer' );

/**
 * Adds sanitization for text inputs
 */
function serenti_sanitize_input($input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Adds sanitization callback function: Slider Category
 */
function serenti_sanitize_slidercat( $input ) {
	if ( array_key_exists( $input, serenti_cats()) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitze checkbox for WordPress customizer
 */
function serenti_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitze number for WordPress customizer
 */
function serenti_sanitize_number($input) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Sanitze blog layout
 */
function serenti_sanitize_layout( $input ) {
	global $serenti_site_layout;
	if ( array_key_exists( $input, $serenti_site_layout ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitze thumbs layout
 */
function serenti_sanitize_thumbs( $input ) {
	global $serenti_thumbs_layout;
	if ( array_key_exists( $input, $serenti_thumbs_layout ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitze colors
 */
function serenti_sanitize_hexcolor($color)
{
	if ($unhashed = sanitize_hex_color_no_hash($color)) {
		return '#'.$unhashed;
	}

	return $color;
}