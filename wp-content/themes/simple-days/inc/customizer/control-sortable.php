<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Sortable Control
 *
 * @package Simple Days
 */

  class Simple_Days_Posts_Sortable_Custom_Control extends WP_Customize_Control {
    
    public $type = 'simple_days_posts_sortable';
    
    public function enqueue() {
      wp_register_script(
        'simple_days_sortable',
        SIMPLE_DAYS_THEME_URI . '/assets/js/customizer/sortable.min.js',
        array( 'jquery', 'customize-base', 'jquery-ui-core', 'jquery-ui-sortable' ),
        '',
        true
      );
      wp_enqueue_script( 'simple_days_sortable' );
    }

    
    public function render_content() {
      $sort_order_list =array(
       'breadcrumbs','title','date','author','pv','thumbnail','content','widget','page_link','cta','share','author_profile','related','category','tag','pagenation','comment'
     );

      $sortable = $this->choices;
      if(count($sort_order_list) != count($this->choices)){
        $sortable = $sortable + array_diff($sort_order_list,$this->choices);
      }

      echo '<span class="customize-control-title">'.esc_html($this->label).'</span>';
      echo '<span class="description customize-control-description">'.esc_html($this->description).'</span>';
      echo '<ul class="simple_days_posts_sortable_ul">';
      foreach ($sortable as $key => $value) {
        switch ($value){
          case 'breadcrumbs':
          $value_item = esc_html_x( 'Breadcrumbs' , 'post_sortable' ,'simple-days' );
          break;
          case 'title':
          $value_item = esc_html_x( 'Title' , 'post_sortable' ,'simple-days' );
          break;
          case 'date':
          $value_item = esc_html_x( 'Date' , 'post_sortable' ,'simple-days' );
          break;
          case 'author':
          $value_item = esc_html_x( 'Author' , 'post_sortable' ,'simple-days' );
          break;
          case 'pv':
          $value_item = esc_html_x( 'Page views' , 'post_sortable' ,'simple-days' );
          break;
          case 'thumbnail':
          $value_item = esc_html_x( 'Thumbnail' , 'post_sortable' ,'simple-days' );
          break;
          case 'content':
          $value_item = esc_html_x( 'Content' , 'post_sortable' ,'simple-days' );
          break;
          case 'widget':
          $value_item = esc_html_x( 'Widget' , 'post_sortable' ,'simple-days' );
          break;
          case 'page_link':
          $value_item = esc_html_x( 'Page Link' , 'post_sortable' ,'simple-days' );
          break;
          case 'cta':
          $value_item = esc_html_x( 'CTA' , 'post_sortable' ,'simple-days' );
          break;
          case 'share':
          $value_item = esc_html_x( 'Share' , 'post_sortable' ,'simple-days' );
          break;
          case 'author_profile':
          $value_item = esc_html_x( 'About the author' , 'post_sortable' ,'simple-days' );
          break;
          case 'related':
          $value_item = esc_html_x( 'Related' , 'post_sortable' ,'simple-days' );
          break;
          case 'category':
          $value_item = esc_html_x( 'Category' , 'post_sortable' ,'simple-days' );
          break;
          case 'tag':
          $value_item = esc_html_x( 'Tag' , 'post_sortable' ,'simple-days' );
          break;
          case 'pagenation':
          $value_item = esc_html_x( 'Pagenation' , 'post_sortable' ,'simple-days' );
          break;
          case 'comment':
          $value_item = esc_html_x( 'Comment' , 'post_sortable' ,'simple-days' );
          break;
          default:
          $value_item = '';
        }
        echo '<li class="" data-value="'.esc_attr($value).'"><i class="dashicons dashicons-menu"></i>'.esc_html($value_item).'</li>';
      }
      echo '</ul>';
    }
  }//end Simple_Days_Posts_Sortable_Custom_Control


