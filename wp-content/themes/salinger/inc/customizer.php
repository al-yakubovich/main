<?php
/**
 * Salinger Customizer.
 *
 * @package Salinger
 */

// Enqueue Javascript postMessage handlers for the Customizer.
add_action( 'customize_preview_init', 'salinger_customize_preview_js' );
function salinger_customize_preview_js() {
	wp_enqueue_script( 'salinger-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}

/**
 * Sanitize functions.
 */

function salinger_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function salinger_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}

function salinger_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function salinger_sanitize_fonts( $input ) {
	$valid = array(
		'Arimo'     => 'Arimo',
		'Bitter'    => 'Bitter',
		'Open Sans' => 'Open Sans',
		'Poppins'   => 'Poppins',
		'Raleway'   => 'Raleway',
		'Ubuntu'    => 'Ubuntu',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/** -------------------------------
 * SALINGER CUSTOMIZER
**------------------------------*/

add_action( 'customize_register', 'salinger_theme_customizer' );

function salinger_theme_customizer( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	class Salinger_Customize_Heading_Control extends WP_Customize_Control {

		public $type  = 'heading_1';
		public $color = 'blue';

		public function render_content() {

			if ( ! empty( $this->label ) ) {
				if ( $this->type == 'heading_1' ) {

					echo '<h3 class="salinger-heading-1-' . esc_attr( $this->color ) . '">' . esc_html( $this->label ) . '<h3>';

				} elseif ( $this->type == 'heading_2' ) { ?>

					<h3 class="salinger-heading-2">
						<?php echo esc_html( $this->label ); ?>
					</h3>
				<?php
				}
			}

			if ( ! empty( $this->description ) ) {
				?>
				<p class="customize-control-description"><?php echo wp_kses_post( $this->description ); ?></p>
				<?php
			}

		} // render_content.

	} // Class Salinger_Customize_Heading_Control.

	class Salinger_Text_Control extends WP_Customize_Control {

		public $control_text = '';

		public function render_content() {

			if ( ! empty( $this->label ) ) {
				?>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<?php
			}

			if ( ! empty( $this->description ) ) {
				?>
				<span class="customize-control-description">
					<?php echo wp_kses_post( $this->description ); ?>
				</span>
				<?php
			}

			if ( ! empty( $this->control_text ) ) {
				?>
				<span class="salinger-text-control-content">
					<?php echo wp_kses_post( $this->control_text ); ?>
				</span>
				<?php
			}

		}

	}

	/**
	 * GENERAL SETTINGS PANEL
	 * Sections: Site indentity, Colors, Fonts, Background image.
	 */

	$wp_customize->add_panel( 'salinger_panel_general_settings',
		array(
			'title'    => __( 'General Settings', 'salinger' ),
			'priority' => 9,
		)
	);

	/**
	 * Static Front Page
	 */
	$wp_customize->get_section( 'static_front_page' )->panel    = 'salinger_panel_general_settings';
	$wp_customize->get_section( 'static_front_page' )->priority = 1;

	/**
	 * Site Logo/Icon/Title/Tagline
	 */

	$wp_customize->get_section( 'title_tagline' )->panel    = 'salinger_panel_general_settings';
	$wp_customize->get_section( 'title_tagline' )->title    = __( 'Site Logo/Icon/Title/Tagline', 'salinger' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;

	/**
	 * Colors
	 */

	$wp_customize->get_section( 'colors' )->panel    = 'salinger_panel_general_settings';
	$wp_customize->get_section( 'colors' )->priority = 11;

	/**
	 * Header image
	 */

	$wp_customize->get_section( 'header_image' )->panel    = 'salinger_panel_header';
	$wp_customize->get_section( 'header_image' )->priority = 13;

	$header_image_description = $wp_customize->get_section( 'header_image' )->description;
	$add_description          = ' <strong>' . __( 'The header image is displayed below the logo and menu.', 'salinger' ) . '</strong>';
	$wp_customize->get_section( 'header_image' )->description = $header_image_description . $add_description;

	/**
	 * Background image
	 */

	$wp_customize->get_section( 'background_image' )->panel    = 'salinger_panel_general_settings';
	$wp_customize->get_section( 'background_image' )->priority = 14;

	// Theme color.
	$wp_customize->add_setting( 'salinger_theme_color', array(
		'default'           => '#DD4040',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'salinger_theme_color',
			array(
				'label'    => __( 'Theme Primary Color', 'salinger' ),
				'section'  => 'colors',
				'settings' => 'salinger_theme_color',
				'type'     => 'select',
				'priority' => 1,
				'choices'  => array(
					'#0199DB' => __( 'Blue', 'salinger' ),
					'#77AD0A' => __( 'Green', 'salinger' ),
					'#F17A07' => __( 'Orange', 'salinger' ),
					'#F882B3' => __( 'Pink', 'salinger' ),
					'#DD4040' => __( 'Red', 'salinger' ),
				),
			)
		)
	);

	// Color excerpt title.
	$wp_customize->add_setting( 'salinger_color_excerpt_title', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	) );
	$wp_customize->add_control('salinger_color_excerpt_title', array(
		'type'     => 'checkbox',
		'label'    => __( 'Apply to entry title in excerpts', 'salinger' ),
		'section'  => 'colors',
		'priority' => 2,
	));

	// Excerpt border.
	$wp_customize->add_setting( 'salinger_color_excerpt_border', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_color_excerpt_border', array(
		'type'     => 'checkbox',
		'label'    => __( 'Apply to the left border of extracts', 'salinger' ),
		'section'  => 'colors',
		'priority' => 3,
	));

	// Widgets title color.
	$wp_customize->add_setting( 'salinger_color_widget_title', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_color_widget_title', array(
		'type'        => 'checkbox',
		'label'       => __( 'Apply to widget title', 'salinger' ),
		'section'     => 'colors',
		'description' => __( '( Uncheck: Black )', 'salinger' ),
		'priority'    => 3,
	));

	/**
	 * Fonts
	 */

	$wp_customize->add_section('salinger_fonts', array(
		'panel'    => 'salinger_panel_general_settings',
		'title'    => __( 'Fonts', 'salinger' ),
		'priority' => 12,
	));
	$wp_customize->add_setting( 'salinger_fonts', array(
		'default'           => 'Arimo',
		'sanitize_callback' => 'salinger_sanitize_fonts',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'salinger_fonts',
			array(
				'label'    => __( 'Select font', 'salinger' ),
				'section'  => 'salinger_fonts',
				'settings' => 'salinger_fonts',
				'type'     => 'select',
				'choices'  => array(
					'Arimo'     => 'Arimo',
					'Bitter'    => 'Bitter',
					'Open Sans' => 'Open Sans',
					'Poppins'   => 'Poppins',
					'Raleway'   => 'Raleway',
					'Ubuntu'    => 'Ubuntu',
				),
			)
		)
	);

	/**
	 * PANEL: HEADER
	 * Sections: Top bar, Header image
	 */

	$wp_customize->add_panel( 'salinger_panel_header', array(
		'title'    => __( 'Header', 'salinger' ),
		'priority' => 10,
	));

	/**
	 * Top bar
	 */

	$wp_customize->add_section('salinger_top_bar', array(
		'panel'    => 'salinger_panel_header',
		'title'    => __( 'Top bar', 'salinger' ),
		'priority' => 10,
	));

	// Display top bar.
	$wp_customize->add_setting('salinger_display_top_bar', array(
		'default'           => 1,
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_display_top_bar', array(
		'type'    => 'checkbox',
		'label'   => __( 'Display top bar', 'salinger' ),
		'section' => 'salinger_top_bar',
	));

	// Top bar color.
	$wp_customize->add_setting( 'salinger_top_bar_color', array(
		'default'           => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'salinger_top_bar_color',
			array(
				'label'    => __( 'Top bar color', 'salinger' ),
				'section'  => 'salinger_top_bar',
				'settings' => 'salinger_top_bar_color',
				'type'     => 'select',
				'choices'  => array(
					'#ffffff' => _x( 'White', 'Top bar color', 'salinger' ),
					'#222222' => __( 'Black', 'salinger' ),
				),
			)
		)
	);

	// Custom text.
	$wp_customize->add_setting( 'salinger_top_bar_left_custom_text', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control('salinger_top_bar_left_custom_text', array(
		'type'    => 'textarea',
		'label'   => __( 'Left top bar custom text (HTML allowed)', 'salinger' ),
		'section' => 'salinger_top_bar',
	));

	$wp_customize->add_setting('salinger_social_icons_color', array(
		'default'           => 'gray',
		'sanitize_callback' => 'salinger_sanitize_select',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'salinger_social_icons_color',
			array(
				'label'    => __( 'Social icons color', 'salinger' ),
				'section'  => 'salinger_top_bar',
				'settings' => 'salinger_social_icons_color',
				'type'     => 'select',
				'choices'  => array(
					'gray'           => _x( 'Gray', 'Social icons color', 'salinger' ),
					'original_color' => __( 'Original color', 'salinger' ),
				),
			)
		)
	);

	// Word MENU.
	$wp_customize->add_setting( 'salinger_mostrar_menu_junto_icono', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_mostrar_menu_junto_icono', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show the word menu next to the icon menu on mobile devices.', 'salinger' ),
		'section' => 'salinger_top_bar',
	));

	/**
	 * Main menu
	 */

	$wp_customize->add_section('salinger_menu', array(
		'panel'    => 'salinger_panel_header',
		'title'    => __( 'Main menu', 'salinger' ),
		'priority' => 10,
	));

	// Menu position.
	$wp_customize->add_setting('salinger_menu_position', array(
		'default'           => 'inline_whith_logo',
		'sanitize_callback' => 'salinger_sanitize_select',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'salinger_menu_position',
			array(
				'label'       => __( 'Menu position', 'salinger' ),
				'section'     => 'salinger_menu',
				'settings'    => 'salinger_menu_position',
				'type'        => 'select',
				'description' => __( "'below the logo' option displays logo and menu centered", 'salinger' ),
				'choices'  => array(
					'inline_whith_logo' => __( 'Inline with logo', 'salinger' ),
					'below_the_logo'    => __( 'Below the logo', 'salinger' ),
				),
			)
		)
	);

	/**
	 * PANEL: CONTENT
	 * Sections: Posts and pages, Sidebar
	 */

	$wp_customize->add_panel( 'salinger_panel_content', array(
		'title'    => __( 'Content', 'salinger' ),
		'priority' => 10,
	));

	/**
	 * Posts
	 */

	$wp_customize->add_section('salinger_posts_and_pages', array(
		'panel' => 'salinger_panel_content',
		'title' => __( 'Posts and Pages', 'salinger' ),
	));

	$wp_customize->add_setting('salinger_full_content_homepage_and_archive', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_full_content_homepage_and_archive', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show full content on homepage and archive pages.', 'salinger' ),
		'section' => 'salinger_posts_and_pages',
	));

	// Featured image in post.
	$wp_customize->add_setting('salinger_featured_image_in_post', array(
		'default'           => 'not_show',
		'sanitize_callback' => 'salinger_sanitize_select',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'salinger_featured_image_in_post',
			array(
				'label'    => __( 'Show featured image in posts', 'salinger' ),
				'section'  => 'salinger_posts_and_pages',
				'settings' => 'salinger_featured_image_in_post',
				'type'     => 'select',
				'choices'  => array(
					'not_show'         => __( 'Not show', 'salinger' ),
					'after_post_title' => __( 'After post title', 'salinger' ),
					'before_post_title' => __( 'Before post title', 'salinger' ),
				),
			)
		)
	);

	$wp_customize->add_setting('salinger_thumbnail_rounded', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_thumbnail_rounded', array(
		'type'    => 'checkbox',
		'label'   => __( "Excerpt's thumbnail image rounded", 'salinger' ),
		'section' => 'salinger_posts_and_pages',
	));

	$wp_customize->add_setting( 'salinger_show_meta_in_excerpts', array(
		'default'           => 1,
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_show_meta_in_excerpts', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show metadata in excerpts (Author, date and number of comments)', 'salinger' ),
		'section' => 'salinger_posts_and_pages',
	));

	$wp_customize->add_setting('salinger_text_justify', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_text_justify', array(
		'type'    => 'checkbox',
		'label'   => __( 'Entry text justified', 'salinger' ),
		'section' => 'salinger_posts_and_pages',
	));

	$wp_customize->add_setting( 'salinger_related_posts', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_related_posts', array(
		'type'    => 'checkbox',
		'label'   => __( 'Display related posts at the end of entries (based on tags)', 'salinger' ),
		'section' => 'salinger_posts_and_pages',
	));

	$wp_customize->add_setting( 'salinger_related_posts_title', array(
		'default'           => __( 'Related posts...', 'salinger' ),
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control('salinger_related_posts_title', array(
		'label'   => __( 'Related posts title', 'salinger' ),
		'section' => 'salinger_posts_and_pages',
		'type'    => 'text',
	));

	$wp_customize->add_setting('salinger_sticky_post_label', array(
		'default'           => __( 'Featured', 'salinger' ),
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control('salinger_sticky_post_label', array(
		'label'   => __( 'Label for Sticky Posts', 'salinger' ),
		'section' => 'salinger_posts_and_pages',
		'type'    => 'text',
	));

	$wp_customize->add_setting('salinger_show_nav_single', array(
		'default'           => 1,
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_show_nav_single', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show navigation at the end of posts (links to previous and next posts)', 'salinger' ),
		'section' => 'salinger_posts_and_pages',
	));

	$wp_customize->add_setting('salinger_back_to_top_button', array(
		'default'           => 1,
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_back_to_top_button', array(
		'type'    => 'checkbox',
		'label'   => __( "Display 'Back to top' button", 'salinger' ),
		'section' => 'salinger_posts_and_pages',
	));

	/**
	 * Sidebar
	 */

	$wp_customize->add_section('salinger_sidebar', array(
		'panel' => 'salinger_panel_content',
		'title' => __( 'Sidebar', 'salinger' ),
	));

	// Sidebar.
	$wp_customize->add_setting('salinger_sidebar_position', array(
		'default'           => 'right',
		'sanitize_callback' => 'salinger_sanitize_select',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'salinger_sidebar_position',
			array(
				'label'    => __( 'Select sidebar position', 'salinger' ),
				'section'  => 'salinger_sidebar',
				'settings' => 'salinger_sidebar_position',
				'type'     => 'radio',
				'choices'  => array(
					'right'      => __( 'Right', 'salinger' ),
					'left'       => __( 'Left', 'salinger' ),
				),
			)
		)
	);

	/**
	 * PANEL: FOOTER
	 * Sections: Footer texts
	 */

	$wp_customize->add_panel( 'salinger_panel_footer', array(
		'title'    => __( 'Footer', 'salinger' ),
		'priority' => 10,
	));
	/**
	 * Footer texts
	 */
	$wp_customize->add_section('salinger_footer_texts', array(
		'panel' => 'salinger_panel_footer',
		'title' => __( 'Footer texts', 'salinger' ),
	));

	$wp_customize->add_setting('salinger_footer_text_1', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control('salinger_footer_text_1', array(
		'label'   => __( 'Footer text 1', 'salinger' ),
		'section' => 'salinger_footer_texts',
		'type'    => 'textarea',
	));

	$wp_customize->add_setting('salinger_footer_text_2', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control('salinger_footer_text_2', array(
		'label'   => __( 'Footer text 2', 'salinger' ),
		'section' => 'salinger_footer_texts',
		'type'    => 'textarea',
	));

	$wp_customize->add_setting('salinger_footer_text_3', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control('salinger_footer_text_3', array(
		'label'   => __( 'Footer text 3', 'salinger' ),
		'section' => 'salinger_footer_texts',
		'type'    => 'textarea',
	));

	$wp_customize->add_setting('salinger_hide_credits', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_checkbox',
	));
	$wp_customize->add_control('salinger_hide_credits', array(
		'type'    => 'checkbox',
		'label'   => __( 'Hide credits', 'salinger' ),
		'section' => 'salinger_footer_texts',
	));

	/*
	* Firts Steps and links
	*/

	$wp_customize->add_section( 'salinger_first_steps_links', array(
		'title'    => __( 'First Steps and Links', 'salinger' ),
		'priority' => 1,
	));

	/* Links */
	$wp_customize->add_setting( 'salinger_heading_first_step_links', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control( new Salinger_Customize_Heading_Control(
		$wp_customize,
		'salinger_heading_first_step_links',
		array(
			'type'     => 'heading_1',
			'settings' => 'salinger_heading_first_step_links',
			'section'  => 'salinger_first_steps_links',
			'label'    => __( 'Links', 'salinger' ),
		)
	));

	// Rate/Review.
	$wp_customize->add_setting( 'salinger_rate_button', array( 'sanitize_callback' => 'salinger_sanitize_text' ) );
	$wp_customize->add_control( new Salinger_Text_Control(
		$wp_customize,
		'salinger_rate_button',
		array(
			'settings'     => 'salinger_rate_button',
			'section'      => 'salinger_first_steps_links',
			'control_text' => __( 'Please, if you are happy with the theme, say it on wordpress.org and give Salinger a nice review. Thank you', 'salinger' ) . '<a class="gt-customizer-link-button" href="https://wordpress.org/support/theme/salinger/reviews/#new-post" target="_blank">' . __( 'Rate/Review', 'salinger' ) . '</a>',
		)
	));

	// Live demo.
	$wp_customize->add_setting( 'salinger_link_buttons', array( 'sanitize_callback' => 'salinger_sanitize_text' ) );
	$wp_customize->add_control( new Salinger_Text_Control(
		$wp_customize,
		'salinger_link_buttons',
		array(
			'settings'     => 'salinger_link_buttons',
			'section'      => 'salinger_first_steps_links',
			'control_text' => '<a class="gt-customizer-link-button" href="http://demo.galussothemes.com/salinger/" target="_blank">' . __( 'Live Demo', 'salinger' ) . '</a>
			<a class="gt-customizer-link-button" href="https://galussothemes.com/wordpress-themes/salinger-pro/" target="_blank">' . __( 'Pro Version', 'salinger' ) . '</a>',
		)
	));

	/* First steps */
	$wp_customize->add_setting('salinger_heading_first_step', array(
		'default'           => '',
		'sanitize_callback' => 'salinger_sanitize_text',
	));
	$wp_customize->add_control( new Salinger_Customize_Heading_Control(
		$wp_customize,
		'salinger_heading_first_step',
		array(
			'type'     => 'heading_1',
			'settings' => 'salinger_heading_first_step',
			'section'  => 'salinger_first_steps_links',
			'label'    => __( 'First Steps', 'salinger' ),
		)
	));

	$wp_customize->add_setting( 'salinger_first_steps', array( 'sanitize_callback' => 'salinger_sanitize_text' ) );
	$wp_customize->add_control( new Salinger_Text_Control(
		$wp_customize,
		'salinger_first_steps',
		array(
			'settings'     => 'salinger_first_steps',
			'section'      => 'salinger_first_steps_links',
			'label'        => __( 'Widgets do not display images correctly', 'salinger' ),
			'control_text' => __( '<p><strong>In order for images to be displayed correctly in widgets, featured images must have a minimum size of 576x432 pixels</strong>.</p><p>If the image thumbnails are not displayed correctly (because Salinger is not the first theme used) you will need to regenerate the thumbnails with a free plugin as', 'salinger' ) . ' <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a></p>.',
		)
	));
}
