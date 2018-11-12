<?php
/**
 * header meta for schema.org
 *
 * @package Simple Days
 * @since 0.0.1
 * @version 0.0.1
 */

?>
        <meta itemprop="headline" content="<?php if(get_the_title()==""){echo 'No title';}else{echo esc_html(mb_strimwidth(get_the_title(), 0, 110));} ?>">
        <meta itemprop="datePublished" content="<?php echo esc_html(get_the_time('c')); ?>">
        <meta itemprop="dateModified" content="<?php echo esc_html(get_the_modified_time('c')); ?>">
        <meta itemprop="url" content="<?php the_permalink(); if(is_amp())echo '?amp=1'; ?>">
        <meta itemprop="thumbnailUrl" content="<?php
              if(!has_post_thumbnail()) {
                $output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);
               if(isset($matches [1] [0])){
                 echo esc_url($matches [1] [0]);
               }else{
                 echo esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'));
               }
             }else{
               $thumurl = wp_get_attachment_image_src( get_post_thumbnail_id() , 'full' );
               echo esc_url($thumurl[0]);
             }?>">
        <meta itemprop="image" content="<?php
              if(!has_post_thumbnail()) {
                $output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);
               if(isset($matches [1] [0])){
                 echo esc_url($matches [1] [0]);
               }else{
                 echo esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'));
               }
             }else{
               $thumurl = wp_get_attachment_image_src( get_post_thumbnail_id() , 'full' );
               echo esc_url($thumurl[0]);
             }?>">
        <div itemprop="author" itemscope itemtype="https://schema.org/Person">
          <meta itemprop="name" content="<?php the_author(); ?>">
        </div>
        <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
          <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <meta itemprop="url" content="<?php
            if ( is_amp() ){
              if (get_theme_mod( 'simple_days_amp_logo_img') != ''){
                    echo esc_url(get_theme_mod( 'simple_days_amp_logo_img'));
              }else if ( has_custom_logo() ){
                    echo esc_url(wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ));
                  }else{
                    echo esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/amp-logo.png');
              }
            }else{
              if ( has_custom_logo() ){
                echo esc_url(wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ));
              }else{
                echo esc_url(SIMPLE_DAYS_THEME_URI .'/assets/images/logo.png');
            } } ?>">
          </div>
          <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
        </div>
        <meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
        <?php if ( !is_search() ) :
                $thumurl = get_the_category();
                if(!empty($thumurl)){ ?>
        <meta itemprop="articleSection" content="<?php echo esc_html($thumurl[0]->cat_name); ?>">
        <?php } endif;
