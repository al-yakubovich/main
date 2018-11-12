<?php

//Añadir menú para la guia
add_action( 'admin_menu', 'rubbersoul_menu_guia' );

function rubbersoul_menu_guia() {  
  	
	add_theme_page( __('RubberSoul Guide', 'rubbersoul'), '<span style="color:#DD9933;">' . __('RubberSoul Guide', 'rubbersoul') . '</span>', 'edit_theme_options', 'rubbersoul_guide', 'rubbersoul_mostrar_guia'); 
  
} 

//Página de presentación
function rubbersoul_mostrar_guia() { 

//Obtenemos la url actual para volver cuando cerramos el customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
a{text-decoration:none !important;}
.wrapper-rsoul {overflow:hidden; line-height:1.5; font-size: 14px; max-width:1440px; margin:0 auto;}
.col-right{background-color:#fafafa;}
.title {margin-bottom:28px;}
.img-left {float:left;}
.dash-middle {vertical-align:midlle !important;}
.changelog{max-width:700px; margin:14px auto; max-height:300px; border:1px solid #ccc; padding:0 14px; overflow:scroll;}
.icon:before, .libro:before, .estrella:before {
	content: "\f333";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
}
.libro:before {
	content: "\f331";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
	color:#25C4E6;
}
.estrella:before {
	content: "\f155";
	color:#25C4E6;
}
.check-title:before {
	content: "\f147";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 40px/1 'dashicons';
	vertical-align: middle;
	/*color:#059820;*/
	color:#ffffff;
	background-color:#25C4E6;
	border:1px solid #25C4E6;
	border-radius:50%;
}
.pro-title:before {
	content: "\f155";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 50px/1 'dashicons';
	vertical-align: middle;
	color:#25C4E6;
}
.check-lista:before {
	content: "\f147";
	display: inline-block;
	-webkit-font-smoothing: antialiased;
	font: normal 20px/1 'dashicons';
	vertical-align: middle;
	color:#25C4E6;
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
	background-color:#25C4E6;
	color:#fff;
	text-align:center;
	font-size:18px;
	font-weight:bold;
}
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}

</style>

<div class="wrapper-rsoul">
	<div class="col-left">
		<div><a href="<?php echo RUBBERSOUL_AUTHOR_URI; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/galussothemes-logo.png" /></a></div>
		<hr />
		<h2 style="font-weight:bold;"><span class="check-title"></span> <?php _e('Thank you for choosing RubberSoul', 'rubbersoul'); ?></h1>
		
		<?php _e('RubberSoul is a simple and light WordPress theme with a clear and neat design. Some its features are: left sidebar or right, custom theme color (blue, black, green, orange, red, pink, yellow or purple), custom favicon, six different Google Fonts, logo rounded or square, thumbnails rounded or squared, two widgets areas (beginning and end of posts), customization panel, fully responsive, custom header, custom background and more. Translation Ready (English and spanish integrated). Required WordPress 4.1+.', 'rubbersoul'); ?>
		
		<h2><span class="libro"></span> <?php _e('RubberSoul Quick Start Guide', 'rubbersoul'); ?></h2> 
		
		<h3><span class="icon"></span> <?php _e('Important: thumbnails', 'rubbersoul'); ?></h3>
			&#9679; <?php _e('For images appear on the homepage, you must set the featured image of the posts.', 'rubbersoul');?>
			<br />
			&#9679; <?php _e('If RubberSoul is not the first theme you use, you must regenerate the thumbnails of image with some free plugin as', 'rubbersoul'); ?> <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a>.
		
		<h3><span class="icon"></span>  <?php _e('Customize RubberSoul', 'rubbersoul'); ?></h3>
		<?php _e('Go to "Appearance >> Customize >> RubberSoul Options" and set the options in the sections "Color, Logo, Favicon and Sidebar", "Social icons", "Posts and footer text", "Fonts".', 'rubbersoul'); ?> <a href="customize.php?autofocus[panel]=rubbersoul_panel&return=<?php echo $return ;?>"><?php _e('RubberSoul Options', 'rubbersoul'); ?></a>
		<br />
		<hr />
		
		<h2><span class="estrella"></span> <?php _e('Rating and Review', 'rubbersoul'); ?></h2>
		<?php _e('Please, if you are happy with the theme, say it on wordpress.org and give RubberSoul a nice review. Thank you.', 'rubbersoul'); ?>
		
		<div style="text-align:center; margin-top:14px;">
		<a class="button-primary ribo_rating" href="https://wordpress.org/support/view/theme-reviews/rubbersoul" target="_blank"><?php _e('Review RubberSoul', 'rubbersoul'); ?></a>
		</div>
		
	</div><!-- .col-left -->
	
	<div class="col-right">
		
		<div class="imagen">
			<div style="padding:0 5px; text-align:center;">
				<?php _e('With <strong>RubberSoul Pro</strong> you can set up your blog with everything you need in minutes.', 'rubbersoul'); ?>
				<hr />
			</div>
			
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/rubbersoul-pro-features.png" />
		
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="http://demos.galussothemes.com/rubbersoul-pro" target="_blank"><?php _e('Live Demo', 'rubbersoul'); ?></a> | 
				<a href="<?php echo RUBBERSOUL_AUTHOR_URI; ?>/wordpress-themes/rubbersoul-pro" target="_blank"><?php _e('Buy', 'rubbersoul'); ?></a> | 
				<a href="<?php echo RUBBERSOUL_AUTHOR_URI; ?>/wordpress-themes/rubbersoul" target="_blank"><?php _e('Compare with Lite Version', 'rubbersoul'); ?></a>
				<hr />
			</div>
		</div><!-- .imagen -->
		
		<div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			<?php _e('Features', 'rubbersoul'); ?>
		</div>
		
		<ul>
			<li><span class="check-lista"></span> <a href="<?php echo RUBBERSOUL_AUTHOR_URI; ?>/soporte/foro/rubbersoul-pro"><?php _e('Forum support', 'rubbersoul'); ?></a></li>
			<li><span class="check-lista"></span> <?php _e('Unlimited theme colors', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Sidebar left or right', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Show extract or whole post on homepage and archive pages.', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('7 widgets areas to add AdSense code or anything else', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Easily add your Favicon', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Easily add yor Login Logo', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Available 15 differents Google fonts', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Custom widgets (Recent posts with thumbnails, Popular posts with thumbnails, Recent comments with avatar, Email subscription)', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Related posts with thumbnails', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Show/Hide post meta (author, date, comments number)', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Show/Hide pages title', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Breadcrumb navigation', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Custom pagination', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Custom shortcodes (Buttons, Messages, Accordion and Tabs)', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Social networks in user profile', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Google Plus Authorship Integration', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Easily apply RubberSoul style to bbPress, just check the option.', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Google Analytics ready, just paste the code', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('AddThis ready, just paste the code', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Translation Ready (.po file integrated)', 'rubbersoul'); ?></li>
			<li><span class="check-lista"></span> <?php _e('Integrated Spanish and English', 'rubbersoul'); ?></li>
		</ul>
	</div><!-- col-right -->
	
</div><!-- .wrapper -->
<?php } ?>