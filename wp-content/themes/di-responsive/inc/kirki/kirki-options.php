<?php
//set Kirki config
Kirki::add_config( 'di_responsive_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

//the main panel
Kirki::add_panel( 'di_responsive_options', array(
    'title'       => esc_attr__( 'Di Responsive Options', 'di-responsive' ),
    'description' => esc_attr__( 'All options of Di Responsive theme', 'di-responsive' ),
) );

//typography
Kirki::add_section( 'typography_options', array(
	'title'          => esc_attr__( 'Typography Options', 'di-responsive' ),
	'panel'          => 'di_responsive_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'body_typog',
	'label'       => esc_attr__( 'Body Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Lora',
		'variant'        => 'regular',
		'font-size'      => '14px',
	),
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        	=> 'typography',
	'settings'    	=> 'site_title_typog',
	'label'       	=> esc_attr__( 'Site Title Typography', 'di-responsive' ),
	'description' 	=> esc_attr__( 'if not using image logo.', 'di-responsive' ),
	'section'     	=> 'typography_options',
	'default'     	=> array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '1px',
		'text-transform' => 'uppercase',
	),
	'output'      => array(
		array(
			'element' => '.headermain .site-title-main a.site-name-pr',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'h1_typog',
	'label'       => esc_attr__( 'H1 / Headline 1 Typography', 'di-responsive' ),
	'description' => esc_attr__( 'Used as Headline of Single Post and page.', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '1px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => 'body h1, .h1',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'h2_typog',
	'label'       => esc_attr__( 'H2 / Headline 2 Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => 'body h2, .h2',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'h3_typog',
	'label'       => esc_attr__( 'H3 / Headline 3 Typography', 'di-responsive' ),
	'description' => esc_attr__( 'Used as Headline of Widgets, Posts on Archive, Comment Box.', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => 'body h3, .h3',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'h4_typog',
	'label'       => esc_attr__( 'H4 / Headline 4 Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => 'body h4, .h4',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'h5_typog',
	'label'       => esc_attr__( 'H5 / Headline 5 Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => 'body h5, .h5',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'h6_typog',
	'label'       => esc_attr__( 'H6 / Headline 6 Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => 'body h6, .h6',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'p_typog',
	'label'       => esc_attr__( 'Paragraph Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.maincontainer p',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'top_bar_typog',
	'label'       => esc_attr__( 'Top Bar Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '22px',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.bgtoph',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'top_menu_typog',
	'label'       => esc_attr__( 'Main Menu Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Rajdhani',
		'variant'        => '500',
		'font-size'      => '18px',
	),
	'output'      => array(
		array(
			'element' => '.navbarprimary ul li a',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'       	=> 'typography',
	'settings'    	=> 'widgets_ulol',
	'label'       	=> esc_attr__( 'Widget Lists', 'di-responsive' ),
	'description'	=> esc_attr__( 'Widget ul / ol list typography', 'di-responsive' ),
	'section'     	=> 'typography_options',
	'default'     	=> array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '25px',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.widget_sidebar_main ul li, .widget_sidebar_main ol li, .widgets_footer ul li, .widgets_footer ol li',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'       	=> 'typography',
	'settings'    	=> 'cntnr_ulol',
	'label'       	=> esc_attr__( 'Lists in Main Content', 'di-responsive' ),
	'description'	=> esc_attr__( 'Main Content ul / ol list typography', 'di-responsive' ),
	'section'     	=> 'typography_options',
	'default'     	=> array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '22px',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.maincontainer ul li, .maincontainer ol li',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'sb_menu_typo',
	'label'       => esc_attr__( 'Sidebar Menu Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Rajdhani',
		'variant'        => '500',
		'font-size'      => '18px',
		'line-height'    => '25px',
		'letter-spacing' => '0.1px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.side-menu-menu-wrap ul li a',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'sb_menu_onoff',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'mn_footer_typog',
	'label'       => esc_attr__( 'Footer Widgets Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1.7',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.footer',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'mn_footer_hdln_typog',
	'label'       => esc_attr__( 'Footer Widgets Headline Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    	=> 'Roboto',
		'variant'        	=> 'regular',
		'font-size'      	=> '17px',
		'line-height'    	=> '1.1',
		'letter-spacing' 	=> '1px',
		'text-transform' 	=> 'uppercase',
		'text-align' 		=> 'left',
	),
	'output'      => array(
		array(
			'element' => '.footer h3.widgets_footer_title',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'typography',
	'settings'    => 'cprt_footer_typog',
	'label'       => esc_attr__( 'Footer Copyright Typography', 'di-responsive' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.footer-copyright',
		),
	),
	'transport' => 'auto',
) );

//typography END

//top bar
Kirki::add_section( 'top_bar', array(
	'title'          => esc_attr__( 'Top Bar Options', 'di-responsive' ),
	'panel'          => 'di_responsive_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'display_top_bar',
	'label'       => esc_attr__( 'Top Bar Feature', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable Top Bar', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '1',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'select',
	'settings'    => 'tpbr_left_view',
	'label'       => esc_attr__( 'Top Bar Left Content View', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__( 'Address, Phone and Email', 'di-responsive' ),
		'2' => esc_attr__( 'Text / HTML', 'di-responsive' ),
		'3' => esc_attr__( 'Top Bar Menu', 'di-responsive' ),
		'4' => esc_attr__( 'Icons', 'di-responsive' ),
		'5' => esc_attr__( 'Disable', 'di-responsive' ),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'editor',
	'settings'    => 'top_bar_left_content',
	'label'       => esc_attr__( 'Top Bar Left Content', 'di-responsive' ),
	'description' => esc_attr__( 'Text / HTML of Top Bar Left', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '</p>' . __( 'Left Contents.', 'di-responsive' ) . '</p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.topbar_ctmzr_left',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'top_bar_left_content' => array(
			'selector'        => '.topbar_ctmzr_left',
			'render_callback' => function() {
				echo wp_kses_post( get_theme_mod( 'top_bar_left_content', '</p>' . __( 'Left Contents.', 'di-responsive' ) . '</p>' ) );
			},
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'tpbr_left_view',
			'operator' => '==',
			'value'    => 2,
		),
	)
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'select',
	'settings'    => 'tpbr_right_view',
	'label'       => esc_attr__( 'Top Bar Right Content View', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '4',
	'choices'     => array(
		'1' => esc_attr__( 'Address, Phone and Email', 'di-responsive' ),
		'2' => esc_attr__( 'Text / HTML', 'di-responsive' ),
		'3' => esc_attr__( 'Top Bar Menu', 'di-responsive' ),
		'4' => esc_attr__( 'Icons', 'di-responsive' ),
		'5' => esc_attr__( 'Disable', 'di-responsive' ),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'editor',
	'settings'    => 'top_bar_right_content',
	'label'       => esc_attr__( 'Top Bar Right Content', 'di-responsive' ),
	'description' => esc_attr__( 'Text / HTML of Top Bar Right', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '</p>' . __( 'Right Contents.', 'di-responsive' ) . '</p>',
	'js_vars'   => array(
		array(
			'element'  => '.topbar_ctmzr_right',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'top_bar_right_content' => array(
			'selector'        => '.topbar_ctmzr_right',
			'render_callback' => function() {
				echo wp_kses_post( get_theme_mod( 'top_bar_right_content', '</p>' . __( 'Right Contents.', 'di-responsive' ) . '</p>' ) );
			},
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'tpbr_right_view',
			'operator' => '==',
			'value'    => 2,
		),
	)
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'tpbr_lft_addr',
	'label'			=> esc_attr__( 'Address', 'di-responsive' ),
	'description' 	=> esc_attr__( 'Leave empty for disable.', 'di-responsive' ),
	'section'		=> 'top_bar',
	'default'		=> esc_attr__( '123 Street, NYC, US', 'di-responsive' ),
	'partial_refresh' => array(
		'tpbr_lft_addr' => array(
			'selector'        => '.tpbr_lft_phne_ctmzr',
			'render_callback' => function() {
				get_template_part( 'template-parts/partial/topbar', 'phonemail' );
			},
		),
	),
	'active_callback'  => 'di_responsive_phonemail_active_callback',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'tpbr_lft_phne',
	'label'			=> esc_attr__( 'Phone Number', 'di-responsive' ),
	'description' 	=> esc_attr__( 'Leave empty for disable.', 'di-responsive' ),
	'section'		=> 'top_bar',
	'default'		=> esc_attr__( '0123456789', 'di-responsive' ),
	'partial_refresh' => array(
		'tpbr_lft_phne' => array(
			'selector'        => '.tpbr_lft_phne_ctmzr',
			'render_callback' => function() {
				get_template_part( 'template-parts/partial/topbar', 'phonemail' );
			},
		),
	),
	'active_callback'  => 'di_responsive_phonemail_active_callback',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'tpbr_lft_email',
	'label'			=> esc_attr__( 'Email Address', 'di-responsive' ),
	'description' 	=> esc_attr__( 'Leave empty for disable.', 'di-responsive' ),
	'section'		=> 'top_bar',
	'default'		=> esc_attr__( 'info@example.com', 'di-responsive' ),
	'partial_refresh' => array(
		'tpbr_lft_email' => array(
			'selector'        => '.tpbr_lft_phne_ctmzr',
			'render_callback' => function() {
				get_template_part( 'template-parts/partial/topbar', 'phonemail' );
			},
		),
	),
	'active_callback'  => 'di_responsive_phonemail_active_callback',
) );

function di_responsive_phonemail_active_callback() {
	$topbar = get_theme_mod( 'display_top_bar', '1' );
	$left = get_theme_mod( 'tpbr_left_view', '1' );
	$right = get_theme_mod( 'tpbr_right_view', '1' );
	if( $topbar == 1 && ( $left == 1 || $right == 1 ) ) {
		return true;
	} else {
		return false;
	}
}

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'display_sicons_top_bar',
	'label'       => esc_attr__( 'Social Icons', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable Social Icons', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 's_link_open',
	'label'       => esc_attr__( 'Social Links in New Tab?', 'di-responsive' ),
	'description' => esc_attr__( 'Open social links in new tab or same.', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'display_sicons_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_responsive_top_bar' );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'top_bar_seach_icon',
	'label'       => esc_attr__( 'Search Icon', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable Search Icon', 'di-responsive' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_responsive_top_bar_search_form' );

//top bar END

//color options
Kirki::add_section( 'color_options', array(
	'title'          => esc_attr__( 'Color Options', 'di-responsive' ),
	'panel'          => 'di_responsive_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_color',
	'label'       	=> esc_attr__( 'Default Links Color', 'di-responsive' ),
	'description'	=> esc_attr__( 'This will be color of all default links.', 'di-responsive' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_responsive_default_a_color', '#9e6c00' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a, .woocommerce .woocommerce-breadcrumb a, .woocommerce .star-rating span',
			'property' => 'color',
		),
		array(
			'element'  => '.widget_sidebar_main ul li::before',
			'property' => 'color',
		),
		array(
			'element'  => '.navigation.pagination .nav-links .page-numbers, .navigation.pagination .nav-links .page-numbers:last-child',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_mover_color',
	'label'       	=> esc_attr__( 'Default Links Color Mouse Over', 'di-responsive' ),
	'description'	=> esc_attr__( 'This will be color of all default links on mouse over.', 'di-responsive' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_responsive_default_a_mover_color', '#cc9319' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a:hover, body a:focus, .woocommerce .woocommerce-breadcrumb a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.widget_sidebar_main ul li:hover::before',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

do_action( 'di_responsive_color_options' );

//color options END

//social profile
Kirki::add_section( 'social_options', array(
	'title'          => esc_attr__( 'Social Profile', 'di-responsive' ),
	'panel'          => 'di_responsive_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_facebook',
	'label'			=> esc_attr__( 'Facebook Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> 'http://facebook.com',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_twitter',
	'label'			=> esc_attr__( 'Twitter Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> 'http://twitter.com',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_youtube',
	'label'			=> esc_attr__( 'YouTube Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> 'http://youtube.com',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_vk',
	'label'			=> esc_attr__( 'VK Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_googleplus',
	'label'			=> esc_attr__( 'Google Plus Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_linkedin',
	'label'			=> esc_attr__( 'Linkedin Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_pinterest',
	'label'			=> esc_attr__( 'Pinterest Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_instagram',
	'label'			=> esc_attr__( 'Instagram Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_telegram',
	'label'			=> esc_attr__( 'Telegram Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_snapchat',
	'label'			=> esc_attr__( 'Snapchat Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_flickr',
	'label'			=> esc_attr__( 'Flickr Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_reddit',
	'label'			=> esc_attr__( 'Reddit Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_tumblr',
	'label'			=> esc_attr__( 'Tumblr Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_yelp',
	'label'			=> esc_attr__( 'Yelp Link', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_whatsappno',
	'label'			=> esc_attr__( 'WhatsApp Number', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_skype',
	'label'			=> esc_attr__( 'Skype Id', 'di-responsive' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-responsive' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );
//social profile END


// Blog
Kirki::add_section( 'blog_options', array(
	'title'          => esc_attr__( 'Blog Options', 'di-responsive' ),
	'panel'          => 'di_responsive_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'sortable',
	'settings'    => 'archive_structure',
	'label'       => __( 'Archive Posts Structure', 'di-responsive' ),
	'description' => __( 'Show / Hide / Reorder parts of posts page.', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => array(
		'categories',
		'loop_headline',
		'date',
		'featured_image',
		'loop_content',
	),
	'choices'     => array(
		'categories'		=> esc_attr__( 'Post Categories', 'di-responsive' ),
		'loop_headline'		=> esc_attr__( 'Post Headline', 'di-responsive' ),
		'date'				=> esc_attr__( 'Post Date', 'di-responsive' ),
		'featured_image'	=> esc_attr__( 'Post Featured Image', 'di-responsive' ),
		'loop_content'		=> esc_attr__( 'Post Content', 'di-responsive' ),
	),
	'priority'    => 10,
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'sortable',
	'settings'    => 'single_structure',
	'label'       => __( 'Single Post Structure', 'di-responsive' ),
	'description' => __( 'Show / Hide / Reorder parts of single post.', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => array(
		'categories',
		'single_headline',
		'date',
		'featured_image',
		'single_content',
		'tags',
	),
	'choices'     => array(
		'categories'		=> esc_attr__( 'Post Categories', 'di-responsive' ),
		'single_headline'	=> esc_attr__( 'Post Headline', 'di-responsive' ),
		'date'				=> esc_attr__( 'Post Date', 'di-responsive' ),
		'featured_image'	=> esc_attr__( 'Post Featured Image', 'di-responsive' ),
		'single_content'	=> esc_attr__( 'Post Content', 'di-responsive' ),
		'tags'				=> esc_attr__( 'Post Tags', 'di-responsive' ),
	),
	'priority'    => 10,
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'select',
	'settings'    => 'excerpt_or_content',
	'label'       => esc_attr__( 'Display Excerpt or Content on Archive', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => 'excerpt',
	'choices'     => array(
		'excerpt' => esc_attr__( 'Display Excerpt', 'di-responsive' ),
		'content' => esc_attr__( 'Display Content', 'di-responsive' ),
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'number',
	'settings'    => 'excerpt_length',
	'label'       => esc_attr__( 'Excerpt Length', 'di-responsive' ),
	'description' => esc_attr__( 'How much words you want to display on Archive page?', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => 40,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'excerpt_or_content',
			'operator' => '==',
			'value'    => 'excerpt',
		),
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'select',
	'settings'    => 'post_date_view',
	'label'       => esc_attr__( 'Post Date View', 'di-responsive' ),
	'description' => esc_attr__( 'Which date do you want to display for single post?', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__( 'Display Updated Date', 'di-responsive' ),
		'2' => esc_attr__( 'Display Publish Date', 'di-responsive' ),
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'sticky_dt_disply',
	'label'       => esc_attr__( 'Display Sticky Post Date', 'di-responsive' ),
	'description' => esc_attr__( 'Show/Hide date of sticky post on archive/loop page.', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'select',
	'settings'    => 'display_archive_pagination',
	'label'       => esc_attr__( 'Display Pagination on Archive', 'di-responsive' ),
	'description' => esc_attr__( 'Which type of pagination, you want to display?', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => 'nextprev',
	'choices'     => array(
		'nextprev'	=> esc_attr__( 'Next Previous Pagination', 'di-responsive' ),
		'number' 	=> esc_attr__( 'Number Pagination', 'di-responsive' ),
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'select',
	'settings'    => 'blog_list_grid',
	'label'       => esc_attr__( 'Posts View on Archive', 'di-responsive' ),
	'description' => esc_attr__( 'Display List or Grid?', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => 'list',
	'choices'     => array(
		'list'		=> esc_attr__( 'List', 'di-responsive' ),
		'grid2c'	=> esc_attr__( 'Grid 2 Column', 'di-responsive' ),
		'grid3c'	=> esc_attr__( 'Grid 3 Column', 'di-responsive' ),
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_archive_layout',
	'label'       => esc_attr__( 'Archive / Loop Layout', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => 'rights',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_single_layout',
	'label'       => esc_attr__( 'Single Post Layout', 'di-responsive' ),
	'section'     => 'blog_options',
	'default'     => 'rights',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'     => 'text',
	'settings' => 'comment_panel_title',
	'label'    => esc_attr__( 'Comment Box Headline', 'di-responsive' ),
	'section'  => 'blog_options',
	'default'  => esc_attr__( 'Have any Question or Comment?', 'di-responsive' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cmnthdlne_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'comment_panel_title' => array(
			'selector'        => '.cmnthdlne_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'comment_panel_title' ) );
			},
		),
	),
) );

do_action( 'di_responsive_blog_options' );

// Blog END

// Sidebar menu options
Kirki::add_section( 'sidebarmenu_options', array(
	'title'          => esc_attr__( 'Sidebar Menu Options', 'di-responsive' ),
	'panel'          => 'di_responsive_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'sb_menu_onoff',
	'label'       => esc_attr__( 'SideBar Menu', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable SideBar Menu', 'di-responsive' ),
	'section'     => 'sidebarmenu_options',
	'default'     => '1',
) );

do_action( 'di_responsive_sidebar_menu_options' );

// Sidebar menu options END

//woocommerce section
if( class_exists( 'WooCommerce' ) )
{
	Kirki::add_section( 'woocommerce_options', array(
		'title'          => esc_attr__( 'WooCommerce Options', 'di-responsive' ),
		'panel'          => 'di_responsive_options',
		'capability'     => 'edit_theme_options',
	) );
	
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_shop_link_top_bar',
		'label'       => esc_attr__( 'Display shop icon in Top Bar?', 'di-responsive' ),
		'description' => esc_attr__( 'Enable/Disable shop icon in Top Bar', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
		'partial_refresh' => array(
			'display_shop_link_top_bar' => array(
				'selector'        => '.woo_icons_top_bar_ctmzr',
				'render_callback' => function() {
					get_template_part( 'template-parts/partial/content', 'woo-icons-topbar' );
				},
			),
		),
	) );
	
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_cart_link_top_bar',
		'label'       => esc_attr__( 'Display cart icon in Top Bar?', 'di-responsive' ),
		'description' => esc_attr__( 'Enable/Disable cart icon in Top Bar', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
		'partial_refresh' => array(
			'display_cart_link_top_bar' => array(
				'selector'        => '.woo_icons_top_bar_ctmzr',
				'render_callback' => function() {
					get_template_part( 'template-parts/partial/content', 'woo-icons-topbar' );
				},
			),
		),
	) );
	
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_myaccount_link_top_bar',
		'label'       => esc_attr__( 'Display My Account icon in Top Bar?', 'di-responsive' ),
		'description' => esc_attr__( 'Enable/Disable My Account icon in Top Bar', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
		'partial_refresh' => array(
			'display_myaccount_link_top_bar' => array(
				'selector'        => '.woo_icons_top_bar_ctmzr',
				'render_callback' => function() {
					get_template_part( 'template-parts/partial/content', 'woo-icons-topbar' );
				},
			),
		),
	) );
	
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_wc_breadcrumbs',
		'label'       => esc_attr__( 'WC Breadcrumbs', 'di-responsive' ),
		'description' => esc_attr__( 'Enable/Disable WooCommerce Breadcrumbs.', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => '0',
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_related_prdkt',
		'label'       => esc_attr__( 'Related Products', 'di-responsive' ),
		'description' => esc_attr__( 'Enable/Disable WooCommerce Related Products,', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'toggle',
		'settings'    => 'support_gallery_zoom',
		'label'       => esc_attr__( 'Gallery Zoom', 'di-responsive' ),
		'description' => esc_attr__( 'Enable/Disable gallery zoom support on single product.', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'toggle',
		'settings'    => 'support_gallery_lightbox',
		'label'       => esc_attr__( 'Gallery Light Box', 'di-responsive' ),
		'description' => esc_attr__( 'Enable/Disable gallery light box support on single product.', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'			=> 'toggle',
		'settings'		=> 'support_gallery_slider',
		'label'			=> esc_attr__( 'Gallery Slider', 'di-responsive' ),
		'description'	=> esc_attr__( 'Enable/Disable gallery slider support on single product.', 'di-responsive' ),
		'section'		=> 'woocommerce_options',
		'default'		=> '1',
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'			=> 'toggle',
		'settings'		=> 'order_again_btn',
		'label'			=> esc_attr__( 'Display Order Again Button?', 'di-responsive' ),
		'description'	=> esc_attr__( 'It will show / hide order again button on singe order page.', 'di-responsive' ),
		'section'		=> 'woocommerce_options',
		'default'		=> '1',
	) );
	
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'number',
		'settings'    => 'product_per_page',
		'label'       => esc_attr__( 'Number of products display on loop page', 'di-responsive' ),
		'description' => esc_attr__( 'How much products you want to display on loop page?', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => 12,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	) );
	
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'slider',
		'settings'    => 'product_per_column',
		'label'       => esc_attr__( 'Number of products display per column', 'di-responsive' ),
		'description' => esc_attr__( 'How much products you want to display in single line?', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => 4,
		'choices'     => array(
			'min'  => '2',
			'max'  => '5',
			'step' => '1',
			),
	) );
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'color',
		'settings'    => 'woo_onsale_lbl_clr',
		'label'       => esc_attr__( 'OnSale Sign Color', 'di-responsive' ),
		'description' => esc_attr__( 'This will be color of OnSale Sign of products.', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_responsive_woo_onsale_lbl_clr', '#ffffff' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce span.onsale',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'color',
		'settings'    => 'woo_onsale_lbl_bg_clr',
		'label'       => esc_attr__( 'OnSale Sign Background Color', 'di-responsive' ),
		'description' => esc_attr__( 'This will be background color of OnSale Sign of products.', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_responsive_woo_onsale_lbl_bg_clr', '#ca8e01' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce span.onsale',
				'property'	=> 'background-color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'color',
		'settings'    => 'woo_price_clr',
		'label'       => esc_attr__( 'Product Price Color', 'di-responsive' ),
		'description' => esc_attr__( 'This will be color of product price.', 'di-responsive' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_responsive_woo_price_clr', '#ca8e01' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto'
	) );
	
	Kirki::add_field( 'di_responsive_config', array(
		'type'        => 'custom',
		'settings'    => 'info_woo_layout',
		'section'     => 'woocommerce_options',
		'default'     => '<hr /><div style="padding: 10px;background-color: #333; color: #fff; border-radius: 8px;">' . esc_attr__( 'Layouts: For Cart, Checkout and My Account pages layout, use: Template option under Page Attributes on page edit screen.', 'di-responsive' ) . '</div>',
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'			=> 'radio-image',
		'settings'		=> 'woo_layout',
		'label'			=> esc_attr__( 'Shop / Archive Page Layout', 'di-responsive' ),
		'description'	=> esc_attr__( 'This layout will apply on shop, archive, search (products loop) pages.', 'di-responsive' ),
		'section'		=> 'woocommerce_options',
		'default'		=> 'fullw',
		'choices'		=> array(
			'fullw' => get_template_directory_uri() . '/assets/images/fullw.png',
			'rights' => get_template_directory_uri() . '/assets/images/rights.png',
			'lefts' => get_template_directory_uri() . '/assets/images/lefts.png',
		),
	) );

	Kirki::add_field( 'di_responsive_config', array(
		'type'			=> 'radio-image',
		'settings'		=> 'woo_singleprod_layout',
		'label'			=> esc_attr__( 'Single Product Page Layout', 'di-responsive' ),
		'description'	=> esc_attr__( 'This layout will apply on single product page.', 'di-responsive' ),
		'section'		=> 'woocommerce_options',
		'default'		=> 'fullw',
		'choices'		=> array(
			'fullw' => get_template_directory_uri() . '/assets/images/fullw.png',
			'rights' => get_template_directory_uri() . '/assets/images/rights.png',
			'lefts' => get_template_directory_uri() . '/assets/images/lefts.png',
		),
	) );

	do_action( 'di_responsive_woo_options' );
}
//woocommerce section END

//footer widgets section - footer means footer widget section (footer copyright not covered)
Kirki::add_section( 'footer_options', array(
    'title'          => esc_attr__( 'Footer Widget Options', 'di-responsive' ),
    'panel'          => 'di_responsive_options',
    'capability'     => 'edit_theme_options',
) );


Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'endis_ftr_wdgt',
	'label'       => esc_attr__( 'Footer Widgets', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable Footer Widgets.', 'di-responsive' ),
	'section'     => 'footer_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'			=> 'radio-image',
	'settings'		=> 'ftr_wdget_lyot',
	'label'			=> esc_attr__( 'Footer Widget Layout', 'di-responsive' ),
	'description'	=> esc_attr__( 'Save and go to Widgets page to add.', 'di-responsive' ),
	'section'		=> 'footer_options',
	'default'		=> '3',
	'choices'		=> array(
		'1'		=> get_template_directory_uri() . '/assets/images/ftrwidlout1.png',
		'2'		=> get_template_directory_uri() . '/assets/images/ftrwidlout2.png',
		'3'		=> get_template_directory_uri() . '/assets/images/ftrwidlout3.png',
		'4'		=> get_template_directory_uri() . '/assets/images/ftrwidlout4.png',
		'48'	=> get_template_directory_uri() . '/assets/images/ftrwidlout48.png',
		'84'	=> get_template_directory_uri() . '/assets/images/ftrwidlout84.png',
	),
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_responsive_footer_widget_options' );

//footer section END

//footer copyright section
Kirki::add_section( 'footer_copy_options', array(
    'title'          => esc_attr__( 'Footer Copyright Options', 'di-responsive' ),
    'panel'          => 'di_responsive_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'editor',
	'settings'    => 'left_footer_setting',
	'label'       => esc_attr__( 'Footer Left', 'di-responsive' ),
	'description' => esc_attr__( 'Content of Footer Left Side', 'di-responsive' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p>' . esc_attr__( 'Site Title, Some rights reserved.', 'di-responsive' ) . '</p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtlft_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'left_footer_setting' => array(
			'selector'        => '.cprtlft_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'left_footer_setting' ) );
			},
		),
	),
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'editor',
	'settings'    => 'center_footer_setting',
	'label'       => esc_attr__( 'Footer Center', 'di-responsive' ),
	'description' => esc_attr__( 'Content of Footer Center Side', 'di-responsive' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p><a href="#">' . esc_attr__( 'Terms of Use - Privacy Policy', 'di-responsive' ) . '</a></p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtcntr_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'center_footer_setting' => array(
			'selector'        => '.cprtcntr_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'center_footer_setting' ) );
			},
		),
	),
) );

do_action( 'di_responsive_footer_copyright_right_setting' );

do_action( 'di_responsive_footer_copyright' );

//footer copyright section END

//misc section
Kirki::add_section( 'misc_options', array(
    'title'          => esc_attr__( 'MISC Options', 'di-responsive' ),
    'panel'          => 'di_responsive_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'stickymenu_setting',
	'label'       => esc_attr__( 'Sticky Header', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable Sticky Header (for Large Devices)', 'di-responsive' ),
	'section'     => 'misc_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'back_to_top',
	'label'       => esc_attr__( 'Back To Top Button', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable Back To Top Button', 'di-responsive' ),
	'section'     => 'misc_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'toggle',
	'settings'    => 'loading_icon',
	'label'       => esc_attr__( 'Page Loading Icon', 'di-responsive' ),
	'description' => esc_attr__( 'Enable/Disable Page Loading Icon', 'di-responsive' ),
	'section'     => 'misc_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'image',
	'settings'    => 'loading_icon_img',
	'label'       => esc_attr__( 'Upload Custom Loading Icon', 'di-responsive' ),
	'description' => esc_attr__( 'It will replace default loading icon.', 'di-responsive' ),
	'section'     => 'misc_options',
	'default'     => '',
	'active_callback'  => array(
		array(
			'setting'  => 'loading_icon',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );
//misc section END

//Theme Info section
Kirki::add_section( 'theme_info', array(
    'title'          => esc_attr__( 'Theme Info', 'di-responsive' ),
    'panel'          => 'di_responsive_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_demo',
	'label'       => esc_attr__( 'Di Responsive Demo', 'di-responsive' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'You can check demo of ', 'di-responsive' ) . ' <a target="_blank" href="http://demo.dithemes.com/di-responsive/">' . esc_attr__( 'Di Responsive Theme Here', 'di-responsive' ) . '</a>.</div>',
) );

Kirki::add_field( 'di_responsive_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_docs',
	'label'       => esc_attr__( 'Di Responsive Docs', 'di-responsive' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'You can check documentation of ', 'di-responsive' ) . ' <a target="_blank" href="https://dithemes.com/di-responsive-free-wordpress-theme-documentation/">' . esc_attr__( 'Di Responsive Theme Here', 'di-responsive' ) . '</a>.</div>',
) );

do_action( 'di_responsive_cutmzr_theme_info' );

//Theme Info section END
