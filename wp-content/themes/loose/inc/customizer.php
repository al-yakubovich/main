<?php
/**
 * Loose Theme Customizer.
 *
 * @package loose
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function loose_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting(
		'show_top_menu_width',
		array(
			'default' => 768,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'show_top_menu_width',
		array(
			'label' => esc_html__( 'When to Hide/Show Top Menu (in px)', 'loose' ),
			'section' => 'other_settings',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 1200,
				'step' => 1,
			// 'class' => 'test-class test',
			// 'style' => 'color: #0a0',
			),
		)
	);

	$wp_customize->add_setting(
		'header_bg_color',
		array(
			'type' => 'theme_mod',
			'default' => '#f5f8fa',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'header_bg_color',
			array(
				'label' => esc_html__( 'Header Background Color', 'loose' ),
				'section' => 'colors',
				'priority' => 100,
			)
		)
	);

	$wp_customize->add_setting(
		'sidebar_bg_color_1',
		array(
			'type' => 'theme_mod',
			'default' => '#f1f0ec',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'sidebar_bg_color_1',
			array(
				'label' => esc_html__( 'Sidebar Background Color 1', 'loose' ),
				'section' => 'colors',
				'priority' => 110,
			)
		)
	);

	$wp_customize->add_setting(
		'sidebar_bg_color_2',
		array(
			'type' => 'theme_mod',
			'default' => '#fbf5bc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'sidebar_bg_color_2',
			array(
				'label' => esc_html__( 'Sidebar Background Color 2', 'loose' ),
				'section' => 'colors',
				'priority' => 120,
			)
		)
	);

	$wp_customize->add_setting(
		'sidebar_bg_color_3',
		array(
			'type' => 'theme_mod',
			'default' => '#f5f8fa',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'sidebar_bg_color_3',
			array(
				'label' => esc_html__( 'Sidebar Background Color 3', 'loose' ),
				'section' => 'colors',
				'priority' => 130,
			)
		)
	);

	$wp_customize->add_setting(
		'quote_post_format_bg',
		array(
			'type' => 'theme_mod',
			'default' => '#ea4848',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'quote_post_format_bg',
			array(
				'label' => esc_html__( 'Quote Post Format Background Color', 'loose' ),
				'section' => 'colors',
				'priority' => 140,
			)
		)
	);

	$wp_customize->add_setting(
		'link_post_format_bg',
		array(
			'type' => 'theme_mod',
			'default' => '#414244',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'link_post_format_bg',
			array(
				'label' => esc_html__( 'Link Post Format Background Color', 'loose' ),
				'section' => 'colors',
				'priority' => 150,
			)
		)
	);

	$wp_customize->add_setting(
		'aside_post_format_bg',
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'aside_post_format_bg',
			array(
				'label' => esc_html__( 'Aside Post Format Background Color', 'loose' ),
				'section' => 'colors',
				'priority' => 160,
			)
		)
	);

	$wp_customize->add_setting(
		'content_link_color',
		array(
			'type' => 'theme_mod',
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize,
			'content_link_color',
			array(
				'label' => esc_html__( 'Content Link Color', 'loose' ),
				'section' => 'colors',
				'priority' => 170,
			)
		)
	);

	// Section Blog Home Page.
	$wp_customize->add_section(
		'home_page',
		array(
			'title' => esc_html__( 'Home Page', 'loose' ),
			'priority' => 1000,
			'description' => esc_html__( 'Blog Home Page Settings', 'loose' ),
		)
	);

	$wp_customize->add_setting(
		'home_page_layout',
		array(
			'default' => 'masonry',
			'sanitize_callback' => 'loose_sanitize_select_home_page_layout',
		)
	);

	$wp_customize->add_control(
		'home_page_layout',
		array(
			'label' => esc_html__( 'Blog Home Page Layout', 'loose' ),
			'section' => 'home_page',
			'type' => 'select',
			'choices' => array(
				'masonry' => esc_html__( 'Masonry + Sidebar', 'loose' ),
				'list' => esc_html__( 'List + Sidebar', 'loose' ),
				'' => esc_html__( 'Masonry (No Sidebar)', 'loose' ),
			),
		)
	);

	$wp_customize->add_setting(
		'home_page_container_width',
		array(
			'default' => 1156,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'home_page_container_width',
		array(
			'label' => esc_html__( 'Max Home Page and Archive Pages Width on Desktops', 'loose' ),
			'description' => esc_html__( '(in pixels, default: 1156)', 'loose' ),
			'section' => 'home_page',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 3000,
				'step' => 1,
			),
		)
	);

	$wp_customize->add_setting(
		'home_page_slider_img_number',
		array(
			'default' => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'home_page_slider_img_number',
		array(
			'label' => esc_html__( 'Number of Images to Show in Slider', 'loose' ),
			'section' => 'home_page',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 2,
				'step' => 1,
			// 'class' => 'test-class test',
			// 'style' => 'color: #0a0',
			),
		)
	);

	$wp_customize->add_setting(
		'home_page_slider_height',
		array(
			'default' => 500,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'home_page_slider_height',
		array(
			'label' => esc_html__( 'Height of Home Page Slider', 'loose' ),
			'section' => 'home_page',
			'description' => esc_html__( '(in pixels)', 'loose' ),
			'type' => 'number',
			'input_attrs' => array(
				'min' => 100,
				'max' => 1000,
				'step' => 1,
			),
		)
	);

	$wp_customize->add_setting(
		'home_page_slider_img_size',
		array(
			'default' => 'full',
			'sanitize_callback' => 'loose_sanitize_select_home_page_slider_img_size',
		)
	);

	$wp_customize->add_control(
		'home_page_slider_img_size',
		array(
			'label' => esc_html__( 'Slider Image Size', 'loose' ),
			'section' => 'home_page',
			'description' => esc_html__( 'From >Settings>Media', 'loose' ),
			'type' => 'select',
			'choices' => array(
				'thumbnail' => esc_html__( 'Thumbnail', 'loose' ),
				'medium' => esc_html__( 'Medium', 'loose' ),
				'large' => esc_html__( 'Large', 'loose' ),
				'full' => esc_html__( 'Full', 'loose' ),
			),
		)
	);

	$wp_customize->add_setting(
		'home_page_show_sticky',
		array(
			'default' => 0,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'home_page_show_sticky',
		array(
			'label' => esc_html__( 'Show Sticky Posts Below Slider', 'loose' ),
			'section' => 'home_page',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'home_page_latest_posts_text',
		array(
			'default' => 1,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'home_page_latest_posts_text',
		array(
			'label' => esc_html__( 'Enable Latest Posts Text', 'loose' ),
			'section' => 'home_page',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'hide_title_on_home_archive',
		array(
			'default' => 0,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'hide_title_on_home_archive',
		array(
			'label' => esc_html__( 'Hide Title On Home Page/Archive Pages', 'loose' ),
			'section' => 'home_page',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'hide_meta_on_home_archive',
		array(
			'default' => 0,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'hide_meta_on_home_archive',
		array(
			'label' => esc_html__( 'Hide Meta On Home Page/Archive Pages', 'loose' ),
			'section' => 'home_page',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_content_or_excerpt',
		array(
			'default' => 'title',
			'sanitize_callback' => 'loose_sanitize_select_show_content_or_excerpt',
		)
	);

	$wp_customize->add_control(
		'show_content_or_excerpt',
		array(
			'label' => esc_html__( 'What To Show On Home and Archive Pages:', 'loose' ),
			'section' => 'home_page',
			'type' => 'select',
			'choices' => array(
				'excerpt' => esc_html__( 'Excerpt', 'loose' ),
				'content' => esc_html__( 'Content', 'loose' ),
				'title' => esc_html__( 'Just Title', 'loose' ),
			),
		)
	);

	$wp_customize->add_setting(
		'excerpt_length',
		array(
			'default' => 55,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'excerpt_length',
		array(
			'label' => esc_html__( 'Excerpt Length', 'loose' ),
			'section' => 'home_page',
			'description' => esc_html__( '(in words)', 'loose' ),
			'type' => 'number',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
		)
	);

	// Section Single Page.
	$wp_customize->add_section(
		'single_page',
		array(
			'title' => esc_html__( 'Single Post', 'loose' ),
			'priority' => 1010,
			'description' => esc_html__( 'Single Post Settings', 'loose' ),
		)
	);

	$wp_customize->add_setting(
		'single_post_sidebar',
		array(
			'default' => 1,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'single_post_sidebar',
		array(
			'label' => esc_html__( 'Enable Sidebar', 'loose' ),
			'section' => 'single_page',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'single_post_navigation',
		array(
			'default' => 1,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'single_post_navigation',
		array(
			'label' => esc_html__( 'Enable Single Post Navigation', 'loose' ),
			'section' => 'single_page',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'single_post_navigation_next_label',
		array(
			'default' => esc_html__( 'Next Article', 'loose' ),
			'sanitize_callback' => 'esc_html',
		)
	);

	$wp_customize->add_control(
		'single_post_navigation_next_label',
		array(
			'label' => esc_html__( 'Single Post Navigation Next Post Label', 'loose' ),
			'section' => 'single_page',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'single_post_navigation_previous_label',
		array(
			'default' => esc_html__( 'Previous Article', 'loose' ),
			'sanitize_callback' => 'esc_html',
		)
	);

	$wp_customize->add_control(
		'single_post_navigation_previous_label',
		array(
			'label' => esc_html__( 'Single Post Navigation Previous Post Label', 'loose' ),
			'section' => 'single_page',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'single_post_navigation_only_category',
		array(
			'default' => 0,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'single_post_navigation_only_category',
		array(
			'label' => esc_html__( 'Navigation Only In The Same Category', 'loose' ),
			'section' => 'single_page',
			'type' => 'checkbox',
		)
	);

	// Social icons.
	$wp_customize->add_section(
		'social_icons',
		array(
			'title' => esc_html__( 'Social Icons', 'loose' ),
			'priority' => 1020,
			'description' => esc_html__( 'Links to social profiles in menu', 'loose' ),
		)
	);

	$wp_customize->add_setting(
		'social_icons_twitter',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'social_icons_twitter',
		array(
			'label' => esc_html__( 'Twitter', 'loose' ),
			'section' => 'social_icons',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'social_icons_facebook',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'social_icons_facebook',
		array(
			'label' => esc_html__( 'Facebook', 'loose' ),
			'section' => 'social_icons',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'social_icons_googleplus',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'social_icons_googleplus',
		array(
			'label' => esc_html__( 'Google Plus', 'loose' ),
			'section' => 'social_icons',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'social_icons_instagram',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'social_icons_instagram',
		array(
			'label' => esc_html__( 'Instagram', 'loose' ),
			'section' => 'social_icons',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'social_icons_pinterest',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'social_icons_pinterest',
		array(
			'label' => esc_html__( 'Pinterest', 'loose' ),
			'section' => 'social_icons',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'social_icons_youtube',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'social_icons_youtube',
		array(
			'label' => esc_html__( 'Youtube', 'loose' ),
			'section' => 'social_icons',
			'type' => 'text',
		)
	);

	// Section - "other settings".
	$wp_customize->add_section(
		'other_settings',
		array(
			'title' => esc_html__( 'Advanced', 'loose' ),
			'priority' => 1040,
			'description' => esc_html__( 'Advanced Settings', 'loose' ),
		)
	);

	$wp_customize->add_setting(
		'wpp_styling',
		array(
			'default' => 0,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'wpp_styling',
		array(
			'label' => esc_html__( 'Enable WordPress Popular Posts Original Output (needs page refresh)', 'loose' ),
			'section' => 'other_settings',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'sticky_sidebar',
		array(
			'default' => 1,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'sticky_sidebar',
		array(
			'label' => esc_html__( 'Enable Sticky Sidebar', 'loose' ),
			'section' => 'other_settings',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_menu_on_scroll',
		array(
			'default' => 1,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'show_menu_on_scroll',
		array(
			'label' => esc_html__( 'Show menu when scrolling top', 'loose' ),
			'section' => 'other_settings',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'load_google_fonts_from_google',
		array(
			'default' => 1,
			'sanitize_callback' => 'wp_validate_boolean',
		)
	);

	$wp_customize->add_control(
		'load_google_fonts_from_google',
		array(
			'label' => esc_html__( 'Load fonts from Google servers', 'loose' ),
			'section' => 'other_settings',
			'type' => 'checkbox',
		)
	);

}

add_action( 'customize_register', 'loose_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function loose_customize_preview_js() {
	wp_enqueue_script( 'loose_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_preview_init', 'loose_customize_preview_js' );

/**
 * Sanitize select home_page_layout
 *
 * @param type $value user input.
 * @return type
 */
function loose_sanitize_select_home_page_layout( $value ) {
	if ( in_array( $value, array( '', 'list', 'masonry' ), true ) ) {
		return $value;
	} else {
		return '';
	}
}

/**
 * Sanitize select.
 *
 * @param type $value user input.
 * @return type
 */
function loose_sanitize_select_home_page_slider_img_size( $value ) {
	if ( in_array( $value, array( 'thumbnail', 'medium', 'large' ), true ) ) {
		return $value;
	} else {
		return 'full';
	}
}

/**
 * Sanitize select.
 *
 * @param type $value user input.
 * @return type
 */
function loose_sanitize_select_show_content_or_excerpt( $value ) {
	if ( in_array( $value, array( 'content', 'excerpt', 'title' ), true ) ) {
		return $value;
	} else {
		return 'title';
	}
}
