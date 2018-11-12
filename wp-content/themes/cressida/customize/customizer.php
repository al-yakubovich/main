<?php
/**
 * Customizer functionality
 *
 * @package Cressida
 */

/**
 * Register customizer
 *
 * This function is attached to 'customize_register' action hook.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function cressida_customizer_panels_sections( $wp_customize ) {
	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	// cressida_section_general_settings
	$wp_customize->add_section( 'cressida_section_theme_info', array(
		'title'       => esc_html__( 'Upgrade to Pro', 'cressida' ),
		'priority'    => 0
	) );

	// cressida_section_general_settings
	$wp_customize->add_section( 'cressida_section_general_settings', array(
		'title'       => esc_html__( 'General Settings', 'cressida' ),
		'priority'    => 10
	) );

	// cressida_panel_frontpage
	$wp_customize->add_panel( 'cressida_panel_frontpage', array(
		'priority'    => 61,
		'title'       => esc_html__( 'Front Page', 'cressida' ),
	) );
	$wp_customize->add_section( 'cressida_section_frontpage_banner', array(
		'title'       => esc_html__( 'Banner / Slider', 'cressida' ),
		'priority'    => 61,
		'panel'       => 'cressida_panel_frontpage',
	) );
	$wp_customize->add_section( 'cressida_section_frontpage_featured_posts', array(
		'title'       => esc_html__( 'Featured Posts', 'cressida' ),
		'priority'    => 62,
		'panel'       => 'cressida_panel_frontpage',
	) );
	$wp_customize->add_section( 'cressida_section_frontpage_highlight_post_1', array(
		'title'       => esc_html__( 'Highlight Post 1', 'cressida' ),
		'priority'    => 64,
		'panel'       => 'cressida_panel_frontpage',
	) );
	$wp_customize->add_section( 'cressida_section_frontpage_promo_category_1', array(
		'title'       => esc_html__( 'Promo Category 1', 'cressida' ),
		'priority'    => 65,
		'panel'       => 'cressida_panel_frontpage',
	) );
	$wp_customize->add_section( 'cressida_section_frontpage_posts_strip', array(
		'title'       => esc_html__( 'Posts Strip', 'cressida' ),
		'priority'    => 66,
		'panel'       => 'cressida_panel_frontpage',
	) );
	$wp_customize->add_section( 'cressida_section_frontpage_featured_links', array(
		'title'       => esc_html__( 'Featured Pages', 'cressida' ),
		'priority'    => 69,
		'panel'       => 'cressida_panel_frontpage',
	) );
	$wp_customize->add_section( 'cressida_section_frontpage_sidebar', array(
		'title'       => esc_html__( 'Sidebar', 'cressida' ),
		'priority'    => 70,
		'panel'       => 'cressida_panel_frontpage',
	) );

	// cressida_section_blog_feed
	$wp_customize->add_section( 'cressida_section_blog_feed', array(
		'title'       => esc_html__( 'Blog Feed', 'cressida' ),
		'priority'    => 71
	) );

	// cressida_section_posts
	$wp_customize->add_section( 'cressida_section_posts', array(
		'title'       => esc_html__( 'Posts', 'cressida' ),
		'priority'    => 72,
	) );

	// cressida_section_pages
	$wp_customize->add_section( 'cressida_section_pages', array(
		'title'       => esc_html__( 'Pages', 'cressida' ),
		'priority'    => 73,
	) );

	// Remove and modify core controls and sections
	$wp_customize->get_section( 'colors' )->priority = 75;
	/**
	 * Set Selective Refresh for blog name and description
	 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	/**
	 * Selective refresh for customizer preview
	 */
	if ( isset( $wp_customize->selective_refresh ) ) {
		/**
		 * Site name
		 */
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.header-logo-text a',
			'container_inclusive' => false,
			'render_callback'     => 'cressida_customize_partial_blogname',
		));
		/**
		 * Site description
		 */
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.tagline p',
			'container_inclusive' => false,
			'render_callback'     => 'cressida_customize_partial_blogdescription',
		));
		/**
		 * Make sure we see the change between image and text in customizer preview
		 * on selective refresh
		 */
		$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
			'selector'            => '.logo',
			'container_inclusive' => false,
			'render_callback'     => 'cressida_selective_refresh_site_identity',
		) );
		/**
		 * Make sure we see the change between image and text in customizer preview
		 * on selective refresh
		 */
		$wp_customize->selective_refresh->add_partial( 'background_color', array(
			'selector'            => 'body',
			'container_inclusive' => false,
			'render_callback'     => false,
		) );
	}
}
add_action( 'customize_register', 'cressida_customizer_panels_sections', 11 );
/**
 * Enqueue custom styles for Kirki customizer
 * This function is attached to 'customize_controls_enqueue_scripts' action hook
 */
