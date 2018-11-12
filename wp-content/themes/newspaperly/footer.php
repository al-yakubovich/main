	<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newspaperly
 */

?>
</div>
</div>
</div><!-- #content -->
<div class="content-wrap">

	<footer id="colophon" class="site-footer clearfix">

		<?php if ( is_active_sidebar( 'footerwidget-1' ) ) : ?>
			<div class="footer-column-wrapper">
				<div class="footer-column-three footer-column-left">
					<?php dynamic_sidebar( 'footerwidget-1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footerwidget-2' ) ) : ?>
				<div class="footer-column-three footer-column-middle">
					<?php dynamic_sidebar( 'footerwidget-2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footerwidget-3' ) ) : ?>
				<div class="footer-column-three footer-column-right">
					<?php dynamic_sidebar( 'footerwidget-3' ); ?>				
				</div>
			<?php endif; ?>
			<div class="site-info">
				&copy;<?php echo esc_html(date_i18n(__('Y','newspaperly'))); ?> <?php bloginfo( 'name' ); ?>


				<!-- Delete below lines to remove copyright from footer -->
				<span class="footer-info-right">
					<?php echo esc_html_e(' | WordPress Theme by', 'newspaperly') ?> <a href="<?php echo esc_url('https://superbthemes.com/', 'newspaperly'); ?>"><?php echo esc_html_e(' Superb Themes', 'newspaperly') ?></a>
				</span>
				<!-- Delete above lines to remove copyright from footer -->

			</div>
		</div>
	</footer><!-- #colophon -->
</div>

</div><!-- #page -->

<div id="smobile-menu" class="mobile-only"></div>
<div id="mobile-menu-overlay"></div>

<?php wp_footer(); ?>
</body>
</html>
