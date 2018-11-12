<?php
/**
 * Custom Quicksand template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Quicksand
 */
if (!function_exists('quicksand_entry_meta')) :

    /**
     * Prints HTML with meta information for the categories, tags.
     *
     * Create your own quicksand_entry_meta() function to override in a child theme
     */
    function quicksand_entry_meta() {
        echo '<div class="card-block entry-meta">';

        // only show what is saved in array 'qs_content_show_meta'
        $colorScheme = quicksand_get_color_scheme();
        $onlyShowThisMetaInfo = get_theme_mod("qs_content_show_meta", $colorScheme['settings']['qs_content_show_meta']);

        // nothing to show
        if (empty($onlyShowThisMetaInfo)) {
            return;
        }

        // date 
        if (in_array('date', $onlyShowThisMetaInfo) && in_array(get_post_type(), array('post', 'attachment'))) {
            $quicksand_entry_date = get_quicksand_entry_date(); 
            echo wp_kses_post($quicksand_entry_date);
        }

        // author
        if (in_array('author', $onlyShowThisMetaInfo)) {
            $author = sprintf('<span class="post-author"><a href="%s">%s</a></span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author());
            echo wp_kses_post($author); 
        }

        // post-format
        $format = get_post_format();
        if (in_array('post-format', $onlyShowThisMetaInfo) && current_theme_supports('post-formats', $format)) {
            $post_format_string = sprintf('<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>', sprintf('<span class="screen-reader-text">%s </span>', _x('Format', 'Used before post format.', 'quicksand')), esc_url(get_post_format_link($format)), get_post_format_string($format));
            echo wp_kses_post($post_format_string); 
        }

        // taxonomies
        if (in_array('taxonomies', $onlyShowThisMetaInfo) && 'post' === get_post_type()) {
            $quicksandEntryTaxonomies = get_quicksand_entry_taxonomies(); 
            echo wp_kses_post($quicksandEntryTaxonomies['categories']); 
        }

        // comments
        if (in_array('comments', $onlyShowThisMetaInfo) && !is_singular() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            /* translators: post-title */
            comments_popup_link(sprintf(__('Leave a comment<span class="screen-reader-text"> on %s</span>', 'quicksand'), get_the_title()));
            echo '</span>';
        }
        echo "</div>";
    }

endif;


if (!function_exists('quicksand_entry_tags')) :

    /**
     * Prints HTML with tag information for current post.
     *
     * Create your own quicksand_entry_tags() function to override in a child theme
     */
    function quicksand_entry_tags() {
        $taxonomies = get_quicksand_entry_taxonomies();

        if (!empty($taxonomies['tags'])) {
            ?> 
            <div class="entry-footer card-footer text-muted"> 
                <?php echo wp_kses_post($taxonomies['tags']); ?>
            </div>
            <?php
        }
    }

endif;



if (!function_exists('get_quicksand_entry_date')) :

    /**
     * Prints HTML with date information for current post.
     *
     * Create your own get_quicksand_entry_date() function to override in a child theme
     */
    function get_quicksand_entry_date() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        // Update-time:
//        if (get_the_time('U') !== get_the_modified_time('U')) {
//            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
//        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), get_the_date(), esc_attr(get_the_modified_date('c')), get_the_modified_date());

        return sprintf('<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>', _x('Posted on', 'Used before publish date.', 'quicksand'), esc_url(get_permalink()), $time_string
        );
    }

endif;


if (!function_exists('get_quicksand_entry_taxonomies')) :

    /**
     * Prints HTML with category and tags for current post.
     *
     * Create your own get_quicksand_entry_taxonomies() function to override in a child theme
     */
    function get_quicksand_entry_taxonomies() {
        $taxonomies = array(
            'categories' => NULL,
            'tags' => NULL,
        );

        $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'quicksand'));
        if ($categories_list && quicksand_categorized_blog()) {
            $taxonomies['categories'] = sprintf('<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Categories', 'Used before category names.', 'quicksand'), $categories_list
            );
        }

        $tag_list = get_the_tag_list('<span class="tag tag-pill tag-default">', '</span><span class="tag  tag-pill tag-default">', '</span>');
        if ($tag_list) {
            $taxonomies['tags'] = sprintf('<span class="tag-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Tags', 'Used before tag names.', 'quicksand'), $tag_list);
        }

        return $taxonomies;
    }

