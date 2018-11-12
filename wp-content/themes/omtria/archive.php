<?php get_header(); ?>

    <div class="container-wrap">
        <div class="container">
            <div class="row">
                <div class="<?php echo (is_active_sidebar('sidebar-1') && get_theme_mod('omtria_sidebar_on_archive_search')) ? 'col-md-8 col-sm-7' : 'col-sm-12'; ?>" id="archive">
                    <main>
                        <?php if (have_posts()) { ?>

                            <section class="content-box content-box--default content-box--border">
                                <header class="post-header--archive">
                                    <h1 class="post-title--archive"><?php echo get_the_archive_title(); ?></h1>
                                    <?php
                                    if (get_the_archive_description()) {
                                        echo get_the_archive_description();
                                    }
                                    ?>
                                </header>
                            </section>

                            <?php
                            while (have_posts()) {
                                the_post();
                                get_template_part('content');
                            }

                            the_posts_pagination(array(
                                'prev_text' => __( 'Prev', 'omtria' ),
                                'next_text' => __( 'Next', 'omtria' )
                            ));
                        } else {
                            get_template_part('content', 'none');
                        }?>
                    </main>
                </div>
                <?php
                    if (is_active_sidebar('sidebar-1')) {
                        get_template_part('sidebar-archive');
                    }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>