function cressida_custom_customize_enqueue() {
	wp_enqueue_style( 'cressida-customizer', get_parent_theme_file_uri( '/customize/style.css' ) );
}
add_action( 'customize_controls_enqueue_scripts', 'cressida_custom_customize_enqueue' );

/**
 * Extend Kirki fields
 *
 * This function is attached to 'kirki/fields' filter hook.
 *
 * @param WP_Customize_Manager $fields The Customizer object.
 */
function cressida_customizer_fields( $fields ) {

	global $cressida_defaults;

	#cressida_section_theme_info
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'cressida_theme_info',
		'label'       => esc_html__( 'CRESSIDA', 'cressida' ),
		'description' =>
            '<h1>' . esc_html__('Cressida Pro', 'cressida') . '</h1>' .
            '<p><a class="button" href="https://www.lyrathemes.com/cressida-pro/" target="_blank">Upgrade to Cressida Pro</a></p>' .
            '<p>' . esc_html__('Upgrade for the many awesome features and expert support included with the pro version of this theme.', 'cressida') . '</p>' .
            '<p><a class="button" href="http://www.lyrathemes.com/preview/?theme=cressida-pro" target="_blank">Cressida Pro Demo</a></p>' .
            '<p><a class="button" href="https://www.lyrathemes.com/cressida/#comparison" target="_blank">Free vs. Pro Comparison</a></p>' .
            //'<p><a href="https://www.lyrathemes.com/cressida-pro/" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/cressida-pro-1.jpg' ) ) . '" /></a><br />' .
            //'<p><a href="https://www.lyrathemes.com/cressida-pro/" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/cressida-pro-2.jpg' ) ) . '" /></a><br />' .
            //'<p><a href="https://www.lyrathemes.com/cressida-pro/" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/cressida-pro-3.jpg' ) ) . '" /></a><br />' .
            //'<p><a href="https://www.lyrathemes.com/cressida-pro/" target="_blank"><img src="' . esc_url( get_parent_theme_file_uri( 'customize/images/cressida-pro-4.jpg' ) ) . '" /></a><br />' .
            '<hr />' .
            '<h1>' . esc_html__('Current Theme: Cressida', 'cressida') . '</h1>' .
            '<h3>' . esc_html__('Demo Site', 'cressida') . '</h3>' .
            '<p>' . esc_html__('Head on over to the Cressida demo to see what you can accomplish with this theme!', 'cressida') . '</p>' .
            '<p><a class="button" href="http://www.lyrathemes.com/preview/?theme=cressida" target="_blank">Cressida Demo</a></p>' .
            '<h3>Documentation</h3>' .
            '<p>' . esc_html__('Read how to customize the theme, set up widgets, and learn of all the possible options available to you.', 'cressida') . '</p>' .
            '<p><a class="button" href="https://help.lyrathemes.com/#collection-181" target="_blank">Cressida Documentation</a></p>' .
            '<h3>' . esc_html__('Sample Data', 'cressida') . '</h3>' .
            '<p>' . esc_html__('You can install the content and settings shown on our demo site by importing this sample data.', 'cressida') . '</p>' .
            '<p><a class="button" href="https://www.lyrathemes.com/sample-data/cressida-sample-data.zip" target="_blank">Cressida Sample Data</a></p>' .
            '<h3>' . esc_html__('Feedback and Support', 'cressida') . '</h3>' .
            '<p>' . esc_html__('For feedback and support, please contact us and we would be happy to assist!', 'cressida') . '</p>' .
            '<p><a class="button" href="https://www.lyrathemes.com/support/" target="_blank">Cressida Support</a></p>'
            ,
		'section'     => 'cressida_section_theme_info',
		'priority'    => 1,

		);

	#cressida_section_general_settings
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'textarea',
		'settings'    => 'cressida_footer_copyright',
		'label'       => esc_html__( 'Copyright Text', 'cressida' ),
		'description' => esc_html__( 'Accepts HTML.', 'cressida' ),
		'section'     => 'cressida_section_general_settings',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_footer_copyright'],
		'sanitize_callback' => 'force_balance_tags',
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_example_content',
		'label'       => esc_html__( 'Show Example Content?', 'cressida' ),
		'description' => esc_html__( 'Turning this off will disable all default/sample images for posts. It will also hide all default widgets in the Default Sidebar.', 'cressida' ),
		'section'     => 'cressida_section_general_settings',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_example_content']
	);

	#title_tagline
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_image_logo_show',
		'label'       => esc_html__( 'Show Image Logo?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display the image logo.', 'cressida' ),
		'section'     => 'title_tagline',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_image_logo_show'],
		'choices'     => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		),
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'cressida_text_logo',
		'label'       => esc_html__( 'Text Logo', 'cressida' ),
		'description' => esc_html__( 'Displayed when `Show Image Logo?` is set to `Show` or if there is no logo image uploaded.', 'cressida' ),
		'section'     => 'title_tagline',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_text_logo'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_image_logo_show',
			'operator' => '==',
			'value'    => 0
		) ),
		'sanitize_callback'=> 'sanitize_text_field'
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_tagline_show',
		'label'       => esc_html__( 'Show Tagline?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display site tagline.', 'cressida' ),
		'section'     => 'title_tagline',
		'priority'    => 3,
		'default'     => $cressida_defaults['cressida_tagline_show'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_image_logo_show',
			'operator' => '==',
			'value'    => 0
		) ),
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'cressida_text_logo_sep1',
		'label'       => wp_kses_post( '<hr />' ),
		'section'     => 'title_tagline',
		'priority'    => 4
	);

	#header_image
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'cressida_banner_heading',
		'label'       => esc_html__( 'Caption Heading', 'cressida' ),
		'section'     => 'header_image',
		'priority'    => 10,
		'default'     => $cressida_defaults['cressida_banner_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	);
	$fields[] = array(
		'type'        => 'textarea',
		'settings'    => 'cressida_banner_description',
		'label'       => esc_html__( 'Caption Description', 'cressida' ),
		'section'     => 'header_image',
		'priority'    => 11,
		'default'     => $cressida_defaults['cressida_banner_description'],
		'sanitize_callback' => 'force_balance_tags'
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'cressida_banner_label',
		'label'       => esc_html__( 'Button Label', 'cressida' ),
		'section'     => 'header_image',
		'priority'    => 12,
		'default'     => $cressida_defaults['cressida_banner_label'],
		'sanitize_callback' => 'sanitize_text_field',
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'cressida_banner_url',
		'label'       => esc_html__( 'Button Link', 'cressida' ),
		'section'     => 'header_image',
		'priority'    => 13,
		'default'     => $cressida_defaults['cressida_banner_url'],
		'sanitize_callback' => 'sanitize_text_field',
	);

	#cressida_section_frontpage_banner
	#-----------------------------------------
	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'cressida_frontpage_banner',
		'label'       => esc_html__( 'Frontpage Banner / Slider', 'cressida' ),
		'section'     => 'cressida_section_frontpage_banner',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_frontpage_banner'],
		'choices'     => array(
			'banner'   => array(
				esc_attr__( 'Banner', 'cressida' ),
				esc_attr__( 'Shows a banner with an optional caption. Set up the banner and the caption under `Header Image`.', 'cressida' ),
			),
			'posts' => array(
				esc_attr__( 'Posts Slider', 'cressida' ),
				esc_attr__( 'Select posts to show in the slider. When you select this a new section will appear here with more options.', 'cressida' ),
			),
		),
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'cressida_hr_0',
		'label'       => wp_kses_post( '<hr />' ),
		'section'     => 'cressida_section_frontpage_banner',
		'priority'    => 2,
		'active_callback'  => array( array(
			'setting'  => 'cressida_frontpage_banner',
			'operator' => '==',
			'value'    => 'posts'
		) )
	);

	$fields[] = array(
		'type'        => 'repeater',
		'settings'    => 'cressida_frontpage_posts_slider_posts',
		'label'       => esc_html__( 'Posts Slider', 'cressida' ),
		'description' => esc_html__( 'Add posts for Posts Slider.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_banner',
		'priority'    => 3,
		'active_callback'  => array(
			array(
				'setting'  => 'cressida_frontpage_banner',
				'operator' => '==',
				'value'    => 'posts'
			)
		),
		'row_label' => array(
			'type' => 'text',
			'value' => esc_attr__( 'Slide', 'cressida' ),
		),
		'fields' => array(
			'post'     => array(
				'type'          => 'select',
				'label'         => esc_attr__( 'Post', 'cressida' ),
				'choices'       => Kirki_Helper::get_posts( array( 'post_type' => 'post', 'posts_per_page' => -1 ) ),
				'default'       => $cressida_defaults['cressida_frontpage_posts_slider_posts']['post']
			),
		)
	);

	#cressida_section_frontpage_featured_posts
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_frontpage_featured_posts_show',
		'label'       => esc_html__( 'Show Featured Posts?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display the featured posts under the banner/slider.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_featured_posts',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_frontpage_featured_posts_show'],
		'choices'     => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		)
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'cressida_frontpage_featured_posts_sep1',
		'label'       => wp_kses_post( '<hr />' ),
		'section'     => 'cressida_section_frontpage_featured_posts',
		'priority'    => 2,
		'active_callback'  => array( array(
			'setting'  => 'cressida_frontpage_featured_posts_show',
			'operator' => '==',
			'value'    => 1
		) )
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'cressida_frontpage_featured_posts_heading',
		'label'       => esc_html__( 'Heading', 'cressida' ),
		'section'     => 'cressida_section_frontpage_featured_posts',
		'priority'    => 3,
		'default'     => $cressida_defaults['cressida_frontpage_featured_posts_heading'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_frontpage_featured_posts_show',
			'operator' => '==',
			'value'    => 1
		) )
	);

	for ( $cressida_i = 1; $cressida_i < 3; $cressida_i++ ) {

		$fields[] = array(
			'type'        => 'select',
			'settings'    => 'cressida_frontpage_featured_posts_post_' . $cressida_i,
			// Translators: 1. Post number
			'label'       => sprintf( __( 'Post %s', 'cressida' ), $cressida_i ),
			'section'     => 'cressida_section_frontpage_featured_posts',
			'priority'    => $cressida_i + 3,
			'default'     => $cressida_defaults['cressida_frontpage_featured_posts_post_' . $cressida_i],
			'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
			'active_callback'  => array( array(
				'setting'  => 'cressida_frontpage_featured_posts_show',
				'operator' => '==',
				'value'    => 1
			) )
		);

	}

	/* cressida_section_frontpage_highlight_post_1 */
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_frontpage_highlight_post_1_show',
		'label'       => esc_html__( 'Show Highlight Post 1?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display highlighted post on Frontpage.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_highlight_post_1',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_frontpage_highlight_post_1_show'],
		'choices'     => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		)
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'cressida_frontpage_highlight_post_1_id',
		'label'       => esc_html__( 'Select Post', 'cressida' ),
		'section'     => 'cressida_section_frontpage_highlight_post_1',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_frontpage_highlight_post_1_id'],
		'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
		'active_callback'  => array( array(
			'setting'  => 'cressida_frontpage_highlight_post_1_show',
			'operator' => '==',
			'value'    => 1
		) )
	);

	$fields[] = array(
		'type'        => 'radio',
		'settings'    => 'cressida_frontpage_highlight_post_1_background',
		'label'       => esc_html__( 'Choose Background Color', 'cressida' ),
		'section'     => 'cressida_section_frontpage_highlight_post_1',
		'priority'    => 3,
		'default'     => $cressida_defaults['cressida_frontpage_highlight_post_1_background'],
		'choices'     => array(
			'light' => esc_html__( 'Light', 'cressida' ),
			'dark'  => esc_html__( 'Dark', 'cressida' ),
		),
		'active_callback'  => array( array(
			'setting'  => 'cressida_frontpage_highlight_post_1_show',
			'operator' => '==',
			'value'    => 1
		) )
	);

	/* cressida_section_frontpage_promo_category_1 */
	#-----------------------------------------
	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_section_frontpage_promo_category_1_show',
		'label'       => esc_html__( 'Show Promo Category 1?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display Promo Category 1 section on Frontpage.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_promo_category_1',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_section_frontpage_promo_category_1_show'],
		'choices'     => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		)
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'cressida_section_frontpage_promo_category_1_category',
		'label'       => esc_html__( 'Choose Category', 'cressida' ),
		'section'     => 'cressida_section_frontpage_promo_category_1',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_section_frontpage_promo_category_1_category'],
		'choices'     => Kirki_Helper::get_terms( array( 'taxonomy' => 'category', 'hide_empty' => true ) ),
		'active_callback'  => array( array(
			'setting'  => 'cressida_section_frontpage_promo_category_1_show',
			'operator' => '==',
			'value'    => 1
		) )
	);
	$fields[] = array(
		'type'        => 'number',
		'settings'    => 'cressida_section_frontpage_promo_category_1_number',
		'label'       => esc_html__( 'Number of Posts to Show', 'cressida' ),
		'section'     => 'cressida_section_frontpage_promo_category_1',
		'priority'    => 3,
		'default'     => $cressida_defaults['cressida_section_frontpage_promo_category_1_number'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_section_frontpage_promo_category_1_show',
			'operator' => '==',
			'value'    => 1
		) )
	);

	/* cressida_section_frontpage_posts_strip */
	#-----------------------------------------
	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_section_frontpage_posts_strip_show',
		'label'       => esc_html__( 'Show Posts Strip?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display Posts Strip on Frontpage.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_posts_strip',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_section_frontpage_posts_strip_show'],
		'choices'     => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		)
	);

	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'cressida_section_frontpage_posts_strip_category',
		'label'       => esc_html__( 'Choose Category', 'cressida' ),
		'description' => esc_html__( 'Make sure that selected category is assigned to at least 6 posts.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_posts_strip',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_section_frontpage_posts_strip_category'],
		'choices'     => Kirki_Helper::get_terms( array( 'taxonomy' => 'category', 'hide_empty' => true ) ),
		'active_callback'  => array( array(
			'setting'  => 'cressida_section_frontpage_posts_strip_show',
			'operator' => '==',
			'value'    => 1
		) )
	);

	/* cressida_section_frontpage_featured_links */
	#-----------------------------------------
	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_frontpage_featured_links_show',
		'label'       => esc_html__( 'Show Featured Pages?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display Featured Pages section on Frontpage.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_featured_links',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_frontpage_featured_links_show'],
		'choices'     => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		)
	);

	for ( $cressida_link_i = 1; $cressida_link_i < 4; $cressida_link_i++ ) {

		$fields[] = array(
			'type'        => 'select',
			'settings'    => 'cressida_frontpage_featured_links_page_' . $cressida_link_i,
			// Translators: 1. Page number
			'label'       => sprintf( __( 'Page %s', 'cressida' ), $cressida_link_i ),
			'section'     => 'cressida_section_frontpage_featured_links',
			'priority'    => $cressida_link_i + 3,
			'default'     => $cressida_defaults['cressida_frontpage_featured_links_page_' . $cressida_link_i],
			'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1, 'post_type' => 'page' ) ),
			'active_callback'  => array( array(
				'setting'  => 'cressida_frontpage_featured_links_show',
				'operator' => '==',
				'value'    => 1
			))
		);
	}

	/* cressida_section_frontpage_sidebar */
	#-----------------------------------------
	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_frontpage_sidebar_toggle',
		'label'       => esc_html__( 'Hide Sidebar on Mobile Screens?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display sidebar on the front page for small screens.', 'cressida' ),
		'section'     => 'cressida_section_frontpage_sidebar',
		'priority'    => 3,
		'default'     => $cressida_defaults['cressida_frontpage_sidebar_toggle'],
		'choices'     => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' ),
		)
	);

	/* cressida_section_blog_feed */
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'cressida_blog_feed_heading',
		'label'       => esc_html__( 'Heading', 'cressida' ),
		'section'     => 'cressida_section_blog_feed',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_blog_feed_heading']
	);
	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_blog_feed_meta_show',
		'label'       => esc_html__( 'Show Meta?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts in the blog feed. This applies to all blog feeds on all pages, including the front page.', 'cressida' ),
		'section'     => 'cressida_section_blog_feed',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_blog_feed_meta_show'],
		'choices' => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_blog_feed_category_show',
		'label'       => esc_html__( 'Show Category?', 'cressida' ),
		'section'     => 'cressida_section_blog_feed',
		'priority'    => 3,
		'default'     => $cressida_defaults['cressida_blog_feed_category_show'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_blog_feed_meta_show',
			'operator' => '==',
			'value'    => 1
		))
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_blog_feed_date_show',
		'label'       => esc_html__( 'Show Date?', 'cressida' ),
		'section'     => 'cressida_section_blog_feed',
		'priority'    => 4,
		'default'     => $cressida_defaults['cressida_blog_feed_date_show'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_blog_feed_meta_show',
			'operator' => '==',
			'value'    => 1
		) )
	);

	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'cressida_blog_feed_sep1',
		'label'       => wp_kses_post( '<hr />' ),
		'section'     => 'cressida_section_blog_feed',
		'priority'    => 5
	);

	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_blog_feed_readmore_show',
		'label'       => esc_html__( 'Show "View Post" link?', 'cressida' ),
		'section'     => 'cressida_section_blog_feed',
		'priority'    => 6,
		'default'     => $cressida_defaults['cressida_blog_feed_readmore_show'],
	);
	$fields[] = array(
		'type'        => 'text',
		'settings'    => 'cressida_blog_feed_readmore_label',
		'label'       => esc_html__( 'Label for "View Post" link', 'cressida' ),
		'section'     => 'cressida_section_blog_feed',
		'priority'    => 7,
		'default'     => $cressida_defaults['cressida_blog_feed_readmore_label'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_blog_feed_readmore_show',
			'operator' => '==',
			'value'    => 1
		))
	);

	/* cressida_section_posts */
	#-----------------------------------------

	$fields[] = array(
		'type'        => 'switch',
		'settings'    => 'cressida_posts_meta_show',
		'label'       => esc_html__( 'Show Meta?', 'cressida' ),
		'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts on the post page.', 'cressida' ),
		'section'     => 'cressida_section_posts',
		'priority'    => 1,
		'default'     => $cressida_defaults['cressida_posts_meta_show'],
		'choices' => array(
			'on'  => esc_attr__( 'SHOW', 'cressida' ),
			'off' => esc_attr__( 'HIDE', 'cressida' )
		)
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_posts_date_show',
		'label'       => esc_html__( 'Show Date?', 'cressida' ),
		'section'     => 'cressida_section_posts',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_posts_date_show'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_posts_meta_show',
			'operator' => '==',
			'value'    => 1
		) )
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_posts_category_show',
		'label'       => esc_html__( 'Show Category?', 'cressida' ),
		'section'     => 'cressida_section_posts',
		'priority'    => 3,
		'default'     => $cressida_defaults['cressida_posts_category_show'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_posts_meta_show',
			'operator' => '==',
			'value'    => 1
		) )
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_posts_tags_show',
		'label'       => esc_html__( 'Show Tags?', 'cressida' ),
		'section'     => 'cressida_section_posts',
		'priority'    => 5,
		'default'     => $cressida_defaults['cressida_posts_tags_show'],
		'active_callback'  => array( array(
			'setting'  => 'cressida_posts_meta_show',
			'operator' => '==',
			'value'    => 1
		) )
	);
	$fields[] = array(
		'type'        => 'custom',
		'settings'    => 'cressida_posts_sep1',
		'label'       => wp_kses_post( '<hr />' ),
		'section'     => 'cressida_section_posts',
		'priority'    => 6
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_posts_featured_image_show',
		'label'       => esc_html__( 'Show Featured Image?', 'cressida' ),
		'description' => esc_html__( 'Whether to show featured image at the beginning of the post.', 'cressida' ),
		'section'     => 'cressida_section_posts',
		'priority'    => 8,
		'default'     => $cressida_defaults['cressida_posts_featured_image_show']
	);
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_posts_nav_show',
		'label'       => esc_html__( 'Show Next/Prev Posts Links?', 'cressida' ),
		'description' => esc_html__( 'Whether to show Next/Prev navigation below the post.', 'cressida' ),
		'section'     => 'cressida_section_posts',
		'priority'    => 9,
		'default'     => $cressida_defaults['cressida_posts_nav_show']
	);

	/* cressida_section_pages */
	#-----------------------------------------
	$fields[] = array(
		'type'        => 'toggle',
		'settings'    => 'cressida_pages_featured_image_show',
		'label'       => esc_html__( 'Show Featured Image ?', 'cressida' ),
		'description' => esc_html__( 'Whether to show featured image at the beginning of the page.', 'cressida' ),
		'section'     => 'cressida_section_pages',
		'priority'    => 2,
		'default'     => $cressida_defaults['cressida_pages_featured_image_show']
	);

	return $fields;
}

add_filter( 'kirki/fields', 'cressida_customizer_fields' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @see cressida_customizer_panels_sections()
 *
 * @return void
 */
function cressida_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @see cressida_customizer_panels_sections()
 *
 * @return void
 */
function cressida_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Selective refresh for custom image/text logo
 *
 * If we have custom logo selected display the image
 * otherwise display custom text logo.
 *
 * @see cressida_customizer_panels_sections()
 *
 * @return string Returns image or heading markup
 */
function cressida_selective_refresh_site_identity() {
	if ( cressida_get_option( 'cressida_image_logo_show' ) ) :
		if ( has_custom_logo() ) :
			the_custom_logo();
		else :
			cressida_site_identity();
		endif;
	else :
		cressida_site_identity();
	endif;
}

/**
 * Customize preview init
 *
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 * This function is attached to 'customize_preview_init' action hook.
 */
function cressida_customize_preview_js() {
	wp_enqueue_script( 'cressida-customizer', get_parent_theme_file_uri( '/customize/customizer.js' ), array( 'jquery','customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'cressida_customize_preview_js' );