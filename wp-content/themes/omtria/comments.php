<?php

if (!post_password_required()) {
    if (have_comments()) {
        if (is_rtl()) {
            echo "<h2 class='comments-title'><span>&#40;".esc_html(get_comments_number())."&#41;</span> ".__('Comments', 'omtria')."</h2>";
        } else {
            echo "<h2 class='comments-title'>".__('Comments', 'omtria')." <span>&#40;".esc_html(get_comments_number())."&#41;</span></h2>";
        }

        echo "<ol>";
        wp_list_comments(array(
            'format' => 'html5',
            'avatar_size' => 30
        ));
        echo "</ol>";

        the_comments_navigation();

        if (!comments_open()) {
            echo "<div class='content-box content-box--grey content-box--sm'>".__('Comments are closed.', 'omtria')."</div>";
        }
    }

    comment_form();
}