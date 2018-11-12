<?php
/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

// Enqueue Javascript postMessage handlers for the Customizer.
add_action( 'customize_preview_init', 'rubbersoul_customize_preview_js' );
function rubbersoul_customize_preview_js() {
	wp_enqueue_script( 'rubbersoul-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}

/*
 * Sanitize functions.
 */
function rubbersoul_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function rubbersoul_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function rubbersoul_sanitize_sidebar_position( $input ) {
    $valid = array(
        'izquierda' => 'Left',
        'derecha' => 'Right',
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function rubbersoul_sanitize_fonts( $input ) {
    $valid = array(
		'Open Sans' => 'Open Sans',
        'Alegreya Sans' => 'Alegreya Sans',
		'Arimo' => 'Arimo',
		'Asap' => 'Asap',
		'Bitter' => 'Bitter',
		'Cabin' => 'Cabin',
		'Dosis' => 'Dosis',
		'Droid Serif' => 'Droid Serif',
		'Exo' => 'Exo',
		'Exo 2' => 'Exo 2',
		'Raleway' => 'Raleway',
		'Titillium Web' => 'Titillium Web',
		'Ubuntu' => 'Ubuntu',
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function rubbersoul_sanitize_theme_color( $input ) {
    $valid = array(
        '#0098D3' => 'Blue',
        '#0073AA' => 'Blue WP',
		'#222222' => 'Black',
        '#82A31D' => 'Green',
		'#FD5D18' => 'Orange',
		'#F882B3' => 'Pink',
		'#7B0099' => 'Purple',
		'#BA0000' => 'Red',
		'#F8C300' => 'Yellow',
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**-------------------------------
 * rubbersoul Customizer
 --------------------------------*/

add_action('customize_register', 'rubbersoul_theme_customizer');
function rubbersoul_theme_customizer( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Quitar el control para dar color al texto de cabecera
    $wp_customize->remove_control('header_textcolor');
    // Quitar opción mostrar/ocultar texto de cabecera
    $wp_customize->remove_control('display_header_text');

    // Mostrar nombre y descripción del blog
    $wp_customize->add_setting('rubbersoul_mostrar_titulo_descripcion', array('default' => 1, 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_mostrar_titulo_descripcion', array(
            'type' => 'checkbox',
            'label' => __('Show title and description', 'rubbersoul'),
            'section' => 'title_tagline',
    		));

    // Agregar a la sección 'title_tagline' de WordPress título y descripción sin mayúsculas
    $wp_customize->add_setting('rubbersoul_titulo_descripcion_no_mayus', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_titulo_descripcion_no_mayus', array(
            'type' => 'checkbox',
            'label' => __('No change in capital title and description.', 'rubbersoul'),
            'section' => 'title_tagline',
    		));


    // Add_panel (requiere WP 4.0+)
    $wp_customize->add_panel ('rubbersoul_panel', array(
    	'title' => __('RubberSoul Options', 'rubbersoul'),
    	'priority' => '10'));

    /**
     * Logo, Color, Favicon y Sidebar
     */

    // Sección
    $wp_customize->add_section('rubbersoul_color_favicon_sidebar' , array(
    	'panel' => 'rubbersoul_panel',
    	'title' => __('Logo, Color and Sidebar','rubbersoul'),
    	'priority'    => '40',
    ));

    // Desbordar logo
    $wp_customize->add_setting('rubbersoul_desbordar_logo', array('default' => 1, 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_desbordar_logo', array(
            'type' => 'checkbox',
            'label' => __('Overflow logo', 'rubbersoul'),
            'section' => 'rubbersoul_color_favicon_sidebar',
    		));

    // Ajustar tamaño del logo
    $wp_customize->add_setting('rubbersoul_ajustar_tam_logo', array('default' => 1, 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_ajustar_tam_logo', array(
            'type' => 'checkbox',
            'label' => __('Adjust the width of the logo to 60px', 'rubbersoul'),
            'section' => 'rubbersoul_color_favicon_sidebar',
    		));

    // Mantener transparencia logo
    $wp_customize->add_setting('rubbersoul_transparencia_logo', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_transparencia_logo', array(
            'type' => 'checkbox',
            'label' => __('Maintain transparency logo', 'rubbersoul'),
            'section' => 'rubbersoul_color_favicon_sidebar',
    		));

    // Logo cuadrado
    $wp_customize->add_setting('rubbersoul_logo_cuadrado', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_logo_cuadrado', array(
            'type' => 'checkbox',
            'label' => __('Logo square', 'rubbersoul'),
            'section' => 'rubbersoul_color_favicon_sidebar',
    		));

    // Color de tema
    $wp_customize->add_setting('rubbersoul_color_tema', array('default' => '#0098D3', 'sanitize_callback' => 'rubbersoul_sanitize_theme_color' ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'rubbersoul_color_tema',
            array(
                'label'          => __( 'Select theme color', 'rubbersoul' ),
                'section'        => 'rubbersoul_color_favicon_sidebar',
                'settings'       => 'rubbersoul_color_tema',
                'type'           => 'select',
                'choices'        => array(
                    '#0098D3' => __( 'Blue','rubbersoul' ),
                    '#0073AA' => __( 'Blue WP','rubbersoul' ),
    				'#222222' => __( 'Black', 'rubbersoul'),
                    '#82A31D' => __( 'Green','rubbersoul' ),
    				'#FD5D18' => __( 'Orange','rubbersoul' ),
    				'#F882B3' => __( 'Pink','rubbersoul' ),
    				'#7B0099' => __( 'Purple', 'rubbersoul' ),
    				'#BA0000' => __( 'Red', 'rubbersoul' ),
    				'#F8C300' => __( 'Yellow', 'rubbersoul'),
                )
            )
        )
    );

    // Color título de post en extractos
    $wp_customize->add_setting('rubbersoul_color_excerpt_title', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_color_excerpt_title', array(
            'type' => 'checkbox',
            'label' => __('Apply to entry title in excerpts', 'rubbersoul'),
            'section' => 'rubbersoul_color_favicon_sidebar',
    		));

    // Color de fondo texto seleccionado
    $wp_customize->add_setting('rubbersoul_selected_text_bg_color', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_selected_text_bg_color', array(
            'type' => 'checkbox',
            'label' => __('Apply to the background color of the selected text.', 'rubbersoul'),
            'section' => 'rubbersoul_color_favicon_sidebar',
    		));

    // Sidebar
    $wp_customize->add_setting('rubbersoul_sidebar_position', array('default' => 'derecha', 'sanitize_callback' => 'rubbersoul_sanitize_sidebar_position' ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'rubbersoul_sidebar_position',
            array(
                'label'          => __( 'Select sidebar position', 'rubbersoul' ),
                'section'        => 'rubbersoul_color_favicon_sidebar',
                'settings'       => 'rubbersoul_sidebar_position',
                'type'           => 'radio',
                'choices'        => array(
                    'izquierda'   => __( 'Left','rubbersoul' ),
                    'derecha'  => __( 'Right','rubbersoul' ),
                )
            )
        )
    );

    /**
     * Fuentes
     */

    $wp_customize->add_section('rubbersoul_fonts' , array(
    	'panel' => 'rubbersoul_panel',
    	'title' => __('Fonts', 'rubbersoul'),
    	'priority'    => 41,
    ));
    $wp_customize->add_setting('rubbersoul_fonts', array('default' => 'Open Sans', 'sanitize_callback' => 'rubbersoul_sanitize_fonts' ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'rubbersoul_fonts',
            array(
                'label'          => __( 'Select font', 'rubbersoul' ),
                'section'        => 'rubbersoul_fonts',
                'settings'       => 'rubbersoul_fonts',
                'type'           => 'select',
                'choices'        => array(
                    'Open Sans' => 'Open Sans',
                    'Alegreya Sans' => 'Alegreya Sans',
    				'Arimo' => 'Arimo',
    				'Asap' => 'Asap',
    				'Bitter' => 'Bitter',
    				'Cabin' => 'Cabin',
    				'Dosis' => 'Dosis',
    				'Droid Serif' => 'Droid Serif',
    				'Exo' => 'Exo',
    				'Exo 2' => 'Exo 2',
    				'Raleway' => 'Raleway',
    				'Titillium Web' => 'Titillium Web',
    				'Ubuntu' => 'Ubuntu',
                )
            )
        )
    );

    /**
     * Posts and footer
     */

    $wp_customize->add_section('rubbersoul_post_and_footer' , array(
    	'panel' => 'rubbersoul_panel',
    	'title' => __('Posts and footer text', 'rubbersoul'),
    	'priority' => 42,
    ));

    $wp_customize->add_setting('rubbersoul_entrada_completa_en_home', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_entrada_completa_en_home', array(
            'type' => 'checkbox',
            'label' => __("Show full posts on homepage.", 'rubbersoul'),
            'section' => 'rubbersoul_post_and_footer',
    		));

    $wp_customize->add_setting('rubbersoul_thumbnail_rounded', array('default' => 1, 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_thumbnail_rounded', array(
            'type' => 'checkbox',
            'label' => __("Excerpt's thumbnail image rounded", 'rubbersoul'),
            'section' => 'rubbersoul_post_and_footer',
    		));

    $wp_customize->add_setting('rubbersoul_text_justify', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_text_justify', array(
            'type' => 'checkbox',
            'label' => __('Entry text justified', 'rubbersoul'),
            'section' => 'rubbersoul_post_and_footer',
    		));

    $wp_customize->add_setting('rubbersoul_related_posts', array('default' => '', 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_related_posts', array(
            'type' => 'checkbox',
            'label' => __('Display related posts at the end of entries', 'rubbersoul'),
            'section' => 'rubbersoul_post_and_footer',
    		));

    $wp_customize->add_setting('rubbersoul_boton_ir_arriba', array('default' => 1, 'sanitize_callback' => 'rubbersoul_sanitize_checkbox',));
    $wp_customize->add_control('rubbersoul_boton_ir_arriba', array(
            'type' => 'checkbox',
            'label' => __("Display 'Back to top' button", 'rubbersoul'),
            'section' => 'rubbersoul_post_and_footer',
    		));

    $wp_customize->add_setting('rubbersoul_footer_text_left', array('default' => __('Copyright 2015', 'rubbersoul'), 'sanitize_callback' => 'rubbersoul_sanitize_text',));
    $wp_customize->add_control('rubbersoul_footer_text_left', array(
            'type' => 'textarea',
            'label' => __('Footer text left', 'rubbersoul'),
            'section' => 'rubbersoul_post_and_footer',
    		));

    $wp_customize->add_setting('rubbersoul_footer_text_center', array('default' => __('Footer text center', 'rubbersoul'), 'sanitize_callback' => 'rubbersoul_sanitize_text',));
    $wp_customize->add_control('rubbersoul_footer_text_center', array(
            'type' => 'textarea',
            'label' => __('Footer text center', 'rubbersoul'),
            'section' => 'rubbersoul_post_and_footer',
    		));

    /**
     * Social Icons
     */

    $wp_customize->add_section('rubbersoul_social_icons' , array(
    	'panel' => 'rubbersoul_panel',
    	'title' => __('Social icons','rubbersoul'),
    	'priority'    => 43,
    ));

    // Social icons
    $wp_customize->add_setting('rubbersoul_twitter_url', array('default' => 'https://twitter.com/', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_twitter_url', array(
            'label' => __('Twitter URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

    $wp_customize->add_setting('rubbersoul_facebook_url', array('default' => 'https://facebook.com/', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_facebook_url', array(
            'label' => __('Facebook URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

    $wp_customize->add_setting('rubbersoul_googleplus_url', array('default' => 'https://plus.google.com/', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_googleplus_url', array(
            'label' => __('Google Plus URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

    $wp_customize->add_setting('rubbersoul_linkedin_url', array('default' => 'https://linkedin.com', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_linkedin_url', array(
            'label' => __('LinkedIn URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

    $wp_customize->add_setting('rubbersoul_youtube_url', array('default' => 'https://youtube.com', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_youtube_url', array(
            'label' => __('YouTube URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

    $wp_customize->add_setting('rubbersoul_instagram_url', array('default' => 'http://instagram.com', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_instagram_url', array(
            'label' => __('Instagram URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

    $wp_customize->add_setting('rubbersoul_pinterest_url', array('default' => 'https://pinterest.com', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_pinterest_url', array(
            'label' => __('Pinterest URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

    $wp_customize->add_setting('rubbersoul_rss_url', array('default' => 'http://wordpress.org/', 'sanitize_callback' => 'rubbersoul_sanitize_text'));
    $wp_customize->add_control('rubbersoul_rss_url', array(
            'label' => __('RSS URL', 'rubbersoul'),
            'section' => 'rubbersoul_social_icons',
            'type' => 'text',
        ));

}