endif;




if (!function_exists('quicksand_entry_thumbnail')) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * Create your own quicksand_entry_thumbnail() function to override in a child theme
     */
    function quicksand_entry_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <!-- post-thumbnail: featured image --> 
            <div class="card-img-top post-thumbnail">   
                <?php the_post_thumbnail('post-thumbnail', array('class' => 'card-img-top img-fluid post-thumbnail')); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?> 
            <a class="card-img-top post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true"> 
                <?php
                the_post_thumbnail('quicksand-featured_image', array(
                    'alt' => the_title_attribute('echo=0'),
                    'class' => 'img-fluid'
                ));
                ?> 
            </a>

        <?php
        endif; // End is_singular()
    }

endif;


if (!function_exists('quicksand_entry_title')) :

    /**
     * Displays the title. 
     *
     * Create your own quicksand_entry_title() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title($class = 'entry-title') {
        ?>

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php esc_html_e('Featured', 'quicksand'); ?></span>
                <?php
            endif;

            if (is_singular()) :
                ?>
                <h1 class="card-title <?php echo esc_attr($class); ?>"><?php the_title(); ?></h1> 

                <?php
            else :
                the_title(sprintf('<h2 class="card-title %s"><a href="%s" rel="bookmark">', esc_attr($class), esc_url(get_permalink())), '</a></h2>');
                ?> 
            <?php endif; ?>
        </header><!-- .entry-header --> 
        <?php
    }

endif;


if (!function_exists('quicksand_entry_title_postformat_link')) :

    /**
     * Displays the title for post-format: link 
     *
     * Create your own quicksand_entry_title_postformat_link() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title_postformat_link($class = 'entry-title') {
        $class = esc_attr($class);
        ?> 

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php esc_html_e('Featured', 'quicksand'); ?></span>
            <?php endif; ?>

            <div class="post-link">  
                <h2 class="card-title <?php echo esc_attr($class); ?>">
                    <a href="<?php echo esc_attr(get_url_in_content(get_the_content())); ?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i> <?php the_title(); ?></a> 
                </h2> 
            </div><!-- .post-link -->
        </header><!-- .entry-header --> 
        <?php
    }

endif;


if (!function_exists('quicksand_entry_title_postformat_audio')) :

    /**
     * Displays the title for post-format: audio 
     *
     * Create your own quicksand_entry_title_postformat_audio() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title_postformat_audio($class = 'entry-title') {
        $class = esc_attr($class);
        ?> 

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php esc_html_e('Featured', 'quicksand'); ?></span>
            <?php endif; ?>

            <div class="post-link">  
                <h2 class="card-title <?php echo esc_attr($class); ?>">
                    <a href="<?php echo esc_attr(get_the_permalink()); ?>"><i class="fa fa-music" aria-hidden="true"></i> <?php the_title(); ?></a> 
                </h2> 
            </div><!-- .post-link -->
        </header><!-- .entry-header --> 
        <?php
    }

endif;




if (!function_exists('quicksand_the_entry_content_quote')) :

    /**
     * Displays the content of a quote-post in non-singular-context
     *
     * Create your own quicksand_the_entry_content_quote() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_the_entry_content_quote($class = 'entry-content') {
        ?> 
        <!-- entry-header --> 
        <div class="card-block  <?php echo esc_attr($class); ?>">
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <!--stick post-->
                <span class="sticky-post"><?php esc_html_e('Featured', 'quicksand'); ?></span>
            <?php endif; ?>

            <div class="quote post-quote">   
                <?php
                $content = trim(get_the_content());
                if (!empty($content)) {
                    preg_match_all('/<blockquote.*?>(.*?)<\/blockquote>/is', $content, $match); 
                    if (isset($match[0][0])) {
                        echo wp_kses_post($match[0][0]);
                    }
                }
                ?> 
            </div><!-- .post-quote --> 
        </div><!-- .entry-header -->  

        <?php
    }

endif;


if (!function_exists('quicksand_entry_header_postformat_gallery')) :

    /**
     * Displays the title for post-format: gallery 
     *
     * Create your own quicksand_entry_header_postformat_gallery() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_header_postformat_gallery($class = 'quicksand-post-gallery') {
        global $post;

        // Make sure the post has a gallery in it
//        if (!has_shortcode($post->post_content, 'gallery'))
//            return $content;
        // get gallery-images
        // we don't use 'get_post_gallery images' in here, because it returns the thumbnails as well
        $gallery = get_post_gallery($post, false);
        $images = array();

        if (isset($gallery['ids'])) {
            $ids = explode(",", $gallery['ids']);

            foreach ($ids as $id) {
                $images[] = wp_get_attachment_url($id);
            }
        }
        ?>  

        <!-- entry-header --> 
        <header class="card-header entry-header <?php echo esc_attr($class); ?>"> 
            <div class="flexslider post-gallery">
                <ul class="slides"> 
                    <?php
                    // Loop through each image in each gallery
                    foreach ($images as $image_url) {
                        echo '<li>' . '<img src="' . esc_url($image_url) . '">' . '</li>';
                    }
                    ?> 
                </ul>
            </div><!-- .flexslider -->  
        </header><!-- .entry-header --> 
        <?php
    }

endif;

if (!function_exists('quicksand_entry_title_postformat_gallery')) :

    /**
     * Displays the title for post-format: gallery 
     *
     * Create your own quicksand_entry_title_postformat_gallery() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title_postformat_gallery($class = 'entry-title') {
        $class = esc_attr($class);
        ?> 

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php esc_html_e('Featured', 'quicksand'); ?></span>
            <?php endif; ?>

            <div class="post-gallery">  
                <h2 class="card-title <?php echo esc_attr($class); ?>">
                    <a href="<?php echo esc_attr(get_the_permalink()); ?>"><i class="fa fa-picture-o" aria-hidden="true"></i> <?php the_title(); ?></a> 
                </h2> 
            </div><!-- .post-gallery -->
        </header><!-- .entry-header --> 
        <?php
    }

endif;


if (!function_exists('quicksand_entry_header_postformat_video')) :

    /**
     * Displays the title for post-format: video 
     *
     * Create your own quicksand_entry_header_postformat_video() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_header_postformat_video($class = 'quicksand-post-video') {
        global $post;

        // get first video in content 
        $content = apply_filters('the_content', $post->post_content);
        $embeds = get_media_embedded_in_content($content);
        if (empty($embeds)) {
            return;
        }
        ?>  

        <!-- entry-header --> 
        <header class="card-header entry-header <?php echo esc_attr($class); ?>"> 
            <div class="video post-video">
                <?php
                echo wp_kses($embeds[0], array(
                    'iframe' => array(
                        'src' => array(),
                        'frameborder' => array(),
                        'allowfullscreen' => array()
                    )
                ));
                ?>
            </div><!-- .post-video -->  
        </header><!-- .entry-header --> 
        <?php
    }

endif;

if (!function_exists('quicksand_entry_title_postformat_video')) :

    /**
     * Displays the title for post-format: video 
     *
     * Create your own quicksand_entry_title_postformat_video() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title_postformat_video($class = 'entry-title') {
        $class = esc_attr($class);
        ?> 

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php esc_html_e('Featured', 'quicksand'); ?></span>
            <?php endif; ?>

            <div class="post-video">  
                <h2 class="card-title <?php echo esc_attr($class); ?>">
                    <a href="<?php echo esc_attr(get_the_permalink()); ?>"><i class="fa fa-film" aria-hidden="true"></i> <?php the_title(); ?></a> 
                </h2> 
            </div><!-- .post-video -->
        </header><!-- .entry-header --> 
        <?php
    }

endif;



if (!function_exists('quicksand_entry_title_postformat_quote')) :

    /**
     * Displays the title for post-format: video 
     *
     * Create your own quicksand_entry_title_postformat_video() function to override in a child theme
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title_postformat_quote($class = 'entry-title') {
        $class = esc_attr($class);
        ?> 

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php esc_html_e('Featured', 'quicksand'); ?></span>
            <?php endif; ?>

            <div class="post-video">  
                <h2 class="card-title <?php echo esc_attr($class); ?>">
                    <a href="<?php echo esc_attr(get_the_permalink()); ?>"><i class="fa fa-quote-right" aria-hidden="true"></i> <?php the_title(); ?></a> 
                </h2> 
            </div><!-- .post-video -->
        </header><!-- .entry-header --> 
        <?php
    }

endif;





if (!function_exists('quicksand_the_entry_content')) :

    /**
     * outputs default content 
     * 
     * @param type $class
     */
    function quicksand_the_entry_content($class = 'entry-content') {
        ?>   
        <!--quicksand-entry-content-default-->
        <div class="card-block quicksand-default-entry-content <?php echo esc_attr($class); ?>"> 
            <div class="card-text">
                <?php  the_content();  ?>
            </div>
        </div>  

        <!--displays page links for paginated posts (i.e. includes the 'nextpage')--> 
        <?php
        quicksand_paginated_posts_paginator();
    }

