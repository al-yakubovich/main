<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
* Please browse readme.txt for credits and forking information
 * @package newsbuzz
 */

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="hfeed site">
    <header id="masthead"  role="banner">
      <nav class="navbar navbar-default navbar-fixed-top navbar-left" role="navigation"> 
        <!-- Brand and toggle get grouped for better mobile display --> 
        <div class="container" id="navigation_menu">
          <div class="navbar-header"> 
            <?php if ( has_nav_menu( 'primary' ) ) { ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
              <span class="sr-only"><?php echo esc_html('Toggle Navigation', 'newsbuzz') ?></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
            </button> 
            <?php } ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php 
              if (!has_custom_logo()) { 
                echo '<div class="navbar-brand">'; bloginfo('name'); echo '</div>';
              } else {
                the_custom_logo();
              } ?>
            </a>
          </div> 
          <?php if ( has_nav_menu( 'primary' ) ) {
            newsbuzz_header_menu(); 
          }
          ?>

        </div>
      </nav>
      <?php if ( is_front_page() ) { ?>
      <div class="site-header">
        <div class="site-branding">   
          <span class="home-link">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 col-xs-12">
                <!-- Start endifs-->
                <?php if ( get_theme_mod( 'toggle_all_header_text' ) == '' ) : ?>  
                <div class="header-box-white-wrapper">
                  <div class="header-box-white-wrapper-content">

                    <?php if ( get_theme_mod( 'toggle_above_title' ) == '' ) : ?>        
                    <?php if (get_theme_mod('hero_image_above_title') ) : ?>
                    <span class="frontpage-site-before-title">
                      <?php echo sanitize_text_field(get_theme_mod('hero_image_above_title')) ?>
                    </span>
                  <?php else : ?>
                  <span class="frontpage-site-before-title">
                    27 FEB 2017
                  </span>
                <?php endif; ?>
              <?php endif; ?>


              <?php if ( get_theme_mod( 'toggle_header_title' ) == '' ) : ?>     
              <?php if (get_theme_mod('hero_image_title') ) : ?>
              <span class="frontpage-site-title">
                <?php echo sanitize_text_field(get_theme_mod('hero_image_title')) ?>
              </span>
            <?php else : ?>
            <span class="frontpage-site-title">
              Eight Years of Blogging
            </span>
          <?php endif; ?>
        <?php endif; ?>


        <?php if ( get_theme_mod( 'toggle_header_subtitle' ) == '' ) : ?>    
        <?php if (get_theme_mod('hero_image_subtitle') ) : ?>
        <span class="frontpage-site-description">
          <?php echo sanitize_text_field(get_theme_mod('hero_image_subtitle')) ?>
        </span>
      <?php else : ?>
      <span class="frontpage-site-description">
        How to Create Tension Through Misdirection
      </span>
    <?php endif; ?>
  <?php endif; ?>


  <?php if ( get_theme_mod( 'toggle_header_button' ) == '' ) : ?>   
  <?php if (get_theme_mod('hero_image_button_text') ) : ?>
  <a href="<?php echo esc_url(get_theme_mod('hero_image_button_link')) ?>" class="frontpage-site-button">
    <?php echo sanitize_text_field(get_theme_mod('hero_image_button_text')) ?>
  </a>
<?php else : ?>
  <a href="<?php echo esc_url(get_theme_mod('hero_image_button_link')) ?>" class="frontpage-site-button">
    Read more
  </a>
<?php endif; ?>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
<!-- End endifs-->
</div>
</div>
</span>
</div>
</div>
<?php } ?>
</header>    

<div id="content" class="site-content">