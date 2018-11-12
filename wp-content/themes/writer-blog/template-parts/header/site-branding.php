<?php
/**
 * Displays header site branding
 *
 */

?>
<div class="site-branding">
    <h1 class="site-title">
        <?php
			if ( !get_theme_mod( 'ct-default-logo-setting' )  && !get_theme_mod( 'ct-transparent-logo-setting' ) ) {
		?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php
			} else {
		?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(  writer_blog_logo_switch( writer_blog_header_transparency() ) ); ?>" alt="Logo" /></a>
		<?php
			}
		?>
    </h1>
</div><!-- /.site-branding -->