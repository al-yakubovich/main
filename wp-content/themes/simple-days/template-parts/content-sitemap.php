<?php
/**
 * The template part for sitemap
 *
 * @package Simple Days
 * @since 0.2.9
 * @version 0.0.1
 */

function make_sitemap_tree($parent_id, $cat_ul_use_flag){

	$categories = get_terms('category', array(
 	    'parent'    => $parent_id,
    ));

	if($categories){
		foreach($categories as $category_values){
			echo '<li class="cat-item cat-item-' . esc_attr( $category_values->term_id ) . '"><a href="'.esc_url( get_category_link($category_values->term_id)).'" >'.esc_html( $category_values->name ).'</a>'."\n";
			$posts = get_posts(array('numberposts'=>100, 'category'=>$category_values->term_id));


			$arg_ul_use_flag = 1;
			if($posts){
				echo '<ul>'."\n";
				foreach($posts as $post_values){
					echo '<li class="post-item post-item-' . esc_attr( $post_values->ID ) . '"><a href="'.esc_url( get_permalink($post_values->ID) ).'">'.esc_html( $post_values->post_title ).'</a></li>'."\n";
				}
				$arg_ul_use_flag = 0;
			}
			make_sitemap_tree($category_values->term_id, $arg_ul_use_flag);
			if($posts) echo '</ul>'."\n";
			echo '</li>'."\n";
		}
	}



}

?>
<div class="sitemap">
  <ul class="sitemap_list">
  	<li class="sitemap_home">
       <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
  	</li>
<?php
  make_sitemap_tree(0,1);

  $args = array(
	'authors'      => '',
	'child_of'     => 0,
	'date_format'  => get_option( 'date_format' ),
	'depth'        => 0,
	'echo'         => 1,
	'exclude'      => '',
    'exclude_tree' => '',
	//'include'      => '',
	'link_after'   => '',
	'link_before'  => '',
	'post_type'    => 'page',
	'post_status'  => 'publish',
	'show_date'    => '',
	'sort_column'  => 'menu_order, post_title',
	'sort_order'   => '',
	//'title_li'     => __('Pages'),
	'walker'       => new Walker_Page
  );
  wp_list_pages($args);
  ?>
  </ul>
</div>
