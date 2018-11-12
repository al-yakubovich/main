<?php
	/**
		* The free plugins from Dmytro Lobov
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
?>
<style>
	.height_screen{height:270px; background:#fff;}
	.height_screen img{max-width:100%;}
	.height_screen span{padding: 10px; font-size:16px; font-weight:500; display:block;}
	.height_screen a{color:#000; text-decoration:none;}
	.themes {overflow:hidden;}
</style>
<h3>The MyStem is good for using with the next plugins</h3>
<div class="wrap">
	<div class="theme-browser">
		<div class="themes">			
			<?php mystem_add_get_feed(); ?>			
		</div>
	</div>
</div>


<?php
	function mystem_add_get_feed() {			
		$image = get_template_directory_uri().'/admin/image/';		
		$plugins = array(
		0 => array('Page Builder', 'MyStem plus WPBakery WordPress Page Builder Plugin.', 'visual-composer.jpg', 'https://wow-estore.com/item/mystem-plus/'),
		
		1 => array('Lead Generation', 'Convert your website visitors into leads with the most feature-rich tools for marketing: Popups, Forms, Floating Buttons and other.', 'leadgeneration.png', 'https://wordpress.org/plugins/leadgeneration/'),
		
		2 => array('MyStem Extra', 'This plugin helps you to add extra options to WordPress theme MyStem.', 'mystem-extra.png', 'https://wordpress.org/plugins/mystem-extra/'),		
		
		3 => array('MyStem EDD', 'This plugin helps you to create a store with Easy Digital Downloads and WordPress theme MyStem.', 'mystem-edd.png', 'https://wordpress.org/plugins/mystem-edd/'),				
		
		);	
		foreach ($plugins as $key => $value) { ?>
		
		<div class="theme">
			<div class="height_screen">
				<a target="_blank" href="<?php echo esc_url( $value[3] ); ?>" target="_blank"><img src="<?php echo esc_url( $image.$value[2] ); ?>" />
					<span><?php echo esc_attr( $value[1] ); ?></span>
				</a>
			</div>
			<div class="theme-author"></div>
			<div class="theme-id-container">
				<h2 class="theme-name"><span><?php echo esc_attr( $value[0] ); ?></span></h2>	
				<div class="theme-actions">
					<a class="button button-primary load-customize hide-if-no-customize" href="<?php echo esc_url( $value[3] ); ?>" target="_blank">Get It Now</a>						
				</div>
			</div>
		</div>
		<?php } 
	}
?>
