<?php
/**
 * Navigation Header
 *
 * Template part for rendering header navigation.
 *
 * @package Cressida
 */
?>
<div class="navbar-header d-lg-none col-xs-12">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false" aria-controls="main-menu" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
</div>
<div class="col-lg-6 col-xs-12">
	<nav class="main-navbar navbar navbar-expand-lg navbar-light" id="main-navbar" role="navigation">
		<?php
			if ( has_nav_menu( 'header' ) ) :
				$cressida_args = array(
					'theme_location'    => 'header',
					'depth'             => 2,
					'container'         => 'div',
					'container_id'      => 'main-menu',
					'container_class'   => 'collapse navbar-collapse menu-container',
					'menu_class'        => 'nav navbar-nav menu',
					'fallback_cb'       => '',
					'walker'            => new Cressida_Bootstrap_Navwalker()
				);

				wp_nav_menu( $cressida_args );

			else :

				cressida_default_nav();

			endif; // has_nav_menu( 'header' )
		?>
	</nav>
</div><!-- col-lg-4 col-xs-12 -->