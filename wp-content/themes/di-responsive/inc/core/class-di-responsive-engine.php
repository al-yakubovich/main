<?php
/**
 * Di Responsive Engine. This file is responsible for theme setup, scripts, styles, sidebar registration.
 *
 * @package Di Responsive
 */

/**
 * Class DiResponsiveEngine.
 */
class Di_Responsive_Engine {

	/**
	 * Instance object.
	 *
	 * @var instance
	 */
	public static $instance;

	/**
	 * Get_instance method.
	 *
	 * @return instance instance of the class.
	 */
	public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Construct method.
	 */
	public function __construct() {
		$this->set_constants();
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts_and_styles_admin' ) );
		add_action( 'customize_preview_init', array( $this, 'customizer_scripts_and_styles' ) );
		add_action( 'widgets_init', array( $this, 'sidebar_registration' ) );
	}

	/**
	 *  Set constants.
	 */
	public function set_constants() {
		define( 'DI_RESPONSIVE_VERSION', wp_get_theme( 'di-responsive' )->get( 'Version' ) );
	}

	/**
	 * Theme setup.
	 */
	public function setup() {

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 730;
		}

		load_theme_textdomain( 'di-responsive', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 730, 300, true );
		add_image_size( 'di-responsive-recentpostthumb', 90, 90, true );

		// This theme uses wp_nav_menu() at two locations.
		register_nav_menus( array(
			'primary'	=> __( 'Top Main Menu', 'di-responsive' ),
			'sidebar'	=> __( 'Sidebar Menu', 'di-responsive' ),
			'topbar'	=> __( 'Top Bar Menu', 'di-responsive' ),
		) );

		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

		add_theme_support( 'post-formats', array( 'quote' ) );

		add_theme_support( 'custom-background', array(
			'default-color'      => '#fcfcfc',
			'default-attachment' => 'fixed',
		) );

		add_theme_support( 'custom-header', array(
			'width'         => 1350,
			'height'        => 260,
			'flex-width'    => true,
			'flex-height'   => true,
			'uploads'       => true,
			'header-text'	=> false,
			'default-image'	=> esc_url( get_template_directory_uri() . '/assets/images/header-image.png' ),
		) );

		add_theme_support( 'custom-logo', array(
			'height'		=> '70',
			'width'			=> '200',
			'flex-height'	=> true,
			'flex-width'	=> true,
		) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_editor_style( array( '//fonts.googleapis.com/css?family=Raleway', get_template_directory_uri() . '/assets/css/style.css', get_template_directory_uri() . '/assets/css/editor-style.css' ) );

	}

	/**
	 * Scripts_and_styles of theme.
	 */
	public function scripts_and_styles() {

		// Load bootstrap css.
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.0.0', 'all' );

		// Load font-awesome file.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0', 'all' );

		// Load default css file.
		wp_enqueue_style( 'di-responsive-style-default', get_stylesheet_uri(), array( 'bootstrap', 'font-awesome' ), DI_RESPONSIVE_VERSION, 'all' );

		// Load css/style.css file.
		wp_enqueue_style( 'di-responsive-style-core', get_template_directory_uri() . '/assets/css/style.css', array( 'bootstrap', 'font-awesome' ), DI_RESPONSIVE_VERSION, 'all' );

		// Load woo css file if WooCommerce plugin is active.
		if( class_exists( 'WooCommerce' ) ) {
			wp_enqueue_style( 'di-responsive-style-woo', get_template_directory_uri() . '/assets/css/woo.css', array( 'bootstrap', 'font-awesome' ), DI_RESPONSIVE_VERSION, 'all' );
		}

		// Load bootstrap js.
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.0.0', true );

		// Load script file.
		wp_enqueue_script( 'di-responsive-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), DI_RESPONSIVE_VERSION, true );

		// Load html5shiv.
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', array(), '3.7.3', false );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

		// Load respond js.
		wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.js', array(), DI_RESPONSIVE_VERSION, false );
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

		// load comment-reply js.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load stickymenu js depends on jquery and if enabled by customizer.
		if ( get_theme_mod( 'stickymenu_setting', '0' ) == 1 && ! is_page_template( 'template-landing-page.php' ) ) {
			wp_enqueue_script( 'di-responsive-stickymenu', get_template_directory_uri() . '/assets/js/stickymenu.js', array( 'jquery' ), '', 'true' );
		}

		// Load back to top js depends on jquery and if enabled by customizer.
		if ( get_theme_mod( 'back_to_top', '1' ) == 1 ) {
			wp_enqueue_script( 'di-responsive-backtotop', get_template_directory_uri() . '/assets/js/backtotop.js', array( 'jquery' ), DI_RESPONSIVE_VERSION, true );
		}

		// Preloader icon js depends on jquery and if enabled by customizer.
		if ( get_theme_mod( 'loading_icon', '0' ) == 1 ) {
			wp_enqueue_script( 'di-responsive-loadicon', get_template_directory_uri() . '/assets/js/loadicon.js', array( 'jquery' ), DI_RESPONSIVE_VERSION, true );
		}

		// Side bar menu js depends on jquery and if enabled by customizer and not on landing page.
		if ( get_theme_mod( 'sb_menu_onoff', '1' ) == 1 && ! is_page_template( 'template-landing-page.php' ) ) {
			wp_enqueue_script( 'di-responsive-sidebarmenu', get_template_directory_uri() . '/assets/js/sidebarmenu.js', array( 'jquery' ), DI_RESPONSIVE_VERSION, true );
		}

		// CSP Search js depends on jquery and if enabled by customizer and not on landing page.
		if ( get_theme_mod( 'top_bar_seach_icon', '1' ) == 1 && get_theme_mod( 'display_top_bar', '1' ) == 1 && ! is_page_template( 'template-landing-page.php' ) ) {
			wp_enqueue_script( 'di-responsive-csp-search', get_template_directory_uri() . '/assets/js/scpsearch.js', array( 'jquery' ), DI_RESPONSIVE_VERSION, true );
		}

		// Load cust masonry js theme code, masonry, imagesloaded IF enabled in customize.
		if ( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid2c' || get_theme_mod( 'blog_list_grid', 'list' ) == 'grid3c' ) {
			wp_enqueue_script( 'di-responsive-masonry', get_template_directory_uri() . '/assets/js/masonry.js', array( 'jquery', 'imagesloaded', 'masonry' ), DI_RESPONSIVE_VERSION, true );
		}
	}

	/**
	 * Scripts and styles for admin side.
	 */
	public function scripts_and_styles_admin() {
		wp_enqueue_script( 'di-responsive-admin-page-metabox-control', get_template_directory_uri() . '/assets/js/admin-page-meta-box-control.js', array( 'jquery' ), DI_RESPONSIVE_VERSION, true );
	}

	/**
	 * [customizer_scripts_and_styles description]
	 * @return [type] [description]
	 */
	public function customizer_scripts_and_styles() {

		wp_enqueue_style( 'di-responsive-customize-preview', get_template_directory_uri() . '/assets/css/customizer.css', array( 'customize-preview' ), DI_RESPONSIVE_VERSION, 'all' );

		wp_enqueue_script( 'di-responsive-customize-preview', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), DI_RESPONSIVE_VERSION, true );

	}

