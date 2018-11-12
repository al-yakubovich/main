<?php
/**
 * The template for displaying all single posts and attachments
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

<!--template: single-->
<div class="row">

    <?php quicksand_get_sidebars('left') ?> 
    
    
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        while (have_posts()) : the_post();
//            get_template_part('template-parts/content', 'single');
            get_template_part('template-parts/content', get_post_format());

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        endwhile;
        ?>   
        <!--posts-navigation-->
        <div class="post-pagination">
            <?php 
            if (is_singular('attachment')) {
                // Parent post navigation.
                the_post_navigation(array(
                    'prev_text' => _x('<span class="meta-nav btn btn-outline-secondary">Published in </span><span class="post-title">%title</span>', 'Parent post link', 'quicksand'),
                ));
            } elseif (is_singular('post')) {
                // Previous/next post navigation.
                the_post_navigation(array(
                    'prev_text' => '<span class="meta-nav post-last-link" aria-hidden="true"><i class="fa fa-long-arrow-left"></i>' . esc_html(__("Previous Post", "quicksand")) . '</span>' .
                    '<span class="screen-reader-text">' . __('Previous post:', 'quicksand') . '</span> ',
                    'next_text' => '<span class="meta-nav post-next-link " aria-hidden="true">' . esc_html(__("Next Post", "quicksand")) . '<i class="fa fa-long-arrow-right"></i></span>' .
                    '<span class="screen-reader-text">' . __('Next post:', 'quicksand') . '</span> ',
                ));
            }
            ?>
        </div>

    </main><!-- .site-content-area  -->  
    
    <?php quicksand_get_sidebars('right') ?> 

</div><!-- row--> 

<?php get_footer(); ?>