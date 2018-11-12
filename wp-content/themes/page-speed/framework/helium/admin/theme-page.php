<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 31/01/18
 * Time: 2:41 PM
 */


function helium_theme_options_display() {
	if ( defined( 'HELIUM_PRO' ) ) {
		include_once HELIUM_THEME_INC . 'pro/admin-theme-options.php';
	}
	global $current_user;
	?>


    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="my-wrap theme-options alignleft">
        <div class="greet">
            <h3>Hi <?php echo sanitize_text_field( $current_user->display_name ) ?>,</h3>
            <h1><?php _e( 'Welcome to', 'page-speed' ) ?> Page Speed</h1>
            <br/>
			<?php echo sprintf( '
  
       
        %s',
				__( 'First off, a big thank you for choosing Page Speed amongst the thousands of theme options available to
        you.<br>
        We hope you find Page Speed useful and easy to use. If you have any <strong>ideas/questions/problems</strong>, please don\'t hesitate to ask/share on the <a
                href="https://forums.swiftthemes.com/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic">SUPPORT FORUM</a>
        or shoot an email to <a href="mailto:satish@swiftthemes.com?Subject=Question%20about%20PageSpeed"
                                target="_top"><strong>satish@SwiftThemes.com</strong></a>. 
                                It\'s always a pleasure to hear from you and we take your feedback very seriously. <br /><br />
        If you like the theme, please recommend it to your peers and <a
                href="https://wordpress.org/support/theme/page-speed/reviews/#new-post" target="_blank">REVIEW IT</a> on
        WordPress.Org', 'page-speed' )

			)
			?>
        </div>
        <br/>
		<?php settings_errors(); ?>
        <div class="tabs-container" id="tabs">
            <ul>
                <li><a href="#tabs-1"><?php _e( 'Getting Started', 'page-speed' ) ?></a></li>
                <li><a href="#tabs-3"><?php _e( 'Tools', 'page-speed' ) ?></a></li>
				<?php if ( defined( 'HELIUM_PRO' ) ) { ?>
                    <li><a href="#tabs-2"><?php _e( 'Theme Options', 'page-speed' ) ?></a></li>
                    <li><a href="#tabs-4"><?php _e( 'Activation', 'page-speed' ) ?></a></li>
				<?php } else { ?>
                    <li><a href="#tabs-5"><?php _e( 'Pro vs Free', 'page-speed' ) ?></a></li>
				<?php } ?>
            </ul>

            <div id="tabs-1">
				<?php pagespeed_about() ?>
            </div>
            <div id="tabs-3">
				<?php helium_tools() ?>
            </div>
			<?php if ( defined( 'HELIUM_PRO' ) ) { ?>
                <div id="tabs-2">
                    <form id="helium_theme_options">
                        <input type="hidden"
                               name="helium_ajax_nonce" id="helium_ajax_nonce"
                               value="<?php echo wp_create_nonce( 'helium_ajax_nonce' ) ?>"/>

						<?php helium_display_theme_options( $page_speed_theme_options ) ?>
                        <div id="helium-options-footer" class="cf">
                            <button class="button button-primary button-hero alignright" id="save_theme_options">
								<?php _e( 'Save
                            settings', 'page-speed' ) ?></a>
                            </button>
                            <span id="options-changed"
                                  class="options-status"><?php _e( 'You have unsaved changes', 'page-speed' ) ?></span>
                            <span id="options-saved"
                                  class="options-status"><?php _e( 'Settings saved', 'page-speed' ) ?></span>
                            <span id="options-save-error"
                                  class="options-status"><?php _e( 'Error saving settings', 'page-speed' ) ?></span>
                        </div>
                    </form>

                </div>

                <div id="tabs-4">
					<?php helium_render_license_form() ?>
                </div>
			<?php } else { ?>
                <div id="tabs-5">
					<?php helium_pro_vs_free() ?>
                </div>
			<?php } ?>


        </div>

    </div><!-- /.wrap -->


    <div id="ps-sb">
        <?php $user = wp_get_current_user() ?>

        <div id="ps-subscribe" class="card">
            <h3>Use PageSpeed Right</h3>
<!--            <h3>Be the first to know</h3>-->
            <p style="color: #EEE;">Subscribe to get the free "<strong>Getting started with PageSpeed eBook</strong>",
                tips, promotions
                and more&hellip; </p>
<!--            <p style="color: #EEE;">-->
<!--                Subscribe to get the latest news about PageSpeed, promotions and WordPress optimization tips.-->
<!--            </p>-->
            <form action="https://letters.SwiftThemes.Com/subscribe" method="POST" accept-charset="utf-8" target="_blank">
                <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $user->display_name?>"/>
                <input type="email" name="email" id="email" placeholder="Your email" value="<?php echo $user->user_email?>"/>
                <br/>
                <div style="display:none;">
                    <label for="hp">HP</label><br/>
                    <input type="text" name="hp" id="hp"/>
                </div>
                <input type="hidden" name="list" value="gGVnfkRfnOapU2IKHyQKvw"/>
                <input type="hidden" name="subform" value="yes"/>
                <input type="submit" name="submit" id="submit" value="Subscribe" class=""/>
            </form>
        </div>

        <div class="support card">
            <a style="color:#FFF;display: block"
               href="https://forums.swiftthemes.com/?utm_source=ps_theme_admin&utm_medium=useful_links&utm_campaign=basic">Need
                help? Visit the
                <h1>Support Forum</h1></a>
        </div>
        <div class="tweet card" style="background: #1da1f2;">
            <a target="_blank"
               href="https://twitter.com/home?status=I'm%20using%20%20PageSpeed,%20the%20fastest%20WordPress%20theme%20by%20%40SwiftThemes%20on%20my%20website.%20Give%20it%20a%20try,%20you%20won't%20regret.%20https%3A//SwiftThemes.Com">
                Click to tweet about
                <h1 style="color: #FFF;">PageSpeed Theme</h1></a>
            Your help is greatly appreciated :-)
        </div>
    </div>

	<?php
}

function helium_pro_vs_free() {
	?>
    <p style="font-size:18px;font-weight: lighter"> While the free version you are using now is limited in no way,
        upgrading to the premium version gets you priority support and the following additional features.
        <br>
        <br>
        <a href="https://swiftthemes.com/upgrade-pagespeed-pro/?utm_source=ps_theme_admin&amp;utm_medium=admin_page&amp;utm_campaign=basic"
           target="_blank" class="button button-primary"><span class="dashicons dashicons-awards"
                                                               style="margin-top: 3px"></span> Go Pro</a>
        <br>
        <span style="font-size: 12px;color:#CCC">Use coupon code <code>V1SY7QGR</code> for 25% OFF.</span>
    </p>
    <table class="tg">
        <tr>
            <th class="tg-yw4l">Feature</th>
            <th class="tg-yw4l">Page Speed</th>
            <th class="tg-yw4l">Page Speed Pro</th>
        </tr>
        <tr>
            <td class="tg-yw4l">Super Fast</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Responsive</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">WooCommerce Support</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Typography Options & Google Fonts</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Remove theme credit link</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Eliminate render-blocking CSS by separating above fold CSS</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Social Icons</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Masonry Grid Layout</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Search form in header</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">More Color Schemes</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Individual Color Options & Gradients</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Extra PageTemplates For WooCommerce</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Customizable footer columns</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Extra Page Templates.<br/>[Landing Page, Single column, Single column with featured
                image,Right sidebar, Left sidebar]
            </td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
        <tr>
            <td class="tg-yw4l">Priority Support</td>
            <td class="tg-yw4l"><span class="dashicons dashicons-no"></span></td>
            <td class="tg-yw4l"><span class="dashicons dashicons-yes"></span></td>
        </tr>
    </table>
	<?php
}