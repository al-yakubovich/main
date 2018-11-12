<?php
/**
 ************************************************************************************************************************
 * Backdrop Core - functions-layouts.php
 ************************************************************************************************************************
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

 /**
 ************************************************************************************************************************
 * namespace define
 ************************************************************************************************************************
 */
namespace Benlumia007\Backdrop\ThemeLayout;

/**
 ************************************************************************************************************************
 * Table of Content
 ************************************************************************************************************************
 *  1.0 - Customize (Theme Layout (Class))
 *  2.0 - Customize (Theme Layout ($wp_customize))
 *  3.0 - Customize (Theme Layout (Validation))
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Customize (Theme Layout (Class))
 ************************************************************************************************************************
 */
function theme_layout_selector_class() {
    class Control_Radio_Image extends \WP_Customize_Control {
        public $type = 'radio-image';
        
        public function enqueue() {
            wp_enqueue_script( 'backdrop-customize-controls', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/dist/js/control-radio-image.js' ), array( 'jquery' ), '10012018', true );
            wp_enqueue_style( 'backdrop-customize-controls', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/dist/css/control-radio-image.css'), '10012018', true );
        }
        
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
			</span>
			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
						<label for="<?php echo esc_attr( $this->id . $value ); ?>">
							<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id . $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php esc_attr( $this->link() ); checked( $this->value(), esc_attr( $value ) ); ?>>
							<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<?php
		}
    }
}
add_action( 'customize_register', __NAMESPACE__ . "\\theme_layout_selector_class" );

/**
 ************************************************************************************************************************
 *  2.0 - Customize (Theme Layout ($wp_customize))
 ************************************************************************************************************************
 */
function theme_layout_selector( $wp_customize ) {
    $wp_customize->add_panel( 'general_layouts', array(
        'title'     => esc_html__( 'General Layouts', 'backdrop' ),
        'priority'  => 10,
    ));
     
    $wp_customize->add_section( 'global_layout', array(
        'title'     => esc_html__( 'General Layout', 'backdrop' ),
        'panel'     => 'general_layouts',
        'priority'  => 5,
    ));
    
    $wp_customize->add_setting( 'global_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'Benlumia007\Backdrop\ThemeLayout\sanitize_layouts',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control( new Control_Radio_Image( $wp_customize, 'global_layout', array(
        'label'         => esc_html__( 'General Layout', 'backdrop' ),
        'description'   => esc_html__( 'General Layout applies to all layouts that supports in this theme.', 'backdrop' ),
        'section'       => 'global_layout',
        'settings'      => 'global_layout',
        'type'          => 'radio-image',
        'choices'       => array(
			'left-sidebar'  => get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/images/2cl.png' ),
            'right-sidebar' => get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/images/2cr.png' ),
			'no-sidebar'    => get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/images/1col.png' ),
        ),
    ))); 
}
add_action( 'customize_register', __NAMESPACE__ . "\\theme_layout_selector" );

/**
 ************************************************************************************************************************
 *  3.0 - Customize (Theme Layout (Validation))
 ************************************************************************************************************************
 */
function sanitize_layouts($input) {
    $choices = array(
        'left-sidebar',
        'right-sidebar',
        'no-sidebar'
    );

    if (in_array($input, $choices, true)) {
        return $input;
    } else {
        return 'left-sidebar';
    }
}