<?php get_header(); ?>

<div class="container-wrap">
    <div class="container">
        <div class="row">
            <div class="<?php echo (is_active_sidebar('sidebar-1') && get_theme_mod('omtria_sidebar_on_home', true)) ? 'col-md-8 col-sm-7' : 'col-sm-12'; ?>" id="index-posts">
                <main>
                    <?php
                        if (have_posts()) {
                            while(have_posts()) {
                                the_post();
                                get_template_part('content');
                            }

                            the_posts_pagination(array(
                                'prev_text' => __( 'Prev', 'omtria' ),
                                'next_text' => __( 'Next', 'omtria' )
                            ));
                        } else {
                            get_template_part('content', 'none');
                        }
                    ?>
                </main>
            </div>

            <?php
                if (is_active_sidebar('sidebar-1')) {
                    get_sidebar();
                }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
