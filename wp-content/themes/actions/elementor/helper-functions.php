<?php
namespace Elementor;

function actions_elementor_init() {
    Plugin::instance()->elements_manager->add_category(
        'actions-category',
        [
            'title'  => 'Actions Elements',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\actions_elementor_init');