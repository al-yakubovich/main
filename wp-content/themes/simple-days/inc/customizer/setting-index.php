<?php
defined('ABSPATH') or die("Please don't run this script.");
/**
 * Index Settings
 *
 * @package Simple Days
 */



$wp_customize->add_section('simple_days_layout_index',array(
  'title' => esc_html__('Layout', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));



$wp_customize->add_setting( 'simple_days_index_layout_list', array(
  'default'           => 'list',
  'sanitize_callback' => 'sanitize_key',
  'transport' => 'postMessage',
) );
$wp_customize->add_control( new Simple_Days_Image_Select_Control( $wp_customize, 'simple_days_index_layout_list', array(
  'label'       => esc_html__( 'Layout', 'simple-days' ),
  'description' => __( 'Choose a layout for the blog posts.', 'simple-days' ),
  'section'     => 'simple_days_layout_index',
  'choices'     => array(
    'list' => array(
      'label' => esc_html__( 'List layout', 'simple-days' ),
      'url'   => '%slayout_list.png'
    ),
    'grid2'    => array(
      'label' => esc_html__( 'Two grid layout', 'simple-days' ),
      'url'   => '%slayout_grid2.png'
    ),
    'grid3'    => array(
      'label' => esc_html__( 'Three grid layout', 'simple-days' ),
      'url'   => '%slayout_grid3.png'
    ),
  ),
)));


$wp_customize->add_setting( 'simple_days_index_typical', array(
  'default'           => 'original',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_index_typical', array(
  'label'    => esc_html__( 'Category and date display style', 'simple-days' ),
    //'description' => esc_html__('Date and category disappears when you select hide.', 'simple-days'),
  'section'  => 'simple_days_layout_index',
  'type'     => 'radio',
  'choices'  => array(
    'original' => esc_html__( 'Simple Days style', 'simple-days' ),
    'typical' => esc_html__( 'Typical', 'simple-days' ),
  ),
));




$wp_customize->add_setting('index_thumbnail',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('index_thumbnail',array(
  'section' => 'simple_days_layout_index',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'index_thumbnail', array(
 'selector' => '.post_card_thum',
));
$wp_customize->add_setting( 'simple_days_index_thumbnail', array(
  'default'           => 'left',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_index_thumbnail', array(
  'label'    => esc_html__( 'Thumbnail display position', 'simple-days' ),
    //'description' => esc_html__('Date and category disappears when you select hide.', 'simple-days'),
  'section'  => 'simple_days_layout_index',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ).esc_html__( '(Up)', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ).esc_html__( '(Down)', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_index_list_widget_position', array(
  'default'           => 'after',
  'sanitize_callback' => 'simple_days_sanitize_radio',
));
$wp_customize->add_control( 'simple_days_index_list_widget_position', array(
  'label'    => esc_html__( 'How to Insert Index list widget area', 'simple-days' ),
  'section'  => 'simple_days_layout_index',
  'type'     => 'radio',
  'choices'  => array(
    'after' => esc_html__( 'Just after post', 'simple-days' ),
    'every' => esc_html__( 'Every post', 'simple-days' ),
  ),
));


$wp_customize->add_setting( 'simple_days_index_list_widget_number', array(
  'default' => 3,
  'sanitize_callback' => 'absint',
));
$wp_customize->add_control( 'simple_days_index_list_widget_number', array(
  'label' => esc_html__( 'Count of post for above configuring', 'simple-days' ),
        //'description' => esc_html__( 'Count of post for above configuring', 'simple-days' ),
        'section' => 'simple_days_layout_index', // Add a default or your own section
        'type' => 'number',
        'input_attrs' => array(
          'min' => 1, 'step' => 1, 'max' => 10,
        ),
      ));







$wp_customize->add_section('simple_days_index_simple_days_style',array(
  'title' => esc_html__('Simple Days style', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));


$wp_customize->add_setting('post_date_wrap',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('post_date_wrap',array(
  'section' => 'simple_days_index_simple_days_style',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'post_date_wrap', array(
 'selector' => '.post_date_wrap',
));
$wp_customize->add_setting( 'simple_days_top_date_format', array(
  'default'           => '1',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
)
);
$wp_customize->add_control( 'simple_days_top_date_format', array(
  'label'    => esc_html__( 'post date display format', 'simple-days' ),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    '1' => esc_html__( 'day-month-year', 'simple-days' ),
    '2' => esc_html__( 'month-day-year', 'simple-days' ),
  ),
));
$wp_customize->add_setting( 'simple_days_top_date_wrap', array(
  'default'           => '1',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
)
);
$wp_customize->add_control( 'simple_days_top_date_wrap', array(
  'label'    => esc_html__( 'post date display shape', 'simple-days' ),
  'description' => esc_html__('around of a line appear rounded or squared', 'simple-days'),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    '1' => esc_html__( 'Circle', 'simple-days' ),
    '2' => esc_html__( 'Square', 'simple-days' ),
  ),
));

$wp_customize->add_setting( 'simple_days_index_date_position', array(
  'default'           => 'left',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_date_position', array(
  'label'    => esc_html__( 'Post date display position', 'simple-days' ),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));




$wp_customize->add_setting('index_category',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('index_category',array(
  'section' => 'simple_days_index_simple_days_style',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'index_category', array(
  'selector' => '.post_card_category',
));


$wp_customize->add_setting( 'simple_days_index_category_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_category_position', array(
  'label'    => esc_html__( 'Post category display position', 'simple-days' ),
  'section'  => 'simple_days_index_simple_days_style',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));








$wp_customize->add_section('simple_days_index_excerpt_setting',array(
  'title' => esc_html__('Excerpt', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));











$wp_customize->add_setting('excerpt_length',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('excerpt_length',array(
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'excerpt_length', array(
 'selector' => '.post_card .summary',
));
$wp_customize->add_setting( 'simple_days_excerpt_length_customize', array(
  'default' => 150,
  'sanitize_callback' => 'absint',
));
$wp_customize->add_control( 'simple_days_excerpt_length_customize', array(
  'label' => esc_html__( 'Excerpt length', 'simple-days' ),
  'description' => esc_html__('default&#58;', 'simple-days').esc_html('150'),
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => '0', 'step' => '1', 'max' => '500',),
));

$delimiter = '&hellip;';
$wp_customize->add_setting( 'simple_days_excerpt_ellipsis',array(
  'default'    => $delimiter,
  'sanitize_callback' => 'wp_strip_all_tags',
));
$wp_customize->add_control( 'simple_days_excerpt_ellipsis',array(
  'label'   => esc_html__( 'Ellipsis', 'simple-days'),
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'select',
  'choices' => array(
   '&nbsp;' => esc_html('&nbsp;'),
   '&hellip;' => esc_html('&hellip;'),
   '[&hellip;]' => esc_html('[&hellip;]'),
   '&#8229;' => esc_html('&#8229;'),
 ),
));








$wp_customize->add_setting('more_read',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('more_read',array(
  'section' => 'simple_days_index_excerpt_setting',
  'type' => 'hidden'
));
$wp_customize->selective_refresh->add_partial( 'more_read', array(
  'selector' => '.more_read',
));
$wp_customize->add_setting( 'simple_days_read_more_position', array(
  'default'           => 'right',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_read_more_position', array(
  'label'    => esc_html__( 'Read More display position', 'simple-days' ),
  'section'  => 'simple_days_index_excerpt_setting',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
    'none' => esc_html__( 'Hide', 'simple-days' ),
  ),
));





$wp_customize->add_section('simple_days_index_title_setting',array(
  'title' => esc_html__('Title', 'simple-days'),
  'panel' => 'simple_days_index_setting',
));

$wp_customize->add_setting('simple_days_index_title_partial',array('sanitize_callback' => 'absint',));
$wp_customize->add_control('simple_days_index_title_partial',array('type' => 'hidden',
  'section' => 'simple_days_index_title_setting',
));
$wp_customize->selective_refresh->add_partial( 'simple_days_index_title_partial', array(
  'selector' => '.entry_title',
));

$wp_customize->add_setting( 'simple_days_index_title_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_index_title_info', array(
  'section' => 'simple_days_index_title_setting',
  
  'label' => esc_html__( 'Index title',  'simple-days'),

)));
$wp_customize->add_setting( 'simple_days_index_title_text_size', array(
  'default' => 25,
  'sanitize_callback' => 'absint',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_title_text_size', array(
  'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    //'description' => esc_html__('default&#58;', 'simple-days').esc_html('1'),
  'section' => 'simple_days_index_title_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 64,),
));
$wp_customize->add_setting( 'simple_days_index_title_text_color',array(
  'default'    => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_index_title_text_color', array(
  'label' => esc_html_x('title color', 'post_heading' ,'simple-days'),
  'section'    => 'simple_days_index_title_setting',
)));

$wp_customize->add_setting( 'simple_days_index_title_text_hover_color',array(
  'default'    => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_index_title_text_hover_color', array(
  'label' => esc_html_x('title hover color', 'post_heading' ,'simple-days'),
  'section'    => 'simple_days_index_title_setting',
)));

$wp_customize->add_setting( 'simple_days_index_title_text_position', array(
  'default'           => 'left',
  'sanitize_callback' => 'simple_days_sanitize_radio',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_title_text_position', array(
  'label'    => esc_html__( 'title position', 'simple-days' ),
  'section'  => 'simple_days_index_title_setting',
  'type'     => 'radio',
  'choices'  => array(
    'left' => esc_html__( 'Left', 'simple-days' ),
    'center' => esc_html__( 'Center', 'simple-days' ),
    'right' => esc_html__( 'Right', 'simple-days' ),
  ),
));
$wp_customize->add_setting( 'simple_days_index_title_padding_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_index_title_padding_info', array(
  'section' => 'simple_days_index_title_setting',
  'label' => esc_html_x( 'padding', 'post_heading' , 'simple-days').esc_html_x( '(top,right,bottom,left)', 'post_heading' , 'simple-days'),
  
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));

$border_angle = array('top' => esc_html_x('top','post_heading','simple-days') , 'right' => esc_html_x('right','post_heading','simple-days') , 'bottom' => esc_html_x('bottom','post_heading','simple-days') , 'left' => esc_html_x('left','post_heading','simple-days'));
foreach ($border_angle as $key => $value) {
  $wp_customize->add_setting( 'simple_days_index_title_padding_'.$key, array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_index_title_padding_'.$key, array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    'section' => 'simple_days_index_title_setting',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0, 'step' => 1, 'max' => 100,),
  ));

}

$wp_customize->add_setting( 'simple_days_index_title_margin_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_index_title_margin_info', array(
  'section' => 'simple_days_index_title_setting',
  'label' => esc_html_x( 'margin', 'post_heading' , 'simple-days').esc_html_x( '(top,right,bottom,left)', 'post_heading' , 'simple-days'),
  
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));
foreach ($border_angle as $key => $value) {
  $wp_customize->add_setting( 'simple_days_index_title_margin_'.$key, array(
    'default' => 0,
    'sanitize_callback' => 'simple_days_sanitize_intval',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_index_title_margin_'.$key, array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    'section' => 'simple_days_index_title_setting',
    'type' => 'number',
    'input_attrs' => array(
      'min' => -20, 'step' => 1, 'max' => 100,),
  ));
}

foreach ($border_angle as $key => $value) {




  $wp_customize->add_setting( 'simple_days_index_title_border_'.$key.'_info', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_index_title_border_'.$key.'_info', array(
    'section' => 'simple_days_index_title_setting',
    'label' => sprintf(esc_html_x( 'border %s', 'post_heading' , 'simple-days'),$value),
    
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));
  $wp_customize->add_setting( 'simple_days_index_title_border_'.$key.'_style', array(
    'default'           => 'none',
    'sanitize_callback' => 'simple_days_sanitize_radio',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_index_title_border_'.$key.'_style', array(
      //'label'    => esc_html__( 'border top style', 'simple-days' ),
    'section'  => 'simple_days_index_title_setting',
    'type'     => 'select',
    'choices'  => $heading_border_style,
  ));
  $wp_customize->add_setting( 'simple_days_index_title_border_'.$key.'_width', array(
    'default' => 1,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_index_title_border_'.$key.'_width', array(
      //'label' => esc_html_x('border top width', 'post_heading' ,'simple-days'),
    'section' => 'simple_days_index_title_setting',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1, 'step' => 1, 'max' => 64,),
  ));
  $wp_customize->add_setting( 'simple_days_index_title_border_'.$key.'_color',array(
    'default'    => '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_index_title_border_'.$key.'_color', array(
      //'label' => esc_html_x('border top color', 'post_heading' ,'simple-days'),
    'section'    => 'simple_days_index_title_setting',
  )));



}

$wp_customize->add_setting( 'simple_days_index_title_background_color',array(
  'default'    => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_index_title_background_color', array(
  'label' => esc_html_x('background color', 'post_heading' ,'simple-days'),
  'section'    => 'simple_days_index_title_setting',
)));

$wp_customize->add_setting( 'simple_days_index_title_border_radius_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_index_title_border_radius_info', array(
  'section' => 'simple_days_index_title_setting',
  'label' => esc_html_x( 'border radius', 'post_heading' , 'simple-days').esc_html_x( '(top-left,top-right,bottom-right,bottom-left)', 'post_heading' , 'simple-days'),
  
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));

$border_radius_angle = array('top_left' , 'top_right' ,'bottom_right','bottom_left');
foreach ($border_radius_angle as $value) {

  $wp_customize->add_setting( 'simple_days_index_title_border_radius_'.$value, array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage',
  ));
  $wp_customize->add_control( 'simple_days_index_title_border_radius_'.$value, array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
    'section' => 'simple_days_index_title_setting',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0, 'step' => 1, 'max' => 100,),
  ));
}

