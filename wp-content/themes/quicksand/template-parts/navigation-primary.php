<!--template: navigation-primary--> 
<?php
$primary_nav_options = array(
    'theme_location' => 'primary',
    'depth' => 2,
    'container' => '',
    'container_class' => '',
    'menu_class' => 'nav navbar-nav',
    'fallback_cb' => 'QuicksandNavwalker::fallback',
    'walker' => new QuicksandNavwalker()
);
?> 

<div class="site-navigation"> 
    <nav class="navbar navbar-light bg-faded site-nav">
        <button class="navbar-toggler hidden-md-up float-xs-left" type="button" data-toggle="collapse" data-target="#collapsing-navbar" aria-controls="collapsing-navbar" aria-expanded="false" aria-label="<?php echo esc_html__('toggle navigation', 'quicksand'); ?>">
            &#9776;
        </button>
        <!--search & close buttons in mobile-->
        <div class="nav-search-mobile-wrapper hidden-md-up float-xs-right"> 
            <a class="btn btn-secondary nav-search-close-mobile hidden-xs-up" href="#" aria-label="<?php echo esc_html__('close', 'quicksand'); ?>">
                <i class="fa fa-times fa-lg" aria-hidden="true"></i>
            </a> 
            <a class="btn btn-secondary nav-search-mobile hidden-md-up"  href="#" aria-label="<?php echo esc_html__('search', 'quicksand'); ?>">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a> 
        </div>
        <!--workaround for safari-->
        <div style="clear:both"></div>

        <!--searchform in navbar-mobile-->
        <div class="nav-searchform-mobile hidden-md-up">
            <div class="card"> 
                <div class="card-block"> 
                    <?php
                    add_filter('get_search_form', 'quicksand_get_searchform_nav_mobile');
                    get_search_form();
                    remove_filter('get_search_form', 'quicksand_get_searchform_nav_mobile');
                    ?> 
                </div>  
            </div>
        </div>

        <!--searchform in navbar-->
        <div class="collapse navbar-toggleable-sm" id="collapsing-navbar">
            <div class="nav-searchform hidden-xs-up">
                <?php
                add_filter('get_search_form', 'quicksand_get_searchform_nav');
                get_search_form();
                remove_filter('get_search_form', 'quicksand_get_searchform_nav');
                ?>  
            </div>
            <!--standard navigation-->
            <div class="nav-content">
                <?php
                if (function_exists('the_custom_logo')) :
                    if (has_custom_logo()) {
                        ?> 
                        <div class="navbar-brand" href="/">
                            <?php quicksand_the_custom_logo(); ?>
                        </div> 
                        <?php
                    } else {
                        ?>  
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" ><?php echo esc_html(get_theme_mod('qs_nav_logo_text', '')) ?></a>
                        <?php
                    }
                endif;
                ?>
                <div class="nav-wrapper"> 
                    <?php wp_nav_menu($primary_nav_options); ?>   
                </div>
                <div class="nav-search-wrapper hidden-sm-down"> 
                    <a class="btn btn-secondary nav-search" href="#" aria-label="<?php echo esc_html__('search', 'quicksand'); ?>">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a> 
                </div>
            </div> 

        </div>
    </nav>
</div><!-- .site-navigation -->  
