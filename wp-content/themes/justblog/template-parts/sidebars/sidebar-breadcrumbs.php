<?php
/**
 * For displaying breadcrumbs
 * @package JustBlog
*/

if ( ! is_active_sidebar( 'breadcrumbs' ) ) {
	return;
}
?>

<div class="row">

	<div class="col-lg-12">
	<div id="breadcrumbs">
		<?php dynamic_sidebar( 'breadcrumbs' ); ?>
	</div>
	</div>
</div>
