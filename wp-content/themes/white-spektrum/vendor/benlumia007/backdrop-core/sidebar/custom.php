<?php
/**
 ************************************************************************************************************************
 *  Backdrop Core - custom.php
 ************************************************************************************************************************
 *  @package        Backdrop
 *  @copyright      Copyright (C) 2018. Benjamin Lu
 *  @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 *  @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  namespace define
 ************************************************************************************************************************
 */
namespace Benlumia007\Backdrop\Sidebar;

/**
 ************************************************************************************************************************
 *  Table of Content
 ************************************************************************************************************************
 *  1.0 - Sidebar (Custom)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Sidebar (Custom)
 ************************************************************************************************************************
 */
function display_custom() {
    echo output_custom();
}

function output_custom() { ?>
    <div id="widget-area" class="widget-area">
        <?php if ( !dynamic_sidebar( 'custom-sidebar' ) ) { ?>
            <?php the_widget( 'WP_Widget_Categories', array(
                'dropdown'  => false,
                'hierarchical' => true ), array(
                'before_widget' => '<aside id="widget" class="widget widget_categories">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) ); 
            ?>

            <?php the_widget( 'WP_Widget_Tag_Cloud', array(), array(
                'before_widget' => '<aside id="widget" class="widget widget_tag_cloud">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) ); 
            ?>

            <?php the_widget( 'WP_Widget_Meta', array(), array(
                'before_widget' => '<aside id="widget" class="widget widget_meta">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) ); 
            ?>
        <?php } ?>
    </div>
<?php }