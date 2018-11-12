<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package mega-ui
*/
$mega_ui_display_footer_menu = get_theme_mod( 'mega_ui_display_footer_menu', 0);
$mega_ui_footer_credit = get_theme_mod( 'mega_ui_footer_credit');
$mega_ui_footer_company = get_theme_mod( 'mega_ui_footer_company');
$mega_ui_footer_link = get_theme_mod( 'mega_ui_footer_link');
?>


<div class="footer update">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="row">
        <?php if ( is_active_sidebar( 'mega-ui-footer-widget' ) ){
            dynamic_sidebar( 'mega-ui-footer-widget' );
          } ?>
        </div>  
      </div>  
      <div class="col-md-5 col-sm-5 col-xs-12">
        <?php if ( is_active_sidebar( 'mega-ui-footer-widget-right' ) ){
            dynamic_sidebar( 'mega-ui-footer-widget-right' );
          } ?>
      </div> 
    </div>
  </div>
  
</div>

<div class="copyright">
  <div class="container">
    <div class="row">
      <?php if($mega_ui_display_footer_menu==1){ ?>
      <div class="col-md-12 col-sm-12 col-12 footer-menu text-center">
        <?php wp_nav_menu( array(
            'theme_location' => 'mega_ui_footer',
            'container'=> false,
            'menu_class' => 'menu_footer_nav',
            )
          ); ?>
      </div>
    <?php } ?>
      <div class="col-md-12 col-sm-12 col-12 policy text-center">
        <div class="md14 sm13 xs13 w400 ">
          <?php if($mega_ui_footer_credit!=''){ echo esc_html($mega_ui_footer_credit); }
          if($mega_ui_footer_company!='' && $mega_ui_footer_link!=''){?> 
            <a href="<?php echo esc_url($mega_ui_footer_link); ?>" ><?php echo esc_html(($mega_ui_footer_company)); ?> | </a>
          <?php }?>
          <?php echo esc_html_e('Mega UI Theme by','mega-ui'); ?> <a href="https://darshansaroya.com" target="_blank" ><?php echo esc_html_e('Darshan Saroya','mega-ui'); ?></a></div>
      </div>
       
      </div>
    </div>
  </div>
</div>


<a href="#" class="back-to-top text-center"><i class="fa fa-angle-up"></i></a>  

<!--top-bottom-->
<?php wp_footer(); ?>
</body>

</html>