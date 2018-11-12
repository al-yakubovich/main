<?php
/**
 * Display Social Links
 *
 * @since AcmeBlog 1.1.0
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('acmeblog_social_links') ) :

    function acmeblog_social_links( ) {

        global $acmeblog_customizer_all_values;
        ?>
        <div class="socials">
            <?php
            if ( !empty( $acmeblog_customizer_all_values['acmeblog-facebook-url'] ) ) { ?>
                <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-facebook-url'] ); ?>" class="facebook" data-title="Facebook" target="_blank">
                    <span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span>
                </a>
            <?php }
            if ( !empty( $acmeblog_customizer_all_values['acmeblog-twitter-url'] ) ) { ?>
                <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-twitter-url'] ); ?>" class="twitter" data-title="Twitter" target="_blank">
                    <span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span>
                </a>
            <?php }
            if ( !empty( $acmeblog_customizer_all_values['acmeblog-youtube-url'] ) ) { ?>
                <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-youtube-url'] ); ?>" class="youtube" data-title="Youtube" target="_blank">
                    <span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span>
                </a>
            <?php }
            if ( !empty( $acmeblog_customizer_all_values['acmeblog-instagram-url'] ) ) { ?>
                <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-instagram-url'] ); ?>" class="instagram" data-title="Instagram" target="_blank">
                    <span class="font-icon-social-instagram"><i class="fa fa-instagram"></i></span>
                </a>
            <?php }
            if ( !empty( $acmeblog_customizer_all_values['acmeblog-google-plus-url'] ) ) {
                ?>
                <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-google-plus-url'] ); ?>" class="google-plus" data-title="Google Plus" target="_blank">
                    <span class="font-icon-social-google-plus"><i class="fa fa-google-plus"></i></span>
                </a>
                <?php
            }
            if ( !empty( $acmeblog_customizer_all_values['acmeblog-pinterest-url'] ) ) { ?>
                <a href="<?php echo esc_url( $acmeblog_customizer_all_values['acmeblog-pinterest-url'] ); ?>" class="pinterest" data-title="Pinterest" target="_blank">
                    <span class="font-icon-social-pinterest"><i class="fa fa-pinterest"></i></span>
                </a>
            <?php }
            ?>
        </div>
        <?php
    }
endif;
add_filter( 'acmeblog_action_social_links', 'acmeblog_social_links', 10 );