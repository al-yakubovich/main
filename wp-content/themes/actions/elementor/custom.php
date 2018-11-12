<?php

function actions_cf7_temp() {
    $wpcf7_array = array();

        $args = array(
            'post_type' => 'wpcf7_contact_form',
        );
        
        $wpcf7 = get_posts($args);

        foreach( $wpcf7 as $post ) { setup_postdata( $post );
            $wpcf7_array[$post->ID] = $post->post_title;
        } 

        return $wpcf7_array;

    wp_reset_postdata();
}