<?php
/**
 * Welcome Page
 *
 * @package Cressida
 */
/**
 * Include Welcome page class
 */
require_once get_template_directory() . '/welcome-page/class.welcomepage.php';

/**
 * Welcome page config
 */
$config = array(
	'menu_label'       => esc_html__( 'Welcome to Cressida', 'cressida' ),
	'page_title'       => esc_html__( 'Welcome to Cressida', 'cressida' ),
	/* Translators: Theme name */
	'welcome_title'   => sprintf( esc_html__( 'Welcome to %s, version ', 'cressida' ), 'Cressida' ),
	// 'welcome_content' => '',
	/**
	 * Tabs
	 */
	'tabs' => array(
		'getting_started' => esc_html__( 'Getting Started', 'cressida' ),
		'support'         => esc_html__( 'Support', 'cressida' ),
		'free_vs_pro'     => esc_html__( 'Free vs Pro', 'cressida' ),
	),
	/**
	 * Getting started tab
	 */
	'getting_started' => array(
		'cards' => array(
			'one' => array(
				'title'       => esc_html__( 'Required Actions', 'cressida' ),
				'description' => esc_html__( 'Be sure to install and activate the Kirki plugin. It is required to make full use of the customization features of this theme.', 'cressida' ),
				'btn_label'   => esc_html__( 'Install Plugins', 'cressida' ),
				'btn_url'     => esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ),
				'new_tab'     => false,
			),
			'two' => array(
				'title'       => esc_html__( 'Documentation', 'cressida' ),
				'description' => esc_html__( 'For more information on how to fully utilize all the features of Cressida, please review the full documentation.', 'cressida' ),
				'btn_label'   => esc_html__( 'Documentation', 'cressida' ),
				'btn_url'     => esc_url( 'https://help.lyrathemes.com/' ),
				'new_tab'     => true,
			),
			'three' => array(
				'title'       => esc_html__( 'Customize and Set Up', 'cressida' ),
				'description' => esc_html__( 'Use the WordPress Customizer to set up and customize your website. Click the button below, or go to Appearance > Customize.', 'cressida' ),
				'btn_label'   => esc_html__( 'Go to the Customizer', 'cressida' ),
				'btn_url'     => esc_url( admin_url( 'customize.php' ) ),
				'new_tab'     => false,
			),
		),
	),

	/**
	 * Support tab
	 */
	'support' => array(
		'cards' => array(
			'one' => array(
				'title'       => esc_html__( 'Contact Support', 'cressida' ),
				'description' => esc_html__( "If you need any help with theme set up, options, enhancements, or about how a feature works, please feel free to reach out and we'd be happy to assist. LyraThemes has a world class support team, and we try our best to respond to all queries within 24-48 hours.", "cressida" ),
				'btn_label'   => esc_html__( 'Contact Support', 'cressida' ),
				'btn_url'     => esc_url( 'https://www.lyrathemes.com/support/' ),
				'new_tab'     => true,
			),
			'two' => array(
				'title'       => esc_html__( 'Documentation', 'cressida' ),
				'description' => esc_html__( 'For more information on how to fully utilize all the features of Cressida, please review the full documentation. We have tried to add as much information as possible, including screenshots and videos, to help you make the most of this theme.', 'cressida' ),
				'btn_label'   => esc_html__( 'Documentation', 'cressida' ),
				'btn_url'     => esc_url( 'https://help.lyrathemes.com/' ),
				'new_tab'     => true,
			),
		),
	),

	/**
	 * Free vs Pro tab
	 */
	'free_vs_pro' => array(
		'free'         => esc_html__( 'Cressida', 'cressida' ),
		'pro'          => esc_html__( 'Cressida Pro', 'cressida' ),
		'pro_url'      => esc_url( 'https://www.lyrathemes.com/cressida-pro/' ),
		'compare_url'  => esc_url( 'https://www.lyrathemes.com/cressida/#comparison' ),
		'features_list' => array(
			esc_html__( 'Built-in Product Recommendation / Affiliate System for Posts', 'cressida' ),
            esc_html__( 'Built-in Promo / Products Box (Sidebar)', 'cressida' ),
            esc_html__( 'Built-in Promo / Products Box (Front Page)', 'cressida' ),
            esc_html__( 'Built-in MailChimp Widget', 'cressida' ),
            esc_html__( 'Front Page Custom Slider', 'cressida' ),
            esc_html__( 'Special Category Page Layout', 'cressida' ),
            esc_html__( 'Optional Sticky / Fixed Main Menu', 'cressida' ),	
            esc_html__( 'Built-in Affiliate Links Widget', 'cressida' ),
            esc_html__( 'Built-in About Me Widget', 'cressida' ),
            esc_html__( 'Built-in Image Box Widget', 'cressida' ),
            esc_html__( 'Full Width Posts', 'cressida' ),
            esc_html__( 'Full Width Pages', 'cressida' ),
            esc_html__( 'Custom Colors', 'cressida' ),
            esc_html__( 'Custom Fonts (600+ Google Fonts)', 'cressida' ),
            esc_html__( 'Front Page Header Image / Banner', 'cressida' ),		
            esc_html__( 'Front Page Posts Slider', 'cressida' ),
            esc_html__( 'Front Page Slider / Banner with Sidebar', 'cressida' ),
            esc_html__( 'Front Page Featured Posts', 'cressida' ),
            esc_html__( 'Front Page Highlight Post', 'cressida' ),
            esc_html__( 'Front Page Promo Category', 'cressida' ),
            esc_html__( 'Front Page Posts Strip', 'cressida' ),
            esc_html__( 'Front Page Featured Pages / Links', 'cressida' ),
            esc_html__( 'Hide Sidebar on Small Screens', 'cressida' ),
            esc_html__( 'Video Posts', 'cressida' ),
            esc_html__( 'MailChimp Support (Embedded Forms)', 'cressida' ),
            esc_html__( 'Integration with WP Instagram Widget', 'cressida' ),
            esc_html__( 'Easy to Create Social Media Icon Menus', 'cressida' ),
            esc_html__( 'Header and Footer Area Widgets', 'cressida' ),
		),
		'features_free' => array(
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			false,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
		),
		'features_pro' => array(
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
			true,
		),
	),
);
/**
 * Initialize Welcome page
 */
Cressida_Welcome_Page::init( apply_filters( 'cressida_welcome_page_config', $config ) );
