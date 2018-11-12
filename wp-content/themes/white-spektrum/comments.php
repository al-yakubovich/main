<?php
/**
 ************************************************************************************************************************
 * White Spektrum - comments.php
 ************************************************************************************************************************
 * @package     White Spektrum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */
?>

<?php
if ( post_password_required() ) { return; } ?>

<?php if ( comments_open() ) { ?>
    <section id="comments-area" class="comments-area">
        <?php if ( have_comments() ) { ?>
            <h2 class="comments-title">
                <?php $count = get_comments_number(); ?>
                <?php if ( '1' === $count ) {
                    printf( _x( 'One Comment', 'comments title', 'white-spektrum' ) );
                } else {
                    printf(_nx( '%1$s Comment', '%1$s Comments', $count, 'comments title', 'white-spektrum' ), number_format_i18n( $count ) );
                } ?>
            </h2>
        <?php } ?>
        <ol class="comment-list">
            <?php
                wp_list_comments(array(
                    'style'         => 'ol',
                    'short_ping'    => true,
                    'avatar_size'   => 70,
                ));
            ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <div class="comment-previous"><?php previous_comments_link( '<i class="fa fa-arrow-circle-o-left"></i> ' . esc_html__( 'Older Comments', 'white-spektrum' ) ); ?></div>
                <div class="comment-next"><?php next_comments_link( '<i class="fa fa-arrow-circle-o-right"></i> ' . esc_html__( 'Newer Comments', 'white-spektrum' ) ); ?></div>
            </nav>
        <?php } ?>
        <?php comment_form(); ?>
    </section>
<?php } ?>