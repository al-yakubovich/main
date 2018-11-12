<?php
/**
* The template for displaying the header right widgets
*
* @package Cressida
*/
$cressida_example_content = cressida_get_option( 'cressida_example_content' ); ?>

<div class="col-lg-3 col-xs-12 d-none d-lg-block">
	<?php
		if ( is_active_sidebar( 'sidebar-top-right' ) ) : ?>
			<div class="widget-area widget-area-header widget-area-header-right" role="complementary">
				<?php dynamic_sidebar( 'sidebar-top-right' ); ?>
			</div>
		<?php elseif ( $cressida_example_content == 1 ) :
			cressida_example_header_widgets('right');
		endif;
	?>
</div>

