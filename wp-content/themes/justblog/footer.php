<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package JustBlog
 */

 $justblog_page_bottom_image = get_theme_mod('justblog_page_bottom_image', get_template_directory_uri() . '/images/bottom-photo-default.jpg' );
?>

	</div><!-- .row -->
	</div><!-- #content.container -->

	<div id="bottom-background-photo" style="background-image: url( <?php echo esc_url( $justblog_page_bottom_image ); ?> );">
		<?php get_template_part( 'template-parts/sidebars/sidebar', 'bottom' ); ?>
	</div>
	
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'footer' ); ?>
	
	<footer id="site-footer">
		<div class="container site-info">
		<div class="row align-items-center">
		<div class="col-md-6 footer-left">
		<?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>		
		<?php esc_html_e('Copyright &copy;', 'justblog'); ?> 
		<?php echo date_i18n( __( 'Y', 'justblog' ) );   // WPCS: XSS OK ?>
		<?php echo esc_html(get_theme_mod( 'justblog_copyright' )); ?>. <?php esc_html_e('All rights reserved.', 'justblog'); ?>

			</div>

			<div class="col-md-6 footer-right">
			<?php get_template_part( 'template-parts/navigation/navigation', 'social' ); ?>
			</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
