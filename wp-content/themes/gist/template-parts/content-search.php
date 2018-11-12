<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gist
 */
global $gist_theme_options;
$gist_entry_meta = $gist_theme_options['gist-blog-meta-options'];
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

        <div class="entry-summary">
            <?php gist_post_thumbnail(); ?>
            <?php the_excerpt(); ?>
        </div>
        <!-- .entry-summary -->

        <footer class="entry-footer">
            <?php gist_entry_footer(); ?>
        </footer>
        <!-- .entry-footer -->
    </div>
    <!-- .p-15 -->
</article><!-- #post-<?php the_ID(); ?> -->
