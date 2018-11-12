<?php
if (class_exists('WP_Customize_Control')) {

    class QuicksandCustomizeCategoryControl extends WP_Customize_Control {

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-category-' . $this->id,
                        'echo' => 0,
                        'show_option_none' => __('&mdash; Select &mdash;', 'quicksand'),
                        'option_none_value' => '0',
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);
            $ctrl = sprintf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s</label>', $this->label, $this->description, $dropdown
            );
            
            echo wp_kses($ctrl, array(
                'label' => array(),
                'div' => array(),
                'span' => array(
                    'class' => array()
                ),
                'select' => array(
                    'data-customize-setting-link' => array(),
                    'name' => array(),
                    'id' => array(),
                    'class' => array()
                ),
                'option' => array(
                    'value' => array(),
                    'class' => array()
                ),
            ));
        }

    }

}