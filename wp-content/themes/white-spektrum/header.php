<?php
/**
 ************************************************************************************************************************
 * White Spektrum - header.php
 ************************************************************************************************************************
 * @package     White Spektrum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
<body <?php body_class(); ?>>
<section id="container" class="site-container">
    <header id="header" class="site-header">
        <div class="site-branding">
            <?php Benlumia007\Backdrop\Site\display_site_title(); ?>
            <?php Benlumia007\Backdrop\Site\display_site_description(); ?>
        </div>
        <?php Benlumia007\Backdrop\Menu\display_primary(); ?>
        <?php the_custom_header_markup(); ?>
    </header>
    <div id="content" class="site-content">