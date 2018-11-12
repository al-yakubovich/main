<?php
/**
* The template for displaying the header left widgets
*
* @package Cressida
*/
$cressida_example_content = cressida_get_option( 'cressida_example_content' ); ?>

<div class="col-lg-3 col-xs-12">
	<?php
		if ( is_active_sidebar( 'sidebar-top-left' ) ) : ?>
			<div class="widget-area widget-area-header widget-area-header-left" role="complementary">
				<?php dynamic_sidebar( 'sidebar-top-left' ); ?>
			</div>
		<?php elseif ( $cressida_example_content == 1 ) :
			cressida_example_header_widgets('left');
		endif;
	?>
</div>
