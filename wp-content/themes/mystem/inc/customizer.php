<?php
/**
 * Theme Customizer
 *
 * @package WordPress
 * @subpackage MyStem
 * @since MyStem 1.0
 */
function mystem_customize_register( $wp_customize ) {

	/** ===============
	* Site Title (Logo) & Tagline
	*/
	// section adjustments
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title (Logo) & Tagline', 'mystem' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;

	//site title
	$wp_customize->get_control( 'blogname' )->priority = 10;
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	// tagline
	$wp_customize->get_control( 'blogdescription' )->priority = 30;
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/** ===============
	 * Layout Options
	 */
	$wp_customize->add_section( 'mystem_layout_design', array(
		'title'       => __( 'Layout & Design', 'mystem' ),
		'description' => __( 'Control the column configuration and color scheme of your site.', 'mystem' ),
		'priority'   => 15,
	) );
	$wp_customize->add_setting( 'mystem_layout', array(
		'default' => 'cs',
		'sanitize_callback' => 'mystem_sanitize_layout',
	) );
	$wp_customize->add_control( 'mystem_layout', array(
		'type' => 'select',
		'label' => __( 'Choose a layout:', 'mystem' ),
		'section' => 'mystem_layout_design',
		'choices' => array(
			'cs'	=> 'Content - Sidebar',
			'sc'	=> 'Sidebar - Content',
		),
	) );

	$wp_customize->add_setting('mystem_header_background', array(
		'default'           => '#383838',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_header_background', array(
		'label'    => __( 'Header Background', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));
	
	
	$wp_customize->add_setting('mystem_header_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_header_color', array(
		'label'    => __( 'Header Text Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));
	
	$wp_customize->add_setting('mystem_footer_background', array(
		'default'           => '#383838',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_footer_background', array(
		'label'    => __( 'Footer Background', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));
	
	
	$wp_customize->add_setting('mystem_footer_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_footer_color', array(
		'label'    => __( 'Footer Text Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	))); 
	
	$wp_customize->add_setting('mystem_footer_widget_background', array(
		'default'           => '#383838',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_footer_widget_background', array(
		'label'    => __( 'Footer Widgets Background', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));
	
	
	$wp_customize->add_setting('mystem_footer_widgets_title_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_footer_widgets_title_color', array(
		'label'    => __( 'Footer Widgets Title Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));
	
	$wp_customize->add_setting('mystem_footer_widgets_link_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_footer_widgets_link_color', array(
		'label'    => __( 'Footer Widgets Link Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));
	
	
	$wp_customize->add_setting('mystem_color', array(
		'default'           => '#02C285',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_color', array(
		'label'    => __( 'Link Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));

	$wp_customize->add_setting('mystem_second_color', array(
		'default'           => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_second_color', array(
		'label'    => __( 'Border Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));

	$wp_customize->add_setting('mystem_background_color', array(
		'default'           => '#d9dfe5',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_background_color', array(
		'label'    => __( 'Background Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));

	$wp_customize->add_setting('mystem_blocks_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_blocks_color', array(
		'label'    => __( 'Blocks Background Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));

	$wp_customize->add_setting('mystem_text_color', array(
		'default'           => '#363636',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mystem_text_color', array(
		'label'    => __( 'Text Color', 'mystem' ),
		'section'  => 'mystem_layout_design',
	)));

	$wp_customize->add_setting( 'mystem_border', array(
		'default' => '4',
		'sanitize_callback' => 'mystem_sanitize_integer',
	) );
	$wp_customize->add_control( 'mystem_border', array(
		'type' => 'number',
		'label' => __( 'Border Radius (px):', 'mystem' ),
		'section' => 'mystem_layout_design',
	) );
	// Hide header menu?
	$wp_customize->add_setting( 'mystem_header_menu', array(
		'default' => 0,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_header_menu', array(
		'label'		=> __( 'Hide Header menu?', 'mystem' ),
		'section'	=> 'mystem_layout_design',
		'type'    => 'checkbox',
	) );
	// Hide Primary menu?
	$wp_customize->add_setting( 'mystem_primary_menu', array(
		'default' => 0,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_primary_menu', array(
		'label'		=> __( 'Hide Primary menu?', 'mystem' ),
		'section'	=> 'mystem_layout_design',
		'type'    => 'checkbox',
	) );
	// Hide Search in the primary menu?
	$wp_customize->add_setting( 'mystem_search', array(
		'default' => 0,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_search', array(
		'label'		=> __( 'Hide Search in menu?', 'mystem' ),
		'section'	=> 'mystem_layout_design',
		'type'    => 'checkbox',
	) );
	// Hide Footer widget block?
	$wp_customize->add_setting( 'mystem_footer_widget', array(
		'default' => 0,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_footer_widget', array(
		'label'		=> __( 'Hide Footer widget block?', 'mystem' ),
		'section'	=> 'mystem_layout_design',
		'type'    => 'checkbox',
	) );
	
	// Hide Private Policy Link?
	$wp_customize->add_setting( 'mystem_private_policy', array(
		'default' => 0,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_private_policy', array(
		'label'		=> __( 'Hide private Policy Link?', 'mystem' ),
		'section'	=> 'mystem_layout_design',
		'type'    => 'checkbox',
	) );
	
	// Mobile menus icons	
	$wp_customize->add_setting( 'mystem_mobile_menu_left', array(
		'default' => __( 'fas fa-bars', 'mystem' ),
		'sanitize_callback' => 'mystem_sanitize_text',
	) );	
	$wp_customize->add_control( new MyStem_Customizer_Icon_Picker_Control( $wp_customize, 'mystem_mobile_menu_left', array(
		'label' => __( 'Mobile Left Menu Icon', 'mystem' ),
		'section' => 'mystem_layout_design',
		'settings' => 'mystem_mobile_menu_left',		
	) ) );	
	
	$wp_customize->add_setting( 'mystem_mobile_menu_right', array(
		'default' => __( 'fas fa-bars', 'mystem' ),
		'sanitize_callback' => 'mystem_sanitize_text',
	) );	
	$wp_customize->add_control( new MyStem_Customizer_Icon_Picker_Control( $wp_customize, 'mystem_mobile_menu_right', array(
		'label' => __( 'Mobile Right Menu Icon', 'mystem' ),
		'section' => 'mystem_layout_design',
		'settings' => 'mystem_mobile_menu_right',		
	) ) );

	/** ===============
	 * Content Options
	 */
	$wp_customize->add_section( 'mystem_content_section', array(
		'title'       	=> __( 'Content Options', 'mystem' ),
		'description' 	=> __( 'Adjust the display of content on your website. All options have a default value that can be left as-is but you are free to customize.', 'mystem' ),
		'priority'   	=> 20,
	) );

	// post content
	$wp_customize->add_setting( 'mystem_post_content', array(
		'default' => 'full_content',
		'sanitize_callback' => 'mystem_sanitize_radio',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mystem_post_content', array(
		'label'		=> __( 'Post Feed Content', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'settings'	=> 'mystem_post_content',
		'priority'	=> 20,
		'type'      => 'radio',
		'choices'   => array(
			'excerpt'		=> 'Excerpt',
			'full_content'	=> 'Full Content',
		),
	) ) );
	// read more link
	$wp_customize->add_setting( 'mystem_read_more', array(
		'default' => __( 'Read More', 'mystem' ),
		'sanitize_callback' => 'mystem_sanitize_text',
	) );
	$wp_customize->get_setting( 'mystem_read_more' )->transport = 'postMessage';
	$wp_customize->add_control( 'mystem_read_more', array(
		'label' => __( 'Excerpt & More Link Text', 'mystem' ),
		'section' => 'mystem_content_section',
		'settings' => 'mystem_read_more',
		'priority' => 25,
	) );
	// show featured images on feed?
	$wp_customize->add_setting( 'mystem_featured_image', array(
		'default' => 1,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_featured_image', array(
		'label'		=> __( 'Show Featured Images in post listings?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 30,
		'type'      => 'checkbox',
	) );
	// show featured images on posts?
	$wp_customize->add_setting( 'mystem_single_featured_image', array(
		'default' => 1,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_single_featured_image', array(
		'label'		=> __( 'Show Featured Images on Single Posts?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 40,
		'type'      => 'checkbox',
	) );
	// show meta on posts?
	$wp_customize->add_setting( 'mystem_single_meta', array(
		'default' => 1,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_single_meta', array(
		'label'		=> __( 'Show Meta on Single Posts?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 40,
		'type'      => 'checkbox',
	) );
	// show single content footer?
	$wp_customize->add_setting( 'mystem_post_footer', array(
		'default' => 1,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_post_footer', array(
		'label'		=> __( 'Show Tags on Single Posts?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// show related posts block on single post?
	$wp_customize->add_setting( 'mystem_post_related_posts', array(
		'default' => 1,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_post_related_posts', array(
		'label'		=> __( 'Show Related posts on Single Posts?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// Number Of Related Posts
	$wp_customize->add_setting( 'mystem_post_related_posts_number', array(
		'default' => '5',
		'sanitize_callback' => 'mystem_sanitize_integer',
	) );
	$wp_customize->add_control( 'mystem_post_related_posts_number', array(
		'type' => 'number',
		'label' => __( 'Number Of Related Posts:', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 50,
	) );
	// show author block on single post?
	$wp_customize->add_setting( 'mystem_post_author', array(
		'default' => 1,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_post_author', array(
		'label'		=> __( 'Show Author block on Single Posts?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// show navigation block on single post?
	$wp_customize->add_setting( 'mystem_post_navigation', array(
		'default' => 1,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_post_navigation', array(
		'label'		=> __( 'Show Navigation block on Single Posts?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// comments on pages?
	$wp_customize->add_setting( 'mystem_page_comments', array(
		'default' => 0,
		'sanitize_callback' => 'mystem_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'mystem_page_comments', array(
		'label'		=> __( 'Display Comments on Standard Pages?', 'mystem' ),
		'section'	=> 'mystem_content_section',
		'priority'	=> 60,
		'type'      => 'checkbox',
	) );
	// credits & copyright
	$wp_customize->add_setting( 'mystem_credits_copyright', array(
		'default' => null,
		'sanitize_callback' => 'mystem_sanitize_link_text',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( 'mystem_credits_copyright', array(
		'label'   => __( 'Footer Credits & Copyright', 'mystem' ),
		'section' => 'mystem_content_section',
		'settings' => 'mystem_credits_copyright',
		'priority' => 70,
	) );

	$wp_customize->selective_refresh->add_partial( 'mystem_credits_copyright', array(
		'selector' => '.site-info',
		'container_inclusive' => false,
	) );
	
		
}
add_action( 'customize_register', 'mystem_customize_register' );


/** ===============
 * Sanitize checkbox options
 */
function mystem_sanitize_checkbox( $input ) {
	if ( 1 == $input  ) {
		return 1;
	} else {
		return 0;
	}
}


/** ===============
 * Sanitize radio options
 */
function mystem_sanitize_radio( $input ) {
	$valid = array(
		'excerpt'		=> 'Excerpt',
		'full_content'	=> 'Full Content',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return sanitize_text_field( $input );
	} else {
		return '';
	}
}


/** ===============
 * Sanitize text input
 */
function mystem_sanitize_text( $input ) {
	return sanitize_text_field( $input ) ;
}


/** ===============
 * Sanitize text input to allow anchors
 */
function mystem_sanitize_link_text( $input ) {
	return wp_kses_post( $input );
}


/** ===============
 * Sanitize the layout option
 */
function mystem_sanitize_layout( $input ) {
	$valid = array(
		'sc' => 'Sidebar - Content',
		'cs' => 'Content - Sidebar',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return sanitize_text_field( $input );
	} else {
		return 'sc';
	}
}


/** ===============
 * Sanitize integer input
 */
function mystem_sanitize_integer( $input ) {
	return absint( $input );
}

// Custom main color of stem

function mystem_color_scheme_css() {
	$color                    = get_theme_mod( 'mystem_color', '#02C285' );
	$second_color             = get_theme_mod( 'mystem_second_color', '#cccccc' );
	$background_color         = get_theme_mod( 'mystem_background_color', '#d9dfe5' );
	$blocks_color             = get_theme_mod( 'mystem_blocks_color', '#ffffff' );
	$text_color               = get_theme_mod( 'mystem_text_color', '#363636' );
	$border                   = get_theme_mod( 'mystem_border', '4' );
	$search_border            = ( 0 == $border ) ? '0' : '25';	
	$header_background        = get_theme_mod( 'mystem_header_background', '#363636' );
	$header_color             = get_theme_mod( 'mystem_header_color', '#ffffff' );
	$footer_background        = get_theme_mod( 'mystem_footer_background', '#363636' );
	$footer_color             = get_theme_mod( 'mystem_footer_color', '#ffffff' );	
	$footer_widget_background = get_theme_mod( 'mystem_footer_widget_background', '#383838' );
	$footer_widgets_title     = get_theme_mod( 'mystem_footer_widgets_title_color', '#ffffff' );
	$footer_widgets_link      = get_theme_mod( 'mystem_footer_widgets_link_color', '#ffffff' );	
	$css = '
		body
		{
			background: ' . esc_attr( $background_color ) . ';
			color: ' . esc_attr( $text_color ) . ';
		}
		.header-menu .sub-menu a,
		.main-navigation a,
		.navigation a:hover,
		.comment-navigation a:hover,
		.entry-header a,
		footer.entry-meta a,
		.comment-author a:hover,
		.comment-metadata a:hover,
		.bypostauthor .comment-metadata a:hover,
		.bypostauthor .comment-meta a.url:hover,
		.widget a:hover,
		.related-posts a:hover,
		.entry-meta .price
		{
			color: ' . esc_attr( $text_color ) . ';
		}
		.mobile-menu,
		.header-area{			
			background: ' . esc_attr( $header_background ) . ';
		}
		.mobile-right-menu,
		.mobile-left-menu,
		.mobile-menu .fa-times,
		.mobile-menu .mobile-dropdown li:before,
		.header-menu .fa::before,
		.header-menu .fas::before,
		.header-menu .fab::before,
		.header-menu .far::before,
		.site-title a,.site-title a:hover, .header-menu a
		{
			color: ' . esc_attr( $header_color ) . ';
		}
		.footer-area {
			background: ' . esc_attr( $footer_widget_background ) . ';
			color: ' . esc_attr( $footer_color ) . ';
		}
		.footer-widget-title {
			color: ' . esc_attr( $footer_widgets_title ) . ';
		}
		.footer-widget a, .footer-widget a:hover, .footer-widget li:before {
			color: ' . esc_attr( $footer_widgets_link ) . ';
		}		
		.site-info {
			background: ' . esc_attr( $footer_background ) . ';
		}	

		/* Second color*/
		.entry-header .entry-title a:hover,
		.navigation a,
		.comment-navigation a,
		.author-social-links i,
		.comment-author a,
		.comment-metadata a,
		.widget li:before
		{
			color: ' . esc_attr( $second_color ) . ';
		}

		.main-navigation ul ul, .search-form .search-field, .entry-header, footer .tag-list a, footer .share-block, .comment-reply-title, .comments-title, .widget-title, .tagcloud a, .widget_search .search-field, .page_search .search-field, .main-menu-container, .related-posts h4, .page-numbers  {
			border-color: ' . esc_attr( $second_color ) . ';
		}
		.sub-menu:before {
			border-color: transparent transparent ' . esc_attr( $second_color ) . ' transparent;
		}
		.header-menu .sub-menu:before {
			border-color: transparent transparent ' . esc_attr( $blocks_color ) . ' transparent;
		}
		.header-menu ul ul{
			border-color: ' . esc_attr( $second_color ) . ';
		}

		.header-menu .sub-menu,.main-menu-container, .main-navigation ul li:hover > ul, .navigation.post-navigation, .hentry, .page-header, .single-post-footer, #respond, .comments-list-area, .no-comments, .widget, .paging-navigation, .related-posts, .page-numbers {
			background: ' . esc_attr( $blocks_color ) . ';
		}

		/* Border Radius*/

		.main-navigation .menu > li > .sub-menu,
		.main-navigation .menu > li > .sub-menu > li:last-child a:hover,
		.main-navigation .menu > li > .sub-menu .sub-menu> li:last-child a:hover
		{	
			border-radius: 0 0 ' . esc_attr( $border ) . 'px ' . esc_attr( $border ) . 'px;
		}
		.featured-img {
			border-radius: ' . esc_attr( $border ) . 'px ' . esc_attr( $border ) . 'px 0 0;
		}
		@media screen and (min-width: 767px) {
			.cat-classic article .post-img img {
				border-radius: ' . esc_attr( $border ) . 'px  0 0 ' . esc_attr( $border ) . 'px;
			}
		}

		.header-menu .sub-menu, .navigation.post-navigation, .hentry, .page-header, .single-post-footer, #respond, .comments-list-area, .no-comments, .widget, .tagcloud a, footer .tag-list a, .paging-navigation, .related-posts, .page-numbers, .widget_mystem_recent_entries .widget-img img {
			-webkit-border-radius: ' . esc_attr( $border ) . 'px;
			border-radius: ' . esc_attr( $border ) . 'px;
			
		}

		blockquote {
			border-color: ' . esc_attr( $second_color ) . ';
		}			
		.main-navigation .menu li > a:after, 
		.main-navigation .menu li li > a:after, 
		.main-navigation a:hover,
		.paging-navigation i, 
		.page-title span, 
		.author-social-links i:hover, 
		.comment-reply-link, 
		.tagcloud a,
		.alert-bar .alert-message .fa:first-child,
		.entry-meta,		
		a,
		.entry-header a:hover,
		.comment-reply-link:hover,
		.widget:hover .widget-title:before,
		.product-title:hover,
		.view-details:hover,
		.navigation.post-navigation .far,
		.header-menu .sub-menu a:hover
		{
			color: ' . esc_attr( $color ) . ';
		}
		footer .tag-list a:hover, .tagcloud a:hover,
		input[type="submit"],
		input[type="submit"]:hover,
		input[type="button"],
		input[type="button"]:hover,
		.more-link,
		.bypostauthor .comment-author
		{
			background:' . esc_attr( $color ) . ';
		}
		.widget_search .search-field, .page_search .search-field, .search-form .search-field {
			border-radius: ' . esc_attr( $border ) . 'px;
		}
		.search-form .search-submit, .widget_search .search-submit, .page_search .search-submit {
			border-radius:0 ' . esc_attr( $border ) . 'px ' . esc_attr( $border ) . 'px 0;
		}
		@media screen and (max-width: 768px) {
			.main-navigation .menu a:hover {
				background: ' . esc_attr( $color ) . ';
			}
		}';
		$css = trim( preg_replace( '~\s+~s', ' ', $css ) );

		return $css;

}


	/** ===============
 * Add Customizer UI styles to the <head> only on Customizer page
 */
function mystem_customizer_styles() {
	?>
	<style type="text/css">	
		<?php mystem_color_scheme_css(); ?>
	</style>
<?php
}
add_action( 'customize_controls_print_styles', 'mystem_customizer_styles' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mystem_customize_preview_js() {
	wp_enqueue_script( 'mystem_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'mystem_customize_preview_js' );

/**
	* Class for control Icon Picker in Customizer.
 */
 
 if ( ! class_exists( 'WP_Customize_Control' ) ) {
		return NULL;
	}
	
class MyStem_Customizer_Icon_Picker_Control extends WP_Customize_Control {
		public $type = 'mystem-icon-picker';
		public function enqueue() {
			// font awesome stylesheet
			wp_enqueue_style( 'mystem-font-awesome', get_template_directory_uri() . '/font-awesome/css/fontawesome-all.min.css', array(), '5.0.11', 'all' );
			
			// include icon picker
			wp_enqueue_script('mystem-fonticonpicker', get_template_directory_uri() . '/inc/assets/fonticonpicker/js/fonticonpicker.min.js', array('jquery'));
					
			wp_enqueue_style('mystem-fonticonpicker', get_template_directory_uri() . '/inc/assets/fonticonpicker/css/fonticonpicker.min.css');
					
			wp_enqueue_style('mystem-fonticonpicker-darkgrey', get_template_directory_uri() . '/inc/assets/fonticonpicker/css/fonticonpicker.darkgrey.min.css');
			
			wp_enqueue_script( 'mystem-icon-picker-control', get_template_directory_uri() . '/inc/assets/js/icon-picker-control.js', array(), '', true );
		}
		public function render_content() {
			if ( empty( $this->choices ) ) {
				$icons = mystem_fontawesome_icons();
				$this->choices = $icons;
			}
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
			if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
			<select class="my-fonticon-picker-icon-control" id="<?php echo esc_attr( $this->id ); ?>">
				<?php foreach ( $this->choices as $value ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php echo selected( $this->value(), $value, false ); ?>><?php echo esc_attr( $value ); ?></option>
				<?php endforeach; ?>
			</select>
		</label>
		<?php }
	}
