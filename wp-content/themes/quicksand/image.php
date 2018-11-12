<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage quicksand
 */
get_header();
?>

<!--template: image-->
<div class="row">

    <?php quicksand_get_sidebars('left') ?> 

    <!--  site-content-area -->    
    <main id="primary" class="site-content-area">

        <?php
        // Start the loop.
        while (have_posts()) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

                <header class="card-block card-header entry-header ">
                    <?php the_title('<h1 class="card-title entry-title">', '</h1>'); ?>
                </header><!-- .entry-header -->

                <?php quicksand_entry_meta(); ?>

                <div class="card-block entry-content">

                    <div class="entry-attachment">
                        <?php
                        /**
                         * Filter the default quicksand image attachment size
                         *
                         * @param string $image_size Image size. Default 'large'.
                         */
                        $image_size = apply_filters('quicksand_attachment_size', 'large');

                        echo wp_get_attachment_image(get_the_ID(), $image_size);
                        ?>

                        <?php quicksand_entry_excerpt('card-text entry-caption'); ?>

                    </div><!-- .entry-attachment -->


                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-content -->


                <!--full-size image-link-->
                <div class="card-block entry-block">
                    <?php
                    // Retrieve attachment metadata.
                    $metadata = wp_get_attachment_metadata();
                    if ($metadata) {
                        printf('<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>', esc_html_x('Full size', 'Used before full size attachment link.', 'quicksand'), esc_url(wp_get_attachment_url()), absint($metadata['width']), absint($metadata['height'])
                        );
                    }
                    ?> 
                </div>  

                <!-- image-navigation --> 
                <nav id="image-navigation" class="card-block navigation image-navigation">
                    <div class="nav-links">  
                        <span class="nav-previous"><?php previous_image_link(false, __('<i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous Image', 'quicksand')); ?></span>
                        <span class="nav-next"></i><?php next_image_link(false, __('Next Image <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', 'quicksand')); ?></span> 
                    </div><!-- .nav-links -->
                </nav><!-- .image-navigation --> 

                <!--edit link-->
                <?php quicksand_edit_post(); ?> 
            </article><!-- #post-## -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

            // parent post link
            the_post_navigation(array(
                'prev_text' => _x('<span class="meta-nav">Published in </span><span class="post-title">%title</span>', 'Parent post link', 'quicksand'),
            ));
        // End the loop.
        endwhile;
        ?>

    </main><!-- .content-area -->  

    <?php quicksand_get_sidebars('right') ?> 

</div><!-- .row -->

<?php get_footer(); ?>
