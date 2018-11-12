<?php get_header(); ?>

    <div class="container-wrap">
        <div class="container-wrap-inner">
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        ?>
                                        <article class="post-detail post-detail--default" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            <header class="post-detail-header">
                                                <p>
                                                    <?php
                                                        if (is_sticky()) {
                                                            echo "<span class='button button--dark button--sm text--uppercase'>".__('Featured', 'omtria')."</span> ";
                                                        }
                                                        echo omtria_category_list(wp_get_post_categories($post->ID, array('fields' => 'names')));
                                                    ?>
                                                </p>

                                                <?php
                                                    if (get_the_title()) {
                                                        the_title('<h1 class="post-detail-title">', '</h1>');
                                                    } else {
                                                        echo '<h1 class="post-detail-title">'.__('This post has no title', 'omtria').'</h1>';
                                                    }
                                                ?>

                                                <time datetime="<?php the_date('Y-m-d'); ?>" class="post-detail-info">
                                                    <?php echo get_the_date(get_option('date-format')); ?>
                                                </time>

                                                <p><?php the_post_thumbnail('post-thumbnail', array()); ?></p>
                                                <?php edit_post_link( "<p class='fa fa-pencil-alt'></p>" ); ?>
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

                                            <footer class="post-detail-footer">
                                                <div class="post-detail-footer-inner element--clearfix">
                                                    <p class="post-detail-footer-info">
                                                        <?php the_tags(); ?>
                                                    </p>
                                                    <p class="post-detail-footer-author">
                                                        <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                                        <?php esc_html_e('Written by', 'omtria'); ?>
                                                        <?php the_author_posts_link(); ?>
                                                    </p>
                                                </div>
                                            </footer>
                                        </article>

                                        <section class="comments comments--default">
                                            <?php
                                                if ((comments_open() || get_comments_number()) && post_type_supports( get_post_type(), 'comments' )) {
                                                    comments_template();
                                                }
                                            ?>
                                        </section>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </main>

            <nav class="post-navigation post-navigation--default <?php echo (get_theme_mod('omtria_navigation_in_post', true)) ? 'visible' : 'hidden'; echo (get_next_post() || get_previous_post()) ? '' : ' post-navigation--no-posts'; ?>" id="post-navigation">
                <div class="post-navigation-inner">
                    <div class="container">
                        <div class="row">
                            <?php
                                if (is_rtl()) {
                                    get_template_part('page-templates/rtl-post-navigation');
                                } else {
                                    get_template_part('page-templates/ltr-post-navigation');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

<?php get_footer(); ?>