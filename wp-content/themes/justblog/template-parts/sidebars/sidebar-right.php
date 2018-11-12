<?php
/**
 * Right sidebar column. 
 * @package JustBlog
*/


if (   ! is_active_sidebar( 'blogright'  )
	&& ! is_active_sidebar( 'pageright' ) 
	)
	return;

if ( is_page() ) {   
	
	echo '<aside id="right-sidebar" class="widget-area">';
	dynamic_sidebar( 'pageright' );	
	echo '</aside>';	

} else {

	echo '<aside id="right-sidebar" class="widget-area">';  
	dynamic_sidebar( 'blogright' );
	echo '</aside>';
		
}
?>