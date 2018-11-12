<?php
/**
 * Displays content for front page
 *
 * @package Simple Days
 */

$mod_value = get_query_var( 'index_mod_value');
  $ontouchstart = '';
  if(!is_amp()) $ontouchstart = ' ontouchstart=""';
?>
      <header>
        <?php get_template_part( 'inc/header_meta','microdata' );?>
      </header>
      <div class="post_card simple_days_box_shadow">
      <?php if($mod_value['thumbnail_position'] != 'none'){ ?>
        <div class="post_card_thum<?php if($mod_value['layout'] == 'list' ) echo ' p_c_list' ?>">
          <a href="<?php the_permalink(); ?>" class="fit_box_img_wrap post_card_thum_img">
            <?php
             if(!has_post_thumbnail()) {
               $output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);
               if(isset($matches [1] [0])){
                 echo '<'.( (is_amp() )?'amp-img layout="responsive"':'img').' src="'. esc_url($matches [1] [0]) .'" width="640" height="480" class="scale_13 trans_10"'.esc_attr($ontouchstart).' alt="'.get_the_title().'" />';
               }else{
                 echo '<'.( (is_amp()) ?'amp-img layout="responsive"':'img').' src="'. esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png')).'" width="640" height="480" class="scale_13 trans_10"'.esc_attr($ontouchstart).' alt="No image available" />';
               }
             }else{
               //the_post_thumbnail(array(640, 480));
               $thumurl = wp_get_attachment_image_src( get_post_thumbnail_id() , 'medium' );
               echo '<'.( (is_amp() )?'amp-img layout="responsive"':'img').' src="'.esc_url($thumurl[0]).'"  width="'.esc_attr($thumurl[1]).'" height="'.esc_attr($thumurl[2]).'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' alt="'.get_the_title().'" title="'.get_the_title().'" />';
             } ?>
          </a>
          <?php
          if($mod_value['thumbnail_position'] != 'none' && $mod_value['typical'] == 'original'){
            simple_days_index_category($mod_value);
            simple_days_index_date($mod_value);
          }
          ?>
        </div>
<?php  } ?>
        <div class="post_card_meta">
         	<div class="post_card_title_wrap">
              <h2 class="post_card_title"><?php if(is_sticky())echo '<span class="sticky_icon"><i class="icon-pushpin"></i> </span>';?><a href="<?php the_permalink(); ?>" class="entry_title" title="<?php the_title(); ?>"><?php echo esc_attr(mb_strimwidth(get_the_title(), 0, 48 ,'&hellip;')); ?></a></h2>
          </div>
          <?php
          if($mod_value['typical'] == 'typical'){
          ?>
          <div class="typical"><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php esc_html(the_date()); ?></span> <span><i class="fa fa-folder-o" aria-hidden="true"></i> <?php simple_days_index_category_typical($mod_value); ?></span></div>
          <?php
          }
          ?>

          <div class="summary">
            <?php
            $itemprop = ( is_search() ? 'description' : 'articleBody'); ?>
            <span itemprop="<?php echo esc_attr($itemprop); ?>">
            <?php
            echo mb_strimwidth( wp_strip_all_tags(strip_shortcodes(get_the_content()), true), 0 , absint( $mod_value['excerpt_length'] ), $mod_value['excerpt_ellipsis'] );
            //the_excerpt(); ?>
            </span>

          </div>
                      <?php if($mod_value['more_link_class'] != 'none'){ ?>
            <div class="more_read_box">
              <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"  class="more_read non_hover"><?php echo esc_html__( 'Read More', 'simple-days' ); ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </div>
            <?php } ?>
          <?php
          if($mod_value['thumbnail_position'] == 'none' && $mod_value['typical'] == 'original'){
            simple_days_index_category($mod_value);
            simple_days_index_date($mod_value);
          }
          ?>

        </div>
      </div>
