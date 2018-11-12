<?php
/**
 * Multiple checkbox customize control class.
 * 
 * @access public
 */
if (class_exists('WP_Customize_Control')) {

    class QuicksandCustomizeControlCheckboxMultiple extends WP_Customize_Control {

        /**
         * The type of customize control being rendered
         * @access  public
         * @var     string
         */
        public $type = 'checkbox-multiple';

        /**
         * Enqueue scripts/styles
         */
        public function enqueue() {
            wp_enqueue_script('quicksand-customize-controls', trailingslashit(get_template_directory_uri()) . 'js/customize-multiple-checkboxes.js', array('jquery'));
        }

        /**
         * Displays the control content
         */
        public function render_content() {

            if (empty($this->choices))
                return;
            ?>

            <?php if (!empty($this->label)) : ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php endif; ?>

            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php endif; ?>

            <?php $multi_values = !is_array($this->value()) ? explode(',', $this->value()) : $this->value(); ?>

            <ul>
                <?php foreach ($this->choices as $value => $label) : ?>

                    <li>
                        <label>
                            <input type="checkbox" value="<?php echo esc_attr($value); ?>" <?php checked(in_array($value, $multi_values)); ?> /> 
                            <?php echo esc_html($label); ?>
                        </label>
                    </li>

                <?php endforeach; ?>
            </ul>

            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr(implode(',', $multi_values)); ?>" />
            <?php
        }

    }

}
