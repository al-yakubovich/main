<?php
	/**
		* the closing of the main content elements and the footer element
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
?>

</div>
</div>
</div>

<div class="footer-area full">
	<?php
		$footer_widget = get_theme_mod( 'mystem_footer_widget' );
	if ( empty( $footer_widget ) ) : ?>
	<div class="main">	
		<footer id="colophon" class="site-footer inner" role="contentinfo">
			
			<div class="footer-sidebar">
				<div class="footer-sidebar-1">
					<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
				</div>
				<div class="footer-sidebar-2">
					<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
				</div>
				<div class="footer-sidebar-3">
					<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
				</div>				
			</div>
			
		</footer>
	</div>
	<?php endif; ?>		
	<div class="site-info">
		<div class="main">
			<?php mystem_credits_copyright(); ?>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