$wp_customize->add_setting( 'simple_days_index_title_balloon',array(
  'default'    => false,
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_title_balloon',array(
  'label'   => esc_html_x( 'balloon', 'post_heading' , 'simple-days'),
        //'description' => esc_html__('Current name', 'simple-days'),
  'section' => 'simple_days_index_title_setting',
  'type' => 'checkbox',
));
$wp_customize->add_setting( 'simple_days_index_title_balloon_info', array(
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_index_title_balloon_info', array(
  'section' => 'simple_days_index_title_setting',
  'label' => esc_html_x( 'balloon', 'post_heading' , 'simple-days').esc_html_x( '(position,width,height)', 'post_heading' , 'simple-days'),
  
    //'content' => '<a href="'.esc_url('https://fontawesome.com/v4.7.0/icons/').'" target="_blank">'.__( 'Icon List' , 'simple-days').'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
)));
$wp_customize->add_setting( 'simple_days_index_title_balloon_position', array(
  'default' => 30,
  'sanitize_callback' => 'absint',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_title_balloon_position', array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
  'section' => 'simple_days_index_title_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => -14, 'step' => 1, 'max' => 857,),
));
$wp_customize->add_setting( 'simple_days_index_title_balloon_width', array(
  'default' => 15,
  'sanitize_callback' => 'absint',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_title_balloon_width', array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
  'section' => 'simple_days_index_title_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 100,),
));
$wp_customize->add_setting( 'simple_days_index_title_balloon_height', array(
  'default' => 15,
  'sanitize_callback' => 'absint',
  'transport' => 'postMessage',
));
$wp_customize->add_control( 'simple_days_index_title_balloon_height', array(
      //'label' => esc_html_x('font size', 'post_heading' ,'simple-days'),
  'section' => 'simple_days_index_title_setting',
  'type' => 'number',
  'input_attrs' => array(
    'min' => 1, 'step' => 1, 'max' => 100,),
));
$wp_customize->add_setting( 'simple_days_index_title_balloon_color',array(
  'default'    => '',
  'sanitize_callback' => 'sanitize_text_field',
  'transport' => 'postMessage',
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'simple_days_index_title_balloon_color', array(
  'label' => esc_html_x('balloon color', 'post_heading' ,'simple-days'),
  'section'    => 'simple_days_index_title_setting',
)));