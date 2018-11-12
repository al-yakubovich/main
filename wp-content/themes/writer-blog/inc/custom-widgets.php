<?php
/**
 * Custom Widgets are declared here
 */

/**
 * Register widget area.
 */

if ( ! function_exists( 'writer_blog_widgets_init' ) ) :

function writer_blog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'writer-blog' ),
		'id'            => 'ct-home-sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar on front page of your website.', 'writer-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s block"><div class="sub-block">',
		'after_widget'  => '</div><!-- /.sub-block --></div><!-- /.block -->',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sticky Sidebar', 'writer-blog' ),
		'id'            => 'ct-home-sticky-sidebar',
		'description'   => __( 'Add widgets here that will stay sticky on page scroll on your front page.', 'writer-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s block"><div class="sub-block">',
		'after_widget'  => '</div><!-- /.sub-block --></div><!-- /.block -->',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Left', 'writer-blog' ),
		'id'            => 'ct-footer-left',
		'description'   => __( 'Add widgets here to appear on your left footer section.', 'writer-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s four columns">',
		'after_widget'  => '</div><!-- /.four columns -->',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Middle', 'writer-blog' ),
		'id'            => 'ct-footer-middle',
		'description'   => __( 'Add widgets here to appear on your middle footer section.', 'writer-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s four columns">',
		'after_widget'  => '</div><!-- /.four columns -->',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Right', 'writer-blog' ),
		'id'            => 'ct-footer-right',
		'description'   => __( 'Add widgets here to appear on your right footer section.', 'writer-blog' ),
		'before_widget' => '<div id="%1$s" class="%2$s four columns">',
		'after_widget'  => '</div><!-- /.four columns -->',
		'before_title'  => '<h3 class="footer-widget-title">',
		'after_title'   => '</h3>',
	) );
}

endif;

add_action( 'widgets_init', 'writer_blog_widgets_init' );

/*************************************************************************************************************************
 * Adds "Writer: About Author" widget.
 ************************************************************************************************************************/
