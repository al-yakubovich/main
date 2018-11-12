<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our_blog
 */
?>
<footer class="footer5">
  <div class="info-content">
    <div class="container">
      <div class="row">
        <?php
        if(is_active_sidebar( 'footer-1' )): 
          dynamic_sidebar( 'footer-1' ); 
        endif;
        ?>
      </div>
    </div>
  </div>

  <div class="social-holder">
    <?php $social_enable    = get_theme_mod( 'our_blog_bottom_footer_social_links_enable', '1' ); 
    if($social_enable):?>
      <ul class="social-icon">
        <?php 
        our_blog_social_links();
        ?>
      </ul>
    <?php     endif;?>
  </div>
  <div class="copyright">
    <div class="container">
      <div class="c-text">
        <span class="fa fa-copyright" aria-hidden="true"></span> 
        <?php esc_html_e('All Right Reserved ','our-blog');  echo  esc_html(date('Y'));?> <?php esc_html(bloginfo('name')); ?>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
