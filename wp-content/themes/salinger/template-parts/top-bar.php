<?php
/**
 * Display Top Bar
 *
 * @package Salinger
 */

?>
<div class="top-bar">
	<div class="inner-wrap">
		<div class="top-bar-inner-wrap">
			<?php
			$palabra_menu = ( get_theme_mod( 'salinger_mostrar_menu_junto_icono', '' ) == 1 ) ? ' ' . __( 'MENU', 'salinger' ) : '';
			?>

			<div class="boton-menu-movil">
				<i class="fa fa-align-justify"></i><?php echo esc_html( $palabra_menu ); ?>
			</div>

			<?php
			$top_bar_custom_text = get_theme_mod( 'salinger_top_bar_left_custom_text', '' );

			if ( ! empty( $top_bar_custom_text ) ) {
				?>
				<div class="top-bar-left">
					<?php echo wp_kses_post( $top_bar_custom_text ); ?>
				</div>
				<?php
			}
			?>

			<div class="toggle-search"><i class="fa fa-search"></i></div>

			<div class="top-bar-right">
				<div class="social-icon-wrapper">
					<?php
					if ( has_nav_menu( 'social-1' ) ) {
						$color_iconos = get_theme_mod( 'salinger_social_icons_color', 'white' ) == 'original_color' ? 'social-icons-original-color' : 'social-icons-unique-color';
						?>
						<nav class="social-navigation <?php echo $color_iconos; ?>" role="navigation" aria-label="<?php esc_attr_e( 'Social Menu', 'salinger' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social-1',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							) );
						?>
						</nav><!-- .social-navigation -->
						<?php
					}
					?>
				</div><!-- .social-icon-wrapper -->
			</div><!-- .top-bar-right -->

			<div class="wrapper-search-top-bar">
				<div class="search-top-bar">
					<?php get_template_part( SALINGER_TEMPLATE_PARTS . 'searchform-toggle' ); ?>
				</div>
			</div>

		</div><!-- .top-bar-inner-wrap -->
	</div><!-- .inner-wrap -->
</div><!-- .top-bar -->
