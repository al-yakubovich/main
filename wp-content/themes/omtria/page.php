<?php get_header(); ?>

    <div class="container-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <main>
                        <?php
                            while (have_posts()) {
                                the_post();
                                get_template_part('content', 'page');
                                ?>

                                <section class="comments comments--default">
                                    <?php
                                    if ((comments_open() || get_comments_number()) && post_type_supports( get_post_type(), 'comments' )) {
                                        comments_template();
                                    }
                                    ?>
                                </section>

                                <?php
                            }
                        ?>
                    </main>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>