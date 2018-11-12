<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8">
	
		<!-- Mobile Specific Data -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="mobile-menu-overlay"></div>
	  	<header class="site-header <?php echo esc_attr( writer_blog_header_transparency() ); ?>">
	        <div class="container">
	            <div class="row vertical-align">
		            <div class="five columns">
		                <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		            </div>

					<?php if ( has_nav_menu( 'header_menu' ) ) : ?>
	                <div class="seven columns">
		                <?php
		                	wp_nav_menu( array( 
								'theme_location' => 'header_menu',
								'container' => 'nav',
								'menu_class' => 'main-nav',
								'depth' => '3'
							) );
						?>
					</div>
				<?php endif; ?>
	            </div><!-- /.row -->
	        </div><!-- /.container -->
	    </header>

	    <?php if ( has_nav_menu( 'mobile_menu' ) ) : ?>
	    <div class="container mobile-menu-container">
		    <div class="row">
			    <div class="mobile-navigation">
		    		<span class="menubar-right fa fa-bars <?php echo esc_attr( writer_blog_mobile_menu_icon_color_switch() ); ?>"></span>
	        		<nav class="nav-parent">
				        <span class="menubar-close fa fa-times"></span>
	        			<?php
		                	wp_nav_menu( array(
								'theme_location'	=> 'mobile_menu',
								'container'			=> false,
								'menu_class'		=> 'mobile-nav',
								'depth'				=> '3',
								'walker'			=> new writer_blog_dropdown_toggle_walker_nav_menu()
							) );
						?>
					</nav>
				</div> <!-- /.mobile-navigation -->
		    </div>
	    </div>
		<?php endif; ?>