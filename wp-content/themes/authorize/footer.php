<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Authorize
 */

?>
	</div>
    
	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-widgets">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        		<aside id="footer_1" class="widget-area shadow-border" role="complementary">
                        <?php dynamic_sidebar( 'footer-1' );?>
				</aside>
			<?php endif; ?>
            
            
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
        		<aside id="footer_1" class="widget-area shadow-border" role="complementary">
                        <?php dynamic_sidebar( 'footer-2' );?>
				</aside>
			<?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
        		<aside id="footer_1" class="widget-area shadow-border" role="complementary">
                        <?php dynamic_sidebar( 'footer-3' );?>
				</aside>
			<?php endif; ?>
		</div>
		
		<?php get_template_part( 'components/footer/site', 'info' ); ?>

	</footer>
</div>
<?php wp_footer(); ?>


</body>
</html>