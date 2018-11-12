<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage quicksand
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<!--template: comments-->
<div class="card">
    <div class="card-header comments-title">

        <?php
        $comments_number = get_comments_number();
        if (1 === $comments_number) {
            /* translators: %s: post title */
            printf(esc_html_x('One thought on &ldquo;%s&rdquo;', 'comments title', 'quicksand'), get_the_title());
        } else {
            echo esc_html(sprintf(
                    /* translators: 1: number of comments, 2: post title */
                    _n(
                            '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments_number,  'quicksand'
                    ), $comments_number, get_the_title()
            ));
        }
        ?>
    </div>
    <div id="comments" class="card-block comments-area">

        <?php if (have_comments()) : ?>   
            <ol class="comment-list">
                <?php
                wp_list_comments(array(
                    'style' => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 42,
//                    TODO: see for a working example
//                        http://www.studiograsshopper.ch/code-snippets/customising-wp_list_comments/
//                    'callback' => 'quicksand_comment'
                ));
                ?>
            </ol><!-- .comment-list -->

            <?php
            the_comments_navigation(array(
                'prev_text' => '<span class="meta-nav btn btn-outline-secondary comments-last-link" aria-hidden="true"><i class="fa fa-long-arrow-left"></i>' . esc_html(__("Older Comments", "quicksand")) . '</span>' .
                '<span class="screen-reader-text">' . esc_html(__('Older Comments', 'quicksand')) . '</span> ',
                'next_text' => '<span class="meta-nav btn btn-outline-secondary comments-next-link " aria-hidden="true">' . esc_html(__("Newer Comments", "quicksand")) . '<i class="fa fa-long-arrow-right"></i></span>' .
                '<span class="screen-reader-text">' . esc_html(__('Newer Comments', 'quicksand')) . '</span> ',
            ));
            ?>

        <?php endif; // Check for have_comments().   ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
            ?>
            <p class="card-text no-comments"><?php esc_html_e('Comments are closed.', 'quicksand'); ?></p>
        <?php endif; ?> 

        <?php
        comment_form(
                array('fields' => apply_filters('comment_form_default_fields', array())));
        ?>

    </div><!-- .comments-area -->
</div>