<div class="col-sm-3 col-xs-6">
    <?php if (get_next_post()) { ?>
        <p class="post-navigation-link post-navigation-link--left">
            <a href="<?php esc_attr(the_permalink(get_next_post()->ID)); ?>"><?php esc_html_e('Next article', 'omtria'); ?><span class="fa fa-long-arrow-alt-left"></span></a>
        </p>
        <p class="post-navigation-text post-navigation-text--left">
            <em><?php echo esc_html(get_next_post()->post_title) ?></em>
        </p>
    <?php } ?>
</div>
<div class="col-sm-6 hidden-xs">
    <p class="post-navigation-link text--center">
        <a href="<?php echo esc_url(get_home_url()); ?>"><?php esc_html_e('Home', 'omtria'); ?></a>
    </p>
</div>
<div class="col-sm-3 col-xs-6">
    <?php if (get_previous_post()) { ?>
        <p class="post-navigation-link post-navigation-link--right">
            <a href="<?php esc_attr(the_permalink(get_previous_post()->ID)); ?>"><span class="fa fa-long-arrow-alt-right"></span><?php esc_html_e('Previous article', 'omtria'); ?></a>
        </p>
        <p class="post-navigation-text post-navigation-text--right">
            <em><?php echo esc_html(get_previous_post()->post_title) ?></em>
        </p>
    <?php } ?>
</div>