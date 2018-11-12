<div class="search-block">
    <form action="<?php echo esc_url(home_url())?>" class="searchform" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            global $acmeblog_customizer_all_values;
            $placeholder_text = '';
            if ( isset( $acmeblog_customizer_all_values['acmeblog-search-placholder']) ):
                $placeholder_text = ' placeholder="' . esc_attr( $acmeblog_customizer_all_values['acmeblog-search-placholder'] ). '" ';
            endif; ?>
            <input type="text" <?php echo  $placeholder_text ;?> class="menu-search" id="menu-search" name="s" value="<?php echo esc_attr( get_search_query() );?>">
            <button class="searchsubmit fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>