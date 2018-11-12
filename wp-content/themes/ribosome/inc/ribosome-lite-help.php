<?php
/**
 * Ribosome help page
 *
 * @package Ribosome
 */

// Añadir submenu en Apariencia.
add_action( 'admin_menu', 'ribosome_menu_en_apariencia' );
function ribosome_menu_en_apariencia() {

	add_theme_page( __( 'Ribosome Help', 'ribosome' ), '<span style="color:#DD9933;">' . __( 'Ribosome Help', 'ribosome' ) . '</span>', 'edit_theme_options', 'ribosome_help', 'ribosome_mostrar_ayuda' );

}

// Página de ayuda.
function ribosome_mostrar_ayuda() {
?>

<style type="text/css">
a{text-decoration:none !important;}
.wrapper-ribosome {overflow:hidden; line-height:1.5; font-size: 14px; max-width:1440px; margin:0 auto;}
.col-right{background-color:#fafafa;}
.title {margin-bottom:28px;}
.img-left {float:left;}
.dash-middle {vertical-align:midlle !important;}
.icon:before, .libro:before, .estrella:before {
	content: "\f333";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
}
.libro:before {
	content: "\f331";
	color:#729CBA;
}
.estrella:before {
	content: "\f155";
	color:#729CBA;
}
.check-title:before {
	content: "\f147";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 40px/1 'dashicons';
	vertical-align: middle;
	color:#ffffff;
	background-color:#729CBA;
	border:1px solid #729CBA;
	border-radius:50%;
}
.pro-title:before {
	content: "\f155";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 50px/1 'dashicons';
	vertical-align: middle;
	color:#729CBA;
}
.check-lista:before {
	content: "\f147";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
	color:#729CBA;
}
.imagen {
	background-color:#fff;
	padding:14px 0 7px 0;
	margin-bottom:14px;
	text-align:center;
}
.imagen img {
	max-width:100%;
	max-height:auto;
}
.titulo-pro {
	padding:7px;
	background-color:#729CBA;
	color:#fff;
	text-align:center;
	font-size:18px;
	font-weight:bold;
}
.ribo_rating {font-size:14px !important;}
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}

</style>

<div class="wrapper-ribosome">

	<div class="col-left">
		<div><a href="<?php echo RIBOSOME_AUTHOR_URI; ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/galussothemes-logo.png" /></a></div>
		<hr />
		<h1><?php esc_html_e( 'Thank you for choosing Ribosome', 'ribosome' ); ?></h1>

		<?php esc_html_e( 'Ribosome is a simple and light WordPress theme with a clear and neat design. Some its features are: header image or logo, custom theme color (blue, green, orange or pink), right sidebar or left, excerpts or entire entries on homepage, main menu on the left or centered, six different Google Fonts, thumbnails rounded or squared, two widgets areas (beginning and end of posts), related posts, customization panel, fully responsive, custom header, custom background and more. Translation Ready (English and spanish integrated). Required WordPress 4.1+.', 'ribosome' ); ?>

		<h2><span class="libro"></span> <?php esc_html_e( 'Ribosome Quick Start Guide', 'ribosome' ); ?></h2>

		<h3><span class="icon"></span> <?php esc_html_e( 'Important: thumbnails', 'ribosome' ); ?></h3>
			&#9679; <?php esc_html_e(' For images appear on the homepage, you must set the featured image of the posts.', 'ribosome' );?>
			<br />
			&#9679; <?php esc_html_e( 'If Ribosome is not the first theme you use, you must regenerate the thumbnails of image with some free plugin as', 'ribosome' ); ?> <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a>.

		<h3><span class="icon"></span>  <?php esc_html_e( 'Customize Ribosome', 'ribosome' ); ?></h3>
		<?php _e( 'To customize Ribosome go to <i>Appearance > Customize</i>', 'ribosome' ); ?>.<br />
		<?php _e( 'To receive support from us or other users visit the <a href="https://wordpress.org/support/theme/ribosome">Ribosome forum support on WordPress.org</a>', 'ribosome' ); ?>

		<h3><span class="icon"></span>  <?php esc_html_e( 'Logo in the header', 'ribosome' ); ?></h3>

		<div>
		<?php esc_html_e( 'if you choose a logo, instead full image for the header, check the option "Header image is a logo" (at the end of the section Header Image). Then, to apply margins and center the logo activates the appropriate boxes.', 'ribosome' ); ?>
		</div>

		<h2><span class="estrella"></span> <?php esc_html_e( 'Rating and Review', 'ribosome' ); ?></h2>
		<?php esc_html_e( 'Please, if you are happy with the theme, say it on wordpress.org and give Ribosome a nice review. Thank you.', 'ribosome' ); ?>

		<div style="text-align:center; margin-top:14px;">
		<a class="button-primary ribo_rating" href="https://wordpress.org/support/view/theme-reviews/ribosome" target="_blank"><?php esc_html_e( 'Review Ribosome', 'ribosome' ); ?></a>
		</div>
	</div><!-- .col-left -->

	<div class="col-right">
		<div class="titulo-pro">Ribosome Pro</div>

		<div class="imagen">
			<div style="padding:0 5px; text-align:center;">
				<?php _e( 'With <strong>Ribosome Pro</strong> you can set up your blog with everything you need in minutes.', 'ribosome' ); ?>
				<hr />
			</div>

			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/ribosome-pro-features.png" />

			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="http://demos.galussothemes.com/ribosome-pro" target="_blank"><?php esc_html_e( 'Live Demo', 'ribosome' ); ?></a> |
				<a href="<?php echo RIBOSOME_AUTHOR_URI; ?>/wordpress-themes/ribosome-pro" target="_blank"><?php esc_html_e( 'Buy', 'ribosome' ); ?></a> |
				<a href="<?php echo RIBOSOME_AUTHOR_URI; ?>/wordpress-themes/ribosome" target="_blank"><?php esc_html_e( 'Compare with Lite Version', 'ribosome' ); ?></a>
				<hr />
			</div>
		</div><!-- .imagen -->

		<div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			<?php esc_html_e( 'Features', 'ribosome' ); ?>
		</div>

		<ul>
			<li><span class="check-lista"></span> <a href="<?php echo RIBOSOME_AUTHOR_URI; ?>/soporte/foro/ribosome-pro"><?php esc_html_e( 'Forum support', 'ribosome' ); ?></a></li>
			<li><span class="check-lista"></span> <?php esc_html_e( 'Unlimited theme colors', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e( 'CSS editor integrated in the customizer. You can make changes without modifying the style.css file.', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e( 'Light gray main menu or black', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e( 'Sidebar left or right', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e( 'Show extract or whole post on homepage.', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e( '7 widgets areas to add AdSense code or anything else', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e( 'Easily add yor Login Logo', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Available 15 differents Google fonts', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' 6 Custom widgets (Facebook Page Plugin, Recent posts with square thumbnails or rounded, Popular posts with square thumbnails or rounded, Recent comments with square avatars or rounded, Email subscription, Meta Widget with dashicons and ability to show/hide links)', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Related posts with thumbnails', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Show/Hide post meta (author, date, comments number)', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Breadcrumb navigation', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Custom pagination', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Custom shortcodes (Buttons, Messages, Accordion and Tabs)', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Social networks in user profile', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Google Plus Authorship Integration', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Easily apply Ribosome style to bbPress, just check the option.', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Google Analytics ready, just paste the code', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' AddThis ready, just paste the code', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Translation Ready (.po file integrated)', 'ribosome' ); ?></li>
			<li><span class="check-lista"></span> <?php esc_html_e(' Integrated Spanish and English', 'ribosome' ); ?></li>
		</ul>
	</div>
</div><!-- .wrapper-ribosome -->
<hr />
<?php } // ribosome_mostrar_ayuda()
