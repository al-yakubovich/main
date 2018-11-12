<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Gist_Customize {

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
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Gist_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Gist_Customize_Section_Pro(
				$manager,
				'gist',
				array(
					'title'    => esc_html__( 'Premium Verison', 'gist' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',  'gist' ),
					'pro_url'  => 'https://www.templatesell.com/item/gistpro/',
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
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';


		wp_enqueue_script( 'gist-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'gist-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.css' );
	}
}
// Doing this customizer thang!
Gist_Customize::get_instance();

if ( ! class_exists( 'Gist_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Gist_Customize_Static_Text_Control extends WP_Customize_Control {
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
			
			<h2><?php esc_html_e('About Gist', 'gist')?></h2>
			<p><?php esc_html_e('Gist is clean and minimal WordPress theme for blog website.', 'gist')?> </p>
			<p>
				<a href="<?php echo esc_url('http://demo.candidthemes.com/gist/'); ?>" target="_blank"><?php esc_html_e( 'Gist Demo', 'gist' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'gist')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'gist')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.candidthemes.com/gist/'); ?>" target="_blank"><?php esc_html_e( 'Gist Documentation', 'gist' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'gist')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'gist')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://www.candidthemes.com/supports/'); ?>" target="_blank"><?php esc_html_e( 'Gist Support', 'gist' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'gist' ); ?></h3>
			<p><?php esc_html_e('If you like gist Kindly Rate this Theme', 'gist')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/gist/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'gist' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}