class writer_blog_Author_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ct-author-widget', // Base ID
			esc_html__( 'Writer: About Author', 'writer-blog' ), // Name
			array( 'description' => esc_html__( 'This widget displays author information to your website.', 'writer-blog' ), ) // Args
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$author_name = ( !empty( $instance['title'] ) ) ? $instance['title'] : '';
		$author_name_font_size = ( !empty( $instance['author_name_font_size'] ) ) ? $instance['author_name_font_size'] : '32';
		$author_image = ( !empty( $instance['image_uri'] ) ) ? $instance['image_uri'] : '';
		$author_description = ( !empty( $instance['description'] ) ) ? $instance['description'] : '';
		$facebook_link = ( !empty( $instance['facebook'] ) ) ? $instance['facebook'] : '';
		$twitter_link = ( !empty( $instance['twitter'] ) ) ? $instance['twitter'] : '';
		$youtube_link = ( !empty( $instance['youtube'] ) ) ? $instance['youtube'] : '';
		$gplus_link = ( !empty( $instance['gplus'] ) ) ? $instance['gplus'] : '';
		$instagram_link = ( !empty( $instance['instagram'] ) ) ? $instance['instagram'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Author name:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'author_name_font_size' ) ); ?>"><?php esc_attr_e( 'Author name font size:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_name_font_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_name_font_size' ) ); ?>" type="number" value="<?php echo esc_attr( $author_name_font_size ); ?>">
		<small><?php esc_html_e( 'Note: Only enter value. Do not enter \'px\'', 'writer-blog' ); ?></small>
		</p>
		<p>
	    <label for="<?php echo esc_attr( $this->get_field_id( 'image_uri' ) ); ?>"><?php esc_attr_e( 'Author image:', 'writer-blog' ); ?></label><br />
		</p>
	    <div class="widget-image-section">
	    	<div class="widget_author_image">
		    	<img src="<?php echo esc_url( $author_image ); ?>" alt="<?php esc_attr( 'Author', 'writer-blog' ); ?>" width="100%" />
		    </div>
		    <input type="button" class="select-img button-secondary" value="<?php esc_attr_e( 'Select image', 'writer-blog' ); ?>" />
		    <input type="hidden" class="author-img widefat" name="<?php echo esc_attr( $this->get_field_name( 'image_uri' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'image_uri' ) ); ?>" value="<?php echo esc_url( $author_image ); ?>" />
	    </div><!-- /.widget-image-section -->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Author description:', 'writer-blog' ); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" rows="5" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $author_description ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_attr_e( 'Facebook link:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook_link ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'Twitter link:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter_link ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_attr_e( 'YouTube link:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube_link ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'gplus' ) ); ?>"><?php esc_attr_e( 'Google+ link:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'gplus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'gplus' ) ); ?>" type="text" value="<?php echo esc_attr( $gplus_link ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_attr_e( 'Instagram link:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'gplus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram_link ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['author_name_font_size'] = ( ! empty( $new_instance['author_name_font_size'] ) ) ? sanitize_text_field( $new_instance['author_name_font_size'] ) : '';
		$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? esc_url( $new_instance['image_uri'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description']  : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? $new_instance['facebook']  : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? $new_instance['twitter']  : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? $new_instance['youtube']  : '';
		$instance['gplus'] = ( ! empty( $new_instance['gplus'] ) ) ? $new_instance['gplus']  : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? $new_instance['instagram']  : '';

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo '<div class="block">';
		if ( ! empty( $instance['image_uri'] ) ) {
			echo '<div class="content-image"><img src="' . esc_url( $instance['image_uri'] ) . '" alt="' . esc_attr( 'Author', 'writer-blog' ) . '" /></div>';
		}

		echo '<div class="sub-block">';

		if ( ! empty( $instance['title'] ) ) {
			echo '<h2 class="widget-title" style="font-size: ' . esc_attr( $instance['author_name_font_size'] ) . 'px">' . esc_html( apply_filters( 'writer_blog_author_widget_title', $instance['title'] ) ) . '</h2>';
		}

		if ( ! empty( $instance['description'] ) ) {
			echo '<p class="author-bio">' . esc_html( apply_filters( 'writer_blog_author_widget_description', esc_html( $instance['description'] ) ) ) . '</p>';
		}

		echo '<ul class="social-icons">';

		if ( ! empty( $instance['facebook'] ) ) {
			echo '<li><a href="' . esc_url( $instance['facebook'] ) . '" class="social-icon facebook"></a></li>';	
		}
		if ( ! empty( $instance['twitter'] ) ) {
			echo '<li><a href="' . esc_url( $instance['twitter'] ) . '" class="social-icon twitter"></a></li>';	
		}
		if ( ! empty( $instance['youtube'] ) ) {
			echo '<li><a href="' . esc_url( $instance['youtube'] ) . '" class="social-icon youtube"></a></li>';	
		}
		if ( ! empty( $instance['gplus'] ) ) {
			echo '<li><a href="' . esc_url( $instance['gplus'] ) . '" class="social-icon google-plus"></a></li>';	
		}
		if ( ! empty( $instance['instagram'] ) ) {
			echo '<li><a href="' . esc_url( $instance['instagram'] ) . '" class="social-icon instagram"></a></li>';	
		}

		echo '</ul></div><!-- /.sub-block --></div><!-- /.block -->';
	}

} // class writer_blog_Author_Widget

function writer_blog_author_widget_register() {
	register_widget( 'writer_blog_Author_Widget' );
}

add_action( 'widgets_init', 'writer_blog_author_widget_register' );

/*************************************************************************************************************************
 * Adds "Writer: Category Posts" widget.
 ************************************************************************************************************************/
