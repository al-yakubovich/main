<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gist
 */
$GLOBALS['gist_theme_options'] = gist_get_theme_options();
global $gist_theme_options;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-main">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'gist'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <div class="container-inner">
                <?php
                if (function_exists('the_custom_logo')) {

                    the_custom_logo();

                }
                if (is_front_page() && is_home()) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                              rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                             rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;

                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
                endif; ?>
            </div>
        </div>
        <!-- .site-branding -->

        <div class="container-inner">
            <div id="mainnav-wrap">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i
                            class="fa fa-bars"></i></button>
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu'));
                    } ?>
                </nav>
                <!-- #site-navigation -->
            </div>
        </div>
        <!-- .container-inner -->
    </header>
    <!-- #masthead -->
    <div class="header-image-block">
        <?php  gist_header_image(); ?>
    </div>

    <div id="content" class="site-content container-inner p-t-15">