<?php
/**
 * The sidebar for Homepage
 */
?>

<div class="four columns sidebar">
	<?php dynamic_sidebar( 'ct-home-sidebar' ); ?>
	<?php if( is_active_sidebar( 'ct-home-sticky-sidebar' ) ){
		?>
		<div class="sticky-sidebar">
			<?php dynamic_sidebar( 'ct-home-sticky-sidebar' ); ?>
		</div><!-- /.sticky-sidebar -->
		<?php
	}
	?>
</div><!-- /.four .columns .sidebar -->