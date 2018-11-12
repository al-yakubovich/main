<?php
/* Template Name: Full Width */
get_header();
?>

<!--template: page-full-->
<div class="row">
    
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        // Start the loop.
        while (have_posts()) : the_post();

            // Include the page content template.
            get_template_part('template-parts/content', 'page-full');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        // End of the loop.
        endwhile;
        ?> 

    </main><!-- .site-content-area  -->  


</div><!-- row--> 


<?php get_footer(); ?>