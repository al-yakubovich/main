<?php
/**
 * Just Blog Theme Customizer
 * @package JustBlog
 */

/**
 * Control type.
 * @access public
 * @var string
 */
if ( ! class_exists( 'JustBlog_Customize_Static_Text_Control' ) ){
	if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
		class JustBlog_Customize_Static_Text_Control extends WP_Customize_Control {
		public $type = 'static-text';
		public function esc_html__construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		protected function render_content() {
			if ( ! empty( $this->label ) ) :
				?><span class="JustBlog-customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
			endif;
			if ( ! empty( $this->description ) ) :
				?><div class="JustBlog-description JustBlog-customize-control-description"><?php

				if( is_array( $this->description ) ) {
					echo '<p>' . implode( '</p><p>', wp_kses_post( $this->description )) . '</p>';
					
				} else {
					echo wp_kses_post( $this->description );
				}
				?>
							
			<h1><?php esc_html_e('JustBlog Pro', 'justblog') ?></h1>
			<p><?php esc_html_e('Opt in for the pro version of JustBlog and enjoy many additional features that will add more options. Here is a sample of what you will get:','justblog'); ?></p>
			<p style="font-weight: 700;"><?php esc_html_e('Pro Features:', 'justblog') ?></p>
			<ul>
				<li><?php esc_html_e('&bull; 14 Blog Styles', 'justblog')?></li>
				<li><?php esc_html_e('&bull; 17 Sidebar Positions', 'justblog')?></li>
				<li><?php esc_html_e('&bull; 4 Header Styles', 'justblog')?></li>
				<li><?php esc_html_e('&bull; Thumbnail Creation for the Blogs', 'justblog')?></li>
				<li><?php esc_html_e('&bull; Add More Google Fonts', 'justblog')?></li>
				<li><?php esc_html_e('&bull; Typography Options', 'justblog')?></li>
				<li><?php esc_html_e('&bull; Custom Archive Titles', 'justblog')?></li>
				<li><?php esc_html_e('&bull; Page Builder Ready', 'justblog')?></li>
			</ul>
			
			<p><a class="button" href="<?php echo esc_url('https://www.bloggingthemestyles.com/wordpress-themes/justblog-pro'); ?>" target="_blank"><?php esc_html_e( 'Get the Pro', 'justblog' ); ?></a></p>				
			<?php
			endif;
		}
	}
}
 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function justblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_section('background_image')->title = esc_html__( 'Background Images', 'justblog' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'justblog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'justblog_customize_partial_blogdescription',
		) );

   // SECTION - EQUABLE UPGRADE
    $wp_customize->add_section( 'justblog_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'justblog' ),
        'priority'    => 0
    ) );
	
		$wp_customize->add_setting( 'justblog_upgrade', array(
			'default' => '',
			'sanitize_callback' => '__return_false'
		) );
		
		$wp_customize->add_control( new JustBlog_Customize_Static_Text_Control( $wp_customize, 'justblog_upgrade', array(
			'label'	=> esc_html__('Get The Pro Version:','justblog'),
			'section'	=> 'justblog_upgrade',
			'description' => array('')
		) ) );	
		
