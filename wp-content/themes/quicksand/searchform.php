<?php
/**
 * Template for displaying search forms in Quicksand
 *
 * @package WordPress
 * @subpackage quicksand 
 */
?>

<!--template: searchform-->
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="<?php echo esc_html_x('Search ...', 'label', 'quicksand'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" >
        <span class="input-group-btn"> 
            <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </span>
    </div> 
</form>