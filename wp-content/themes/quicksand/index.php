<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * 
 * The expected workflow should be:
 *  - get_template_part('template-parts/content', get_post_format());
 *      - i.e. template-parts/content-single.php
 *          - the content-files should act as a controller 
 *          - from there the specific title-, meta-, content-functions or other are called
 *          - these functions are located in template-tags.php 
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage quicksand 
 */
//phpinfo();
get_header();
?>

<!--template: index-->
<div class="row">
    
    <?php quicksand_get_sidebars('left') ?> 
    
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        if (have_posts()) :
            // header for screen-readers
            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header> 
                <?php
            endif;

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
                    get_template_part('template-parts/content', get_post_format());

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
    </main><!-- .site-content-area  -->  

    <?php quicksand_get_sidebars('right') ?> 

</div><!-- row--> 

<?php get_footer(); ?>