<?php
	/**
		* menu fallback
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
	function mystem_menu_fallback() {
	?>
	
	<ul>
		<li>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>"><?php esc_attr_e( 'Home', 'mystem' ); ?></a>
		</li>
	</ul>
	
	<?php
	}
	
	/**
		* Adds custom classes to the array of body classes.
		*
		* @param array $classes Classes for the body element.
		* @return array
	*/
	function mystem_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		
		if ( get_theme_mod( 'mystem_layout' ) == 'sc' ) {
			$classes[] = 'sidebar-content';
		}		
		
		return $classes;
	}
	add_filter( 'body_class', 'mystem_body_classes' );
	
	// FontAwesome Icons
	if ( ! function_exists( 'mystem_fontawesome_icons' ) ) :
	function mystem_fontawesome_icons() {
		require ( get_template_directory(). '/inc/assets/icons.php' );
		return $icons;
	}	
	endif;
	
	// Custom limit Excert
	if ( ! function_exists( 'mystem_excerpt' ) ) :
	function mystem_excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		
		if (count($excerpt) >= $limit) {
			array_pop($excerpt);
			$excerpt = implode(" ", $excerpt) . '...';
      } else {
			$excerpt = implode(" ", $excerpt);
		}
		
		$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
		
		return $excerpt;
	}
	endif;