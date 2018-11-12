<?php
	
	/**
		* Widget Catagories
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
	
	class MyStem_Widget_Category extends WP_Widget {
		/** Constructor */
		public function __construct() {
			parent::__construct(
			'mystem_widget_category',
			__( 'MyStem Categories', 'mystem' ),
			array(
			'description' =>__( 'Display the categories with icon', 'mystem' ),
			)
			);
		}
		
		/** @see WP_Widget::widget */
		public function widget( $args, $instance ) {
			$args['id'] = ( isset( $args['id'] ) ) ? $args['id'] : 'mystem_widget_category';
			$title      = apply_filters( 'widget_title', $instance['title'], $instance, $args['id'] );
			$counts     = $instance['counts'] ? 1 : 0;
			$hierarchy  = $instance['hierarchy'] ? 1 : 0;
			$exclude    = $instance['exclude'] ? $instance['exclude'] : '';
			$include    = $instance['include'] ? $instance['include'] : '';
			$orderby    = $instance['orderby'] ? $instance['orderby'] : 'name';
			$order      = $instance['order'] ? $instance['order'] : 'ASC';
			$taxonomy      = $instance['taxonomy'] ? $instance['taxonomy'] : 'category';
			
			$cat_args = array(			
			'child_of'     => 0,
			'parent'       => '',
			'orderby'      => $orderby,
			'order'        => $order,
			'hide_empty'   => 1,
			'hierarchical' => $hierarchy,
			'exclude'      => $exclude,
			'include'      => $include,
			'number'       => 0,
			'taxonomy'     => $taxonomy,
			'pad_counts'   => false,
			);
			
			$categories = get_categories( $cat_args );
			
			echo $args['before_widget'];
			if( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			
			echo '<ul>';
			foreach( $categories as $category ){
				$mystem_cat_meta = get_option( "mystem_taxonomy_".$category->term_id );			
				$icon_class = !empty($mystem_cat_meta['icon_field']) ? esc_attr( $mystem_cat_meta['icon_field'] ) : '';
				$icon_color = !empty($mystem_cat_meta['icon_color']) ? esc_attr( $mystem_cat_meta['icon_color'] ) : '#383838';
				$icon = !empty($icon_class) ? '<i class="'.$icon_class.'" style="color:'.$icon_color.'"></i> ' : '';
				$parent = !empty( $category->parent ) ? ' class="cat-child"' : '';
				if ( !empty( $category->parent ) && empty( $hierarchy ) )
				continue;
				$counter = !empty( $counts ) ? ' <span>' . $category->count . '</span>' : '';
				echo '<li' . $parent . '>' . $icon . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'mystem' ), $category->name ) . '" ' . '>' . $category->name . '</a>' . $counter . '</li> ';
			}
			echo '</ul>';
			echo $args['after_widget'];
		}
		
		/** @see WP_Widget::form */
		public function form( $instance ) {
			// Set up some default widget settings.
			$defaults = array(
			'title'        => __( 'Categories', 'mystem' ),
			'counts'       => 'on',
			'hierarchy'    => 'on',
			'exclude'      => '',
			'include'      => '',
			'orderby'      => 'name',
			'order'        => 'ASC',
			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<!-- Title -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'mystem' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<!-- Show post counts -->
		<p>
			<input <?php checked( $instance['counts'], 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'counts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'counts' ) ); ?>" type="checkbox" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'counts' ) ); ?>"><?php esc_html_e( 'Show post counts', 'mystem' ); ?></label>
		</p>
		<!-- Show hierarchy -->
		<p>
			<input <?php checked( $instance['hierarchy'], 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'hierarchy' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hierarchy' ) ); ?>" type="checkbox" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'hierarchy' ) ); ?>"><?php esc_html_e( 'Show hierarchy', 'mystem' ); ?></label>
		</p>
		<!-- Exclude categories -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>"><?php esc_html_e( 'Exclude categories:', 'mystem' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'exclude' ) ); ?>" type="text" value="<?php echo esc_attr($instance['exclude']); ?>" />
			<em><?php esc_html_e( 'Enter categories IDs separated by the comma', 'mystem' ) ?></em>
		</p>
		<!-- Include categories -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'include' ) ); ?>"><?php esc_html_e( 'Include categories:', 'mystem' ) ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'include' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'include' ) ); ?>" type="text" value="<?php echo esc_attr($instance['include']); ?>" />
			<em><?php esc_html_e( 'Enter categories IDs separated by the comma', 'mystem' ) ?></em>
		</p>
		<!-- Categories orderby  -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order by', 'mystem' ) ?></label>
			<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>">
				<option <?php selected( $instance['orderby'], 'ID' ); ?> value="ID">ID</option>
				<option <?php selected( $instance['orderby'], 'name' ); ?> value="name">name</option>
				<option <?php selected( $instance['orderby'], 'slug' ); ?> value="slug">slug</option>
				<option <?php selected( $instance['orderby'], 'count' ); ?> value="count">count</option>
			</select>
		</p>
		
		<!-- Categories order  -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Order', 'mystem' ) ?></label>
			<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
				<option <?php selected( $instance['order'], 'ASC' ); ?> value="ASC">ASC</option>
				<option <?php selected( $instance['order'], 'DESC' ); ?> value="DESC">DESC</option>
			</select>
		</p>
		
		<!-- Categories taxonomy  -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>"><?php esc_html_e( 'Taxonomy', 'mystem' ) ?></label>
			<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'taxonomy' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>">
				<?php 
					$tax_args = array(
					'public'   => true,					
					);
					$output = 'names';
					$operator = 'and';
					$taxonomies = get_taxonomies( $tax_args, $output, $operator );
					foreach( $taxonomies as $taxonomy ) {	
						$sel = ($instance['taxonomy'] == $taxonomy) ? ' selected' : '';
						echo '<option'.$sel.'>'. $taxonomy. '</option>';
					}
				?>				
			</select>
		</p>
		
		<?php }
		/** @see WP_Widget::update */
		public function update( $new_instance, $old_instance ) {
			$instance               = $old_instance;
			$instance['title']      = strip_tags( $new_instance['title'] );
			$instance['counts']     = isset( $new_instance['counts'] )  ? $new_instance['counts']  : '';
			$instance['hierarchy']  = isset( $new_instance['hierarchy'] )  ? $new_instance['hierarchy']  : '';
			$instance['exclude']    = isset( $new_instance['exclude'] )  ? $new_instance['exclude']  : '';
			$instance['include']    = isset( $new_instance['include'] )  ? $new_instance['include']  : '';
			$instance['orderby']    = isset( $new_instance['orderby'] )  ? $new_instance['orderby']  : '';
			$instance['order']      = isset( $new_instance['order'] )  ? $new_instance['order']  : '';
			$instance['taxonomy']   = isset( $new_instance['taxonomy'] )  ? $new_instance['taxonomy']  : '';
			return $instance;
		}
	}
