<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage quicksand
 */
?>


</div><!-- site-content--> 
</div><!-- .site-main-container -->


<!-- site-footer-widgetbar -->
<?php if (is_active_sidebar('sidebar-footer-bottom')) : ?>
    <div class="container site-footer-widgetbar"> 
        <!-- site-sidebar widget-area --> 
        <?php dynamic_sidebar('sidebar-footer-bottom'); ?>   
    </div><!-- .site-sidebar.widget-area --> 
<?php endif; ?> 



<?php
$secondary_nav_options = array(
    'theme_location' => 'secondary',
    'depth' => 1,
    'container' => '',
    'container_class' => '',
    'menu_class' => 'nav navbar-nav',
    'fallback_cb' => 'QuicksandNavwalker::fallback',
    'walker' => new QuicksandNavwalker()
);
?> 

<!-- site-footer --> 
<?php
$activeSites = quicksand_get_active_social_sites();
if (!empty($activeSites) || has_nav_menu('secondary')) :
    ?>
    <footer class="container-fluid site-footer">
        <div class="row">
            <div class="site-social">
                <div class="text-xs-center text-lg-right"> 
                    <?php quicksand_social_media_icons(); ?>
                </div>
            </div>
            <div class="nav-wrapper">
                <div class="text-xs-center text-lg-left">
                    <!--secondary navigation-->
                    <?php wp_nav_menu($secondary_nav_options); ?>
                </div>
            </div>
        </div>
    </footer><!-- site-footer --> 

<?php endif; ?> 

<?php wp_footer(); ?>
</body>
</html>