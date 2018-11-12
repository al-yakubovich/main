<?php
function simple_days_footer_menu(){
    echo '<div class="f_menu_wrap"><div class="f_menu"><nav id="nav_f" class="nav_base">';
    wp_nav_menu( array(
                 'theme_location'  => 'secondary',
                 'menu_class'      => 'menu_base',
                 'menu_id'         => 'menu_f',
                 'container'       => 'ul',
                 'fallback_cb'     => '__return_false'
            ));
    echo '</nav></div></div>';
}
$mod = get_theme_mod( 'simple_days_footer_layout','2');
?>

  <footer id="site_f">
    <?php if( $mod == '1' && has_nav_menu('secondary') ) simple_days_footer_menu(); ?>
    <aside class="f_widget_wrap<?php  if ( !is_active_sidebar( 'footer-1' ) && !is_active_sidebar( 'footer-2' ) && !is_active_sidebar( 'footer-3' ))echo ' no_bg'; ?>">
      <div class="f_widget">
        <?php //if(is_active_sidebar('footer-1')){ ?>
        <div class="f_widget_L"><?php dynamic_sidebar('footer-1'); ?></div>
        <?php //} if(is_active_sidebar('footer-2')){ ?>
        <div class="f_widget_C"><?php dynamic_sidebar('footer-2'); ?></div>
        <?php //} if(is_active_sidebar('footer-3')){ ?>
        <div class="f_widget_R"><?php dynamic_sidebar('footer-3'); ?></div>
        <?php //}?>
      </div>

      <?php 
      if(get_theme_mod( 'simple_days_back_to_top_button',true) == true){ ?>
        <a class='to_top non_hover tap_no' href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
        <?php
      } ?>
    </aside>
    <?php if( $mod == '2' && has_nav_menu('secondary') ) simple_days_footer_menu(); ?>
    <div class="credit_wrap">
      <div class="credit">
        <div class="copyright_left">
          <div class="copyright_info">
            <?php
              if (get_theme_mod( 'simple_days_sitemap_page_post_name','') != '' && get_theme_mod( 'simple_days_sitemap_footer',false)){
                $page = get_page_by_path(get_theme_mod( 'simple_days_sitemap_page_post_name',''));
                echo (isset($separate) ? esc_html($separate) : '');
                echo '<div><a href="'.esc_url( get_permalink( $page->ID ) ).'">'.esc_attr__( 'Site Map', 'simple-days' ).'</a></div>';
              }
              if ( function_exists( 'the_privacy_policy_link' ) && get_privacy_policy_url() ) {
                  echo '';
                  the_privacy_policy_link( '<div>', '</div>' );
                  echo '';
                  if(!get_theme_mod( 'simple_days_sitemap_footer',false) || get_theme_mod( 'simple_days_sitemap_page_post_name','') == '')echo '<div class="dn"></div>';
              }else{
                echo '<div class="dn"></div>';
              } ?>
          </div>
          <div class="copyright_wordpress">
            <div<?php echo (get_theme_mod( 'simple_days_copyright_wordpress',false) == true ? ' class="dn"' : ''); ?>>Powered by <a href="<?php echo esc_url('https://wordpress.org/'); ?>">WordPress</a></div>
            <div<?php echo (get_theme_mod( 'simple_days_copyright_simple_days',false) == true ? ' class="dn"' : ''); ?>>Theme by <a href="<?php echo esc_url('https://back2nature.jp/themes/simpledays'); ?>">Simple Days</a></div>
            <?php echo (get_theme_mod( 'simple_days_copyright_wordpress',false) == true ? '<div class="dn"></div>' : ''); ?>
          </div>
        </div>
        <div class="copyright_right">
          <?php $description = get_bloginfo('description');
          if( $description != '' ) echo '<div class="description'.(get_theme_mod( 'simple_days_copyright_description',false) == true ? " dn" : "") .'">'.esc_html($description).'</div>'; ?>
          <div class="copyright">
              <?php echo '&copy; '.(get_theme_mod( 'simple_days_copyright_year','none') != 'none' ?  esc_html( get_theme_mod( 'simple_days_copyright_year') ) : esc_html( date('Y') ) ).' <a href="'. esc_url( home_url() ).'">'.  esc_html( get_bloginfo('name') ).'</a>';

            ?>
          </div>
        </div>
      </div>
    </div>
    <?php if( $mod == '3' && has_nav_menu('secondary') ) simple_days_footer_menu(); ?>
  </footer>
<?php wp_footer(); ?>
</body>
</html>
