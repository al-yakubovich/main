<!--template: content-none-->
<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage quicksand 
 */
?>

<!--template: content-none-->
<section class="card no-results not-found">
    
    <header class="card-block page-header">
        <h1 class="card-title page-title"><?php esc_html_e('Nothing Found', 'quicksand'); ?></h1>
    </header><!-- .page-header -->

    <div class="card-block page-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>

            <p class="card-text"><?php  
            /* translators: url */
            printf(esc_html__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'quicksand'), esc_url(admin_url('post-new.php'))); ?></p>

        <?php elseif (is_search()) : ?>

            <p class="card-text"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'quicksand'); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p class="card-text"><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'quicksand'); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>
            
    </div><!-- .page-content -->
</section><!-- .no-results -->
