<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2018 Iceable Media - Mathieu Sarrasin
 *
 * Customizer functions
 *
 */

class BoldR_Customizer {

	public static function register( $wp_customize ) {

		// Move default settings "background_color" in the same section as background image settings
		// and rename the section just "Background"
		$wp_customize->get_control( 'background_color' )->section = 'background_image';
		$wp_customize->get_section( 'background_image' )->title = __( 'Background', 'boldr-lite' );

		// Add new sections
		$wp_customize->add_section(
			'boldr_logo_settings',
			array(
				'title'      => __( 'Logo', 'boldr-lite' ),
				'priority'   => 20,
			)
		);

		$wp_customize->add_section(
			'boldr_blog_settings',
			array(
				'title'      => __( 'Blog Settings', 'boldr-lite' ),
				'priority'   => 80,
			)
		);

		$wp_customize->add_section( 'boldr_misc_settings',
			array(
				'title'      => __( 'Misc', 'boldr-lite' ),
				'priority'   => 100,
			)
		);

		$wp_customize->add_section(
			'boldr_more',
			array(
				'title'      => __( 'More', 'boldr-lite' ),
				'priority'   => 130,
			)
		);

		// Setting and control for Logo
		$wp_customize->add_setting(
			'boldr_logo',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'boldr_logo',
				array(
					'label'       => __( 'Upload your logo', 'boldr-lite' ),
					'description' => __( 'If no logo is uploaded, the site title will be displayed instead.', 'boldr-lite' ),
					'section'     => 'boldr_logo_settings',
					'settings'    => 'boldr_logo',
				)
			)
		);

		// Setting and control for blog index content switch
		$wp_customize->add_setting(
			'boldr_blog_index_content',
			array(
				'default'           => 'excerpt',
				'sanitize_callback' => 'boldr_sanitize_blog_index_content',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'boldr_blog_index_content',
				array(
					'label'    => __( 'Blog Index Content', 'boldr-lite' ),
					'section'  => 'boldr_blog_settings',
					'settings' => 'boldr_blog_index_content',
					'type'     => 'radio',
					'choices'  => array(
						'excerpt' => __( 'Excerpt', 'boldr-lite' ),
						'content' => __( 'Full content', 'boldr-lite' ),
					),
				)
			)
		);

