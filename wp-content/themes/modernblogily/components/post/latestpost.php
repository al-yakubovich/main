<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package modernblogily
 */

?>
<div class="latest-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="post-content <?php echo has_post_thumbnail() ? 'post-thumbnail' : ''; ?>">
            <header class="entry-header">
                <?php get_template_part( 'components/post/content', 'meta' ); ?>

                <?php
                if ( is_single() ) {
                    the_title( '<h1 class="entry-title">', '</h1>' );
                } else {
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                }
                ?>

            </header>
            <div class="entry-content">
                <?php echo esc_html( get_the_excerpt() ); ?>
            </div>
                <a href="<?php the_permalink(); ?>" class="readmore-head">
                    <?php echo esc_html( 'READ MORE', 'modernblogily' ); ?>
                </a>
        </div>

        <?php if ( '' != get_the_post_thumbnail() ) : ?>
            <a class="featured-img-latests" href="<?php the_permalink(); ?>">   
                <div class="latest-post-thumbnail" style="background-image:url(<?php the_post_thumbnail_url( 'modernblogily-featured-image' ); ?>)">
                </div>
            </a>
        <?php endif; ?>
    </article><!-- #post-## -->
</div>