<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Quicksand 
 */
$colorScheme = quicksand_get_color_scheme();
if (!get_theme_mod('qs_biography_show', $colorScheme['settings']['qs_biography_show'])) {
    return;
}
?>

<div class="card-footer author-bio">  
<?php
/**
 * Filter the Quicksand author bio avatar size 
 *
 * @param int $size The avatar height and width size in pixels.
 */
$author_bio_avatar_size = apply_filters('quicksand_author_bio_avatar_size', 42);
echo '<a class="card-link author-link" href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'" rel="author">';
echo  get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size);
echo '</a>';
?>
    <!-- end avatar -->

    <!-- user bio -->
    <div class="author-bio-content">

        <h4 class="card-title author-name"><a class="card-link author-link" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author"><?php echo get_the_author(); ?></a></h4>
        <p class="card-text author-description"><?php the_author_meta('description'); ?></p>   
    </div><!-- end .author-bio-content --> 
</div>   