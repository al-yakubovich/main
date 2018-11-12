<?php
/**
 * Displays content parts for front page
 *
 * @package Simple Days
 */



function simple_days_index_category($mod_value){
 if($mod_value['category_position'] == 'none') return;
 $category = get_the_category();
 if(!empty($category)){
   echo '<a href="' . esc_url(get_category_link( $category[0]->term_id )) . '" class="post_card_category non_hover">' . esc_html($category[0]->cat_name) . '</a>';
 }
}

function simple_days_index_date($mod_value){
 if($mod_value['date_position'] == 'none' || is_sticky()) return; ?>
 <div class="post_card_date">
   <div class="post_date_wrap">
     <div class="post_date_circle">
     <?php if($mod_value['date_format'] == "1" ){ ?>
       <span class="day"><?php echo esc_html(get_the_time('j')); ?></span>
       <span class="month"><?php echo esc_html(get_the_time('M')); ?></span>
     <?php }else{ ?>
       <span class="month"><?php echo esc_html(get_the_time('M')); ?></span>
       <span class="day"><?php echo esc_html(get_the_time('j')); ?></span>
     <?php } ?>
       <span class="year"><?php echo esc_html(get_the_time('Y')); ?></span>
     </div>
   </div>
 </div>
<?php
}

function simple_days_index_category_typical($mod_value){
 if($mod_value['category_position'] == 'none') return;
 $category = get_the_category();
 if(!empty($category)){
   echo '<a href="' . esc_url(get_category_link( $category[0]->term_id )) . '" class="non_hover">' . esc_html($category[0]->cat_name) . '</a>';
 }
}