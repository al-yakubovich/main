<?php
/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @package Ribosome
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

// Enqueue Javascript postMessage handlers for the Customizer.
add_action( 'customize_preview_init', 'ribosome_customize_preview_js' );
function ribosome_customize_preview_js() {
	wp_enqueue_script( 'ribosome-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}

/**
 * Sanitize functions.
 */
function ribosome_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function ribosome_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}

function ribosome_sanitize_sidebar_position( $input ) {
	$valid = array(
		'izquierda' => 'Left',
		'derecha'   => 'Right',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ribosome_sanitize_fonts( $input ) {
	$valid = array(
		'Open Sans'     => 'Open Sans',
		'Alegreya Sans' => 'Alegreya Sans',
		'Arimo'         => 'Arimo',
		'Asap'          => 'Asap',
		'Bitter'        => 'Bitter',
		'Cabin'         => 'Cabin',
		'Cuprum'        => 'Cuprum',
		'Dosis'         => 'Dosis',
		'Droid Serif'   => 'Droid Serif',
		'Exo'           => 'Exo',
		'Exo 2'         => 'Exo 2',
		'Fira Sans'     => 'Fira Sans',
		'Istok Web'     => 'Istok Web',
		'Josefin Sans'  => 'Josefin Sans',
		'Josefin Slab'  => 'Josefin Slab',
		'Raleway'       => 'Raleway',
		'Titillium Web' => 'Titillium Web',
		'Ubuntu'        => 'Ubuntu',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

function ribosome_sanitize_theme_color( $input ) {
	$valid = array(
		'#00BCD5' => 'Blue',
		'#0073AA' => 'Blue WP',
		'#DD9933' => 'Golden',
		'#82A31D' => 'Green',
		'#FA4C00' => 'Orange',
		'#F882B3' => 'Pink',
		'#7B0099' => 'Purple',
		'#BA0000' => 'Red',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**-------------------------------
 * Ribosome Customizer
 * --------------------------------*/

add_action( 'customize_register', 'ribosome_theme_customizer' );
function ribosome_theme_customizer( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * PANEL CONFIGURACION GENERAL
	 * * Secciones: Identidad del sitio, Colores, Fuentes, Barra superior, Imagen de fondo
	 */

	$wp_customize->add_panel( 'panel_configuracion_general', array(
		'title'    => __( 'General settings', 'ribosome' ),
		'priority' => '9',
	));

	/**
	 * Site identity
	 */

	$wp_customize->add_section( 'title_tagline', array(
		'panel'    => 'panel_configuracion_general',
		'title'    => __( 'Site Identity', 'ribosome' ),
		'priority' => 10,
	));

	/**
	 * Colors
	 */

	$wp_customize->add_section( 'colors', array(
		'panel'    => 'panel_configuracion_general',
		'title'    => __( 'Colors', 'ribosome' ),
		'priority' => 11,
	));

	// Color de tema.
	$wp_customize->add_setting( 'ribosome_color_tema', array(
		'default'           => '#00BCD5',
		'sanitize_callback' => 'ribosome_sanitize_theme_color',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ribosome_color_tema',
			array(
				'label'    => __( 'Theme color', 'ribosome' ),
				'section'  => 'colors',
				'settings' => 'ribosome_color_tema',
				'type'     => 'select',
				'priority' => '1',
				'choices'  => array(
					'#00BCD5' => __( 'Blue', 'ribosome' ),
					'#0073AA' => __( 'Blue WP', 'ribosome' ),
					'#DD9933' => __( 'Golden', 'ribosome' ),
					'#82A31D' => __( 'Green', 'ribosome' ),
					'#FA4C00' => __( 'Orange', 'ribosome' ),
					'#F882B3' => __( 'Pink', 'ribosome' ),
					'#7B0099' => __( 'Purple', 'ribosome' ),
					'#BA0000' => __( 'Red', 'ribosome' ),
				),
			)
		)
	);

	// Color top bar.
	$wp_customize->add_setting( 'ribosome_color_top_bar', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control( 'ribosome_color_top_bar', array(
		'type'        => 'checkbox',
		'label'       => __( 'Apply to top bar', 'ribosome' ),
		'section'     => 'colors',
		'description' => __( '(Uncheck: Black)', 'ribosome' ),
		'priority'    => '2',
	));

	// Color título de post en extractos.
	$wp_customize->add_setting('ribosome_color_excerpt_title', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control( 'ribosome_color_excerpt_title', array(
		'type'     => 'checkbox',
		'label'    => __( 'Apply to entry title in excerpts', 'ribosome' ),
		'section'  => 'colors',
		'priority' => '2',
	));

	// Border izquierdo extractos.
	$wp_customize->add_setting( 'ribosome_color_excerpt_border', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_color_excerpt_border', array(
		'type'     => 'checkbox',
		'label'    => __( 'Apply to the left border of extracts', 'ribosome' ),
		'section'  => 'colors',
		'priority' => '3',
	));

	// Color título de widgets.
	$wp_customize->add_setting('ribosome_color_widget_title', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_color_widget_title', array(
		'type'        => 'checkbox',
		'label'       => __( 'Apply to widget title', 'ribosome' ),
		'section'     => 'colors',
		'description' => __( '(Uncheck: Light gray)', 'ribosome' ),
		'priority'    => '3',
	));

	// Color de fondo de encabezado blanco.
	$wp_customize->add_setting('ribosome_color_header_sin_imagen', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control( 'ribosome_color_header_sin_imagen', array(
		'type'        => 'checkbox',
		'label'       => __( 'Apply to the header when there is no image', 'ribosome' ),
		'section'     => 'colors',
		'description' => __( '(Uncheck: White)', 'ribosome' ),
		'priority'    => '6',
	));

	/**
	 * Fuentes
	 */

	$wp_customize->add_section('ribosome_fonts', array(
		'panel'    => 'panel_configuracion_general',
		'title'    => __( 'Fonts', 'ribosome' ),
		'priority' => 12,
	));

	$wp_customize->add_setting( 'ribosome_fonts', array(
		'default'           => 'Open Sans',
		'sanitize_callback' => 'ribosome_sanitize_fonts',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ribosome_fonts',
			array(
				'label'    => __( 'Select font', 'ribosome' ),
				'section'  => 'ribosome_fonts',
				'settings' => 'ribosome_fonts',
				'type'     => 'select',
				'choices'  => array(
					'Open Sans'     => 'Open Sans',
					'Alegreya Sans' => 'Alegreya Sans',
					'Arimo'         => 'Arimo',
					'Asap'          => 'Asap',
					'Bitter'        => 'Bitter',
					'Cabin'         => 'Cabin',
					'Cuprum'        => 'Cuprum',
					'Dosis'         => 'Dosis',
					'Droid Serif'   => 'Droid Serif',
					'Exo'           => 'Exo',
					'Exo 2'         => 'Exo 2',
					'Fira Sans'     => 'Fira Sans',
					'Istok Web'     => 'Istok Web',
					'Josefin Sans'  => 'Josefin Sans',
					'Josefin Slab'  => 'Josefin Slab',
					'Raleway'       => 'Raleway',
					'Titillium Web' => 'Titillium Web',
					'Ubuntu'        => 'Ubuntu',
				),
			)
		)
	);

	/**
	 * Background image
	 */

	$wp_customize->add_section( 'background_image', array(
		'panel'    => 'panel_configuracion_general',
		'title'    => __( 'Background Image', 'ribosome' ),
		'priority' => 14,
	));

	/**
	 * PANEL CABECERA
	 * * Secciones: Top bar, Imagen de cabecera, Main menu
	 */

	$wp_customize->add_panel( 'panel_cabecera', array(
		'title'    => __( 'Header', 'ribosome' ),
		'priority' => '10',
	));

	/**
	 * Top bar
	 */

	$wp_customize->add_section( 'ribosome_top_bar', array(
		'panel'       => 'panel_cabecera',
		'title'       => __( 'Top bar and social icons', 'ribosome' ),
		'description' => __( '(Leave blank text boxes to not display icons)', 'ribosome' ),
		'priority'    => 10,
	));

	// Display top bar.
	$wp_customize->add_setting( 'ribosome_display_top_bar', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_display_top_bar', array(
		'type'    => 'checkbox',
		'label'   => __( 'Display top bar', 'ribosome' ),
		'section' => 'ribosome_top_bar',
	));

	// Blog title.
	$wp_customize->add_setting('ribosome_blog_title_top_bar', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_blog_title_top_bar', array(
		'type'    => 'checkbox',
		'label'   => __( 'Display blog title in top bar', 'ribosome' ),
		'section' => 'ribosome_top_bar',
	));

	// Palabra MENU.
	$wp_customize->add_setting('ribosome_mostrar_menu_junto_icono', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_mostrar_menu_junto_icono', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show the word menu next to the icon menu on mobile devices.', 'ribosome' ),
		'section' => 'ribosome_top_bar',
	));

	// Social icons.
	$wp_customize->add_setting('ribosome_twitter_url', array(
		'default'           => 'https://twitter.com/',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control('ribosome_twitter_url', array(
		'label'   => __( 'Twitter URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting('ribosome_facebook_url', array(
		'default'           => 'https://facebook.com/',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control('ribosome_facebook_url', array(
		'label'   => __( 'Facebook URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting('ribosome_googleplus_url', array(
		'default'           => 'https://plus.google.com/',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control('ribosome_googleplus_url', array(
		'label'   => __( 'Google Plus URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting('ribosome_linkedin_url', array(
		'default'           => 'https://linkedin.com',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control('ribosome_linkedin_url', array(
		'label'   => __( 'LinkedIn URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting('ribosome_youtube_url', array(
		'default'           => 'https://youtube.com',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control('ribosome_youtube_url', array(
		'label'   => __( 'YouTube URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting( 'ribosome_instagram_url', array(
		'default'           => 'http://instagram.com',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control( 'ribosome_instagram_url', array(
		'label'   => __( 'Instagram URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting('ribosome_pinterest_url', array(
		'default'           => 'https://pinterest.com',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control( 'ribosome_pinterest_url', array(
		'label'   => __( 'Pinterest URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting('ribosome_whatsapp_url', array(
		'default'           => 'https://www.whatsapp.com',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control( 'ribosome_whatsapp_url', array(
		'label'   => __( 'WhatsApp URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	$wp_customize->add_setting( 'ribosome_rss_url', array(
		'default'           => 'http://wordpress.org/',
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control( 'ribosome_rss_url', array(
		'label'   => __( 'RSS URL', 'ribosome' ),
		'section' => 'ribosome_top_bar',
		'type'    => 'text',
	));

	/**
	 * Header image
	 */

	$wp_customize->add_section( 'header_image', array(
		'panel'    => 'panel_cabecera',
		'title'    => __( 'Header Image', 'ribosome' ),
		'priority' => '11',
	));

	// Imagen de cabecera es un logo.
	$wp_customize->add_setting('ribosome_logo_active', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_logo_active', array(
		'type'        => 'checkbox',
		'label'       => __( 'Header image is a logo', 'ribosome' ),
		'section'     => 'header_image',
		'description' => __( '(You must have this option checked to apply the following)', 'ribosome' ),
		'priority'    => 11,
	));

	$wp_customize->add_setting('ribosome_logo_margins', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_logo_margins', array(
		'type'     => 'checkbox',
		'label'    => __( 'Apply logo margins', 'ribosome' ),
		'section'  => 'header_image',
		'priority' => 12,
	));

	// Centrar logo.
	$wp_customize->add_setting('ribosome_logo_center', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_logo_center', array(
		'type'     => 'checkbox',
		'label'    => __( 'Center logo', 'ribosome' ),
		'section'  => 'header_image',
		'priority' => 13,
	));

	// Cabecera blanca con logo.
	$wp_customize->add_setting('ribosome_white_header_with_logo', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_white_header_with_logo', array(
		'type'        => 'checkbox',
		'label'       => __( 'With logo, white background', 'ribosome' ),
		'description' => __( '(Uncheck: Theme color)', 'ribosome' ),
		'section'     => 'header_image',
		'priority'    => 14,
	));

	/**
	 * Main menu
	 */
	$wp_customize->add_section('menu_principal', array(
		'panel'    => 'panel_cabecera',
		'title'    => __( 'Main Menu', 'ribosome' ),
		'priority' => '12',
	));

	// Fondo de menu negro.
	$wp_customize->add_setting('ribosome_fondo_menu_negro', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control( 'ribosome_fondo_menu_negro', array(
		'type'        => 'checkbox',
		'label'       => __( 'Black menu', 'ribosome' ),
		'section'     => 'menu_principal',
		'description' => __( '(Uncheck: Light gray)', 'ribosome' ),
	));

	// Linea de color sobre menu.
	$wp_customize->add_setting('ribosome_linea_color_sobre_menu', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_linea_color_sobre_menu', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show line above the menu', 'ribosome' ),
		'section' => 'menu_principal',
	));

	// Centrar menu.
	$wp_customize->add_setting('ribosome_menu_center', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_menu_center', array(
		'type'    => 'checkbox',
		'label'   => __( 'Center menu', 'ribosome' ),
		'section' => 'menu_principal',
	));

	/**
	 * PANEL CONTENIDO
	 * * Secciones: Sidebar, Entradas
	 */

	$wp_customize->add_panel( 'panel_contenido', array(
		'title'    => __( 'Content', 'ribosome' ),
		'priority' => '12',
	));

	/**
	 * Sidebar
	 */

	$wp_customize->add_section('ribosome_sidebar', array(
		'panel'    => 'panel_contenido',
		'title'    => __( 'Sidebar', 'ribosome' ),
	));

	// Sidebar.
	$wp_customize->add_setting( 'ribosome_sidebar_position', array(
		'default'           => 'derecha',
		'sanitize_callback' => 'ribosome_sanitize_sidebar_position',
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ribosome_sidebar_position',
			array(
				'label'    => __( 'Select sidebar position', 'ribosome' ),
				'section'  => 'ribosome_sidebar',
				'settings' => 'ribosome_sidebar_position',
				'type'     => 'radio',
				'choices'  => array(
					'izquierda' => __( 'Left', 'ribosome' ),
					'derecha'   => __( 'Right', 'ribosome' ),
				),
			)
		)
	);

	/**
	 * Entradas
	 */

	$wp_customize->add_section('ribosome_entradas', array(
		'panel'    => 'panel_contenido',
		'title'    => __( 'Posts', 'ribosome' ),
	));

	$wp_customize->add_setting( 'ribosome_contenido_completo_entradas_pp', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_contenido_completo_entradas_pp', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show full content of the entries in the main page.', 'ribosome' ),
		'section' => 'ribosome_entradas',
	));

	$wp_customize->add_setting('ribosome_featured_image_below_title', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_featured_image_below_title', array(
		'type'        => 'checkbox',
		'label'       => __( 'Show featured image below post titles.', 'ribosome' ),
		'section'     => 'ribosome_entradas',
		'description' => __( '(Single posts and main page with full posts)', 'ribosome' ),
	));

	$wp_customize->add_setting( 'ribosome_thumbnail_rounded', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_thumbnail_rounded', array(
		'type'    => 'checkbox',
		'label'   => __( "Excerpt's thumbnail image rounded", 'ribosome' ),
		'section' => 'ribosome_entradas',
	));

	$wp_customize->add_setting( 'ribosome_show_meta_in_excerpts', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control( 'ribosome_show_meta_in_excerpts', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show metadata in excerpts (Author, date and number of comments)', 'ribosome' ),
		'section' => 'ribosome_entradas',
	));

	$wp_customize->add_setting( 'ribosome_text_justify', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_text_justify', array(
		'type'    => 'checkbox',
		'label'   => __( 'Entry text justified', 'ribosome' ),
		'section' => 'ribosome_entradas',
	));

	$wp_customize->add_setting('ribosome_related_posts', array(
		'default'           => '',
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_related_posts', array(
		'type'    => 'checkbox',
		'label'   => __( 'Display related posts at the end of entries', 'ribosome' ),
		'section' => 'ribosome_entradas',
	));

	$wp_customize->add_setting( 'ribosome_show_nav_single', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_show_nav_single', array(
		'type'    => 'checkbox',
		'label'   => __( 'Show navigation at the end of posts (links to previous and next posts)', 'ribosome' ),
		'section' => 'ribosome_entradas',
	));

	$wp_customize->add_setting( 'ribosome_boton_ir_arriba', array(
		'default'           => 1,
		'sanitize_callback' => 'ribosome_sanitize_checkbox',
	));
	$wp_customize->add_control('ribosome_boton_ir_arriba', array(
		'type'    => 'checkbox',
		'label'   => __( "Display 'Back to top' button", 'ribosome' ),
		'section' => 'ribosome_entradas',
	));

	/**
	 * PANEL PIE
	 * * Secciones: Textos del pie
	 */

	$wp_customize->add_panel('panel_pie', array(
		'title'    => __( 'Footer', 'ribosome' ),
		'priority' => '13',
	));

	/**
	 * Textos del pie
	 */
	$wp_customize->add_section('ribosome_textos_pie', array(
		'panel'    => 'panel_pie',
		'title'    => __( 'Footer text', 'ribosome' ),
		'priority' => 10,
	));

	$wp_customize->add_setting( 'ribosome_footer_text_left', array(
		'default'           => __( 'Copyright 2015', 'ribosome' ),
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control('ribosome_footer_text_left', array(
		'type'    => 'textarea',
		'label'   => __( 'Footer text left', 'ribosome' ),
		'section' => 'ribosome_textos_pie',
	));

	$wp_customize->add_setting( 'ribosome_footer_text_center', array(
		'default'           => __( 'Footer text center', 'ribosome' ),
		'sanitize_callback' => 'ribosome_sanitize_text',
	));
	$wp_customize->add_control( 'ribosome_footer_text_center', array(
		'type'    => 'textarea',
		'label'   => __( 'Footer text center', 'ribosome' ),
		'section' => 'ribosome_textos_pie',
	));

}
