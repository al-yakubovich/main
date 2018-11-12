<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mega-ui
 */
?>
<div class="col-md-4 col-sm-12 mega-ui-sidebar mt4">
	<?php if ( is_active_sidebar( 'mega-ui-sidebar' ) ){
		dynamic_sidebar( 'mega-ui-sidebar' );
		} ?>
</div>
