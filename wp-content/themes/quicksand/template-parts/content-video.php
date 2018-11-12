<!--template: content-link--> 
<article id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>

    <!--post video-->
    <?php
    if (!is_singular()) {
        quicksand_entry_header_postformat_video();
        quicksand_entry_title_postformat_video();
    } else {
        quicksand_entry_title_postformat_video();
        quicksand_entry_header_postformat_video();
    }
    quicksand_entry_meta();
    
    // differ of singular post is made in here
    quicksand_the_entry_content_video();
    
    quicksand_entry_tags();
    quicksand_author_biography();
    quicksand_edit_post();
    ?>    

</article><!-- .post-->