endif;


if (!function_exists('quicksand_the_entry_content_video')) :

    /**
     * outputs video-content 
     * 
     * @param type $class
     */
    function quicksand_the_entry_content_video($class = 'entry-content') {
        ?>   
        <!--quicksand-entry-content-video-->
        <div class="card-block quicksand-entry-content-video <?php echo esc_attr($class); ?>"> 
            <p class="card-text">
                <?php
                global $post;

                $hook = is_singular() ? 'the_content' : 'the_excerpt';
                if (is_singular()) {
                    // get rid of embedded objects/videos
                    $content = apply_filters('the_content', $post->post_content);
                    $content = preg_replace("/<div\sclass\=\"video\">(.*?)<\/div>/i", "", $content, 1);
                } else {
                    $content = apply_filters('the_excerpt', get_the_excerpt());
                }

                echo wp_kses_post($content);
                ?></p>
        </div>  

        <!--displays page links for paginated posts (i.e. includes the 'nextpage')--> 
        <?php
        quicksand_paginated_posts_paginator();
    }

endif;



if (!function_exists('quicksand_paginated_posts_paginator')) :

    /**
     * Displays page links for paginated posts (i.e. includes the 'nextpage')
     *
     * Create your own quicksand_paginated_posts_paginator() function to override in a child theme
     */
    function quicksand_paginated_posts_paginator() {
        wp_link_pages(array(
            'before' => '<div class="card-block page-links"><span class="card-text page-links-title">' . __('Pages:', 'quicksand') . '</span>',
            'after' => '</div>',
            'link_before' => '<span class="card-link paged-link">',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'quicksand') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
    }

endif;




if (!function_exists('quicksand_paginator_list_view')) :

    /**
     * Displays bs-style pagination 
     *
     * Create your own quicksand_paginated_posts_paginator() function to override in a child theme
     */
    function quicksand_paginator_list_view() {
        ?>
        <div class="quicksand-post-pagination-list-view">
            <?php
            // navigation: post-list 
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '<i class="fa fa-backward" aria-hidden="true"></i>',
                'next_text' => '<i class="fa fa-forward" aria-hidden="true"></i>',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'quicksand') . ' </span>',
            ));
            ?>
        </div>

        <?php
    }

