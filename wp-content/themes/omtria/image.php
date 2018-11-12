<?php get_header(); ?>

    <div class="container-wrap">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if (have_posts()) {
                                while (have_posts()) {
                                    the_post();
                                    ?>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-detail post-detail--default'); ?>>
                                        <?php $omtria_attachment_metadata = wp_get_attachment_metadata(); ?>

                                        <header class="post-detail-header">
                                            <?php if (get_the_title()) {
                                                the_title('<h1 class="post-detail-title">', '</h1>');
                                            } else {
                                                echo '<h1 class="post-detail-title">'.__('This post has no title', 'omtria').'</h1>';
                                            } ?>

                                            <time datetime="<?php the_date('Y-m-d'); ?>" class="post-detail-info">
                                                <?php echo get_the_date(get_option('date-format')); ?>
                                            </time>

                                            <?php edit_post_link( "<p class='fa fa-pencil-alt'></p>" ); ?>

                                            <div class="post-detail-attachment">
                                                <p class="post-detail-attachment-detail">
                                                    <a href="<?php echo esc_url(wp_get_attachment_url()); ?>"><?php echo wp_get_attachment_image( get_the_ID(), array($omtria_attachment_metadata['width'], $omtria_attachment_metadata['height']) ); ?></a>
                                                </p>

                                                <p class="post-detail-attachment-button post-detail-attachment-button--left" id="post-detail-attachment-prev"><?php previous_image_link(false, (is_rtl()) ? '<span class="fa fa-long-arrow-alt-right"></span>' : '<span class="fa fa-long-arrow-alt-left"></span>' ); ?></p>
                                                <p class="post-detail-attachment-button post-detail-attachment-button--right" id="post-detail-attachment-next"><?php next_image_link(false, (is_rtl()) ? '<span class="fa fa-long-arrow-alt-left"></span>' : '<span class="fa fa-long-arrow-alt-right"></span>'); ?></p>
                                            </div>
                                        </header>

                                        <div class="post-detail-content">
                                            <div class="post-detail-content-inner">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>

                                        <footer class="post-detail-footer">
                                            <div class="post-detail-footer-inner element--clearfix">
                                                <p class="post-detail-footer-info">
                                                    <?php esc_html_e('Dimensions:', 'omtria'); ?>
                                                    <a href="<?php echo esc_url(wp_get_attachment_url()); ?>"><?php echo esc_html($omtria_attachment_metadata['width']."&times;".$omtria_attachment_metadata['height']); ?></a>
                                                </p>
                                                <p class="post-detail-footer-author">
                                                    <?php esc_html_e('Published in', 'omtria'); ?>
                                                    <a href="<?php echo esc_url(get_post_permalink(wp_get_post_parent_id( get_the_ID() ))); ?>"><?php echo esc_html(get_the_title(wp_get_post_parent_id( get_the_ID() ))); ?></a>
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
    </div>

<?php get_footer(); ?>