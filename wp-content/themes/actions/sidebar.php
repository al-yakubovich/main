<?php

    if ( is_active_sidebar( 'sidebar-1' )  ) : 
	    do_action( 'actions_before_sidebar' );
		    dynamic_sidebar( 'sidebar-1' );
	    do_action( 'actions_after_sidebar' );
    endif; 
?>