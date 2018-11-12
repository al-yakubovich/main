<?php
if( get_theme_mod( 'tpbr_lft_addr', __( '123 Street, NYC, US', 'di-responsive' ) ) ) {
?>
	<span class="topbar-phone-mail-addr-sep">
		<span class="fa fa-map-marker"></span> <?php echo esc_html( get_theme_mod( 'tpbr_lft_addr', __( '123 Street, NYC, US', 'di-responsive' ) ) ); ?>
	</span>
<?php
}
?>

<?php
if( get_theme_mod( 'tpbr_lft_phne', '0123456789' ) ) {
?>
	<span class="topbar-phone-mail-addr-sep">
		<span class="fa fa-phone"></span> <a href="tel:<?php echo esc_attr( get_theme_mod( 'tpbr_lft_phne', '0123456789' ) ); ?>"><?php echo esc_html( get_theme_mod( 'tpbr_lft_phne', '0123456789' ) ); ?></a>
	</span>
<?php
}
?>

<?php
if( get_theme_mod( 'tpbr_lft_email', 'info@example.com' ) ) {
?>
	<span class="topbar-phone-mail-addr-sep">
		<span class="fa fa-envelope-o"></span> <a href="mailto:<?php echo esc_attr( get_theme_mod( 'tpbr_lft_email', 'info@example.com' ) ); ?>"><?php echo esc_html( get_theme_mod( 'tpbr_lft_email', 'info@example.com' ) ); ?></a>
	</span>
<?php
}

