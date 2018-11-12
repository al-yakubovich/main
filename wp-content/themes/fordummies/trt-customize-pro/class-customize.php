<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Example_1_Customize {

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

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'fordummies_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new fordummies_Customize_Section_Pro(
				$manager,
				'guide',
				array(
					'title'    => esc_html__( 'Online Guide', 'fordummies' ),
					'pro_text' => esc_html__( 'Go',         'fordummies' ),
					'pro_url'  => 'http://themefordummies.com/help/'
				)
			)
		);
        
        
     
  		// Register custom section types.
	    //	$manager->register_section_type( 'Example_1_Customize_Section_Pro' );

		// Register sections.       
        
        
        // Report new plugin installed...
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
    
    
        $all_plugins = get_plugins();
    
        $all_plugins_keys = array_keys($all_plugins);
        if (count($all_plugins) < 1)
            return false;
    
    
       // Slider Revolution
       // Shortcodes Ultimate: Extra Shortcodes
    
        $loopCtr = 0;
        $ctd = 0;
        foreach ($all_plugins as $plugin_item) {
            if ($plugin_item['Name'] == 'Slider Revolution'  )
              $ctd++;
            if ($plugin_item['Name'] == 'Shortcodes Ultimate: Extra Shortcodes'  )
              $ctd++;
              
            $loopCtr++;
        }


      if($ctd < 2)
      {
    		// Register sections.
    		$manager->add_section(
    			new fordummies_Customize_Section_Pro(
    				$manager,
    				'pro',
				array(
					'title'    => esc_html__( 'Pro Version', 'fordummies' ),
					'pro_text' => esc_html__( 'Go',         'fordummies' ),
					'pro_url'  => 'http://themefordummies.com/premium/'
				)
    			)
    		);
      }  

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'fordummies-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'fordummies-customize-controls', trailingslashit( get_template_directory_uri() ) . 'trt-customize-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Example_1_Customize::get_instance();
