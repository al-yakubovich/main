<?php
/**
 ************************************************************************************************************************
 * White Spektrum - archive.php
 ************************************************************************************************************************
 * @package     White Spektrum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */
?>
<?php get_header(); ?>
    <div id="gobal-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
        <div class="content-area">
            <?php Benlumia007\Backdrop\MainQuery\display_content_archive(); ?>
        </div>
        <?php Benlumia007\Backdrop\Sidebar\display_primary(); ?>
    </div>
<?php get_footer(); ?>