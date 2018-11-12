<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section class="content-box content-box--default content-box--lg text--center">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-md-offset-3">
                            <header>
                                <h1 class="content-box-title"><?php esc_html_e('Whoops! 404...', 'omtria') ?></h1>
                            </header>

                            <div class="content-box-content">
                                <p><?php esc_html_e('It seems like this page doesn\'t exist.', 'omtria') ?></p>
                                <p>
                                    <a href="<?php echo esc_url(home_url()); ?>" class="button button--default">
                                        <?php esc_html_e('Go to home', 'omtria') ?>
                                        <span class="fa fa-long-arrow-alt-right element--arrow-right"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

<?php get_footer(); ?>