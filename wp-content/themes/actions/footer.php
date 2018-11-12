<?php 
    do_action( 'actions_content_body_after' );

    do_action( 'actions_footer_elements_before' ); // Hook in your chosen framework's end of content closing wrapper(s) e.t.c
	
        do_action( 'actions_footer_elements' ); // Hook in footer widgets, menu, credits e.t.c
		
    do_action( 'actions_footer_elements_after' ); // Hook in your chosen frameworks end of site closing wrapper(s).
	
	// Remember to give all of your hooks for the above actions a suitable priority i.e. 0 will hook in first, 10 will hook in second and 20 will hook in 3rd and so on!
	
wp_footer(); 
?>
</body>
</html>