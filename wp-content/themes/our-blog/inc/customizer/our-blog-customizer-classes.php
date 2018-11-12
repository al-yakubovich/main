<?php
/**
 * Define customizer custom classes
 *
 * @package Radix Multipurpose
 * @since 1.0.0
 */
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Switch button customize control.
 *
 * @since 1.0.3
 * @access public
 */

if( class_exists( 'WP_Customize_Control' ) ) {
  /**
 * Class Our_Blog_Customize_Dropdown_Taxonomies_Control
 */
  class Our_Blog_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

  	public $type = 'dropdown-taxonomies';

  	public $taxonomy = '';

  	public function __construct( $manager, $id, $args = array() ) {

  		$our_taxonomy = 'category';
  		if ( isset( $args['taxonomy'] ) ) {
  			$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
  			if ( true === $taxonomy_exist ) {
  				$our_taxonomy = esc_attr( $args['taxonomy'] );
  			}
  		}
  		$args['taxonomy'] = $our_taxonomy;
  		$this->taxonomy = esc_attr( $our_taxonomy );

  		parent::__construct( $manager, $id, $args );
  	}

  	public function render_content() {

  		$tax_args = array(
  			'hierarchical' => 1,
  			'taxonomy'     => $this->taxonomy,
  		);
  		$all_taxonomies = get_categories( $tax_args );

  		?>
  		<label>
  			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  			<select <?php echo esc_attr($this->link()); ?>>
  				<?php
  				printf('<option value="%s" %s>%s</option>', '', selected(esc_attr($this->value()), '', false),esc_html('Select', 'our-blog') );
  				?>
  				<?php if ( ! empty( $all_taxonomies ) ): ?>
  					<?php foreach ( $all_taxonomies as $key => $tax ): ?>
  						<?php
  						printf('<option value="%s" %s>%s</option>',esc_attr( $tax->term_id ), selected($this->value(), esc_attr( $tax->term_id ), false), esc_attr( $tax->name ) );
  						?>
  					<?php endforeach ?>
  				<?php endif ?>
  			</select>

  		</label>
  		<?php
  	}
  }


/**
 * Class to create a custom post control
 */
class Our_Blog_Post_Dropdown_Custom_Control extends WP_Customize_Control
{
	public $type = 'dropdown-posts';
	private $posts = false;
	public function __construct($manager, $id, $args = array(), $options = array())
	{
		$postargs = wp_parse_args($options, array('numberposts' => '-1'));
		$this->posts = get_posts($postargs);
		parent::__construct( $manager, $id, $args );
	}
    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
    {
    	if(!empty($this->posts))
    	{
    		?>
    		<label>
    			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    			<select <?php echo esc_attr($this->link()); ?>>
    				<?php
    				printf('<option value="%s" %s>%s</option>', '', selected(esc_attr($this->value()), '', false),esc_html('Select', 'our-blog') );
    				?>
    				<?php if( !empty( $this->posts ) ): ?>
    					<?php  foreach ( $this->posts as $post ): ?>
    						<?php
    						printf('<option value="%s" %s>%s</option>', esc_attr( $post->ID ), selected($this->value(), $post->ID, false), esc_html($post->post_title));
    						?>
    					<?php endforeach ?>
    				<?php endif ?>
    			</select>

    		</label>
    		<?php
    	}
    }
}	
}