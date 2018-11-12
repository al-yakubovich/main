<?php
/**
 * feather Theme Customizer.
 *
 * @package feather Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function feather_magazine_customize_register( $wp_customize ) {
    $wp_customize->add_panel( 'panel_id', array(
        'priority'       => 121,
        'capability'     => 'edit_theme_options',
        'title'          => __('Theme Design Options', 'feather-magazine'),
        'description'    => __('Theme Design Options', 'feather-magazine'),
        ) ); 

    /***************************************************/
    /*****                 Layout                 ****/
    /**************************************************/
    $wp_customize->add_section( 'feather_magazine_styling_settings', array(
        'title'      => __('All Blog Posts Settings','feather-magazine'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',

        ) );


    $wp_customize->add_section( 'feather_magazine_general_layout', array(
        'title'      => __('General Layout','feather-magazine'),
        'priority'   => 1,
        'description'    => __('Please refresh the page to view the changes you make.', 'feather-magazine'),
        'capability' => 'edit_theme_options',

        ) );


    $wp_customize->add_setting('feather_magazine_layout', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_key',
        'default'           => 'cslayout',
        ));

    /***************************************************/
    /*****               Coloring                   ****/
    /**************************************************/
    $wp_customize->add_setting( 'top_header_background_color', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_header_background_color', array(
        'label'       => __( 'Header Background Color', 'feather-magazine' ),
        'section'     => 'header_image',
        'description'    => __('Please refresh the page to view the changes you make.', 'feather-magazine'),
        'priority'   => 1,
        'settings'    => 'top_header_background_color',
        ) ) );


    $wp_customize->add_setting( 'primary_colors', array(
        'default'           => '#c69c6d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colors', array(
        'label'       => __( 'Primary Color', 'feather-magazine' ),
        'description' => __( 'Applied to header background.', 'feather-magazine' ),
        'section'     => 'feather_magazine_general_layout',
        'priority'   => 1,
        'settings'    => 'primary_colors',
        ) ) );

    $wp_customize->add_setting( 'navigation_background_color', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_background_color', array(
        'label'       => __( 'Navigation Background Color', 'feather-magazine' ),
        'section'     => 'navigation_settings',
        'priority'   => 1,
        'settings'    => 'navigation_background_color',
        ) ) );

    $wp_customize->add_setting( 'navigation_link_color', array(
        'default'           => '#333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_link_color', array(
        'label'       => __( 'Navigation Link Color', 'feather-magazine' ),
        'section'     => 'navigation_settings',
        'priority'   => 1,
        'settings'    => 'navigation_link_color',
        ) ) );


    /***************************************************/
    /*****                 Info                    ****/
    /**************************************************/



    /***************************************************/
    /*****               Sections                  ****/
    /**************************************************/
    $wp_customize->add_section( 'colors', array(
        'title'      => __('Background Color','feather-magazine'),
        'priority'   => 150,
        'capability' => 'edit_theme_options',

        ) );
    $wp_customize->add_section( 'static_front_page', array(
        'title'      => __('Static Front Page','feather-magazine'),
        'priority'   => 150,
        'capability' => 'edit_theme_options',

        ) );
    $wp_customize->add_section( 'sidebars_settings', array(
        'title'      => __('Sidebar','feather-magazine'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        ) );
    $wp_customize->add_section( 'all_blog_posts', array(
        'title'      => __('All Blog Posts','feather-magazine'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        ) );
    $wp_customize->add_section( 'feather_magazine_header_settings', array(
        'title'      => __('Header','feather-magazine'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',

        ) );
    $wp_customize->add_section( 'navigation_settings', array(
        'title'      => __('Navigation Settings','feather-magazine'),
        'priority'   => 50,
        'description'    => __('Please refresh the page to view the changes you make.', 'feather-magazine'),
        'capability' => 'edit_theme_options',
        ) );


    /***************************************************/
    /*****               pagination                ****/
    /**************************************************/
    $wp_customize->add_section( 'feather_magazine_pagination_settings', array(
        'title'      => __('Pagination Type','feather-magazine'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',

        ) );

    $wp_customize->add_setting( 'feather_magazine_pagination_type', array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'priority'   => 1,
        'sanitize_callback' => 'sanitize_key',
        ));


    /***************************************************/
    /*****               Footer                     ****/
    /**************************************************/
    $wp_customize->add_section( 'feather_magazine_footer_settings', array(
        'title'      => __('Footer','feather-magazine'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',

        ) );



    $wp_customize->get_setting( 'blogname' )->transport                              = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport                       = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport                      = 'postMessage';
    $wp_customize->get_section('header_image')->title = __( 'Header', 'feather-magazine' );
    $wp_customize->get_control( 'background_color'  )->section   = 'feather_magazine_general_layout';
    $wp_customize->get_control( 'header_textcolor'  )->section   = 'header_image';

}
add_action( 'customize_register', 'feather_magazine_customize_register' );
if(! function_exists('feather_magazine_color_output' ) ):
    function feather_magazine_color_output(){
        ?>
        <style type="text/css">
        .total-comments span:after, span.sticky-post, .nav-previous a:hover, .nav-next a:hover, #commentform input#submit, #searchform input[type='submit'], .home_menu_item, .currenttext, .pagination a:hover, .readMore a, .feathermagazine-subscribe input[type='submit'], .pagination .current, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-product-search input[type="submit"], .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, #sidebars h3.widget-title:after, .postauthor h4:after, .related-posts h3:after, .archive .postsby span:after, .comment-respond h4:after { background-color: <?php echo esc_attr(get_theme_mod( 'primary_colors')); ?>; }
        #tabber .inside li .meta b,footer .widget li a:hover,.fn a,.reply a,#tabber .inside li div.info .entry-title a:hover, #navigation ul ul a:hover,.single_post a, a:hover, .sidebar.c-4-12 .textwidget a, #site-footer .textwidget a, #commentform a, #tabber .inside li a, .copyrights a:hover, a, .sidebar.c-4-12 a:hover, .top a:hover, footer .tagcloud a:hover,.sticky-text{ color: <?php echo esc_attr(get_theme_mod( 'primary_colors')); ?>; }
        .corner { border-color: transparent transparent <?php echo esc_attr(get_theme_mod( 'primary_colors')); ?>; transparent;}
        #navigation ul li.current-menu-item a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, .pagination .current, .tagcloud a { border-color: <?php echo esc_attr(get_theme_mod( 'primary_colors')); ?>; }
        #site-header { background-color: <?php echo esc_attr(get_theme_mod( 'top_header_background_color')); ?> !important; }
        .primary-navigation, #navigation ul ul li, #navigation.mobile-menu-wrapper { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
        a#pull, #navigation .menu a, #navigation .menu a:hover, #navigation .menu .fa > a, #navigation .menu .fa > a, #navigation .toggle-caret { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?> }
        #sidebars .widget h3, #sidebars .widget h3 a, #sidebars h3 { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
        #sidebars .widget a, #sidebars a, #sidebars li a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
        #sidebars .widget, #sidebars, #sidebars .widget li { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
        .post.excerpt .post-content, .pagination a, .pagination2, .pagination .dots { color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_text')); ?>; }
        .post.excerpt h2.title a { color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_headline')); ?>; }
        .pagination a, .pagination2, .pagination .dots { border-color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_text')); ?>; }
        span.entry-meta{ color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_date')); ?>; }
        .article h1, .article h2, .article h3, .article h4, .article h5, .article h6, .total-comments, .article th{ color: <?php echo esc_attr(get_theme_mod( 'post_page_headline')); ?>; }
        .article, .article p, .related-posts .title, .breadcrumb, .article #commentform textarea  { color: <?php echo esc_attr(get_theme_mod( 'post_page_text')); ?>; }
        .article a, .breadcrumb a, #commentform a { color: <?php echo esc_attr(get_theme_mod( 'post_page_link')); ?>; }
        #commentform input#submit, #commentform input#submit:hover{ background: <?php echo esc_attr(get_theme_mod( 'post_page_link')); ?>; }
        .post-date-feather, .comment time { color: <?php echo esc_attr(get_theme_mod( 'post_page_date')); ?>; }
        .footer-widgets #searchform input[type='submit'],  .footer-widgets #searchform input[type='submit']:hover{ background: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
        .footer-widgets h3:after{ background: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
        .footer-widgets h3{ color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
        .footer-widgets .widget li, .footer-widgets .widget, #copyright-note{ color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
        footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover{ color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
        </style>
        <?php }
        add_action( 'wp_head', 'feather_magazine_color_output' );
        endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function feather_magazine_customize_preview_js() {
	wp_enqueue_script( 'feather_magazine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'feather_magazine_customize_preview_js' );
