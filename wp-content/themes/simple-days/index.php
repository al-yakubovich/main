<?php get_header(); 
  $mod_value = array(
          'layout' => get_theme_mod( 'simple_days_index_layout_list','list'),
        );
  if($mod_value['layout'] == 'list' ){
    $layout = ' lo_list';
  }elseif($mod_value['layout'] == 'grid3' ){
    $layout = ' lo_grid3';
  }elseif($mod_value['layout'] == 'grid2' ){
    $layout = ' lo_grid2';
  }else{
    $layout = '';
  }
?>
<main<?php if(!is_amp()) echo ' itemprop="mainContentOfPage" itemscope="itemscope" itemtype="https://schema.org/Blog"'; ?>>
  <div class="container m_con">
    <div class="contents index_contents<?php echo esc_attr($layout); ?>">
      <?php
       if(have_posts()):
        $mod_value = $mod_value + array(
          'date_format' => get_theme_mod( 'simple_days_top_date_format','1'),
          'more_link_class' => get_theme_mod( 'simple_days_read_more_position','right'),
          'date_position' => get_theme_mod( 'simple_days_index_date_position','left'),
          'thumbnail_position' => get_theme_mod( 'simple_days_index_thumbnail','left'),
          'category_position' => get_theme_mod( 'simple_days_index_category_position','right'),
          'excerpt_length' => get_theme_mod( 'simple_days_excerpt_length_customize','150'),
          'excerpt_ellipsis' => get_theme_mod( 'simple_days_excerpt_ellipsis','&hellip;'),
          'typical' => get_theme_mod( 'simple_days_index_typical','original'),
        );

        set_query_var( 'index_mod_value', $mod_value );
        get_template_part( 'template-parts/content','parts');

        if ( !is_active_sidebar( 'index_list' ) ){
          while(have_posts()): the_post();?>

            <article itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting"  <?php post_class(); ?>>
               <?php get_template_part( 'template-parts/content'); ?>
            </article>

          <?php endwhile;
        }else{
          $index_list_position = get_theme_mod( 'simple_days_index_list_widget_position','after');
          $index_list_num = get_theme_mod( 'simple_days_index_list_widget_number','3');
          $i = 1;

          while(have_posts()): the_post();?>
            <article itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting"  <?php post_class(); ?>>
               <?php get_template_part( 'template-parts/content'); ?>
            </article>
          <?php if( is_active_sidebar( 'index_list' ) && ( ($index_list_num == $i && $index_list_position == 'after') || ( $i % $index_list_num == 0 && $index_list_position == 'every')) ){ ?>
            <article class="in_feed">
               <?php dynamic_sidebar( 'index_list' ); ?>
            </article>
          <?php
            }
            ++$i;
          endwhile;
        }



              if ( is_active_sidebar( 'on_pagination' ) ) : ?>
                <aside class="on_pagi">
                  <?php dynamic_sidebar( 'on_pagination' ); ?>
                </aside>
              <?php endif;
              
              the_posts_pagination( array(
               'mid_size' => 2,
               'prev_text' => '&lt;',
               'next_text' => '&gt;',
              ) );
       else:
        get_template_part( 'template-parts/content', 'none' );
       endif;?>
    </div>
    <?php if(get_theme_mod( 'simple_days_sidebar_layout','3') != '0')get_sidebar(); ?>
  </div>
</main>
<?php get_footer();
