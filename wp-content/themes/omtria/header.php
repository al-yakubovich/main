<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php esc_attr(bloginfo('charset')); ?>">
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
        
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header class="header header--default header--fixed" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-logo">
                            <?php
                                if (!omtria_custom_logo()) {
                                    echo "<a href='".esc_url(home_url('/'))."' class='text--logo' id='logo'>".get_bloginfo('name')."</a>";
                                };
                            ?>
                        </div>
    
                        <?php
                            if (has_nav_menu('menu-header')) { ?>
                                <div class="header-button">
                                    <a href="#" class="menu-header-button menu-header-button--default" id="menu-header-button"><span><i></i><?php esc_html_e('Menu', 'omtria') ?><em></em></span></a>
                                </div>
                            <?php }
                        ?>
    
                        <div class="header-menu" id="header-menu">
                            <?php
                                if (has_nav_menu('menu-header')) {
                                    wp_nav_menu(array('theme_location' => 'menu-header', 'menu_class' => 'menu-header menu-header--default'));
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>