	/**
	 * Sidebar_registration.
	 */
	public function sidebar_registration() {
		register_sidebar( array(
			'name'			=> __( 'Blog Sidebar', 'di-responsive' ),
			'id'			=> 'sidebar-1',
			'description'	=> __( 'Widgets for Blog sidebar. If you are using Full Width Layout in customize, then this sidebar will not display.', 'di-responsive' ),
			'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="right-widget-title">',
			'after_title'	=> '</h3>',
		) );

		register_sidebar( array(
			'name'			=> __( 'Page Sidebar', 'di-responsive' ),
			'id'			=> 'sidebar_page',
			'description'	=> __( 'Widgets for Page sidebar. Choose Sidebar Template to display it. Page edit screen > Page Attributes > Template.', 'di-responsive' ),
			'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="right-widget-title">',
			'after_title'	=> '</h3>',
		) );

		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'			=> __( 'Woocommerce Sidebar', 'di-responsive' ),
				'id'			=> 'sidebar_woo',
				'description'	=> __( 'Widgets for Woocommerce Pages (For:- Product Loop, Product Search and Product Single Page). If you are using Full Width Layout in customize, then this sidebar will not display.', 'di-responsive' ),
				'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h3 class="right-widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		// Footer widget register base on settings.
		$enordis = absint( get_theme_mod( 'endis_ftr_wdgt', '0' ) );
		$layout = absint( get_theme_mod( 'ftr_wdget_lyot', '3' ) );
		if ( $enordis != 0 ) {
			if ( $layout == 48 || $layout == 84 ) {
				register_sidebar( array(
					'name'			=> __( 'Footer Widget 1', 'di-responsive' ),
					'id'			=> 'footer_1',
					'description'	=> __( 'Widgets for footer 1', 'di-responsive' ),
					'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h3 class="widgets_footer_title">',
					'after_title'	=> '</h3>',
				) );

				register_sidebar( array(
					'name'			=> __( 'Footer Widget 2', 'di-responsive' ),
					'id'			=> 'footer_2',
					'description'	=> __( 'Widgets for footer 2', 'di-responsive' ),
					'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h3 class="widgets_footer_title">',
					'after_title'	=> '</h3>',
				) );
			} else {
				for ( $i = 1; $i <= $layout; $i++ ) {
					register_sidebar( array(
						'name'			=> __( 'Footer Widget ', 'di-responsive' ) . $i,
						'id'			=> 'footer_' . $i,
						'description'	=> __( 'Widgets for footer ', 'di-responsive' ) . $i,
						'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
						'after_widget'	=> '</div>',
						'before_title'	=> '<h3 class="widgets_footer_title">',
						'after_title'	=> '</h3>',
					) );
				}
			}
		}
	}
}
Di_Responsive_Engine::get_instance();
