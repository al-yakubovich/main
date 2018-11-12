<?php
/**
 * The left sidebar containing the main widget area.
 */
if ( ! is_active_sidebar( 'acmeblog-sidebar' ) ) {
    return;
}
$sidebar_layout = acmeblog_sidebar_selection();
?>
<?php if( $sidebar_layout == "left-sidebar" ) : ?>
    <div id="secondary-left" class="widget-area sidebar secondary-sidebar" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
            <?php dynamic_sidebar( 'acmeblog-sidebar' ); ?>
        </div>
    </div>
<?php endif;