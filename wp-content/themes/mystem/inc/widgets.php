<?php
	/**
		* WordPress MyStem widgets
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.2
	*/
	require_once get_template_directory() . '/inc/widgets/category.php';
	require_once get_template_directory() . '/inc/widgets/recent-posts.php';
	require_once get_template_directory() . '/inc/widgets/recent-comments.php';
	require_once get_template_directory() . '/inc/widgets/nav-menu.php';

	
	if( ! function_exists( 'mystem_widgets_include' ) ) {
		function mystem_widgets_include()
		{			
			register_widget('MyStem_Widget_Category');
			register_widget('MyStem_Widget_Recent_Posts');
			register_widget('MyStem_Widget_Recent_Comments');	
			register_widget('MyStem_Nav_Menu_Widget');
		}
	}
	add_action('widgets_init', 'mystem_widgets_include');