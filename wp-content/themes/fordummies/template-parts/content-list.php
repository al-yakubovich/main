<?php
/**
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ForDummies
 * @subpackage For_dummies
 * @since For dummies 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("fordummies_article"); ?>>
  	<?php if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) { ?>
		<div class="entry-thumbnail">
			<div class="post-media post-thumb">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(  array(450, 450) ); ?></a>
			</div>
          <?php  fordummies_entry_meta(); ?>
		</div>
	<?php } ?>
	<div class="entry-body">
		<div class="blog-entry-content">
			<?php 
   			the_title( sprintf( '<h1><a href="%s" rel="bookmark">',
				esc_url( get_permalink() ) ),
				'</a></h1><br>' ); 
            $content = strip_tags(get_the_content_with_formatting());
            if(strlen($content) > 300)
              {
                $content = substr($content, 0,300);
                $content = trim(substr($content, 0,300));
                $pos = strrpos($content,' ');
                $content = substr($content, 0, $pos);
                $content .= '<br><br><a href="'.get_permalink().'">'. __("Read more","fordummies"). '</a>';
              }
            echo $content;
            ?>
		</div>
		<div class="entry-aux">
			<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:',
						'fordummies' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'fordummies' ) . ' </span>%',
			) );
			?>
		</div>
	</div>
</article>