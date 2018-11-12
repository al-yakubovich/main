<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mega-ui
 */
 $mega_ui_topbar_switch = get_theme_mod( 'mega_ui_display_topbar_setting', 0);
 $mega_ui_mail_address = get_theme_mod( 'mega_ui_mail_address');
 $mega_ui_contact_number = get_theme_mod( 'mega_ui_contact_number');
 $mega_ui_display_social_setting = get_theme_mod( 'mega_ui_display_social_setting', 0);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()){ ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if($mega_ui_topbar_switch==1){ ?>
<div class="top">
	<div class="container">
		<div class="row p-sm-0">
			<div class="col-md-6 col-sm-12 p-sm-0 top-cont">
				<ul class="md14 xs13 w500 mt2">
					<?php if($mega_ui_mail_address!=''){ ?>
					<li><a href="<?php echo esc_url('mailto:'.$mega_ui_mail_address); ?>"><i class="fa fa-envelope-o"></i> <?php echo esc_html($mega_ui_mail_address); ?></a></li>
				<?php } if($mega_ui_contact_number!=''){ ?>
					<li><a href="<?php echo esc_url('tel:'.$mega_ui_contact_number) ?>"><i class="fa fa-phone"></i> <?php echo esc_html($mega_ui_contact_number); ?></a></li>
				<?php  } ?>
				</ul>	
			</div>
			<div class="col-md-6 col-sm-12 p-sm-0 top-social">
				<?php if($mega_ui_display_social_setting==1){ ?>
				<ul class="m-0">
					<?php for($i=1; $i<=5; $i++){					
					if( get_theme_mod( 'mega_ui_social_icon_'.$i)!='' &&  get_theme_mod( 'mega_ui_social_link_'.$i)!=''){ ?>
					<li><a href="<?php echo esc_url(get_theme_mod( 'mega_ui_social_link_'.$i)); ?>" class="ui-icon <?php echo esc_html(get_theme_mod( 'mega_ui_social_icon_'.$i)); ?>" target="_blank"></a></li>
				<?php } } ?>
				</ul>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div class="header sticky-top">
   <nav class="navbar navbar-light navbar-expand-lg mainmenu">
	<div class="container">
			<div class="col-12 p-sm-0">
        <div class="col-lg-4 col-12 p-sm-0 float-left">
        	<div class="col-10 p-sm-0 float-left">
        		<?php $mega_ui_logo_id = get_theme_mod( 'custom_logo' );
								$mega_ui_logo_data = wp_get_attachment_image_src( $mega_ui_logo_id , 'full' );
								$mega_ui_logo = $mega_ui_logo_data[0];	?>
				<a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?>"><?php if(isset($mega_ui_logo)){ ?>
							<img src="<?php echo esc_url($mega_ui_logo); ?>" class="img-fluid center-block" alt="<?php bloginfo( 'name' ); ?>" >
							<?php }else{ 
							bloginfo( 'name' ); } ?></a>
			</div>
			<div class="col-2 float-left">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mega-ui-main-mavigation" aria-controls="mega-ui-main-mavigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
</div>
</div>
<div class="col-lg-8 col-12 float-left">
   <div class="collapse navbar-collapse" id="mega-ui-main-mavigation">
   					<?php wp_nav_menu( array(
									'theme_location' => 'mega_ui_primary',
									'container' => false,
									'menu_class' => 'navbar-nav ml-auto',
									'fallback_cb' => 'mega_ui_fallback_page_menu',
									'walker' => new mega_ui_nav_walker(),
									)
								);	?>
                    
                </div>
</div>
			</div>			
	</div>
  </nav>	
</div>