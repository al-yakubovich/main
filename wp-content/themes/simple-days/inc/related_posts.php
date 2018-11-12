<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Related Posts
 *
 * @package Simple Days
 */

  $ontouchstart = '';
  if(!is_amp()) $ontouchstart = ' ontouchstart=""';

  
  $max_post_num = get_theme_mod( 'simple_days_posts_related_post_number','9');
  if( $max_post_num > 0 ){
    $rel_count = 0;
    $rel_posts = array();
    $tag_ids = array();
    if ( has_tag() ) {
      
      $tags = wp_get_post_tags($post->ID);
      foreach($tags as $tag):
        array_push( $tag_ids, $tag -> term_id);
      endforeach ;
      $tag_args = array(
        'post__not_in' => array($post -> ID),
        'posts_per_page'=> $max_post_num,
        'tag__in' => $tag_ids,
        'orderby' => 'rand',
      );
      $rel_posts = get_posts($tag_args);
      $rel_count = count($rel_posts);
    }

    if(!has_tag() || $max_post_num > $rel_count){
    
    

      $categories = get_the_category($post->ID);
      $category_ID = array();
      foreach($categories as $category):
        array_push( $category_ID, $category -> cat_ID);
      endforeach ;
      
      $cat_args = array(
        'post__not_in' => array($post -> ID),
        'tag__not_in' => $tag_ids,
        'posts_per_page'=> ($max_post_num - $rel_count),
        'category__in' => $category_ID,
        'orderby' => 'rand',
      );
      $cat_posts = get_posts($cat_args);
      $rel_posts = array_merge($rel_posts, $cat_posts);
      shuffle($rel_posts);
    }

    
    if(  count( $rel_posts ) > 0 ):
?>
<div id="rp_wrap">
  <h4><?php esc_html_e( 'Related Posts', 'simple-days' ); ?></h4>
  <div id="related_posts" class="o_s_t">
<?php
      foreach ($rel_posts as $post) : setup_postdata($post); ?>
        <a href="<?php the_permalink() ?>" class="rp_box non_hover opa7">
          <div class="fit_box_img_wrap rp_box_img">
          <?php if ( has_post_thumbnail() ): 
            $thumurl = wp_get_attachment_image_src( get_post_thumbnail_id() , 'medium' );
            echo '<'.((is_amp())?'amp-img layout="responsive"':'img').' src="'.esc_url($thumurl[0]).'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="'.esc_attr($thumurl[1]).'" height="'.esc_attr($thumurl[2]).'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
          else:  
            preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);
            if(isset($matches [1] [0])){
            echo '<'.( (is_amp() )?'amp-img layout="responsive"':'img').' src="'. esc_url($matches [1] [0]) .'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="640" height="480" alt="'.esc_html(get_the_title()).'" />';
            }else{
              echo '<'.( (is_amp()) ?'amp-img layout="responsive"':'img').' src="'. esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png')) .'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="1280" height="960" alt="No image available" />';
            }
            ?>
          <?php endif; ?>
          </div>
          <div class="rp_box_title"><span><?php echo esc_attr(mb_strimwidth(get_the_title(), 0, 42, "...", 'UTF-8')); ?></span></div>
        </a>
    <?php
      endforeach;
    ?>
    </div>
</div>
    <?php endif;
    wp_reset_postdata(); ?>

<?php } 
