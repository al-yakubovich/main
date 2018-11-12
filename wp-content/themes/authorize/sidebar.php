<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Authorize
 */

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php 
		//if ( is_home() || is_front_page() ) {
		if ( is_front_page() ) {
			if ( ! is_active_sidebar( 'sidebar-frontpage' ) ) {
				return;
			}
		 	
			dynamic_sidebar( 'sidebar-frontpage' );
		
		}else{
			
			if ( ! is_active_sidebar( 'sidebar-inside' ) ) {
				return;
			}
		 	
			dynamic_sidebar( 'sidebar-inside' ); 
		 
		}
	?>
</aside>
