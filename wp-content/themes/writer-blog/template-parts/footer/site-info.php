<div class="bottom-bar">
	<!-- Echos Footer copyright text -->
	<?php
		if ( get_theme_mod( 'ct-footer-copyright-display-setting', 'yes' ) == 'yes' ) {
			echo esc_html( get_theme_mod( 'ct-footer-copyright-text-setting', 'Copyright. All Rights Reserved. ' ) );
		}
		
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( ' ', '' );
		}
	?>
</div><!-- /.bottom-bar -->