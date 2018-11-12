<?php
/**
 * For displaying banner
 * @package JustBlog
*/

if ( ! is_active_sidebar( 'banner' ) ) {
	return;
}
 
?>
	
<?php if ( is_active_sidebar( 'banner' ) ) : ?>
<div id="banner" class="widget-area jbheader1">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php dynamic_sidebar( 'banner' ); ?>
		</div>
	</div>
	</div>
</div>
<?php endif; ?>