<?php
/**
 * Left sidebar column for the blog and pages. 
 * @package JustBlog
*/


if (   ! is_active_sidebar( 'pageleft'  )
	&& ! is_active_sidebar( 'blogleft' ) 
	)
	return;

if ( is_page() ) {
	
	echo '<aside id="left-sidebar" class="widget-area">';    
	dynamic_sidebar( 'pageleft' );
	echo '</aside>';
	
} else {
	
	echo '<aside id="left-sidebar" class="widget-area">';   
	dynamic_sidebar( 'blogleft' );
	echo '</aside>';
	
}
?>