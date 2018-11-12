<?php
/**
 * Site Identity
 *
 * Template part for rendering site name, tagline and logo
 *
 * @package Cressida
 */
?>
<div class="logo">
	<?php
		/**
		 * Make sure we see the change between image and text in customizer preview
		 * on selective refresh
		 */
		if ( function_exists( 'get_theme_mod' ) || is_customize_preview() ) :
			cressida_site_identity();
		endif; //  function_exists( 'get_theme_mod' ) || is_customize_preview()
	?>
</div><!-- .logo -->