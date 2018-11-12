<?php
/**
 * The template used for displaying page content in full width
 *
 * @package WordPress
 * @subpackage quicksand 
 */
?> 

<!--template: content-page--> 
<article id="post-<?php the_ID(); ?>" <?php post_class("card qs-site-full-width"); ?>> 

    <header class="card-header entry-header">
        <?php the_title('<h1 class="card-title entry-title">', '</h1>'); ?>
    </header><!-- .entry-header --> 

    <!--post thumbnail-->
    <?php quicksand_entry_thumbnail(); ?> 

    <div class="card-block entry-content qs-site-full-width-content">
        <?php
        the_content();

        // paginated pages
        quicksand_paginated_posts_paginator();
        ?>
    </div><!-- .entry-content -->
 
    <!--edit-link-->
    <?php quicksand_edit_post(); ?>  

</article><!-- .post-->  