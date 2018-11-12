<?php
/**
 * header meta for schema.org
 *
 * @package Simple Days
 * @since 0.0.1
 * @version 0.0.1
 */

?>

<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "<?php if ( is_page()) :?>Article<?php else :?>BlogPosting<?php endif ?>",
"headline": "<?php if(get_the_title()==""){echo esc_attr__( 'No title', 'simple-days' );}else{echo esc_attr(mb_strimwidth(get_the_title(), 0, 110));} ?>",
"description": "<?php echo esc_attr(strip_tags(get_the_excerpt())); ?>",
"mainEntityOfPage":{
    "@type": "WebPage",
    "@id": "<?php the_permalink(); ?>"
},
"datePublished": "<?php echo esc_html(get_the_time('c')); ?>",
"dateModified": "<?php echo esc_html(get_the_modified_time('c')); ?>",
"author": {
    "@type": "Person",
    "name": "<?php the_author(); ?>"
},
"publisher": {
    "@type": "Organization",
    "name": "<?php bloginfo( 'name' ); ?>",
    "logo": {
        "@type": "ImageObject",
        "url": "<?php
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
              }
            } ?>"
    }
},
"image": {
    "@type": "ImageObject",
    "url": "<?php
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
              }?>"
    }
}
</script>
