<div id="navbarouter" class="navbarouter">
	<div class="headermain clearfix">
		<nav id="navbarprimary" class="navbar navbar-expand-lg navbarprimary">
			<div class="container">
				
					<div class="header-logo-outer">
						<?php
						if( has_custom_logo() ) {
						?>
							<div itemscope itemtype="http://schema.org/Organization" >
								<?php the_custom_logo(); ?>
							</div>
						<?php
						} else {

							echo "<h3 class='site-title-main'>";
							echo "<a href='" . esc_url( home_url( '/' ) ) . "' rel='home' class='site-name-pr' >";
							echo esc_html( get_bloginfo( 'name' ) );
							echo "</a>";
							echo "</h3>";
						}
						?>
					</div>

					<div class="navbar-header">
						<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapse-navbarprimary">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
							
					<?php
					wp_nav_menu( array(
						'theme_location'    => 'primary',
						'depth'             =>  3,
						'container'         => 'div',
						'container_id'      => 'collapse-navbarprimary',
						'container_class'   => 'collapse navbar-collapse',
						'menu_id' 			=> 'primary-menu',
						'menu_class'        => 'nav navbar-nav primary-menu',
						'fallback_cb'       => 'di_responsive_nav_fallback',
						'walker'            => new Di_Responsive_Nav_Menu_Walker()
						) );
					?>
				
			</div>
		</nav>
	</div>
</div>
