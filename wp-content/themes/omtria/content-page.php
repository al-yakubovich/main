<article class="post-detail post-detail--default" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post-detail-header">
        <?php the_title('<h1 class="post-detail-title">', '</h1>'); ?>
        <p><?php the_post_thumbnail('post-thumbnail', array()); ?></p>
        <?php edit_post_link("<p class='fa fa-pencil-alt'></p>"); ?>
    </header>

    <div class="post-detail-content">
        <div class="post-detail-content-inner">
            <?php the_content(); ?>
        </div>

        <?php
            wp_link_pages(array(
                'before'      => '<div class="pagination-page">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>'
            ));
        ?>
    </div>
</article>