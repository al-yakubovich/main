<?php
/**
 * For displaying the post banner
 * @package JustBlog
*/

if ( ! is_active_sidebar( 'post-banner' ) ) {
	return;
}
?>
	
<?php if ( is_active_sidebar( 'post-banner' ) ) : ?>
<div id="post-banner" class="widget-area">
	<div class="row">
		<div class="col-lg-12">
			<?php dynamic_sidebar( 'post-banner' ); ?>
		</div>
	</div>
</div>
<?php endif; ?>