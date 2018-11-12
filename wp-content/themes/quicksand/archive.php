<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 * 
 * The expected workflow should be:
 *  - get_template_part('template-parts/content', get_post_format());
 *      - i.e. template-parts/content-single.php
 *          - the content-files should act as a controler 
 *          - from there the specific title-, meta-, content-functions or other are called
 *          - these functions are located in template-tags.php 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage quicksand
 */
get_header();
?>

<!--template: archive-->
<div class="row">

    <?php quicksand_get_sidebars('left') ?> 

    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <?php
        if (have_posts()) :
            $theArchiveTitle = the_archive_title('<article class="card quicksand-meta-list-header"><div class="card-block"><h4 class="card-title quicksand_archive_title">', '</h4></article>');
            echo wp_kses($theArchiveTitle, array(
                'article' => array(),
                'div' => array(),
                'h4' => array()
            ));
            ?>

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
                    get_template_part('template-parts/content', get_post_format());

                endwhile;

                // show posts in masonry-style
                if ($showMasonry) {
                    ?> 
                </div> <?php
            }


            // pagination
            quicksand_paginator_list_view();

        // If no content, include the "No posts found" template.
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>

    </main><!--  .site-content-area --> 

    <?php quicksand_get_sidebars('right') ?> 
</div> 

<?php get_footer(); ?>
