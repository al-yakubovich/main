<!--template: content-link--> 
<article id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>

    <!--post gallery as a slider-->
    <?php
    if (!is_singular()) {
        quicksand_entry_header_postformat_gallery();
    }
    ?>   

    <!--featured image-->
    <?php
    if (is_singular()) {
        quicksand_entry_thumbnail();
    }
    ?> 

    <!--post title-->
<?php quicksand_entry_title_postformat_gallery(); ?>

    <!--post-meta--> 
<?php quicksand_entry_meta(); ?>

    <!--post-content--> 
<?php
if (!is_singular()) {
    quicksand_entry_excerpt();
} else {
    quicksand_the_entry_content();
}
?> 

    <!--post-tags-->
<?php quicksand_entry_tags(); ?>  

    <!--author-bio-->
<?php quicksand_author_biography(); ?> 

    <!--edit-link-->
<?php quicksand_edit_post(); ?> 

</article><!-- .post-->  