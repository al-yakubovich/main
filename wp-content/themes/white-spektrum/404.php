<?php
/**
 ************************************************************************************************************************
 * White Spektrum - Comments.php
 ************************************************************************************************************************
 * @package     White Spektrum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */
?>
<?php get_header(); ?>
    <div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
        <div class="content-area">
            <article id="post-0" <?php post_class( 'post' ); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php esc_html_e( 'Whoa! You broke something', 'white-spektrum' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p>
                        <?php printf( esc_html__( "Just kidding! You tried going to %s, which doesn't exist, so that means I probably broke something. To find what you are looking for, check out the most recent articles below or try a search: ", 'white-spektrum' ), 
                        '<code>' . esc_url( home_url( $_SERVER['REQUEST_URI'] ) ) . '</code>'); ?>
                    </p>
                    <?php get_search_form(); ?>
                </div>
            </article>
            <div class="custom-blog">
                <?php Benlumia007\Backdrop\CustomQuery\display_custom_blog(); ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>