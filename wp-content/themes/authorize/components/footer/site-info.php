<div class="site-info">
	<a href="<?php 
		/* translators: Line 6: Proudly powered by (WordPress) */
		echo esc_url( __( 'https://wordpress.org/', 'authorize' ) ); 
		?>">
		<?php
			/* translators: Line : Proudly powered by (Theme Name, Theme Author) */ 
			printf( esc_html__( 'Proudly powered by %s', 'authorize' ), 'WordPress' ); 
		?></a>

	<span class="sep"> | </span>

	<?php 
		/* translators: Line : Theme (Theme Name) by (Theme Author) */ 

		printf( esc_html__( 'Theme: %1$s by %2$s.', 'authorize' ), 'Authorize', '<a href="http://workingwebsites.ca/" rel="designer">Working Websites</a>' ); ?>

</div><!-- .site-info -->