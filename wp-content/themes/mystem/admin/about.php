<?php
	/**
		* About the WordPress Theme 'MyStem'
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.3
	*/
?>
<script>
	jQuery(document).ready(function($) {
		changlog = 1;
		$('.about-wrap #accordion').css('display', 'none');
		$('.about-wrap').children('.changelog').click(function(){ $(this).siblings('#accordion').toggle(700, function(){
			
      if ( changlog == '1' ) {			
				$('.about-wrap .changelog').text('Hide Changelog');
				changlog = 2;					
			}
			else {
				$('.about-wrap .changelog').text('Show Changelog');
				changlog = 1;				
			}
		});});
		
	})
</script>
<style>
	.about-wrap ul {
	margin: 15px;
	font-size: 16px;
	}	
	.about-wrap ul li:before{
	font-family: dashicons;
	content: "\f147"; 
	padding: 8px;
	}	
	#accordion {
	background: #f7f7f7;
	font-family: "Courier 10 Pitch", Courier, monospace;
	color: #555;
	font-size: 13px;
	line-height: 1.6;
	padding: 5px 16px;
	border: 3px solid #eaeaea;
	border-radius: 4px 4px 0 0;
	margin-bottom: 0;
	max-height: 300px;
	overflow: auto;
	white-space:pre-line;
	}
	.about-wrap .changelog {
	margin-bottom: 0;
	}
	
	.about-wrap .changelog{
	background: #eaeaea;
	font-size: 18px;
	padding: 4px 10px 4px 20px;
	border-radius: 0 0 4px 4px;
	font-size: 16px;
	font-weight: 700;
	max-width: 150px;
	cursor: pointer;
	}
	
	.attantion {
		border:1px solid #1f9ef8;	
		margin-bottom:13px;
		padding:0 15px;		
	}
	.attantion p, .attantion li {
		font-size: 16px;
	}
	.attantion a {
		font-weight: bold;
	}
	
</style>


<div class="about-wrap">
	<h3>What's New</h3>
	<p><b>Updated</b> FontAwesome to version 5.4.1</p>
	<p><b>Added</b> a new page template. About all templates you can read on tab 'FAQ'</p>
	<div class="attantion">
		<p>We recommend installing <b>Free WordPress Plugins</b> via wordpress.org:
			<ul>
				<li><a href="https://wordpress.org/plugins/leadgeneration/" target="_blank">Lead Generation</a> - convert your website visitors into leads with the most feature-rich tools for marketing: Popups, Forms, Floating Buttons and other;</li>
				<li><a href="https://wordpress.org/plugins/mystem-extra/" target="_blank">MyStem Extra</a> - extra features to MyStem like shortcodes, category templates, single templates and more;</li>
				<li><a href="https://wordpress.org/plugins/mystem-edd/" target="_blank">MyStem EDD</a>  - if you wand create a Store with the plugin <a href="https://wordpress.org/plugins/easy-digital-downloads/" target="_blank">Easy Digital Downloads</a></li>
			</ul>
			</p>
			<p><span class="dashicons dashicons-migrate" style="color:#37c781;"></span> <?php printf( __( '<a href="%s" target="_blank">More advanced with Page Builder</a>','mystem' ), esc_url( 'https://wow-estore.com/item/mystem-plus/' ) ); ?>
		</p>
	</div>
	<p>
		Convenient, clean and simple to use WordPress theme MyStem will help attract and retain more visitors to your site. It is great for creating blogs, websites, portfolios, news and information portals, magazine publications, etc. The responsive multifunctional theme is optimized for SEO with great attention to detail. 
	</p>
	<p>	
		It supports widgets with a variety of sidebar options and 3 footers. It allows you to add the audio and video content, display individual images and whole galleries, navigational menus, recent posts, RSS feeds and more through the widgets. 
	</p>
	<p>
		You can easily customize the flexible menu, logo and resource icon, edit the color scheme of the site, the content display options on the main page, add your own CSS code. 
	</p>
	<p>The theme is fully adaptable, it provides convenient viewing on various devices. Features: 
		
		<ul>
			<li>GDPR (Privacy Policy link in footer);</li>
			<li>Supports multilanguage;</li>
			<li>Live Customizer;</li>
			<li>Responsive layout;</li>
			<li>Customizing the color scheme;</li>
			<li>2 customizable menus;</li>
			<li>Mobile device menus;</li>
			<li>Three additional widgets (Categories, Recent Posts, Resent Comments); </li>		
			<li>Good use with the plugins MyStem Extra, MyStem EDD, Visual Composer.</li> 
		</ul>
	</p>		
	<p>
		
		
		<div id="accordion">
			= 1.4 =
			* Updated: FontAwesome to version 5.4.1
			* Added: page template 'Page with Page Sidebar'
			
			= 1.3 =
			* Added: left class for header menu.
			* Updated: FontAwesome 5.2.0.
			* Fixed: minor bugs in the style.			
			
			= 1.2.1 =
			* Added: Widgets Nav Menu.
			* Fixed: Minor bugs in the style.
			* Fixed: Choose a layout.
			
			= 1.2 =
			* Added: 3 Widgets (Categories, Recent Posts, Resent Comments).
			* Added: font iconpicker in Customizer.
			* Fixed: minor bugs in the style.
			
			= 1.1.2 =
			* Added: Submenu into header menu.
			* Added: Showing submenu animation.
			
			= 1.1.1 =
			* Fixed: default values of site. 
			
			= 1.1 =
			* Added: Option 'Hide Private policy link'
			* Added: Custom menu for the mobile device
			* Fixed: main style
			
			= 1.0.9 =
			* Added: Privacy Policy link in the footer
			* Added: Opt-in for commenter cookies
			* Added: Template page - Full Width without Title
			
			= 1.0.8 =
			* Fixed: Search term
			
			= 1.0.7 =
			* Fixed: Page navigation
			
			= 1.0.6 =
			* Fixed: Style for page with Visual Composer
			
			= 1.0.5 =
			* Released: April 19, 2018
			
			
		</div>
		<div class="changelog">Show Changelog</div>
	</p>
	
	
</div>