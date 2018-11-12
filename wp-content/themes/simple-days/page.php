<?php get_header(); ?>
<?php while(have_posts()): the_post();
          $sort_order_list =array(
               'breadcrumbs','title','date','author','pv','thumbnail','content','widget','page_link','cta','share','author_profile','related','category','tag','pagenation','comment',
            );
          $single_sortable = array();
          $single_sortable = get_theme_mod( 'simple_days_page_sortable',$sort_order_list);
          if(count($single_sortable) != count($sort_order_list)){
            $single_sortable = $sort_order_list;
          }
            if((get_theme_mod( 'simple_days_font_body_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_post_title_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google_jp', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_jp_effects_2', 'none' ) != 'none'){
              $post_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_jp_effects_2');
            }elseif((get_theme_mod( 'simple_days_font_body_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_post_title_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_effects_2', 'none' ) != 'none'){
              $post_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_effects_2');
            }else{$post_title_effects = '';}

    if(get_theme_mod('simple_days_page_full_width_thumbnail',false) && get_theme_mod( 'simple_days_page_thumbnail',true) && has_post_thumbnail()){ ?>
      <div class="full_thum_b on_thum fit_box_img_wrap">
    <?php
      if(get_theme_mod( 'simple_days_page_title_over_thumbnail',false)){
        echo '<div><h1 class="post_title'.esc_attr($post_title_effects).'">'. esc_html(get_the_title()).'</h1></div>';
      }
      $thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), 'full');
      echo '<'.( is_amp() ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" />';
    ?>
      </div>
    <?php } ?>


<main itemprop="mainContentOfPage" itemscope="itemscope" itemtype="https://schema.org/Blog">
  <div class="container m_con">
    <div class="contents contents_bg simple_days_box_shadow">

    <article class="article">
      <div id="post_body" class="post_body">
      	<?php if ( !is_front_page()) get_template_part( 'inc/header_meta','json' );

          $pwcat = '';
          require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
          if ( is_plugin_active( 'pages-with-category-and-tag/pages_with_category_and_tag.php' ) ) {
              $pwcat = '1';
          }

          foreach ($single_sortable as $key => $value) {
switch ($value){
case 'breadcrumbs':
         if ( !is_front_page()) {
           get_template_part( 'inc/breadcrumbs' );
           simple_days_breadcrumbs();
         }
  break;
case 'title':
  if(get_theme_mod( 'simple_days_page_thumbnail',true) && has_post_thumbnail() && get_theme_mod( 'simple_days_page_title_over_thumbnail',false)){

  }else{
  echo '<div><h1 class="post_title'.esc_attr($post_title_effects).'">'. esc_html(get_the_title()).'</h1></div>';
  }
  edit_post_link( '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> '.esc_attr__( 'Edit this post', 'simple-days' ) , '<span class="post_edit">' , '</span>');
  break;
case 'date':
    if(get_theme_mod( 'simple_days_page_date_position','none') != 'none'){
      $date_display = get_theme_mod( 'simple_days_page_date_display','both');
      echo '<div class="page_date">';
      if (get_the_modified_date('Ymd') > get_the_date('Ymd') && $date_display != 'date'){
        if ($date_display == 'both'){
          echo '<i class="fa '.esc_attr(get_theme_mod( 'simple_days_page_date_icon','fa-calendar-check-o')).'" aria-hidden="true"></i> '.get_the_date();
        }
        echo '&emsp;<span class="page_updated"><i class="fa '.esc_attr(get_theme_mod( 'simple_days_page_up_date_icon','fa-history')).'" aria-hidden="true"></i> '.esc_html(get_the_modified_date()).'</span>';
      }else{
        echo '<i class="fa '.esc_attr(get_theme_mod( 'simple_days_page_date_icon','fa-calendar-check-o')).'" aria-hidden="true"></i> '.get_the_date();
      }
      echo '</div>';
    }
  break;
case 'author':
    if(get_theme_mod( 'simple_days_page_author_position','none') != 'none'){
    echo '<div class="page_author"><i class="fa '.esc_attr(get_theme_mod( 'simple_days_page_author_icon','fa-user')).'" aria-hidden="true"></i> <a href="'.esc_html(get_author_posts_url( get_the_author_meta( 'ID' ) )).'">'. get_the_author() .'</a></div>';
    }
  break;

case 'pv':
    if(get_theme_mod( 'simple_days_popular_post',false) && get_theme_mod( 'simple_days_popular_post_view','none') != 'none' && ( get_theme_mod( 'simple_days_popular_post_view_logout',false) || is_user_logged_in() ) ){
      $count_key = '_simple_days_popular_posts_count_';
      $pv_count = get_post_meta($post->ID, $count_key.get_theme_mod( 'simple_days_popular_post_view','none'), true);
      //var_dump($pv_count);
      if($pv_count != ''){
        echo '<div class="page_view"><i class="fa '.esc_attr(get_theme_mod( 'simple_days_popular_post_view_icon','fa-signal')).'" aria-hidden="true"></i> '. $pv_count .'</div>';

      }


    }
  break;

case 'thumbnail':
  if(get_theme_mod( 'simple_days_page_thumbnail',true) && has_post_thumbnail() && !get_theme_mod('simple_days_page_full_width_thumbnail',false) ) {
    $thumurl = wp_get_attachment_image_src (get_post_thumbnail_id (), 'full');
    if(get_theme_mod( 'simple_days_page_title_over_thumbnail',false)){
      echo '<div class="on_thum fit_box_img_wrap">';
      echo '<div><h1 class="post_title'.esc_attr($post_title_effects).'">'. esc_html(get_the_title()).'</h1></div>';
      echo '<'.( is_amp() ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" />';
      echo '</div>';
    }else{
      echo '<figure class="posts_thum">';
      echo '<'.( is_amp() ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url( $thumurl[0] ).'" width="'.esc_attr( $thumurl[1] ).'" height="'.esc_attr( $thumurl[2] ).'" /></figure>';
    }
  }
  break;


case 'content':
        if (is_page(get_theme_mod( 'simple_days_sitemap_page_post_name','')) && get_theme_mod( 'simple_days_sitemap_page',false) == true) {get_template_part( 'template-parts/content','sitemap' );
        }else{the_content();}
        echo '<div class="clearfix"></div>';

  break;

case 'widget':
        
          if ( is_active_sidebar( 'under_page' ) ) : ?>
          <aside class="under_page_widget">
            <?php dynamic_sidebar( 'under_page' ); ?>
          </aside>
          <?php endif;
  break;

case 'page_link':

          wp_link_pages( array(
            'before'      => '<div class="page-links">' . __( 'Pages:', 'simple-days' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
          ) );
  break;

case 'cta':
          if(get_theme_mod( 'simple_days_social_cta_page',false) == true){
            get_template_part( 'inc/social','cta' );
          }
  break;

case 'share':
          if(get_theme_mod( 'simple_days_social_share','false') != 'false' && get_theme_mod( 'simple_days_page_social_share',false) == true){
            get_template_part( 'inc/social','share' );
          }
  break;

case 'author_profile':
          if(get_theme_mod( 'simple_days_page_author_profile',false) == true){
            get_template_part( 'inc/author','profile' );
          }
  break;

case 'related':
          if(get_theme_mod( 'simple_days_page_related_page',false) == true && $pwcat == '1'){
              get_template_part( 'inc/related_pages' );
          }
  break;
case 'category':
          if($pwcat == '1'){
            $get_page_id = get_the_ID();
            $categories = get_the_category($get_page_id);
            if(!empty($categories)){
              echo '<div class="page_category"><i class="fa '.esc_attr(get_theme_mod( 'simple_days_page_category_icon','fa-folder-o')).'" aria-hidden="true"></i> ';
              foreach($categories as $category) {
                echo '<a href="'.esc_url(get_category_link($category->cat_ID)).'" rel="category" class="cat_tag_wrap simple_days_box_shadow">'. esc_html($category->cat_name). '</a>';
              }
              echo '</div>';
            }
          }
  break;
case 'tag':
          if($pwcat == '1'){
            if(has_tag()) :
              echo '<div class="page_tag"><i class="fa '.esc_attr(get_theme_mod( 'simple_days_posts_tag_icon','fa-tag')).'" aria-hidden="true"></i> ';
              $tags = get_the_tags(get_the_ID());
              foreach($tags as $tag){
                echo '<a href="'.esc_url(get_tag_link($tag->term_id)).'" rel="tag" class="cat_tag_wrap simple_days_box_shadow">'.esc_html($tag->name).'</a>';
              }
              echo '</div>';
            endif;
          }
  break;
case 'comment':
 
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
  break;



  default:
  
}

          }//end foreach

 ?>

      </div>
    </article>




    </div>

    <?php $one_column_post = explode(',', get_theme_mod( 'simple_days_one_column_post',''));
    if(get_theme_mod( 'simple_days_sidebar_layout','3') != '0' && !in_array($post->ID, $one_column_post) )get_sidebar(); ?>

  </div>
</main>
<?php endwhile; ?>
<?php get_footer();
