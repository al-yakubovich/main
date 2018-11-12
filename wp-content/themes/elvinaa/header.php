<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elvinaa
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		if(true === get_theme_mod( 'el_preloader_display',true )){
      		?>
		        <!-- Begin Preloader -->
		        <div class="loader-wrapper">
		            <div id="pre-loader"></div>
		        </div>
        		<!-- End Preloader -->
      		<?php
    	}
	?>

    <!-- Header Styles -->
    <?php
      /**
       * Hook - elvinaa_action_header.
       *
       * @hooked elvinaa_header_style_1 - 10
       */
      do_action( 'elvinaa_action_header' );
    ?>
	
    <?php if( is_front_page()) {
  		
        if("slider" != esc_attr(get_theme_mod( 'el_slide_options_radio' ))) {
   			
            /* background selection */
            if ('color' === esc_attr(get_theme_mod( 'el_home_bg_radio','image' ))) {
                ?>
                    <div id="home" class="elementor-menu-anchor"></div>
                        <section class="home-color-section" style="background: <?php echo sanitize_hex_color(get_theme_mod( 'el_home_bg_color' )); ?> ">
                <?php    
            }
            else{
                ?>
                    <div id="home" class="elementor-menu-anchor"></div>
                        <section id="parallax-bg" class="<?php echo esc_attr(get_theme_mod( 'el_header_styles','style1')) ?>">
                        <?php
                            /* check for parallax */                            
                            if(true === get_theme_mod( 'el_home_parallax',true)){
                                ?>
                                    <div id="slider-wrapper">
                                        <div id="slider-inner" class="home-bg-item" data-parallax="scroll" data-image-src="<?php echo esc_url(get_theme_mod( 'el_theme_home_bg',get_template_directory_uri().'/img/start-bg.jpg' )); ?>">
                                            <div class="inner-overlay">   
                                <?php
                            }
                            else{
                                ?>
                                    <div id="slider-wrapper">
                                        <div id="slider-inner" class="home-bg-item" style="background:url('<?php echo esc_url(get_theme_mod( 'el_theme_home_bg' )); ?>') no-repeat;">
                                            <div class="inner-overlay">
                                <?php

                            }                        
                        ?>
                <?php
            }

            ?>           
                
          <!-- Container --><div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="slide-bg-section">
                                            <div class="slide-bg-text">
                                                <h1 class="<?php echo esc_attr(get_theme_mod( 'el_home_text_position','center' )); ?>">
                                                    <?php
                                                        $home_heading_text=esc_attr(get_theme_mod( 'el_home_heading_text'));
                                                        if(!empty($home_heading_text)) {
                                                            echo $home_heading_text;     
                                                        }
                                                        else{
                                                            echo esc_attr(bloginfo( 'name' ));
                                                        }
                                                    ?>
                                                </h1>
                                                <p class="<?php echo esc_attr(get_theme_mod( 'el_home_text_position','center' )); ?>"><?php echo esc_attr(get_theme_mod( 'el_home_subheading_text', get_bloginfo( 'description', 'display' ))); ?></p>                                                    
                                                <div class="slide-buttons <?php echo esc_attr(get_theme_mod( 'el_home_text_position','center' )); ?>">    
                                                    <?php
                                                        $home_button_text = esc_attr(get_theme_mod( 'el_home_button_text' ));
                                                        if(!empty($home_button_text)) {
                                                            ?>
                                                                <div class="read-more first">
                                                                    <a class="btn" href="<?php echo esc_url(get_theme_mod( 'el_home_button_url' ));?>"><?php echo esc_attr(get_theme_mod( 'el_home_button_text' ));?> 
                                                                    </a>
                                                                </div>
                                                            <?php
                                                        }
                                                        $home_button2_text = esc_attr(get_theme_mod( 'el_home_button2_text' ));
                                                        if(!empty($home_button2_text)) {
                                                            ?>
                                                                <div class="read-more">
                                                                    <a class="btn" href="<?php echo esc_url(get_theme_mod( 'el_home_button2_url' ));?>"><?php echo esc_attr(get_theme_mod( 'el_home_button2_text' ));?> 
                                                                    </a>
                                                                </div>
                                                            <?php                                                 
                                                        }
                                                    ?>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div></div></div>
                        </section>                       
                        </div></div>                      
                </div>              
            <?php
        }
        else{
            //slider
            elvinaa_get_featured_slider();
        }
    }