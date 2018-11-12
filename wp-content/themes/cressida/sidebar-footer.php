<?php
/**
* The template for displaying the footer widgets
*
* @package Cressida
*/
if ( is_active_sidebar( 'footer-columns-col-1' )
	|| is_active_sidebar( 'footer-columns-col-2' )
	|| is_active_sidebar( 'footer-columns-col-3' ) ) : ?>

	<div class="widget-area widget-area-footer widget-area-footer-columns" role="complementary">

		<div class="footer-columns">
			<div class="row">

				<div class="col-lg-3 col-xs-12 footer-columns-col-1">
					<?php
						if ( is_active_sidebar( 'footer-columns-col-1' ) ) :
							dynamic_sidebar( 'footer-columns-col-1' );
						endif;
					?>
				</div>

				<div class="col-lg-6 col-xs-12 footer-columns-col-2">
					<?php
						if ( is_active_sidebar( 'footer-columns-col-2' ) ) :
							dynamic_sidebar( 'footer-columns-col-2' );
						endif;
					?>
				</div>

				<div class="col-lg-3 col-xs-12 footer-columns-col-3">
					<?php
						if ( is_active_sidebar( 'footer-columns-col-3' ) ) :
							dynamic_sidebar( 'footer-columns-col-3' );
						endif;
					?>
				</div>

			</div><!-- row -->
		</div><!-- footer-columns -->

	</div><!-- widget-area widget-area-footer widget-area-footer-columns --><?php
endif; // any of footer sidebars is active
