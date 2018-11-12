<!--template: content-quote--> 
<article id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>

    <?php
    quicksand_entry_title_postformat_quote();
    quicksand_entry_meta();

    if (!is_singular()) {
        quicksand_the_entry_content_quote(); 
    } else {
        quicksand_the_entry_content();
    }


    quicksand_entry_tags();
    quicksand_author_biography();
    quicksand_edit_post();
    ?>   

</article><!-- .post-->  