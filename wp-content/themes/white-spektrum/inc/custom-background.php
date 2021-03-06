<?php 
/**
 ************************************************************************************************************************
 * White Spektrum - custom-background.php
 ************************************************************************************************************************
 * @package     White Spektrum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  Table of Content
 ************************************************************************************************************************
 *  1.0 - Inc (Custom Background)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Inc (Custom Background)
 ************************************************************************************************************************
 */
function white_spektrum_load_custom_background() {
    $args = array(
        'default-color' => 'ffffff'
    );
    add_theme_support( 'custom-background', $args );
}
add_action( 'after_setup_theme', 'white_spektrum_load_custom_background' );