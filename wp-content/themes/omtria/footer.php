        <footer class="footer footer--default" id="footer">
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                                if (has_nav_menu('menu-footer')) {
                                    wp_nav_menu(array(
                                        'theme_location' => 'menu-footer',
                                        'menu_class'     => 'menu-footer menu-footer--default',
                                        'depth'          => 1,
                                        'link_before'    => '<span>',
                                        'link_after'     => '</span>',
                                    ));
                                }
                            ?>
                            <p class="footer-copyright">
                                <?php
                                    $footer_text = get_theme_mod('omtria_footer_text', __('Created by michalmarek.sk', 'omtria'));

                                    if ($footer_text != __('Created by michalmarek.sk', 'omtria')) {
                                        echo wp_kses_post($footer_text);
                                    } else {
                                        esc_html_e('Created by michalmarek.sk', 'omtria');
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>    