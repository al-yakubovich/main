<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package journalistblogily
 */

?>

</div><!-- #content -->

<a href="#" class="topbutton"></a><!-- Back to top button -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <div class="row"><!-- Start Foundation row -->

        <?php get_sidebar( 'footer' ); ?>

    </div><!-- End Foundation row -->



    <div class="copyright small-12 columns text-center">
        <?php echo '&copy; '.date_i18n(__('Y','journalistblogily')); ?> <?php bloginfo( 'name' ); ?>
        <!-- Delete below lines to remove copyright from footer -->
        <span class="footer-info-right">
            <?php echo __(' | WordPress Theme by', 'journalistblogily') ?> <a href="<?php echo esc_url('https://superbthemes.com/', 'journalistblogily'); ?>"><?php echo __(' SuperbThemes', 'journalistblogily') ?></a>
        </span>
        <!-- Delete above lines to remove copyright from footer -->

    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
