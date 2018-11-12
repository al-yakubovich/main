<?php
	/**
		* The Admin Page
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$query['return'] = admin_url();
$link_with_return = add_query_arg( $query, admin_url( 'customize.php' ) );
$logo = get_template_directory_uri().'/admin/image/icon-white.png.';
?>
<style>
.about-wrap .wow-badge {
   position: absolute;
   top: 0;
   right: 0;
}
.wow-badge {
    background: url(<?php echo esc_url( $logo );?>) center 15px no-repeat #2794da;	
    background-size: 100px 100px;
    color: #fff;
    font-size: 14px;
    text-align: center;
    font-weight: 600;
    margin: 5px 0 0;
    padding-top: 120px;
    height: 40px;
    display: inline-block;
    width: 140px;
    text-rendering: optimizeLegibility;
    box-shadow: 0 1px 3px rgba(0,0,0,.2);
}
a.wow-badge {
	color: #fff;
	text-decoration: none;
}
</style>
<div class="wrap full-width-layout">
	<div class="about-wrap">
	<h1>Welcome to MyStem 1.4.1</h1>
	
	<p class="about-text">
		<?php esc_attr_e( 'MyStem is now installed and ready to use! Get ready to build something unique & beautiful.', 'mystem' ); ?><br/>		
		
		<?php
			/* translators: %s is url to Customizer */
		printf( '<a href="%s">' . esc_attr__( 'Go to Customizer', 'mystem' ) . '</a> ' . esc_attr__( 'to make Your Website Legendary.', 'mystem' ) , esc_url( $link_with_return ) ); ?></a>
		<br/>
		<strong><?php esc_attr_e( 'We hope you enjoy it!', 'mystem' ); ?> </strong>
	</p>
	<a href="https://wow-estore.com/item/mystem-plus/" target="_blank" class="wow-badge">Version 1.4.1</a>
	</div>
	<?php
		$current = ( isset( $_GET['tab'] ) ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'about';
		$tabs = array(			
			'about' => __( 'Welcome', 'mystem' ),
			'faq' => __( 'FAQ', 'mystem' ),
			'plugins' => __( 'Plugins', 'mystem' ),	
			'support' => __( 'Support', 'mystem' ),
		);		
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $tab => $name ) {
			$class = ( $tab === $current ) ? ' nav-tab-active' : '';
			echo '<a class="nav-tab' .esc_attr( $class ) . '" href="?page=mystem&tab=' . esc_attr( $tab ) . '">' . esc_attr( $name ) . '</a>';
		}
		echo '</h2>';
		echo '<div class="stem-content">';
		get_template_part( 'admin/'.$current );
		echo '</div>';
	?>
</div>