endif;



if (!function_exists('quicksand_edit_post')) :

    /**
     * edit-link for logged in users & maybe more
     *
     * Create your own quicksand_edit_post() function to override in a child theme
     */
    function quicksand_edit_post() {
        if (current_user_can('edit_posts', get_the_ID())) :
            ?>
            <div class="entry-footer card-footer text-muted">
                <?php
                edit_post_link(
                        // link-text
                        sprintf(
                                /* translators: post-title */
                                __('Edit<span class="screen-reader-text"> "%s"</span>', 'quicksand'), get_the_title()
                        ),
                        // before
                        '<span class="card-link edit-link btn btn-secondary"><i class="fa fa-pencil"></i>',
                        // after
                        '</span>',
                        // id
                        get_the_ID(),
                        // class
                        'post_edit_link'
                );
                ?>
            </div><!-- .entry-footer -->
            <?php
        endif;
    }

endif;


if (!function_exists('quicksand_author_biography')) :

    /**
     * Displays the author biography. 
     *
     * Create your own quicksand_author_biography() function to override in a child theme. 
     */
    function quicksand_author_biography() {
        $authorMeta = get_the_author_meta('description');
        $colorScheme = quicksand_get_color_scheme();
        if (is_singular() && !empty($authorMeta) && get_theme_mod('qs_biography_show', $colorScheme['settings']['qs_biography_show'])) :
            get_template_part('template-parts/biography');
        endif;
    }

