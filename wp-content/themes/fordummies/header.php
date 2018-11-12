<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package ForDummies
 * @subpackage For_dummies
 * @since For dummies 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fordummies' ); ?></a>
	    	<header id="masthead" class="site-header" role="banner">
         	<div id="display_loadingdiv" >
				<img id="display_loading" src="<?php echo get_template_directory_uri() . '/images/ajax-loader.gif' ?>" alt="loading icon" />
			</div> 
            			<div class="site-header-main">
              <div id="top_header" >
                     <div id="header_top_left" >
                        <?php 
                          $fordummies_icon_color = trim(get_theme_mod('fordummies_topinfo_color','gray'));
                          $fordummies_topinfo_color = esc_attr($fordummies_icon_color);
                          $fordummies_topinfo_email = trim(get_theme_mod('fordummies_topinfo_email',''));
                          $fordummies_topinfo_email = esc_attr($fordummies_topinfo_email);
                          $fordummies_topinfo_phone = trim(get_theme_mod('fordummies_topinfo_phone',''));
                          $fordummies_topinfo_phone = esc_attr($fordummies_topinfo_phone);
                          $fordummies_topinfo_hours = trim(get_theme_mod('fordummies_topinfo_hours',''));
                          $fordummies_topinfo_hours = esc_attr($fordummies_topinfo_hours);
                          if(!empty($fordummies_topinfo_phone))
                          {
                                      echo '<img id="fordummies_iconphone" alt="my phone" src="'.get_template_directory_uri().'/images/phone-icon_'.$fordummies_icon_color.'.png"  />'; 
                                      echo '<div id="fordummies_topinfo_text">'.esc_attr($fordummies_topinfo_phone).'</div>';
                          }
                          if(!empty($fordummies_topinfo_email))
                          {
                                    echo '<img id="fordummies_iconemail" alt="my email" src="'.get_template_directory_uri().'/images/email-icon_'.$fordummies_icon_color.'.png"  />'; 
                                    echo '<div id="fordummies_topinfo_text">';
                                    echo '<a href="mailto:';
                                    echo $fordummies_topinfo_email;
                                    echo '">';
                                    echo $fordummies_topinfo_email;
                                    echo '</a>';
                                    echo '</div>';
                          }
                          if(!empty($fordummies_topinfo_hours))
                          {
                                      echo '<img id="fordummies_iconhours" alt="my hours" src="'.get_template_directory_uri().'/images/clock-icon_'.$fordummies_icon_color.'.png"  />'; 
                                      echo '<div id="fordummies_topinfo_text">'.esc_attr($fordummies_topinfo_hours).'</div>';
                          }
                          ?>
            </div>   
                 <div id="header_top_right">
            			<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'fordummies' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'top-social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
                </div>             
           </div>    
             <div class="fordummies_my_shopping_cart"> 
             <?php global $woocommerce;
                if (isset($woocommerce)) {
                    // get cart quantity
                    $qty = $woocommerce->cart->get_cart_contents_count();
                    // get cart total
                    $total = $woocommerce->cart->get_cart_total();
                    // get cart url
                    $cart_url = esc_url($woocommerce->cart->get_cart_url());
                    if ($qty > 0)
                        echo '<a href="' . $cart_url . '"><img src="' . get_template_directory_uri() .
                            '/images/cart.png" alt="Cart" width="32" height="32" /></a>';
                    // if multiple products in cart
                    if ($qty > 1)
                        echo '<a href="' . $cart_url . '">' . ' ' . $qty . ' products | ' . $total .
                            '</a>';
                    // if single product in cart
                    if ($qty == 1)
                        echo '<a href="' . $cart_url . '"> 1 product | ' . $total . '</a>';
                } ?> 
            </div> <!-- #fordummies_shopping_cart --> 
				<div class="site-branding">
					<?php fordummies_the_custom_logo(); ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'fordummies' ); ?></button>
					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'fordummies' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
                     <div id="fordummies_searchform">       
                      <?php get_search_form( ); ?>
                     </div>                                
							</nav><!-- .main-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->
			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default fordummies custom header sizes attribute.
					 *
					 * @since For dummies 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'fordummies_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
		</header><!-- .site-header -->
		<div id="content" class="site-content">