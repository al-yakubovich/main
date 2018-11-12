<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Acmeblog_Customize_Category_Dropdown_Control' )):

    /**
     * Custom Control for category dropdown
     * @package AcmeThemes
     * @subpackage AcmeBlog
     * @since 1.0.0
     *
     */
    class Acmeblog_Customize_Category_Dropdown_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'category_dropdown';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            $acmeblog_customizer_name = 'acmeblog_customizer_dropdown_categories_' . $this->id;;
            $acmeblog_dropdown_categories = wp_dropdown_categories(
                array(
                    'name'              => $acmeblog_customizer_name,
                    'echo'              => 0,
                    'show_option_none'  =>__('Select','acmeblog'),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
            $acmeblog_dropdown_final = str_replace( '<select', '<select ' . $this->get_link(), $acmeblog_dropdown_categories );
            printf(
                '<label><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $acmeblog_dropdown_final
            );
        }
    }
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Acmeblog_Customize_Post_Dropdown_Control' )):

    /**
     * Custom Control for post dropdown
     * @package AcmeThemes
     * @subpackage AcmeBlog
     * @since 1.0.0
     *
     */
    class Acmeblog_Customize_Post_Dropdown_Control extends WP_Customize_Control {
        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'post_dropdown';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            $acmeblog_customizer_post_args = array(
                'posts_per_page'   => 100,
            );
            $acmeblog_posts = get_posts( $acmeblog_customizer_post_args );
            if(!empty($acmeblog_posts))  {
                ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                        <?php
                        $acmeblog_default_value = $this->value();
                        if( -1 == $acmeblog_default_value || empty($acmeblog_default_value)){
                            $acmeblog_default_selected = 1;
                        }
                        else{
                            $acmeblog_default_selected = 0;
                        }
                        printf('<option value="-1" %s>%s</option>',selected($acmeblog_default_selected, 1, false),__('Select','acmeblog'));
                        foreach ( $acmeblog_posts as $acmeblog_post ) {
                            printf('<option value="%s" %s>%s</option>', $acmeblog_post->ID, selected($this->value(), $acmeblog_post->ID, false), $acmeblog_post->post_title);
                        }
                        ?>
                    </select>
                </label>
                <?php
            }
        }
    }
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Acmeblog_Customize_Message_Control' )):
    /**
     * Custom Control for html display
     * @package AcmeThemes
     * @subpackage AcmeBlog
     * @since 1.0.0
     *
     */
    class Acmeblog_Customize_Message_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         * @access public
         * @var string
         */
        public $type = 'message';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            if ( empty( $this->description ) ) {
                return;
            }
            ?>
            <div class="acmeblog-customize-customize-message">
                <?php echo wp_kses_post($this->description); ?>
            </div> <!-- .acmeblog-customize-customize-message -->
            <?php
        }
    }
endif;