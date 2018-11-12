<?php

/* Theme Setup */
if ( ! function_exists( 'writer_blog_writer_setup' ) ) :

function writer_blog_writer_setup() {

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'writer_blog_writer_activation_notice' );
	}
}

endif;
add_action( 'after_setup_theme', 'writer_blog_writer_setup' );

// Notice after Theme Activation
function writer_blog_writer_activation_notice() {
	echo '<div class="notice notice-success is-dismissible get-started">';
		echo '<p>'. esc_html__( 'Thank you for choosing Crafthemes. We are sincerely obliged to offer our best services to you. Please proceed towards the welcome page and give us the privilege to serve you.', 'writer-blog' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=writer_blog_writer_about' ) ) .'" class="button button-primary">'. esc_html__( 'Click here...', 'writer-blog' ) .'</a></p>';
	echo '</div>';
}

// Add a Custom CSS file to Admin Area
function writer_blog_admin_theme_stylesheet() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() .'/css/admin/admin-css.css');
}
add_action('admin_enqueue_scripts', 'writer_blog_admin_theme_stylesheet');

//about theme info
function add_test_theme_page() {
    add_theme_page( 'About Writer Blog', 'About Writer Blog', 'edit_theme_options', 'writer_blog_writer_about', 'writer_blog_writer_about' );
}
add_action( 'admin_menu', 'add_test_theme_page' );
 
function writer_blog_writer_about() {

	$theme = wp_get_theme();
	$theme_name = $theme->get( 'Name' );
    $theme_description = $theme->get( 'Description' );
    $theme_user = wp_get_current_user();
	$theme_slug = basename( get_stylesheet_directory() );
?>

<div class="container about-writer">
	<div class="row">
		<?php /* translators: %s: theme name. */ ?>
		<h1><?php printf( esc_html__( 'Getting started with %s', 'writer-blog' ), esc_html( $theme_name ) ); ?></h1>
		<?php /* translators: 1: Theme user name. 2: Theme name */ ?>
    	<p><?php printf( esc_html__( 'Hi %1$s, thank you for installing %2$s!', 'writer-blog' ), esc_html( $theme_user->display_name ), esc_html( $theme_name ) ); ?> <?php esc_html_e('Writer Blog is a minimal responsive WordPress blogging theme for professional bloggers. Writer Blog supports three different post formats such as right sidebar, left sidebar and one column. The minimal and straight forward design of Writer Blog makes it stands out in the crowd. Writer Blog features custom logo, favicon icon, two different types of logo for transparent and custom header and many more. The theme customizer makes it very easy to customize the theme. We designed Writer Blog responsive to all major devices. Wheather visitors arrive by smartphone, tablet, laptop or desktop computer, Writer Blog works perfectly well.', 'writer-blog'); ?></p>

    	<div class="six columns clearfix">
    		<h2><?php esc_html_e( 'Getting Started', 'writer-blog' ); ?></h2>
        	<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.jpg" class="screenshot" />
    	</div><!-- /.six columns -->

    	<div class="six columns">
    		<h3><a href="https://www.crafthemes.com/documentation/<?php echo esc_html( $theme_slug ); ?>/" target="_blank"><?php esc_html_e( 'Theme Documentation', 'writer-blog' ); ?></a></h3>
	        <p>
	            <?php esc_html_e( 'Read about all of the theme settings, and find out about its features.', 'writer-blog' ); ?>
	        </p>

	        <h3><?php esc_html_e( 'One Click Demo import', 'writer-blog' ); ?></h3>
	        <p>
	            <?php esc_html_e( 'Install and activate the recomended plugins before you import demo data. To install and activate recommended plugins goto Appearance->install plugins and after that goto Appearance->Import Demo Data.', 'writer-blog' ); ?>
	        </p>
    	</div><!-- /.six columns -->
	</div><!-- /.row -->
	<div class="row">
		<div class="wrap about-wrap about-pro">
			<h1 class="about-title"><?php echo esc_html__("Free Vs Premium", "writer-blog"); ?></h1>
			<div class="desc-button-container">
				<a target="blank" href="https://www.crafthemes.com/writer-pro/" class="button button-primary ">
					<?php echo esc_html__("Read Full Description", "writer-blog"); ?></a>
			</div>

			<table class="wp-list-table widefat">
				<thead>
					<tr>
					<th><strong><?php echo esc_html__("Theme Feature", "writer-blog"); ?></strong></th>
					<th><strong><?php echo esc_html__("Free Version", "writer-blog"); ?></strong></th>
					<th><strong><?php echo esc_html__("Premium Version", "writer-blog"); ?></strong></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td><?php echo esc_html__("Logo Upload", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Enable/disable Transparent Header", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Enable/disable Breadcrumb", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Replace Copyright Text", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Premium Support", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Easy Google Fonts ( 600+ )", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Colour Changes", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Font Size Options", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Advanced slider options", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Slider Multiple posts per slide", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Change Slider duration", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Enable/disable pause slider on hover", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Enable/disable slider and add text instead", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Custom Excerpt (Slider/Posts)", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Footer Customization (Colour/Text)", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Bottom Bar Customization (Colour/Text) ", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
					<tr>
						<td><?php echo esc_html__("Ads integration", "writer-blog"); ?></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/cross.png" alt="No"></span></td>
						<td><span class="checkmark"><img src="<?php echo esc_attr( get_template_directory_uri() ) ?>/img/check.png" alt="Yes"></span></td>
					</tr>
				</tbody>
			</table>

		</div>
	</div><!-- /.row -->
</div><!-- /.container about-writer -->

<?php
}