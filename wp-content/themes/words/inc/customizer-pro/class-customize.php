<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Words_Customize {

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
		require_once get_template_directory() . '/inc/customizer-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Words_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Words_Customize_Section_Pro(
				$manager,
				'words',
				array(
					'title'    => esc_html__( 'For WordPress Resources', 'words' ),
					'pro_text' => esc_html__( 'Click Here',  'words' ),
					'pro_url'  => 'https://www.wpentire.com/',
					'priority' => 0
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		require_once get_template_directory() . '/inc/customizer-pro/section-pro.php';


		wp_enqueue_script( 'words-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'words-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customizer-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Words_Customize::get_instance();


if ( ! class_exists( 'Words_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Words_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About Words', 'words')?></h2>
			<p><?php esc_html_e('Words is simple, clean and elegant WordPress Theme for your blog site.', 'words')?> </p>
			<p>
				<a href="<?php echo esc_url('http://demo.paragonthemes.com/words/'); ?>" target="_blank"><?php esc_html_e( 'Words Demo', 'words' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'words')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'words')?> </p>
			<p>
				<a href="<?php echo esc_url('http://doc.paragonthemes.com/words/'); ?>" target="_blank"><?php esc_html_e( 'Words Documentation', 'words' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'words')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'words')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://paragonthemes.com/supports/'); ?>" target="_blank"><?php esc_html_e( 'Words Support', 'words' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'words' ); ?></h3>
			<p><?php esc_html_e('If you like Words Kindly Rate this Theme', 'words')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/words/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'words' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}
