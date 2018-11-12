<?php
/**
 * Demo configuration
 *
 * @package Travel_Company
 */

$config = array(
	'menu_locations' => array(
		'primary' 		=> 'primary',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Our Blog Demo', 'our-blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo/widgets.wie',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'our-blog' ),
      		'preview_url'                  => 'https://demo.scorpionthemes.com/our-blog/',
		),
		
	),
);

Our_Blog_Demo::init( apply_filters( 'our_blog_demo_filter', $config ) );