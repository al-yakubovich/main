<?php
/**
 * Displays social navigation
 * @package JustBlog
 */
?>

<?php	if ( has_nav_menu( 'footer' ) ) : ?>
	 <nav id="footer-nav">
		<?php wp_nav_menu( array( 
				'theme_location' => 'footer', 
				'fallback_cb' => false, 
				'depth' => 1,
				'container' => false, 
				'menu_id' => 'footer-menu', 
			) ); 
		?>
	</nav>
<?php endif; ?>
