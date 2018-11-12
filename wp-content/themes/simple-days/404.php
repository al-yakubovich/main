<?php get_header(); ?>
<main id="main">
  <div class="container m_con">
    <div class="contents contents_bg simple_days_box_shadow">
    <article class="article">
      <div id="post_body" class="post_body">
        <div class="on_thum b404">
          <div><h1 class="post_title">404<br /><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'simple-days' ); ?></h1></div>
          <?php
            if ( has_post_thumbnail() ) {
	          the_post_thumbnail();
            }else{
             echo '<'.( is_amp() ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url(get_theme_mod( 'simple_days_404_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/404.jpg')).'" width="960" height="640" />';
            } ?>
        </div>

        <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'simple-days' ); ?>
        <?php get_search_form(); ?>

                <?php  
          if ( is_active_sidebar( 'under_post' ) ) : ?>
          <aside class="under_post_widget">
            <?php dynamic_sidebar( 'under_post' ); ?>
          </aside>
        <?php endif; ?>

      </div>

    </article>
    </div>

    <?php if(get_theme_mod( 'simple_days_sidebar_layout','3') != '0')get_sidebar(); ?>

  </div>
</main>
<?php get_footer();
