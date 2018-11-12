<?php
/**
 * Content and content wrapper end
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_after_content' ) ) :

    function acmeblog_after_content() {
      ?>
        </div><!-- #content -->
        </div><!-- content-wrapper-->
    <?php
    }
endif;
add_action( 'acmeblog_action_after_content', 'acmeblog_after_content', 10 );

/**
 * Footer content
 *
 * @since AcmeBlog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_footer' ) ) :

    function acmeblog_footer() {

        global $acmeblog_customizer_all_values;
        ?>
        <div class="clearfix"></div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="wrapper footer-wrapper">
                <div class="footer-copyright border text-center">
                    <?php if( isset( $acmeblog_customizer_all_values['acmeblog-footer-copyright'] ) ): ?>
                        <p><?php echo wp_kses_post( $acmeblog_customizer_all_values['acmeblog-footer-copyright'] ); ?></p>
                    <?php endif; ?>
                    <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'acmeblog' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'acmeblog' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'acmeblog' ), 'AcmeBlog', '<a href="http://www.acmethemes.com/" rel="designer">Acme Themes</a>' ); ?>
                    </div><!-- .site-info -->
                </div>
            </div><!-- footer-wrapper-->
        </footer><!-- #colophon -->
    <?php
    }
endif;
add_action( 'acmeblog_action_footer', 'acmeblog_footer', 10 );

/**
 * Page end
 *
 * @since AcmeBlog 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_page_end' ) ) :

    function acmeblog_page_end() {
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'acmeblog_action_after', 'acmeblog_page_end', 10 );