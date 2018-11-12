<?php


function shuban_customizer_style() {
    ?>

    <style type="text/css">
        <?php if ( get_theme_mod( 'shuban_logo_height' ) ) : ?> .shuban-logo-img { height: <?php echo get_theme_mod( 'shuban_logo_height' ); ?>px; } <?php endif; ?>
    </style>

    <?php
}
add_action( 'wp_head', 'shuban_customizer_style' );
