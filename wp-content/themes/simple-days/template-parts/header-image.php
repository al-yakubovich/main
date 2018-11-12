<?php
/**
 * The template part for displaying a header image
 *
 * @package Simple Days

 */
?>
<div class="full_thum_b on_thum fit_box_img_wrap h_i_wrap">
    <?php
      if(get_theme_mod( 'simple_days_header_image_text','') != ''){

      echo '<div class="h_image">'.get_theme_mod( 'simple_days_header_image_text','').'</div>';

      }

      echo '<'.( is_amp() ? 'amp-img layout="responsive"' : 'img' ).' src="'.esc_url( get_header_image() ).'" width="'.esc_attr( get_custom_header()->width ).'" height="'.esc_attr( get_custom_header()->height ).'" />';
    ?>
</div>
