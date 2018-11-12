<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our_blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <header class="header5">
  <!-- Navbar -->
  <nav class="navbar">
    <div class="container">
      <!-- left nav -->
      <?php 
      $social_enable    = get_theme_mod( 'our_blog_top_header_social_links_enable', '1' ); 
      if($social_enable):?>
        <ul class="social-icon pull-sm-left">
         <?php our_blog_social_links();?>
       </ul>
     <?php  endif;?>
     <!-- Right nav -->
     <ul class="search-tab pull-sm-right">
      <li><a href="#search"><span class="fa fa-search" aria-hidden="true"></span></a></li>
      <li><a href="javascript:;" class="toggle" id="sidenav-toggle" ><span class="fa fa-bars" aria-hidden="true"></span></a></li>
    </ul>
    <div id="search">
      <button type="button" class="close"><?php echo esc_html__('close','our-blog');?></button>
      <?php get_search_form();?>
    </div>
  </div>
</nav>

<!-- side nav -->
<nav class="sidenav" data-sidenav data-sidenav-toggle="#sidenav-toggle">
  <div class="sidenav-brand">
    <div class="logo text-center">
      <?php 
      if(has_custom_logo()):
        the_custom_logo();
      else:    
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url());?>"><?php bloginfo('title');?></a></h1>
      <?php endif;?>
    </div>
  </div>

  <div class="sidenav-header">
    <?php get_search_form();?>
  </div>
  <?php
  if ( has_nav_menu( 'primary' ) ) :
    wp_nav_menu( array(
      'theme_location'    => 'primary',
      'depth'             => 7,
      'menu_class'        => 'sidenav-menu',
      'container_class' => '',
      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'walker'            => new wp_bootstrap_navwalker(),
    ));
    ?>
    <?php else : ?>
      <ul class="sidenav-menu">
        <li>
         <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> " class="nav-link"> <?php esc_html_e('Add a menu','our-blog'); ?></a>
       </li>
     </ul>
   <?php endif; ?>
 </nav>
 <!-- end side nav -->

 <nav class="navbar navbar-expand-lg">
  <div class="container">
    <div class="logo">
     <?php 
     if(has_custom_logo()):
      the_custom_logo();
    else:    
      ?>
      <h1 class="site-title"><a href="<?php echo esc_url(home_url());?>"><?php bloginfo('title');?></a></h1>
    <?php endif;?>
  </div>
  <!-- center nav -->
  <?php
  if ( has_nav_menu( 'primary' ) ) :
    wp_nav_menu( array(
      'theme_location'    => 'primary',
      'depth'             => 7,
      'menu_class'        => 'nav navbar-nav ml-auto',
      'container_class' => 'collapse navbar-collapse',
      'container_id' => 'navbarNavDropdown', 
      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'walker'            => new wp_bootstrap_navwalker(),
    ));
    ?>
    <?php else : ?>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
         <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> " class="nav-link"> <?php esc_html_e('Add a menu','our-blog'); ?></a>
       </li>
     </ul>
   <?php endif; ?>
 </div>
</nav>
</header>


<?php if( is_home()):
  if(get_theme_mod( 'our_blog_slider_section_enable' ) == '1'):
    ?>
    <section class="banner-holder block-4">
      <div class="banner slider4">
        <div class="row">
          <?php
          $slider_catId = esc_attr(get_theme_mod( 'our_blog_slider_title'));
 
          $slider_number = get_theme_mod('our_blog_slider_number');
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => $slider_number,
            'post_status' => 'publish',
            'cat' => $slider_catId,

          );

          $sliderloop = new WP_Query($args);

          while ($sliderloop->have_posts()) : 
            $sliderloop->the_post(); 
            ?>
            <div class="col-md-4">
              <a href="#" class="item">
               <?php if(has_post_thumbnail()): 
                the_post_thumbnail('our-blog-slider-1-450x403');
              endif;
              ?>
              <div class="caption">
                <div class="tag yellow">
                  <span><?php echo esc_html(get_cat_name($slider_catId));?></span>
               </div>
               <h1><?php the_title();?></h1>
               <?php the_excerpt();?>
             </div>
           </a>
         </div>
       <?php endwhile;
       wp_reset_postdata();
       ?>

     </div>
   </div>
 </section>
<?php endif;
endif;?>
