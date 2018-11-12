<?php

if ( ! class_exists( 'ActionsContent_Options' ) ) {

	/**
	 * Main ButterBean class.  Runs the show.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	final class ActionsContent_Options {

		/**
		 * Sets up initial actions.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function setup_actions() {

			// Register managers, sections, settings, and controls.
			// I'm separating these out into their own methods so that the code
			// is cleaner and easier to follow.  This is just an example, so feel
			// free to experiment.
			add_action( 'actionsmb_register', array( $this, 'register_managers' ), 10, 2 );
			add_action( 'actionsmb_register', array( $this, 'register_sections' ), 10, 2 );
			add_action( 'actionsmb_register', array( $this, 'register_settings' ), 10, 2 );
			add_action( 'actionsmb_register', array( $this, 'register_controls' ), 10, 2 );
		}

		/**
		 * Registers managers.  In this example, we're registering a single manager.
		 * A manager is essentially our "tabbed meta box".  It needs to have
		 * sections and controls added to it.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $actionsmb  Instance of the `ButterBean` object.
		 * @param  string  $post_type
		 * @return void
		 */
		public function register_managers( $actionsmb, $post_type ) {
			
			$actionsmb->register_manager(
				'actions_control',
				array(
					'label'     => esc_html__( 'Actions Content Controls', 'actions' ),
					'post_type' => array( 'post', 'page', 'elementor_library' ),
					'context'   => 'normal',
					'priority'  => 'high'
				)
			);
		}

		/**
		 * Registers sections.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $actionsmb  Instance of the `ActionsMB` object.
		 * @param  string  $post_type
		 * @return void
		 */
		public function register_sections( $actionsmb, $post_type ) {
			
			// Gets the manager object we want to add sections to.
			$manager = $actionsmb->get_manager( 'actions_control' );

			$manager->register_section(
				'actions_welcome',
				array(
					'label' => esc_html__( 'How It Works', 'actions' ),
					'icon'  => 'dashicons-welcome-learn-more'
				)
			);
			
			$manager->register_section(
				'actions_show_hide',
				array(
					'label' => esc_html__( 'Show/Hide Sections', 'actions' ),
					'description' => __( '<strong>These options are not needed if using the page builder blank canvas!</strong><br /><br />', 'actions' ),
					'icon'  => 'dashicons-admin-generic'
				)
			);

			$manager->register_section(
				'actions_content_layout',
				array(
					'label' => esc_html__( 'Content Layout', 'actions' ),
					'icon'  => 'dashicons-admin-appearance'
				)
			);
			
			$manager->register_section(
				'actions_builder_options',
				array(
					'label' => esc_html__( 'Page Builder Options', 'actions' ),
					'icon'  => 'dashicons-admin-page'
				)
			);
		}

		/**
		 * Registers settings.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $actionsmb  Instance of the `ActionsMB` object.
		 * @param  string  $post_type
		 * @return void
		 */
		public function register_settings( $actionsmb, $post_type ) {
			
			// Gets the manager object we want to add settings to.
			$manager = $actionsmb->get_manager( 'actions_control' );

			// Welcome Section.
			$manager->register_setting(
				'_actions_welcome',
				array( 'sanitize_callback' => 'sanitize_key' )
			);
			
			// Checkbox setting.
			$manager->register_setting(
				'_actions_site_header',
				array( 'sanitize_callback' => 'actionsmb_validate_boolean' )
			);
			
			// Checkbox setting.
			$manager->register_setting(
				'_actions_site_menu',
				array( 'sanitize_callback' => 'actionsmb_validate_boolean' )
			);
			
			// Checkbox setting.
			$manager->register_setting(
				'_actions_page_title',
				array( 'sanitize_callback' => 'actionsmb_validate_boolean' )
			);

			// Checkbox setting.
			$manager->register_setting(
				'_actions_site_footer',
				array( 'sanitize_callback' => 'actionsmb_validate_boolean' )
			);

			// Radio image.
			$manager->register_setting(
				'_actions_layout_options',
				array( 'sanitize_callback' => 'sanitize_key', 'default' => 'content-sidebar' )
			);
			
			// Checkbox setting.
			$manager->register_setting(
				'_actions_fullwidth_content',
				array( 'sanitize_callback' => 'actionsmb_validate_boolean' )
			);
			
			// Radio.
			$manager->register_setting(
				'_actions_builder_options',
				array( 'sanitize_callback' => 'sanitize_key', 'default' => 'default' )
			);
		}

		/**
		 * Registers controls.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $actionsmb  Instance of the `ButterBean` object.
		 * @param  string  $post_type
		 * @return void
		 */
		public function register_controls( $actionsmb, $post_type ) {
			
			// Gets the manager object we want to add controls to.
			$manager = $actionsmb->get_manager( 'actions_control' );

			// Just showing text here.
			$text = __( '
				<hr />
				<p><strong>Show/Hide Section: </strong>
				provides you with the options to show or hide a page section. Example: To hide the page title simply check that box and save your page.
				<br /></p>
				<hr />
				<p><strong>Content Layout: </strong>
				This section gives you the option to select how the page content appears i.e. content with sidebar or without with options for sidebar right or left.
				<br /></p>
				<hr />
				<p><strong>Page Builder Options: </strong>
				is where you can set you options for that full width content look i.e. edge to edge - set it to default width for that landing page look and feel.
				<br /></p>
				<hr />
				<p><strong>More Info Coming Soon!</strong></p>
			', 'actions' );
			
			$manager->register_control(
				'_actions_welcome',
				array(
					'type'        => 'radio-image',
					'section'     => 'actions_welcome',
					'label'       => esc_html__( 'Basic instructions', 'actions' ),
					'description' => $text,
					'choices' => array(
						'welcome' => array(
						'url'   => ''
						)
					)
				)
			);
			
			// Single boolean checkbox.
			$manager->register_control(
				'_actions_site_header',
				array(
					'type'        => 'checkbox',
					'section'     => 'actions_show_hide',
					'label'       => esc_html__( 'Remove Site header', 'actions' ),
					'description' => esc_html__( 'Control weather to show or hide the site header on this page/post. Does not apply to page builder blank.', 'actions' )
				)
			);
			
			// Single boolean checkbox.
			$manager->register_control(
				'_actions_site_menu',
				array(
					'type'        => 'checkbox',
					'section'     => 'actions_show_hide',
					'label'       => esc_html__( 'Remove Site Menu', 'actions' ),
					'description' => esc_html__( 'Control weather to show or hide the site menu on this page/post. Does not apply to page builder blank.', 'actions' )
				)
			);
			
			// Single boolean checkbox.
			$manager->register_control(
				'_actions_page_title',
				array(
					'type'        => 'checkbox',
					'section'     => 'actions_show_hide',
					'label'       => esc_html__( 'Remove Page Title', 'actions' ),
					'description' => esc_html__( 'Control weather to show or hide the title for this page/post. Does not apply to page builder blank.', 'actions' )
				)
			);
			
			// Single boolean checkbox.
			$manager->register_control(
				'_actions_site_footer',
				array(
					'type'        => 'checkbox',
					'section'     => 'actions_show_hide',
					'label'       => esc_html__( 'Remove Site Footer', 'actions' ),
					'description' => esc_html__( 'Control weather to show or hide the footer for this page/post. Does not apply to page builder blank.', 'actions' )
				)
			);			

			// Radio image control.

			$uri = trailingslashit( get_stylesheet_directory_uri() );

			$manager->register_control(
				'_actions_layout_options',
				array(
					'type'        => 'radio-image',
					'section'     => 'actions_content_layout',
					'label'       => esc_html__( 'Content Layout', 'actions' ),
					'description' => esc_html__( 'Select a content layout for your page. By default the fullwidth is set to 70% and centered which is ideal for creating landing pages.', 'actions' ),
					'choices' => array(
						'content-sidebar' => array(
							'url'   => $uri . 'assets/layouts/cs.gif',
							'label' => esc_html__( 'Content/Sidebar', 'actions' )
						),
						'sidebar-content' => array(
							'url'   => $uri . 'assets/layouts/sc.gif',
							'label' => esc_html__( 'Sidebar/Content', 'actions' )
						),
						'content' => array(
							'url'   => $uri . 'assets/layouts/c.gif',
							'label' => esc_html__( 'Content/Fullwidth', 'actions' )
						)
					)
				)
			);
			
			// Single boolean checkbox.
			$manager->register_control(
				'_actions_fullwidth_content',
				array(
					'type'        => 'checkbox',
					'section'     => 'actions_content_layout',
					'label'       => esc_html__( '100% Fullwidth', 'actions' ),
					'description' => esc_html__( 'Set the content fullwidth to 100%. Edge to edge fullwidth only applies to page builder pages.', 'actions' )
				)
			);
			
			$manager->register_control(
				'_actions_builder_options',
				array(
					'type'        => 'radio',
					'section'     => 'actions_builder_options',
					'label'       => esc_html__( 'Page Builder', 'actions' ),
					'description' => esc_html__( 'Choose to render page with header and footer or a completely blank canvas i.e. no header, menu and footer.', 'actions' ),
					'choices'     => array(
						'default'         	=> esc_html__( 'Default page width - select this option for narrow landing pages!', 'actions' ),
						'builder-standard' 	=> esc_html__( 'Builder Standard - select this to retain the header, menu and footer', 'actions' ),
						'builder-blank' 	=> esc_html__( 'Builder Blank Canvas - select this for total content control', 'actions' )
					)
				)
			);
			
		}

		/**
		 * Sanitize function for integers.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  int     $value
		 * @return int|string
		 */
		public function sanitize_absint( $value ) {

			return $value && is_numeric( $value ) ? absint( $value ) : '';
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {

			static $instance = null;

			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance->setup_actions();
			}

			return $instance;
		}

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function __construct() {}
	}

	ActionsContent_Options::get_instance();
}