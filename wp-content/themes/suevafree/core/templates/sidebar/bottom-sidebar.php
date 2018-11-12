<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_full_sidebar_function')) {

	function suevafree_full_sidebar_function( $name ) {
	
		if ( is_active_sidebar($name) ) : ?>
			
			<div id="bottom_sidebar" class="sidebar-area">
			
				<?php dynamic_sidebar($name) ?>	
                			
			</div>
				
<?php 
	
		endif;
		
	}

	add_action( 'suevafree_full_sidebar', 'suevafree_full_sidebar_function', 10, 2 );

}

?>