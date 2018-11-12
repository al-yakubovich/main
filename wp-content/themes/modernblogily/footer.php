<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package modernblogily
 */

?>

</div><!-- #content -->

<a href="#" class="topbutton"></a><!-- Back to top button -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <div class="row"><!-- Start Foundation row -->

        <?php get_sidebar( 'footer' ); ?>

    </div><!-- End Foundation row -->



    <div class="copyright small-12 columns text-center">
        <?php echo '&copy; '. esc_html(date_i18n(__('Y','modernblogily'))); ?> <?php bloginfo( 'name' ); ?>
        <!-- Delete below lines to remove copyright from footer -->
        <span class="footer-info-right">
            <?php echo esc_html_e(' | WordPress Theme by', 'modernblogily') ?> <a href="<?php echo esc_url('https://superbthemes.com/', 'modernblogily'); ?>"><?php echo esc_html_e(' Superb Themes', 'modernblogily') ?></a>
        </span>
        <!-- Delete above lines to remove copyright from footer -->
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
