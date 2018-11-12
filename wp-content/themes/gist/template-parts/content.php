<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gist
 */
global $gist_theme_options;
$gist_entry_meta = $gist_theme_options['gist-blog-meta-options'];
$gist_show_content = $gist_theme_options['gist-blog-excerpt-options'];
$gist_show_featured_image = $gist_theme_options['gist-single-featured'];
$gist_read_more_text = $gist_theme_options['gist-blog-read-more-options'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="p-15">
        <header class="entry-header">
            <?php
            if (('post' === get_post_type()) && ($gist_entry_meta == 1)) : ?>
                <div class="entry-meta">
                    <?php gist_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php
            endif;
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            if (('post' === get_post_type()) && ($gist_entry_meta == 1)) : ?>
                <div class="entry-meta entry-category">
                    <?php gist_entry_category(); ?>
                </div><!-- .entry-meta -->
            <?php
            endif;
            ?>
        </header>
        <!-- .entry-header -->

        <div class="entry-content">
            <?php
                if(! ( is_singular() ) ){
                    gist_post_thumbnail();
                }
                else if( ( is_singular() ) && ( $gist_show_featured_image == 1 ) ) {
                    gist_post_thumbnail();
                }
            ?>
            <?php
            if (is_singular()) :
                the_content();
            else :
                if ( $gist_show_content == 'excerpt' ) {
                    the_excerpt();
                } else {
                    the_content();
                }
            endif;

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'gist'),
                'after' => '</div>',
            ));
            ?>
        </div>
        <!-- .entry-content -->

        <footer class="entry-footer">
            <?php
            if ( ( !is_single() ) && ( $gist_show_content == 'excerpt' ) ) {
                if(!empty($gist_read_more_text)){                ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                    <?php echo esc_html( $gist_read_more_text ); ?>
                    
                </a>
            <?php
                }
            }
            gist_entry_footer();
            ?>
        </footer>
        <!-- .entry-footer -->
    </div>
    <!-- .p-15 -->
</article><!-- #post-<?php the_ID(); ?> -->