endif;




if (!function_exists('quicksand_entry_excerpt')) :

    /**
     * Displays the optional excerpt. 
     *
     * Create your own quicksand_entry_excerpt() function to override in a child theme
     *
     * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
     */
    function quicksand_entry_excerpt($class = 'entry-summary') {
        $class = esc_attr($class);
        ?>
        <div class="card-block <?php echo esc_attr($class); ?>">
            <span class="card-text"><?php the_excerpt(); ?></span>
        </div>  
        <?php
    }

endif;



if (!function_exists('quicksand_entry_excerpt_more') && !is_admin()) :

    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with a read-more btn
     *
     * Create your own quicksand_entry_excerpt_more() function to override in a child theme
     *
     * @return string 'Continue reading' link prepended with an ellipsis.
     */
    function quicksand_entry_excerpt_more() {

        return ' ...<br><a class="read-more-link btn btn-outline-secondary" href="' . esc_url(get_permalink(get_the_ID())) . '">' . __('Read more', 'quicksand') . '</a>';
    }

    add_filter('excerpt_more', 'quicksand_entry_excerpt_more');
endif;


if (!function_exists('quicksand_categorized_blog')) :

    /**
     * Determines whether blog/site has more than one category.
     *
     * Create your own quicksand_categorized_blog() function to override in a child theme
     *
     * @return bool True if there is more than one category, false otherwise.
     */
    function quicksand_categorized_blog() {
        if (false === ( $all_the_cool_cats = get_transient('quicksand_categories') )) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields' => 'ids',
                // We only need to know if there is more than one category.
                'number' => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('quicksand_categories', $all_the_cool_cats);
        }

        if ($all_the_cool_cats > 1) {
            // This blog has more than 1 category so quicksand_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so quicksand_categorized_blog should return false.
            return false;
        }
    }

endif;

/**
 * Flushes out the transients used in quicksand_categorized_blog()
 */
function quicksand_category_transient_flusher() {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('quicksand_categories');
}

add_action('edit_category', 'quicksand_category_transient_flusher');
add_action('save_post', 'quicksand_category_transient_flusher');



if (!function_exists('quicksand_the_custom_logo')) :

    /**
     * Displays the optional custom logo
     */
    function quicksand_the_custom_logo() {
        if (function_exists('the_custom_logo')) :
            if (has_custom_logo()) {
                the_custom_logo();
            }
        endif;
    }














































































































    
endif;