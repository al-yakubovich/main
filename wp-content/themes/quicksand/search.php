<?php
/**
 * The template for displaying search results pages
 * 
 * The expected workflow should be:
 *  - get_template_part('template-parts/content', get_post_format());
 *      - i.e. template-parts/content-single.php
 *          - the content-files should act as a controler 
 *          - from there the specific title-, meta-, content-functions or other are called
 *          - these functions are located in template-tags.php 
 *
 * @package WordPress
 * @subpackage quicksand 
 */
get_header();
?>

<!--template: search-->
<div class="row"> 

    <?php quicksand_get_sidebars('left') ?> 

    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <?php if (have_posts()) : ?>

            <div class="card quicksand-meta-list-header"> 
                <div class="card-block">
                    <h4 class="card-title quicksand_search_title"><?php esc_html_e('Search Results for:', 'quicksand'); ?></h4> 
                    <h6 class="card-subtitle quicksand-search-subtitle"><span><?php echo esc_html(get_search_query())  ?></span></h6>
                </div>
            </div> 

            <?php
            // show posts in masonry-style 
            $showMasonry = quicksand_show_masonry();
            if ($showMasonry) {
                ?> 
                <div class="card-columns quicksand-masonry"> <?php
                }


                while (have_posts()) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     * 
                     * This is only for the listing part.
                     * For single presention have a look inside ... single.php
                     */ 
                    get_template_part('template-parts/content', 'search');

                endwhile;

                // show posts in masonry-style
                if ($showMasonry) {
                    ?> 
                </div> <?php
            }


            // pagination
            quicksand_paginator_list_view();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?> 
    </main><!-- .site-main -->

    <?php quicksand_get_sidebars('right') ?> 

</div> 

<?php get_footer(); ?>
