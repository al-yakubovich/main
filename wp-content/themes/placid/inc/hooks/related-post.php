<?php
/**
 * Related Post
 *
 * @since Newie 1.0.0
 *
 * @param null
 * @return void
 *
 */


if (!function_exists('placid_related_post_below')) :

    function placid_related_post_below($post_id)
    {
        global $placid_theme_options;
        $placid_theme_options       =  placid_get_theme_options();
        $related_post_hide_option  =  $placid_theme_options['placid-realted-post'];
        $related_post_title_option =  $placid_theme_options['placid-realted-post-title'];
        $related_post_no_post      =  $placid_theme_options['placid_number_of_post_show_option'];
          
        if ( 0 == $related_post_hide_option)
     
        {
            return;
        }
      
       
         $categories = get_the_category($post_id);
       
        if ($categories)
        {
            $category_ids = array();
           
            foreach ($categories as $category)
            {
                $category_ids[] = $category->term_id;
                $category_name[] = $category->slug;
            }

            $placid_plus_cat_post_args = array(
                'category__in' => $category_ids,
                'post__not_in' => array($post_id),
                'post_type' => 'post',
                'posts_per_page' => $related_post_no_post,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true
            );
            $placid_plus_featured_query = new WP_Query($placid_plus_cat_post_args);
            ?>
            <div class="related-post news-block">
                <header class="entry-header">
                    <h1 class="entry-title text-center">
                        <?php echo esc_html($related_post_title_option); ?>
                    </h1>
                </header>
                <div class="row">
                    <?php
                    while ($placid_plus_featured_query->have_posts()) :
                        $placid_plus_featured_query->the_post(); ?>
                         <article class=" col-sm-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>">
                                <div class="placid-post-wrapper <?php if ( !has_post_thumbnail () ) { echo "no-feature-image"; } ?>">
                                   <!--post thumbnal options-->
                                    <?php if ( has_post_thumbnail () ) 
                                    { ?>
                                        <div class="placid-post-thumb post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                             <?php the_post_thumbnail( 'full' ); ?>
                                            </a>
                                        </div><!-- .post-thumb-->
                              <?php } ?>
                                    <div class="content-wrap">

                                        <div class="entry-header">
                                            <?php
                                            if ( is_single() ) :
                                               
                                                the_title( '<h1 class="entry-title">', '</h1>' );
                                            else :
                                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                            endif; ?>
                                        </div><!-- .entry-header -->

                                        <div class="entry-content">
                                            <?php echo esc_html( wp_trim_words( get_the_content(), 15, ' ' ) ); ?>
                                        </div><!-- .entry-content -->
                                    </div>

                                    
                                </div>
                        </article><!-- #post-## -->
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        }
    }
endif;

add_action('placid_related_posts', 'placid_related_post_below', 10, 1);