class writer_blog_Category_Posts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ct-category-posts-widget', // Base ID
			esc_html__( 'Writer: Category Posts', 'writer-blog' ), // Name
			array( 'description' => esc_html__( 'This widget displays category wise posts in your website.', 'writer-blog' ), ) // Args
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ( !empty( $instance['title'] ) ) ? $instance['title'] : '';
		$category_slug = ( !empty( $instance['slug'] ) ) ? $instance['slug'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'slug' ) ); ?>"><?php esc_attr_e( 'Category Slug:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'slug' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slug' ) ); ?>" type="text" value="<?php echo esc_attr( $category_slug ); ?>">
		<small><?php esc_html_e( 'Note: The slug can be found under Posts->Categories', 'writer-blog' ); ?></small>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['slug'] = ( ! empty( $new_instance['slug'] ) ) ? sanitize_text_field( $new_instance['slug'] ) : '';

		return $instance;
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$category_slug = esc_html( $instance['slug'] );

		// if category exists
		if ( term_exists( $category_slug ) ) {
			$cate = get_category_by_slug( $category_slug );
			$cate_id = $cate->term_id;

			// if category has contents
			if ( get_category( $cate_id )->category_count > 0 ) {
				
				$widget_id = $args['widget_id'];

				$query_args = array(
					'post_type'			=>	'post',
					'posts_per_page'	=>	5,
					'category_name'		=>	$category_slug,
					'order'				=>	'DESC',
				);

				$category_post  = new WP_Query( $query_args );
				?>
				<div class="block slider-widget">
					<div class="owl-carousel owl-theme owl-widget-carousel carousel-<?php echo esc_attr( $widget_id ); ?>">
						<?php
						if ( $category_post->have_posts() ) :
							while ( $category_post->have_posts() ) : $category_post->the_post();
								?>
								<div class="owl-widget-slide">
									<div class="image-overlay">
										<img src="<?php echo esc_url( writer_blog_owl_carousal_slider_image() ); ?>" alt="image" />
									</div>
									<div class="sub-block">
										<h2 class="widget-post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
										<?php
											$trim_excerpt = get_the_excerpt();
											$short_excerpt = esc_html( wp_trim_words( $trim_excerpt, $num_words = 20, $more = '... ' ) );
										?>
										<p class="widget-post-excerpt"><?php echo esc_html( $short_excerpt ); ?></p>
									</div><!-- /.sub-block -->
								</div><!-- /.owl-widget-slide -->
								<?php
							endwhile;
						endif;
						wp_reset_postdata();
					?>
					</div><!-- /.owl-widget-slide -->
					<?php
						if ( ! empty( $instance['title'] ) ) {
							echo '<div class="category-badge">';
							echo apply_filters( 'writer_blog_author_widget_title', '<a href="' . esc_attr( get_category_link( $cate_id ) ) . '">' . esc_html( $instance['title'] ) . '</a>' );
							echo '</div><!-- /.category-badge -->';
						}
					?>
					<?php if ( get_category( $cate_id )->category_count != 1 ): ?>
					<div class="slider-widget-navigation">
						<a href="#" class="btn prev"></a>
						<a href="#" class="btn next"></a>
					</div> <!-- /.widget-slider-navigation -->
					<?php endif; ?>
				</div> <!-- /.owl-carousel -->
			<?php
			} else {
				echo $args['before_widget'];
				echo esc_html_e( 'Sorry, no posts matching in', 'writer-blog' ) . ' <b>' . esc_html( $category_slug ) . '</b>' . esc_html_e( 'category', 'writer-blog' );
				echo $args['after_widget'];
			}
			
		} else {
			echo $args['before_widget'];
			echo esc_html_e('Sorry, there is no category named', 'writer-blog') . ' <b>' . esc_html( $category_slug ) . '</b>';
			echo $args['after_widget'];
		}
	}

} // class writer_blog_Category_Posts_Widget

function writer_blog_category_posts_widget_register() {
	register_widget( 'writer_blog_Category_Posts_Widget' );
}

add_action( 'widgets_init', 'writer_blog_category_posts_widget_register');

/*************************************************************************************************************************
 * Adds "Writer: Ad Section" widget.
 ************************************************************************************************************************/
class writer_blog_Ad_Section_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ct-ad-section-widget', // Base ID
			esc_html__( 'Writer: Ad Section', 'writer-blog' ), // Name
			array( 'description' => esc_html__( 'This widget displays ads on your website. Place your javascript ad codes here.', 'writer-blog' ), ) // Args
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$author_name = ( !empty( $instance['title'] ) ) ? $instance['title'] : '';
		$author_description = ( !empty( $instance['description'] ) ) ? $instance['description'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Ad title:', 'writer-blog' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Ad code:', 'writer-blog' ); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" rows="5" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $author_description ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description']  : '';

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo '<div class="ad-section">';

		if ( ! empty( $instance['title'] ) ) {
			echo '<h2 class="widget-title">' . esc_html( apply_filters( 'writer_blog_author_widget_title', $instance['title'] ) ) . '</h2>';
		}

		if ( ! empty( $instance['description'] ) ) {
			echo esc_html( $instance['description'] );
		}

		echo '</div><!-- /.block -->';
	}

} // class writer_blog_Ad_Section_Widget

function writer_blog_ad_section_widget_register() {
	register_widget( 'writer_blog_Ad_Section_Widget' );
}

add_action( 'widgets_init', 'writer_blog_ad_section_widget_register');