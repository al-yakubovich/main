<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ForDummies
 * @subpackage For_dummies
 * @since For dummies 1.0
 */
?>
		</div> <!-- .site-content -->
	</div><!-- .site-inner -->
   <footer id="colophon" class="site-footer" role="contentinfo">
   <div class="footer-container">
   <div class="footer-column-one">
       	<?php if ( is_active_sidebar( '1-footer' ) ) : ?>
			<div id="widget-area1" class="widget-area" role="complementary">
				<?php dynamic_sidebar( '1-footer' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
   </div>
   <div class="footer-column-two">
      	<?php if ( is_active_sidebar( '2-footer' ) ) : ?>
			<div id="widget-area2" class="widget-area" role="complementary">
				<?php dynamic_sidebar( '2-footer' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
   </div>
   <div class="footer-column-three">
      	<?php if ( is_active_sidebar( '3-footer' ) ) : ?>
			<div id="widget-area3" class="widget-area" role="complementary">
				<?php dynamic_sidebar( '3-footer' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
   </div>
   </div> 
   </footer>  
			<div class="site-info">
				<?php
					/**
					 * Fires before the fordummies footer text for footer customization.
					 *
					 * @since Theme For Dummies 1.0
					 */
					do_action( 'fordummies_credits' );
 $my_footer_copyright = get_theme_mod('fordummies_footer_copyright');
             if(!empty($my_footer_copyright))
             { echo fordummies_sanitizehtml($my_footer_copyright); }
              else
              { echo __('Powered by ThemeForDummies.com','fordummies'); }
 ?>         
			</div><!-- .site-info -->
</div><!-- .site -->
</div><!-- wrapper -->
<?php wp_footer(); ?>
<div class="back-to-top-row">       
<a href="#" class="back-to-top">Back to Top</a>
</div> 
</body>
</html>