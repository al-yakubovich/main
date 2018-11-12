<?php
/**
 ************************************************************************************************************************
 * Backdrop Core - main-query.php
 ************************************************************************************************************************
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  namespace define
 ************************************************************************************************************************
 */
namespace Benlumia007\Backdrop\MainQuery;

/**
 ************************************************************************************************************************
 *  Table of Content
 ************************************************************************************************************************
 *  1.0 - Loop (Content Post Format)
 *  2.0 - Loop (Content Single)
 *  3.0 - Loop (Content Page)
 *  4.0 - Loop (Content Archive)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 *  1.0 - Loop (Content Post Format)
 ************************************************************************************************************************
 */
function display_content_post_format() {
    echo output_content_post_format();
}

function output_content_post_format() {
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'views/content/content', get_post_format() );
    endwhile;
            the_posts_pagination();
    else :
            get_template_part( 'views/content/content', 'none' );
    endif;
}

/**
 ************************************************************************************************************************
 *  2.0 - Loop (Content Single)
 ************************************************************************************************************************
 */
function display_content_single() {
    echo output_content_single();
}

function output_content_single() {
    while ( have_posts() ) : the_post();
        get_template_part( 'views/content/content', 'single' );
    endwhile;
    the_post_navigation( array(
        'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__( 'Next', 'backdrop' ) . '</span>' . '<span class="post-title">%title</span>',
        'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Previous', 'backdrop' ) . '</span> ' . '<span class="post-title">%title</span>',
    ));
    comments_template();
}

/**
 ************************************************************************************************************************
 *  3.0 - Loop (Content Page)
 ************************************************************************************************************************
 */
function display_content_page() {
    echo output_content_page();
}

function output_content_page() {
    while ( have_posts() ) : the_post();
        get_template_part( 'views/content/content', 'page' );
    endwhile;
    comments_template();
}

/**
 ************************************************************************************************************************
 *  4.0 - Loop (Content Archive)
 ************************************************************************************************************************
 */
function display_content_archive() {
    echo output_content_archive();
}

function output_content_archive() {
    if ( have_posts() ) :
            the_archive_title( '<header class="archive-header">', '</header>' );
        while ( have_posts() ) : the_post();
            get_template_part( 'views/content/content', get_post_format() );
    endwhile;
            the_posts_pagination();
    else :
            get_template_part( 'views/content/content', 'none' );
    endif;
}