<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 09/02/17
 * Time: 9:44 PM
 */

add_action( 'customize_register', 'pagespeed_customize_footer', 600 );
function pagespeed_customize_footer( $wp_customize ) {

	$wp_customize->add_section( 'footer', array(
		'title'    => __( 'Footer', 'page-speed' ),
		'priority' => 30,
		'panel'=>'theme_options'
	) );


	$wp_customize->add_setting( 'copyright_text', array(
		'sanitize_callback' => 'helium_meta',
		'default'           => __('Copyright', 'page-speed' ).' &copy; ' . date_i18n(__('Y','page-speed')) . ' ' . '<a href="' . esc_url( home_url() ) . '"
						                          rel="home">' . get_bloginfo( "name" ) . '</a>',

	) );

	$wp_customize->add_control( 'copyright_text', array(
		'label'   => __( 'Copyright text', 'page-speed' ),
		'section' => 'footer',
		'type'    => 'textarea',

	) );


	$wp_customize->add_setting( 'remove_footer_credit_link', array(
		'sanitize_callback' => 'helium_boolean',
		'default'           => true,
	) );

	$wp_customize->add_control( 'remove_footer_credit_link', array(
		'label'       => __( 'Remove credit link', 'page-speed' ),
		'description' => __( 'Consider making a donation :-). ', 'page-speed' ) . '<br><br><a href="https://paypal.me/swiftthemes"  target="_blank" style="background: rgb(53,217,89);font-weight:bold;font-style:normal;color:#fff;padding:5px 8px;border-radius: 3px">paypal.me/swiftthemes</a>',
		'section'     => 'footer',
		'type'        => 'checkbox',

	) );



}
