<article id="post-<?php the_ID(); ?>" <?php post_class('post post--default'); ?>>
    <header class="post-header">
        <?php if (has_post_thumbnail()) { ?>
            <p>
                <a href="<?php the_permalink(); ?>" class="post-header-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </a>
            </p>
        <?php } ?>

        <?php
            if (is_sticky() && has_post_thumbnail()) {
                echo "<p class='post-sticky button button--dark button--transparent'>".__('Featured', 'omtria')."</p>";
            }
            edit_post_link( "<p class='fa fa-pencil-alt'></p>" );
        ?>
    </header>
    
    <div class="post-content">
        <p>
            <?php
                if (is_sticky() && !has_post_thumbnail()) {
                    echo "<span class='button button--dark button--sm text--uppercase'>".__('Featured', 'omtria')."</span> ";
                }
                echo omtria_category_list(wp_get_post_categories($post->ID, array('fields' => 'names')));
            ?>
        </p>
        <h2 class="post-title">
            <?php if (get_the_title()) { ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php } else { ?>
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('This post has no title', 'omtria'); ?></a>
            <?php } ?>
        </h2>
        <?php the_excerpt(); ?>
    </div>

    <footer class="post-footer element--clearfix">
        <p class="post-footer-info">
            <time datetime="<?php the_date('Y-m-d'); ?>"><?php echo get_the_date(get_option('date-format')); ?></time>
            <span class="post-footer-info-divider"></span>

            <span class="far fa-comment-alt"></span>
            <span><?php echo get_comments_number(); ?></span>
        </p>
        <p class="post-footer-author">
            <?php echo get_avatar(get_the_author_meta('ID'));?>
            <?php the_author_posts_link(); ?>
        </p>
    </footer>
</article>