<?php
/**
 * Theme Info Page
 * Special thanks to the Consulting theme by ThinkUpThemes for this info page to be used as a foundation.
 * @package JustBlog
 */
 
function justblog_info() {    


	// About page instance
	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme

		$theme_name    = trim( ucwords( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
		$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
		$theme_version = $theme_data->get( 'Version' );

	$config = array(
		// translators: %1$s: menu title under appearance
		'menu_name'             => sprintf( esc_html__( 'About %1$s', 'justblog' ), ucfirst( $theme_name ) ),
		// translators: %1$s: page name 
		'page_name'             => sprintf( esc_html__( 'About %1$s', 'justblog' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome title 
		'welcome_title'         => sprintf( esc_html__( 'Welcome to %1$s - v', 'justblog' ), ucfirst( $theme_name ) ),
		// translators: %1$s: welcome content 
		'welcome_content'       => sprintf( esc_html__(  '%1$s is a clean and minimal blog theme that is perfect for bloggers who need to focus on writing articles and giving your readers a feeling of pleasure without too many distractions. JustBlog is the perfect personal blog theme that mixes classic and modern style for a unique design that incorporates a responsive curved header. This theme is a perfect choice for you if you want a simple easy to use theme.', 'justblog' ), ucfirst( $theme_name ) ),
		
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'             => array(
			'upgrade_url'     => '//www.bloggingthemestyles.com/wordpress-themes/justblog-pro',
			'price_discount'  => esc_html__( 'Get the Pro for 25% off', 'justblog' ),
			'price_normal'	  => esc_html__( 'Save 25% off the JustBlog Pro regular price of $59. Offer EXPIRES Soon! Use the above coupon code at checkout.', 'justblog' ),
			'coupon'	      => 'JBPRO25',
			'button'	      => esc_html__( 'Get the Pro', 'justblog' ),
		),
		
		'tabs'                 => array(
			'getting_started'  => esc_html__( 'Getting Started', 'justblog' ),
			'support_content'  => esc_html__( 'Support', 'justblog' ),
			'theme_review'  => esc_html__( 'Reviews', 'justblog' ),
			'changelog'           => esc_html__( 'Changelog', 'justblog' ),
			'free_pro'         => esc_html__( 'Free VS PRO', 'justblog' ),
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Documentation', 'justblog' ),
				'text'                => sprintf( esc_html__( 'To help you get started with the initial setup of this theme and to learn about the various features, you can check out detailed setup documentation.', 'justblog' ) ),
				// translators: %1$s: theme name 
				'button_label'        => sprintf( esc_html__( 'View %1$s Tutorials', 'justblog' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//www.bloggingthemestyles.com/setup-justblog' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Go to Customizer', 'justblog' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'justblog' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'justblog' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			
			'third' => array(
				'title'               => esc_html__( 'Using a Child Theme', 'justblog' ),
				'text'                => sprintf( esc_html__( 'If you plan to customize this theme, I recommend looking into using a child theme. To learn more about child themes and why it\'s important to use one, check out the WordPress documentation.', 'justblog' ) ),
				'button_label'        => sprintf( esc_html__( 'Child Themes', 'justblog' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//developer.wordpress.org/themes/advanced-topics/child-themes/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),		
		),

		// Changelog content tab.
		'changelog'      => array(
			'first' => array (				
				'title'        => esc_html__( 'Changelog', 'justblog' ),
				'text'         => esc_html__( 'I generally recommend you always read the CHANGELOG before updating so that you can see what was fixed, changed, deleted, or added to the theme.', 'justblog' ),	
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,				
				),
		),			
		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title'        => esc_html__( 'Free Support', 'justblog' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'Get free support by signing up for the Free Theme Membership (it\'s free) and you can then login and submit a support ticket.', 'justblog' ),
				'button_label' => esc_html__( 'Get Free Support', 'justblog' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/justblog' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Common Problems', 'justblog' ),
				'icon'         => 'dashicons dashicons-editor-help',
				'text'         => esc_html__( 'For quick answers to the most common problems, you can check out the tutorials which can provide instant solutions and answers.', 'justblog' ),
				'button_label' => sprintf( esc_html__( 'Get Answers', 'justblog' ) ),
				'button_link'  => '//www.bloggingthemestyles.com/support/common-problems',
				'is_button'    => true,
				'is_new_tab'   => true,
			),

		),
		// Review content tab.
		'theme_review'      => array(
			'first' => array (
				'title'        => esc_html__( 'Theme Review', 'justblog' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'We would love to request a 5-star rating from you! Visit the the theme review page and at the bottom, add your star rating. If you plan to switch to a different theme, please contact us and let us know why and what can we do to make immediate changes to improve the theme. If you run into any problems, request support and we will be happy to help you out.', 'justblog' ),
				'button_label' => esc_html__( 'Add Your Star Rating', 'justblog' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/justblog/reviews' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
		),		
		// Free vs pro array.
		'free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => esc_html__('JustBlog Pro','justblog' ),
			'pro_theme_link'      => '//www.bloggingthemestyles.com/wordpress-themes/justblog-pro/',
			'get_pro_theme_label' => sprintf( esc_html__( 'Get JustBlog Pro', 'justblog' ) ),
			'features'            => array(
				array(
					'title'            => esc_html__( 'Mobile Friendly', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Unlimited Colours', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Boxed Layouts', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				
				array(
					'title'            => esc_html__( 'Background Image', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Built-In Social Buttons', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Show or Hide Elements', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Custom Error Page', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),		
				
				array(
					'title'            => esc_html__( 'Blog Styles', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '5',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '14',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Sidebar Positions', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '15',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '17',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Page Templates', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '4',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '4',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Custom Page Bottom Images', 'justblog' ),
					'description'      => esc_html__('Add a background photo to the bottom of your content area page.', 'justblog'),
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => esc_html__( 'Font Awesome (New version 5) Icons', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Recent Posts Widget with Thumbnails', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Related Posts with Thumbnails', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Featured Image Captions for Posts', 'justblog' ),
					'description'      => esc_html__('Enhance your post featured images with captions', 'justblog'),
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Theme Options', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Advanced',
					'hidden'           => '',
				),		
				array(
					'title'            => esc_html__( 'Support', 'justblog' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Premium',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Header Options', 'justblog' ),
					'description'      => esc_html__('4 Header styles for the Pro version', 'justblog'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => esc_html__( 'Custom Blog Title &amp; Introduction', 'justblog' ),
					'description'      => esc_html__('WordPress does not have this, but we have added a customizable blog title and intro option.', 'justblog'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => esc_html__( 'Blog Thumbnail Creation', 'justblog' ),
					'description'      => esc_html__('Automatically have post featured images cropped when uploading.', 'justblog'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),									
							
				array(
					'title'            => esc_html__( 'Add Google Fonts', 'justblog' ),
					'description'      => esc_html__('Add up to 2 more Google Fonts.', 'justblog'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => esc_html__( 'Typography Options', 'justblog' ),
					'description'      => esc_html__('Change the font for your main text and headings, and more.', 'justblog'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),						
				array(
					'title'            => esc_html__( 'Customized Archive Titles', 'justblog' ),
					'description'      => esc_html__('We customized the style of archive titles for tags, categories, etc.', 'justblog'),
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
		
				
			),
		),
	);
	justblog_info_page::init( $config );

}

add_action('after_setup_theme', 'justblog_info');

?>