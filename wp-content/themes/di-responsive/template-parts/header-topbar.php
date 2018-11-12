<?php
/**
 * Load top bar parts according settings.
 */
?>

<?php
if( get_theme_mod( 'display_top_bar', '1' ) == 1 ) {
?>
<div class="container-fluid bgtoph">
	<div class="container">
		<div class="row pdt10">
		
			<div class="col-md-6">
				<div class="topbar-left-side">
					<?php
					if( get_theme_mod( 'tpbr_left_view', '1' ) == '1' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'phonemail' );
					} else if ( get_theme_mod( 'tpbr_left_view', '1' ) == '2' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'lefttexthtml' );
					} else if ( get_theme_mod( 'tpbr_left_view', '1' ) == '3' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'menu' );
					} else if ( get_theme_mod( 'tpbr_left_view', '1' ) == '4' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'icons' );
					} else {
						// Disabled selected.
					}
					?>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="topbar-right-side">
					<?php
					if( get_theme_mod( 'tpbr_right_view', '4' ) == '1' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'phonemail' );
					} else if ( get_theme_mod( 'tpbr_right_view', '4' ) == '2' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'righttexthtml' );
					} else if ( get_theme_mod( 'tpbr_right_view', '4' ) == '3' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'menu' );
					} else if ( get_theme_mod( 'tpbr_right_view', '4' ) == '4' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'icons' );
					} else {
						// Disabled selected.
					}
					?>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
}
?>
