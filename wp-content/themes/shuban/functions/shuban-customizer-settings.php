<?php
function shuban_register_theme_customizer( $wp_customize ) {

	// Include settings
    include( get_template_directory() . '/functions/shuban-customizer-theme.php');
    include( get_template_directory() . '/functions/shuban-customizer-featured.php');
    include( get_template_directory() . '/functions/shuban-customizer-social-media.php');

}
add_action( 'customize_register', 'shuban_register_theme_customizer' );



/**
* Sanitize
*/
function shuban_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
function shuban_sanitize_number($input) {
    if ( isset( $input ) && is_numeric( $input ) ) {
        return $input;
    }
}


/**
* Styling Customizer
*/
function shuban_customizer_css()
{
	wp_enqueue_style('shuban-customizer-css', get_stylesheet_directory_uri() . '/functions/css/customizer.css');
}
add_action('customize_controls_print_styles', 'shuban_customizer_css');



/**
* Add Category Dropdown
*/
if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Category_Dropdown extends WP_Customize_Control {

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( 'Select Category', 'shuban' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}