		// Setting and control for responsive mode
		$wp_customize->add_setting(
			'boldr_responsive_mode',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'boldr_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'boldr_responsive_mode',
				array(
					'label'    => __( 'Responsive Mode', 'boldr-lite' ),
					'section'  => 'boldr_misc_settings',
					'settings' => 'boldr_responsive_mode',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'boldr-lite' ),
						'off' => __( 'Off', 'boldr-lite' ),
					),
				)
			)
		);

		// Settings and controls for header image display
		$wp_customize->add_setting(
			'home_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'boldr_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_header_image',
				array(
					'label'    => __( 'Display header on Homepage', 'boldr-lite' ),
					'section'  => 'header_image',
					'settings' => 'home_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'boldr-lite' ),
						'off' => __( 'Off', 'boldr-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'blog_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'boldr_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'blog_header_image',
				array(
					'label'    => __( 'Display header on Blog Index', 'boldr-lite' ),
					'section'  => 'header_image',
					'settings' => 'blog_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'boldr-lite' ),
						'off' => __( 'Off', 'boldr-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'single_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'boldr_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'single_header_image',
				array(
					'label'    => __( 'Display header on Single Posts', 'boldr-lite' ),
					'section'  => 'header_image',
					'settings' => 'single_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'boldr-lite' ),
						'off' => __( 'Off', 'boldr-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'pages_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'boldr_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pages_header_image',
				array(
					'label'    => __( 'Display header on Pages', 'boldr-lite' ),
					'section'  => 'header_image',
					'settings' => 'pages_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'boldr-lite' ),
						'off' => __( 'Off', 'boldr-lite' ),
					),
				)
			)
		);

		// Setting and control for BoldR upgrade message
		$wp_customize->add_setting(
			'boldr_upgrade',
			array(
				'default'           => 'https://www.iceablethemes.com/shop/boldr-pro/',
				'sanitize_callback' => 'boldr_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new BoldR_Button_Customize_Control(
				$wp_customize,
				'boldr_upgrade',
				array(
					'label'       => __( 'Get BoldR Pro', 'boldr-lite' ),
					'description' => __( 'Unleash the full potential of BoldR with tons of additional settings, advanced features and premium support.', 'boldr-lite' ),
					'section'     => 'boldr_more',
					'settings'    => 'boldr_upgrade',
					'type'        => 'button',
				)
			)
		);

		// Setting and control for BoldR support forums message
		$wp_customize->add_setting(
			'boldr_support',
			array(
				'default'           => 'https://www.iceablethemes.com/forums/forum/free-support-forum/boldr-lite/',
				'sanitize_callback' => 'boldr_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new BoldR_Button_Customize_Control(
				$wp_customize,
				'boldr_support',
				array(
					'label'       => __( 'BoldR Lite support forums', 'boldr-lite' ),
					'description' => __( 'Have a question? Need help?', 'boldr-lite' ),
					'section'     => 'boldr_more',
					'settings'    => 'boldr_support',
					'type'        => 'button',
				)
			)
		);

		// Setting and control for BoldR feedback message
		$wp_customize->add_setting(
			'boldr_feedback',
			array(
				'default'           => 'https://wordpress.org/support/view/theme-reviews/boldr-lite',
				'sanitize_callback' => 'boldr_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new BoldR_Button_Customize_Control(
				$wp_customize,
				'boldr_feedback',
				array(
					'label'       => __( 'Rate BoldR Lite', 'boldr-lite' ),
					'description' => __( 'Like this theme? We\'d love to hear your feedback!', 'boldr-lite' ),
					'section'     => 'boldr_more',
					'settings'    => 'boldr_feedback',
					'type'        => 'button',
				)
			)
		);

	}

	public static function customize_controls_scripts() {

		wp_enqueue_style(
			'boldr-customizer-controls-style',
			BOLDR_THEME_DIR_URI . '/inc/customizer/css/customizer-controls.css',
			array( 'customize-controls' )
		);

		wp_register_script(
			'boldr-customizer-section',
			BOLDR_THEME_DIR_URI . '/inc/customizer/js/boldr-customizer-section.js',
			array( 'jquery', 'jquery-ui-core', 'jquery-ui-button', 'customize-controls' ),
			'',
			true
		);

		$boldr_customizer_section_l10n = array(
			'upgrade_pro' => __( 'Upgrade to BoldR Pro!', 'boldr-lite' ),
		);
		wp_localize_script( 'boldr-customizer-section', 'boldr_customizer_section_l10n', $boldr_customizer_section_l10n );
		wp_enqueue_script( 'boldr-customizer-section' );

	}

}
add_action( 'customize_register' , array( 'BoldR_Customizer', 'register' ) );
add_action( 'customize_controls_enqueue_scripts', array( 'BoldR_Customizer', 'customize_controls_scripts' ) );

// Create custom controls for customizer
if ( class_exists( 'WP_Customize_Control' ) ) {
	class BoldR_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'button';
		public function render_content() {
			?>
			<label>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<a class="button" href="<?php echo esc_url( $this->value() ); ?>" target="_blank"><?php echo esc_html( $this->label ); ?></a>
			</label>
			<?php
		}
	}
}

// Sanitation callback functions
function boldr_sanitize_blog_index_content( $input ) {
	$choices = array( 'excerpt', 'content' );
	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;
}

function boldr_sanitize_on_off( $input ) {
	$choices = array( 'on', 'off' );
	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;
}

function boldr_sanitize_button( $input ) {
	return '';
}
