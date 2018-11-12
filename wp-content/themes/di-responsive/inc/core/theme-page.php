<?php

add_action( 'admin_menu', 'di_responsive_theme_page' );
function di_responsive_theme_page() {
	add_theme_page(
		__( 'Di Responsive Theme', 'di-responsive' ),
		__( 'Di Responsive Theme', 'di-responsive' ),
		'manage_options',
		'di-responsive-theme',
		'di_responsive_theme_page_callback'
	);
}

function di_responsive_theme_page_callback() {
?>
	<div class="wrap">
		<h1><?php _e( 'Di Responsive Theme Info', 'di-responsive' ); ?></h1>
		<br />
		<div class="container-fluid" style="border: 2px dashed #C3C3C3;">
			<div class="row">

				<div class="col-md-6" style="padding:0px;">
					<img class="img-fluid" src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" />
				</div>

				<div class="col-md-6">

					<h2><?php _e( 'Di Responsive WordPress Theme', 'di-responsive' ); ?></h2>

					<p style="font-size:16px;"><?php _e( 'Di Responsive is multipurpose, more than responsive, SEO friendly, fast to load, fully customizable and easy to use WordPress theme for business websites. it can display your blog post professionally and can create awesome pages using page builder plugin. it is also fully compatible with WooCommerce plugin and have WooCommerce options. so it can be use to display business informations and sell products online.', 'di-responsive' ); ?></p>

					<p style="font-size:16px;"><?php _e( 'Theme Features : One Click Demo Import, Custom Logo, Custom Menu, Sidebar Menu, Custom Header Image, Grid Layouts, Featured Image, Left Sidebar Layout, Right Sidebar Layout, Full Width Layout, Footer Widgets, Footer Copyright Section, Page Builder Templates, Translation Ready, Typography Options, Top Bar Section, Blog Options, WooCommerce Options, Sidebar Menu Options, Social Profile Widget, Recent Posts with Featured Image Widget, Seven Widget Areas, WooCommerce Ready, Contact Form 7 Ready, All Page Builder Ready like Elementor, Visual Composer, SiteOrigin and much more.', 'di-responsive' ); ?></p>

					<?php
					if( ! function_exists( 'di_responsive_pro' ) ) {
					?>
					<p style="font-size:16px;"><b><?php _e( 'Di Responsive Pro Features: ', 'di-responsive' ); ?></b><?php _e( 'Widget Area Creation and Selection, Advance Header Image Options, Slider in Header, All Color Options, Options to Update Footer Front Credit Link, Premium Support.', 'di-responsive' ); ?><p>
					<?php
					}
					?>

					<div style="text-align: center;" >

						<a target="_blank" class="btn btn-outline-success btn-sm" href="http://demo.dithemes.com/di-responsive/" role="button"><?php _e( 'Theme Demo', 'di-responsive' ); ?></a>

						<a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/di-responsive-free-wordpress-theme-documentation/" role="button"><?php _e( 'Theme Docs', 'di-responsive' ); ?></a>

						<a target="_blank" class="btn btn-outline-success btn-sm" href="<?php echo get_dashboard_url().'customize.php'; ?>" role="button"><?php _e( 'Theme Options', 'di-responsive' ); ?></a>

						<?php
						if( function_exists( 'di_responsive_pro' ) ) {
						?>
							<a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/my-tickets/" role="button"><?php _e( 'Get Premium Support', 'di-responsive' ); ?></a>
						<?php
						} else {
						?>
							<a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/product/di-responsive-pro-wordpress-theme/" role="button"><?php _e( 'Get Di Responsive Pro', 'di-responsive' ); ?></a>
						<?php
						}
						?>

					</div>
					<br />

				</div>
			</div>
		</div>
	</div>
<?php
}


// Enqueue js css files only if pagenow is themes.php and query string is page=di-responsive-them.
global $pagenow;
if ( 'themes.php' === $pagenow  && 'page=di-responsive-theme' === $_SERVER['QUERY_STRING'] ) {
	add_action( 'admin_enqueue_scripts', 'di_responsive_admin_js_css' );
}

function di_responsive_admin_js_css() {
	// Load bootstrap css.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.0.0', 'all' );
	// Load bootstrap js.
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.0.0', true );
}
