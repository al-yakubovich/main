<?php
/**
* The template for displaying the footer full widgets
*
* @package Cressida
*/
if ( is_active_sidebar( 'footer-full-1' ) ) : ?>
	<div class="widget-area widget-area-footer widget-area-footer-full widget-area-footer-full-1" role="complementary">
		<div class="container">
			<?php dynamic_sidebar( 'footer-full-1' ); ?>
		</div>
	</div>
<?php endif;

if ( is_active_sidebar( 'footer-full-2' ) ) : ?>
	<div class="widget-area widget-area-footer widget-area-footer-full widget-area-footer-full-2" role="complementary">
		<?php dynamic_sidebar( 'footer-full-2' ); ?>
	</div>
<?php endif;
