<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage quicksand
 */
get_header();
?> 
 
<!--template: 404-->
<div class="row">
    
    <?php quicksand_get_sidebars('left') ?> 
    
    <!--  site-content-area -->    
    <main id="primary" class="site-content-area">  

        <section class="error-404 not-found card">
            <header class="card-block page-header">
                <h1 class="card-title page-title">
                    <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'quicksand'); ?>
                </h1>
                <h6 class="card-subtitle text-muted"><?php esc_html_e('It looks like nothing was found at this location', 'quicksand'); ?></h6>
            </header><!-- .page-header -->

            <div class="card-block page-content">
                <p class="card-text"><?php esc_html_e('Maybe try a search?', 'quicksand'); ?></p> 
                <?php get_search_form(); ?>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->

    </main><!-- .site-main --> 

    <?php quicksand_get_sidebars('right') ?> 

</div><!-- row--> 

<?php get_footer(); ?>