// SECTION - THEME OPTIONS
	$wp_customize->add_section( 'justblog_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'justblog' ),
		'priority' => 20, 
	) );		

	// Setting group for the boxed layout
	$wp_customize->add_setting( 'justblog_boxed_layout', array(
		'default' => 'full',
		'sanitize_callback' => 'justblog_sanitize_select',
	) );  
	$wp_customize->add_control( 'justblog_boxed_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Boxed Layout', 'justblog' ),
		  'section' => 'justblog_theme_options',
		  'choices' => array(
			  'full' => esc_html__( 'Full Width', 'justblog' ),
			  'boxed1800' => esc_html__( 'Boxed 1800px Width', 'justblog' ),
			  'boxed1600' => esc_html__( 'Boxed 1600px Width', 'justblog' ),
			  'boxed1400' => esc_html__( 'Boxed 1400px Width', 'justblog' ),			 
	) ) );	
	
	
	// Setting group for blog layout
	$wp_customize->add_setting( 'justblog_blog_layout', array(
		'default' => 'blog1',
		'sanitize_callback' => 'justblog_sanitize_select',
	) );  
	$wp_customize->add_control( 'justblog_blog_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Blog Layout', 'justblog' ),
		  'section' => 'justblog_theme_options',
		  'choices' => array(	
				'blog1' => esc_html__( 'Default With Right Sidebar', 'justblog' ),	  
				'blog2' => esc_html__( 'Default With Left Sidebar', 'justblog' ),					
				'blog6' => esc_html__( 'Grid With No Sidebar', 'justblog' ),
				'blog7' => esc_html__( 'Grid With Right Sidebar', 'justblog' ),
				'blog8' => esc_html__( 'Grid With Left Sidebar', 'justblog' ),			
		) ) );	

	// Setting group for full post (single) layout  
	$wp_customize->add_setting( 'justblog_single_layout', array(
		'default' => 'single1',
		'sanitize_callback' => 'justblog_sanitize_select',
	) );  
	$wp_customize->add_control( 'justblog_single_layout', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Full Post Style', 'justblog' ),
		  'section' => 'justblog_theme_options',
		  'choices' => array(	
				'single1' => esc_html__( 'Single With Right Sidebar', 'justblog' ),	 
				'single2' => esc_html__( 'Single With Left Sidebar', 'justblog' ), 
				'single3' => esc_html__( 'Single With No Sidebars', 'justblog' ),
		) ) );	
		
	 // Use excerpts for blog posts
	  $wp_customize->add_setting( 'justblog_use_excerpt',  array(
		  'default' => 1,
		  'sanitize_callback' => 'justblog_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'justblog_use_excerpt', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Use Excerpts', 'justblog' ),
		'description' => esc_html__( 'Use excerpts for your blog post summaries or uncheck the box to use the standard Read More tag. NOTE: Some blog styles only use excerpts.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	  ) );

    // Excerpt size
    $wp_customize->add_setting( 'justblog_excerpt_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '35',
        ) );
    $wp_customize->add_control( 'justblog_excerpt_size', array(
        'type'        => 'number',
        'section'     => 'justblog_theme_options',
        'label'       => esc_html__('Excerpt Size', 'justblog'),
		'description' => esc_html__('You can change the size of your blog summary excerpts with increments of 5 words.', 'justblog'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 1,
        ),
    ) );	  

	// Use FontAwesome version 4
	$wp_customize->add_setting( 'justblog_fa4',	array(
		'default' => false,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_fa4', array(
		'type'     => 'checkbox',
		'label'    => __( 'Use FontAwesome 4', 'justblog' ),
		'description' => __( 'For compatibility reasons when using the new FontAwesome version 4 (turned off by default). You also have the option to disable both v4 and v5 if you are using a plugin for Font Awesome.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );

	// Use FontAwesome version 5
	$wp_customize->add_setting( 'justblog_fa5',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_fa5', array(
		'type'     => 'checkbox',
		'label'    => __( 'Use FontAwesome 5', 'justblog' ),
		'description' => __( 'For compatibility reasons when using the new FontAwesome version 5 (turned on by default), if you find icons are missing or look odd, you can switch to FontAwesome version 4. You also have the option to disable both v4 and v5 if you are using a plugin for Font Awesome.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );
	
	
	// Show featured label
	$wp_customize->add_setting( 'justblog_show_featured_tag',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_featured_tag', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Featured Tag', 'justblog' ),
		'description' => esc_html__( 'This lets you show the featured tag in the post meta info. Note: It does not show on the blog 13 blog style.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );

	// Show format label
	$wp_customize->add_setting( 'justblog_show_post_format',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_post_format', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Format', 'justblog' ),
		'description' => esc_html__( 'This lets you show the post format linked tag in the post meta info.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );
	
	// Show featured image captions
	$wp_customize->add_setting( 'justblog_show_featured_captions',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_featured_captions', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Featured Image Captions', 'justblog' ),
		'description' => esc_html__( 'This lets you show or hide the post summary featured image caption.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	

	
	// Show full post featured image
	$wp_customize->add_setting( 'justblog_show_single_featured',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_single_featured', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Featured Image', 'justblog' ),
		'description' => esc_html__( 'This lets you show the featured image also on the full post view.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	
	
	// Show full post footer group
	$wp_customize->add_setting( 'justblog_show_post_tags',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_post_tags', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Full Post Footer Group', 'justblog' ),
		'description' => esc_html__( 'This lets you show or hide the full post footer group that includes the tags list.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	
	
	// Show full post nav
	$wp_customize->add_setting( 'justblog_show_post_nav',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_post_nav', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Post Navigation', 'justblog' ),
		'description' => esc_html__( 'This lets you show the Next and Previous post navigation on the full post view.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	

	// Show author bio section
	$wp_customize->add_setting( 'justblog_show_author_bio',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_author_bio', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Author Bio Section', 'justblog' ),
		'description' => esc_html__( 'This lets you show the author biography info section on the full article view.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	
	
	
	// Show related posts section
	$wp_customize->add_setting( 'justblog_show_related_posts',	array(
		'default' => true,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_show_related_posts', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Related Posts Section', 'justblog' ),
		'description' => esc_html__( 'This lets you show the related posts section on the full article view.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	
			
	// Enable default thumbnails
	$wp_customize->add_setting( 'justblog_default_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_default_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Default Style Blog Thumbnails', 'justblog' ),
		'description' => esc_html__( 'This will create featured images for the blog 1 and 2 styled layouts. Size = 740x400 pixels.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	

	// Enable Grid thumbnails
	$wp_customize->add_setting( 'justblog_grid_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_grid_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Grid Style Blog Thumbnails', 'justblog' ),
		'description' => esc_html__( 'This will create featured images for the grid styled layouts. Size = 660x350 pixels.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );	

	// Enable related post thumbnails
	$wp_customize->add_setting( 'justblog_related_post_thumbnails',	array(
		'default' => false,
		'sanitize_callback' => 'justblog_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'justblog_related_post_thumbnails', array(
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Enable Related Post Thumbnail Creation', 'justblog' ),
		'description' => esc_html__( 'When enabled, a custom thumbnail will be created for the related posts sections on the full post view. (Images will be 210x150 pixels.', 'justblog' ),
		'section'  => 'justblog_theme_options',
	) );		
		
	// Related Posts
   $wp_customize->add_setting('justblog_related_posts', array(
      'default' => 'categories',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'justblog_sanitize_select'
   ));

   $wp_customize->add_control('justblog_related_posts', array(
      'type' => 'radio',
      'label' => esc_html__('Related Posts Displayed From:', 'justblog'),
      'section' => 'justblog_theme_options',
      'settings' => 'justblog_related_posts',
      'choices' => array(
         'categories' => esc_html__('Related Posts By Categories', 'justblog'),
         'tags' => esc_html__('Related Posts By Tags', 'justblog')
      )
   ));
   
	// Copyright
	$wp_customize->add_setting( 'justblog_copyright', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'justblog_copyright', array(
		'settings' => 'justblog_copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'justblog' ),
		'section'  => 'justblog_theme_options',		
		'type'     => 'text',
	) ); 		

// ADD TO SITE IDENTITY
// Site Title Colour
 	$wp_customize->add_setting( 'justblog_sitetitle', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_sitetitle', array(
		'label'   => esc_html__( 'Site Title Colour', 'justblog' ),
		'section' => 'title_tagline',
		'settings'   => 'justblog_sitetitle',
	) ) );
	
// Site Title tagline
 	$wp_customize->add_setting( 'justblog_site_tagline', array(
		'default'        => '#989898',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_site_tagline', array(
		'label'   => esc_html__( 'Site Tagline Colour', 'justblog' ),
		'section' => 'title_tagline',
		'settings'   => 'justblog_site_tagline',
	) ) );	
	
	
// ADD TO COLOUR SECTION	
// curve header background
 	$wp_customize->add_setting( 'justblog_curve_header_bg', array(
		'default'        => '#c9b04c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_curve_header_bg', array(
		'label'   => esc_html__( 'Header Curve Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_curve_header_bg',
	) ) );	
// curve mask over the header
 	$wp_customize->add_setting( 'justblog_curve_mask', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_curve_mask', array(
		'label'   => esc_html__( 'Header Curve Colour', 'justblog' ),
		'description'   => esc_html__( 'This will colour the curve area, but should only be changed if you need it to match the main content area background colour - if changed.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_curve_mask',
	) ) );	
	
// content area
 	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => esc_html__( 'Main Content Area Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'content_bg',
	) ) );	

// main content top borders
 	$wp_customize->add_setting( 'justblog_content_top_borders', array(
		'default'        => '#dedede',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_content_top_borders', array(
		'label'   => esc_html__( 'Main Content Top Borders', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_content_top_borders',
	) ) );	

// site footer copyright background
 	$wp_customize->add_setting( 'justblog_copyright_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_copyright_bg', array(
		'label'   => esc_html__( 'Copyright Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_copyright_bg',
	) ) );	
	
// site footer copyright text
 	$wp_customize->add_setting( 'justblog_copyright_text', array(
		'default'        => '#c1c1c1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_copyright_text', array(
		'label'   => esc_html__( 'Copyright Area Text', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_copyright_text',
	) ) );		
	
// content text colour
 	$wp_customize->add_setting( 'justblog_body_text', array(
		'default'        => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_body_text', array(
		'label'   => esc_html__( 'Main Content Text Colour', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_body_text',
	) ) );	

// headings
 	$wp_customize->add_setting( 'justblog_headings', array(
		'default'        => '#484848',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_headings', array(
		'label'   => esc_html__( 'Headings Colour', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_headings',
	) ) );	

// meta info
 	$wp_customize->add_setting( 'justblog_meta', array(
		'default'        => '#989898',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_meta', array(
		'label'   => esc_html__( 'Post Meta Info Colour', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_meta',
	) ) );	

// featured label background
 	$wp_customize->add_setting( 'justblog_featured_bg', array(
		'default'        => '#484848',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_featured_bg', array(
		'label'   => esc_html__( 'Post Featured Label Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_featured_bg',
	) ) );	

// featured label
 	$wp_customize->add_setting( 'justblog_featured_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_featured_label', array(
		'label'   => esc_html__( 'Post Featured Label', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_featured_label',
	) ) );	
	
// Alternating blog background
 	$wp_customize->add_setting( 'justblog_alternate_blog_bg', array(
		'default'        => '#f5f5f5',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_alternate_blog_bg', array(
		'label'   => esc_html__( 'Alternating Blog Style Background', 'justblog' ),
		'description'   => esc_html__( 'This is for the Alternating blog style background.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_alternate_blog_bg',
	) ) );	
	
// footer sidebar background
 	$wp_customize->add_setting( 'justblog_footer_sidebar_bg', array(
		'default'        => '#a6966f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_footer_sidebar_bg', array(
		'label'   => esc_html__( 'Footer Sidebar Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_footer_sidebar_bg',
	) ) );

// footer sidebar text
 	$wp_customize->add_setting( 'justblog_footer_sidebar_text', array(
		'default'        => '#f2efea',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_footer_sidebar_text', array(
		'label'   => esc_html__( 'Footer Sidebar Text', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_footer_sidebar_text',
	) ) );

// top social background
 	$wp_customize->add_setting( 'justblog_social_bg', array(
		'default'        => '#ab9641',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_social_bg', array(
		'label'   => esc_html__( 'Top Social Icon Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_social_bg',
	) ) );

// top social icon
 	$wp_customize->add_setting( 'justblog_social_icon', array(
		'default'        => '#fff8db',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_social_icon', array(
		'label'   => esc_html__( 'Top Social Icon', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_social_icon',
	) ) );

// links
 	$wp_customize->add_setting( 'justblog_links', array(
		'default'        => '#c0a127',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_links', array(
		'label'   => esc_html__( 'Link Colour', 'justblog' ),
		'description'   => esc_html__( 'This also colours the hover state of Left Sidebar and Right Sidebar list based links as well.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_links',
	) ) );

// link visit
 	$wp_customize->add_setting( 'justblog_vlinks', array(
		'default'        => '#a98e22',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_vlinks', array(
		'label'   => esc_html__( 'Link Visited Colour', 'justblog' ),
		'description'   => esc_html__( 'This shows your visitors that they have already clicked on a link.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_vlinks',
	) ) );

// tags background
 	$wp_customize->add_setting( 'justblog_tags_bg', array(
		'default'        => '#c9b04c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_tags_bg', array(
		'label'   => esc_html__( 'Widget Tags Background Colour', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_tags_bg',
	) ) );

// tags text
 	$wp_customize->add_setting( 'justblog_tags_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_tags_text', array(
		'label'   => esc_html__( 'Widget Tags Text Colour', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_tags_text',
	) ) );
	
// entry tags background
 	$wp_customize->add_setting( 'justblog_entry_tags_bg', array(
		'default'        => '#909090',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_entry_tags_bg', array(
		'label'   => esc_html__( 'Post Entry Tags Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_entry_tags_bg',
	) ) );

// entry tags text
 	$wp_customize->add_setting( 'justblog_entry_tags_text', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_entry_tags_text', array(
		'label'   => esc_html__( 'Post Entry Tags Text', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_entry_tags_text',
	) ) );	
	
// comments container background
 	$wp_customize->add_setting( 'justblog_comments_container', array(
		'default'        => '#f8f8f8',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_comments_container', array(
		'label'   => esc_html__( 'Comments Container Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_comments_container',
	) ) );		
	
// widget menu 
 	$wp_customize->add_setting( 'justblog_widget_menu', array(
		'default'        => '#989898',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_widget_menu', array(
		'label'   => esc_html__( 'Widget Menu', 'justblog' ),
		'description'   => esc_html__( 'This is the colour for your Left and Right sidebar Widget Menu links.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_widget_menu',
	) ) );		

// mobile menu toggle bg
 	$wp_customize->add_setting( 'justblog_mobile_toggle_bg', array(
		'default'        => '#ab9641',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_mobile_toggle_bg', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Background', 'justblog' ),
		'description'   => esc_html__( 'This is the colour for your toggle button background.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_mobile_toggle_bg',
	) ) );	

// mobile menu toggle icon
 	$wp_customize->add_setting( 'justblog_mobile_toggle_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_mobile_toggle_icon', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Icon', 'justblog' ),
		'description'   => esc_html__( 'This is the colour for your toggle button icon.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_mobile_toggle_icon',
	) ) );	

// mobile menu background
 	$wp_customize->add_setting( 'justblog_mobile_bg', array(
		'default'        => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_mobile_bg', array(
		'label'   => esc_html__( 'Mobile Menu Toggle Icon', 'justblog' ),
		'description'   => esc_html__( 'This is the colour for your mobile menu background flyout panel.', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_mobile_bg',
	) ) );	

// mobile menu links
 	$wp_customize->add_setting( 'justblog_mobile_links', array(
		'default'        => '#c5c5c5',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_mobile_links', array(
		'label'   => esc_html__( 'Mobile Menu Links', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_mobile_links',
	) ) );	

// mobile menu hover links
 	$wp_customize->add_setting( 'justblog_mobile_hlinks', array(
		'default'        => '#bfbb9c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_mobile_hlinks', array(
		'label'   => esc_html__( 'Mobile Menu Hover Links', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_mobile_hlinks',
	) ) );	

// menu links
 	$wp_customize->add_setting( 'justblog_menu_links', array(
		'default'        => '#989793',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_menu_links', array(
		'label'   => esc_html__( 'Main Menu Links', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_menu_links',
	) ) );	

// menu hover and active links
 	$wp_customize->add_setting( 'justblog_menu_hlinks', array(
		'default'        => '#c9b04c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_menu_hlinks', array(
		'label'   => esc_html__( 'Main Menu Hover & Active Colour', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_menu_hlinks',
	) ) );


// submenu border
 	$wp_customize->add_setting( 'justblog_submenu_border', array(
		'default'        => '#f4f4f4',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_submenu_border', array(
		'label'   => esc_html__( 'Main Menu Submenu Border', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_submenu_border',
	) ) );

// submenu bottom border
 	$wp_customize->add_setting( 'justblog_submenu_bottom_border', array(
		'default'        => '#c9b04c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_submenu_bottom_border', array(
		'label'   => esc_html__( 'Main Menu Submenu Bottom Border', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_submenu_bottom_border',
	) ) );		
	
// button background
 	$wp_customize->add_setting( 'justblog_button_bg', array(
		'default'        => '#1a1a1a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_button_bg', array(
		'label'   => esc_html__( 'Button Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_button_bg',
	) ) );
// button label
 	$wp_customize->add_setting( 'justblog_button_label', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_button_label', array(
		'label'   => esc_html__( 'Button Label', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_button_label',
	) ) );
// button hover background
 	$wp_customize->add_setting( 'justblog_button_hbg', array(
		'default'        => '#1a1a1a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_button_hbg', array(
		'label'   => esc_html__( 'Button Hover Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_button_hbg',
	) ) );
// button label
 	$wp_customize->add_setting( 'justblog_button_hlabel', array(
		'default'        => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_button_hlabel', array(
		'label'   => esc_html__( 'Button Hover Label', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_button_hlabel',
	) ) );	
	
// field background
 	$wp_customize->add_setting( 'justblog_field_bg', array(
		'default'        => '#f7f7f7',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_field_bg', array(
		'label'   => esc_html__( 'Input Field Background', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_field_bg',
	) ) );	

// field border
 	$wp_customize->add_setting( 'justblog_field_border', array(
		'default'        => '#d1d1d1',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'justblog_field_border', array(
		'label'   => esc_html__( 'Input Field Border', 'justblog' ),
		'section' => 'colors',
		'settings'   => 'justblog_field_border',
	) ) );	

// ADD TO BACKGROUNDS SECTION
// page bottom background image
  	$wp_customize->add_setting( 'justblog_page_bottom_image',  array(
		'default' => esc_url(get_template_directory_uri()) . '/images/bottom-photo-default.jpg',
		'sanitize_callback' => 'esc_url_raw',
   	 ) ); 	 
	$wp_customize->add_control(  new WP_Customize_Image_Control(  $wp_customize,  'justblog_page_bottom_image',  array(
				   'label'      => esc_html__( 'Content Bottom Background Image', 'justblog' ),
				   'description'	=> esc_html__( 'This adds a background photo to the bottom of your pages.', 'justblog' ),
				   'section'    => 'background_image',
				   'settings'   => 'justblog_page_bottom_image',
			   )
		   )
	   ); 


	
		
	}
}
add_action( 'customize_register', 'justblog_customize_register' );

/**
 * SANITIZATION
 * Required for cleaning up bad inputs
 */

// Strip Slashes
	function justblog_sanitize_strip_slashes($input) {
		return wp_kses_stripslashes($input);
	}	
	
// Radio and Select	
	function justblog_sanitize_select( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	 	
// Checkbox
	function justblog_sanitize_checkbox( $input ) {
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
// Array of valid image file types
	function justblog_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}


// Adds sanitization callback function: Slider Category
function justblog_sanitize_slidecat( $input ) {

	if ( array_key_exists( $input, justblog_cats() ) ) {
		return $input;
	} else {
		return '';
	}
}

// Adds sanitization callback function: Number
function justblog_sanitize_number( $input ) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function justblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function justblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function justblog_customize_preview_js() {
	wp_enqueue_script( 'justblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'justblog_customize_preview_js' );
