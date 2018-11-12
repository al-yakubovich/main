<?php
/**
 * Mobil Menu
 *
 * @package Salinger
 * @since Salinger 1.0
 */

?>
<div id="menu-movil">
	<div class="search-form-movil">
		<form method="get" id="searchform-movil" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label for="s" class="assistive-text"><?php esc_html_e( 'Search', 'salinger' ); ?></label>
			<input type="search" class="txt-search-movil" placeholder="<?php esc_attr_e( 'Search...', 'salinger' ); ?>" name="s" id="sm" />
			<input type="submit" name="submit" id="btn-search-movil" value="<?php esc_attr_e( 'Search', 'salinger' ); ?>" />
		</form>
	</div><!-- search-form-movil -->

	<div class="menu-movil-enlaces">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'nav-menu',
		) );
		?>
	</div>
</div><!-- #menu-movil -->
