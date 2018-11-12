<?php
/**
 * Setting global variables for all theme options db saved values
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_set_global' ) ) :

    function acmeblog_set_global() {
        /*Getting saved values start*/
        $acmeblog_saved_theme_options = acmeblog_get_theme_options();
        $GLOBALS['acmeblog_customizer_all_values'] = $acmeblog_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'acmeblog_action_before_head', 'acmeblog_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_doctype' ) ) :
    function acmeblog_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
    <?php
    }
endif;
add_action( 'acmeblog_action_before_head', 'acmeblog_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_before_wp_head' ) ) :

    function acmeblog_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11')?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;
add_action( 'acmeblog_action_before_wp_head', 'acmeblog_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_body_class' ) ) :

    function acmeblog_body_class( $acmeblogbody_classes ) {
        global $acmeblog_customizer_all_values;
        if ( 'boxed' == $acmeblog_customizer_all_values['acmeblog-default-layout'] ) {
            $acmeblogbody_classes[] = 'boxed-layout';
        }
        if ( 'no-image' == $acmeblog_customizer_all_values['acmeblog-blog-archive-layout'] ) {
            $acmeblogbody_classes[] = 'blog-no-image';
        }
	    if ( $acmeblog_customizer_all_values['acmeblog-blog-archive-layout'] == 'large-image') {
		    $acmeblogbody_classes[] = 'blog-large-image';
	    }
	    if( 1 == $acmeblog_customizer_all_values['acmeblog-enable-sticky-sidebar'] ){
		    $acmeblogbody_classes[] = 'at-sticky-sidebar';
	    }
	    if ( $acmeblog_customizer_all_values['acmeblog-single-post-layout'] == 'large-image') {
		    $acmeblogbody_classes[] = 'single-large-image';
	    }
        $acmeblogbody_classes[] = acmeblog_sidebar_selection();

        return $acmeblogbody_classes;
    }
endif;
add_action( 'body_class', 'acmeblog_body_class', 10, 1);

