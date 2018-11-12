<div class="wrap shuban-wrap">
    <h1><?php esc_html_e( 'Theme Help', 'shuban' ) ?></h1>

    <div class="welcome-panel">
        <div class="welcome-panel-content">
            <h2><?php esc_html_e( 'Thank you for using our theme!', 'shuban' ) ?>  </h2>
            <p class="about-description">
                <?php echo wp_kses( 'We are always here to help you. The best way to start is to read the <a href="https://themes.salttechno.com/docs/shuban-wordpress-blog-theme/" target="_blank">knowledge base.</a>', 'shuban' ) ?>
            </p>

            <div class="welcome-panel-column-container">
                <div class="welcome-panel-column">
                    <h3><?php esc_html_e( 'Get Started', 'shuban' ) ?></h3>
                    <a class="button button-primary button-hero load-customize hide-if-no-customize" href="https://themes.salttechno.com/docs/shuban-wordpress-blog-theme/" target="_blank"><?php esc_html_e( 'Read Documentation', 'shuban' ) ?></a>
                    <p class="hide-if-no-customize"><?php echo wp_kses( 'or, <a href="https://themes.salttechno.com/wordpress-theme/shuban-pro-premium-blog-theme/" target="_blank">update to pro version!</a>', 'shuban' ) ?></p>
                </div>
                <!-- /.welcome-panel-column -->

                <div class="welcome-panel-column">
                    <h3><?php esc_html_e( 'Next Steps', 'shuban' ) ?></h3>
                    <ul>
                        <li>
                            <a href="https://themes.salttechno.com/subscribe-to-our-newsletter/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-dashboard shuban-about-next-icon"></span> <?php esc_html_e( 'Get optimization tips', 'shuban' ) ?></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( self_admin_url() ); ?>customize.php" class="welcome-icon"><span class="dashicons dashicons-media-document shuban-about-next-icon"></span> <?php esc_html_e( 'Customize your site', 'shuban' ) ?></a>
                        </li>
                        <li>
                            <a href="http://shubanpro.themesease.com" target="_blank" class="welcome-icon"><span class="dashicons dashicons-lightbulb shuban-about-next-icon"></span> <?php esc_html_e( 'Check pro version demo', 'shuban' ) ?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.welcome-panel-column -->

                <div class="welcome-panel-column welcome-panel-last">
                    <h3><?php esc_html_e( 'More Actions', 'shuban' ) ?></h3>
                    <ul>
                        <li>
                            <a href="https://themes.salttechno.com/docs/shuban-wordpress-blog-theme/how-to-select-posts-in-featured-section/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-editor-help shuban-about-next-icon"></span> <?php esc_html_e( 'How to set featured posts?', 'shuban' ) ?></a>
                        </li>
                        <li>
                            <a href="https://themes.salttechno.com/docs/shuban-wordpress-blog-theme/how-to-create-a-contact-form/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-email-alt shuban-about-next-icon"></span> <?php esc_html_e( 'How to create a contact form?', 'shuban' ) ?></a>
                        </li>
                        <li>
                            <a href="https://themes.salttechno.com/wordpress-themes/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-art shuban-about-next-icon"></span> <?php esc_html_e( 'More themes by SaltTechno', 'shuban' ) ?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.welcome-panel-column welcome-panel-last -->
            </div>
            <!-- /.welcome-panel-column-container -->
        </div>
        <!-- /.welcome-panel-content -->
    </div>
    <!-- /.welcome-panel -->



    <div class="welcome-panel">
        <div class="welcome-panel-content">
            <h2><?php esc_html_e( 'Your blog is good. Let\'s make it better!', 'shuban' ) ?>  </h2>
            <p class="about-description">
                <?php echo wp_kses( 'We have created a premium version of this theme with more features. You can check demo <a href="http://shubanpro.themesease.com/" target="_blank">here.</a>', 'shuban' ) ?>
            </p>

            <div class="welcome-panel-column-container">
                <div class="welcome-panel-column" >
                    <img src="<?php echo get_template_directory_uri() ?>/images/shubanpro-screenshot-600.jpg" alt="" style="max-width:90%;margin:15px;border-radius:4px;">
                </div>
                <!-- /.welcome-panel-column -->

                <div class="welcome-panel-column">
                    <h3><?php esc_html_e( 'Features:', 'shuban' ) ?></h3>
                    <ul style="padding-left:20px;">
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( '5 Post Formats', 'shuban' ) ?></strong>
                        </li>
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( 'Mulitple Navbars', 'shuban' ) ?></strong>
                        </li style="list-style-type: disc;">
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( 'Edit Right Footer Text', 'shuban' ) ?></strong>
                        </li>
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( 'Custom Widgets', 'shuban' ) ?></strong>
                        </li>
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( 'Premium Support', 'shuban' ) ?></strong>
                        </li>
                    </ul>
                </div>
                <!-- /.welcome-panel-column -->

                <div class="welcome-panel-column welcome-panel-last">
                    <h3><?php esc_html_e( 'Custom Widgets:', 'shuban' ) ?></h3>
                    <ul style="padding-left:20px;">
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( 'About Me/Us', 'shuban' ) ?></strong>
                        </li>
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( 'Latest Posts with Thumbnails', 'shuban' ) ?></strong>
                        </li>
                        <li style="list-style-type: disc;">
                            <strong><?php esc_html_e( 'Promotional Link Boxes', 'shuban' ) ?></strong>
                        </li>
                    </ul>
                    <a class="button button-primary button-hero load-customize hide-if-no-customize" href="https://themes.salttechno.com/wordpress-theme/shuban-pro-premium-blog-theme/" target="_blank"><?php esc_html_e( 'Learn More', 'shuban' ) ?></a>
                    <p class="hide-if-no-customize"><?php echo wp_kses( 'or, <a href="http://shubanpro.themesease.com" target="_blank">view demo!</a>', 'shuban' ) ?></p>
                </div>
                <!-- /.welcome-panel-column welcome-panel-last -->
            </div>
            <!-- /.welcome-panel-column-container -->
        </div>
        <!-- /.welcome-panel-content -->
    </div>
    <!-- /.welcome-panel -->


    <div class="welcome-panel table-panel">
        <div class="welcome-panel-content panel-text-center">
            <div class="table-title">
                    <h2>WHY UPGRADE TO PRO?  </h2>
                    <p class="about-description"> Upgrade to Shuban Pro for these awesome features! </p>
            </div>
            <div class="welcome-panel-column-container-table">
                <div class="welcome-panel-column-table">


                     <div class="feature-table">

                        <table>
                          <thead>
                            <tr>
                              <th></th>
                              <th><b>Shuban Free</b></th>
                              <th><b>Shuban Pro</b></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Multiple Post Formats</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>

                            </tr>
                            <tr>
                              <td>Multiple Navigation Bars</td>

                              <td>❌</td>
                              <td><b class="check">✔</b></td>
                            </tr>
                            <tr>
                              <td>Full Width Featured Posts Slider</td>

                              <td>❌</td>
                              <td><b class="check">✔</b></td>

                            </tr>
                            <tr>
                              <td>Custom Widgets</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>

                            </tr>
                            <tr>
                              <td>Edit Footer Right Text</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>
                            </tr>
                            <tr>
                              <td>Add Social Links</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>
                            </tr>
                            <!-- <tr>
                              <td>Color Customization</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>
                            </tr> -->
                            <tr>
                              <td>Popular Posts Widgets</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>
                            </tr>
                            <tr>
                              <td>Premium & Quick Support</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>
                            </tr>
                            <tr>
                              <td>Subscribe Form Style</td>
                              <td>❌</td>
                              <td><b class="check">✔</b></td>
                            </tr>

                          </tbody>
                        </table>

                        <a class="button button-primary button-hero load-customize hide-if-no-customize" href="https://themes.salttechno.com/wordpress-theme/shuban-pro-premium-blog-theme/" target="_blank"><?php esc_html_e( 'Learn More', 'shuban' ) ?></a>
                        <a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://shubanpro.themesease.com/" target="_blank"><?php esc_html_e( 'View Demo', 'shuban' ) ?></a>

                     </div>
                </div>
                <!-- /.welcome-panel-column -->




            </div>
            <!-- /.welcome-panel-column-container -->
        </div>
        <!-- /.welcome-panel-content -->
    </div>  <!-- /.welcome-panel table -->



    <div class="shuban-text-center">
        <a href="https://themes.salttechno.com" target="_blank" class="shuban-d-iblock"><img src="<?php echo get_template_directory_uri() ?>/images/brought-by-salt.png" alt="" width="200"></a>
    </div>
    <!-- /.shuban-text-center -->
</div>
<!-- /.wrap -->
