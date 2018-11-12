<?php

if ( ! function_exists( 'gist_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function gist_load_widgets() {

        // Highlight Post.
        register_widget( 'Gist_Featured_Post' );

        // Author Widget.
        register_widget( 'Gist_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Gist_Social_Widget' );

    }

endif;
add_action( 'widgets_init', 'gist_load_widgets' );