/**
 * Page start
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_page_start' ) ) :

    function acmeblog_page_start() {
        ?>
        <div id="page" class="hfeed site">
    <?php
    }
endif;
add_action( 'acmeblog_action_before', 'acmeblog_page_start', 15 );

/**
 * Skip to content
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_skip_to_content' ) ) :

    function acmeblog_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content" title="link"><?php esc_html_e( 'Skip to content', 'acmeblog' ); ?></a>
    <?php
    }

endif;
add_action( 'acmeblog_action_before_header', 'acmeblog_skip_to_content', 10 );

/**
 * Main header
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_header' ) ) :

    function acmeblog_header() {
        global $acmeblog_customizer_all_values;
        ?>
        <header id="masthead" class="site-header" role="banner">
            <div class="wrapper header-wrapper clearfix">
                <div class="header-container">
                    <div class="site-branding clearfix">
                        <?php
                        if ( 1 == $acmeblog_customizer_all_values['acmeblog-show-date'] ){
                            echo ' <div class="date-display acme-col-3">';
                            acmeblog_date_display();
                            echo "</div>";
                        }
                        ?>
                        <div class="site-logo acme-col-3">
                            <?php if ( 'disable' != $acmeblog_customizer_all_values['acmeblog-header-id-display-opt'] ):?>
                            <?php
                            if ( 'logo-only' == $acmeblog_customizer_all_values['acmeblog-header-id-display-opt'] ):
                                if ( function_exists( 'the_custom_logo' ) ) :
                                    the_custom_logo();
                                else :
                                    if( !empty( $acmeblog_customizer_all_values['acmeblog-header-logo'] ) ):
                                        $acmeblog_header_alt = get_bloginfo('name');
                                        ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <img src="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-header-logo'] ); ?>" alt="<?php echo esc_attr( $acmeblog_header_alt ); ?>">
                                        </a>
                                        <?php
                                    endif;/*acmeblog-header-logo*/
                                endif;
                            else:/*else is title-only or title-and-tagline*/
                                if ( is_front_page() && is_home() ) : ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                    </h1>
                                <?php else : ?>
                                    <p class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                    </p>
                                <?php endif;
                                if ( 'title-and-tagline' == $acmeblog_customizer_all_values['acmeblog-header-id-display-opt'] ):
                                    $description = get_bloginfo( 'description', 'display' );
                                    if ( $description || is_customize_preview() ) : ?>
                                        <p class="site-description"><?php echo esc_html( $description ); ?></p>
                                    <?php endif;
                                endif;
                            endif;
                            endif;?><!--acmeblog-header-id-display-opt-->
                        </div><!--site-logo-->

                        <div class="right-header acme-col-3 float-right">
                            <?php
                            if ( 1 == $acmeblog_customizer_all_values['acmeblog-menu-show-search'] ):
                                echo "<div class='acme-search-block'>";
                                echo "<span class='acme-toggle-search fa fa-search'></span>";
                                get_search_form();
                                echo "</div>";
                            endif;
                            if ( 1 == $acmeblog_customizer_all_values['acmeblog-enable-social'] ) {
                                /**
                                 * Social Sharing
                                 * acmeblog_action_social_links
                                 * @since AcmeBlog 1.1.0
                                 *
                                 * @hooked acmeblog_social_links -  10
                                 */
                                do_action('acmeblog_action_social_links');
                            }
                            ?>
                        </div>
                    </div>
                    <nav id="site-navigation" class="main-navigation clearfix" role="navigation">
                        <div class="header-main-menu clearfix">
                            <?php
                            if( has_nav_menu( 'primary' ) ){
                                ?>
                                <?php wp_nav_menu(array('theme_location' => 'primary','container' => 'div', 'container_class' => 'acmethemes-nav')); ?>
                                <?php
                            }
                            elseif( is_customize_preview() ){

                                ?>
                                <div style="color: #ffffff;padding: 10px">
                                    <?php _e('Goto Appearance > Menus -: for setting up menu ','acmeblog'); ?>
                                </div>
                                <?php
                            }
                           ?>
                        </div>
                        <!--slick menu container-->
                        <div class="responsive-slick-menu clearfix"></div>
                    </nav>
                    <!-- #site-navigation -->
                </div>
                <!-- .header-container -->
            </div>
            <!-- header-wrapper-->
        </header>
        <!-- #masthead -->
    <?php
    }
endif;
add_action( 'acmeblog_action_header', 'acmeblog_header', 10 );

/**
 * Before main content
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'acmeblog_before_content' ) ) :

    function acmeblog_before_content() {
        ?>
        <div class="wrapper content-wrapper clearfix">
        <?php
        global $acmeblog_customizer_all_values;
        $acmeblog_enable_feature = $acmeblog_customizer_all_values['acmeblog-enable-feature'];
        if ( is_front_page() && 1 == $acmeblog_enable_feature ) {
            echo '<div class="slider-feature-wrap clearfix">';
            /**
             * Slide
             * acmeblog_action_feature_slider
             * @since AcmeBlog 1.1.0
             *
             * @hooked acmeblog_feature_slider -  0
             */
            do_action('acmeblog_action_feature_slider');

            /**
             * Featured Post Beside Slider
             * acmeblog_action_feature_side
             * @since AcmeBlog 1.1.0
             *
             * @hooked acmeblog_feature_side-  0
             */
            do_action('acmeblog_action_feature_side');
            echo "</div>";
            $acmeblog_content_id = "home-content";
        } else {
            $acmeblog_content_id = "content";
        }
        ?>
    <div id="<?php echo esc_attr( $acmeblog_content_id ); ?>" class="site-content">
    <?php
        if( 1 == $acmeblog_customizer_all_values['acmeblog-show-breadcrumb'] && !is_front_page() ){
            acmeblog_breadcrumbs();
        }
    }
endif;
add_action( 'acmeblog_action_after_header', 'acmeblog_before_content', 10 );