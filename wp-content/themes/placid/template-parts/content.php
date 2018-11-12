<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package placid
 */

global $placid_theme_options;
$placid_theme_options  = placid_get_theme_options();
$hide_meta_tag         = $placid_theme_options['placid-meta-tag'];
$no_of_words           = $placid_theme_options['placid_no_of_words'];
$readmore              = $placid_theme_options['placid_read_more_text_blog_archive_option'];
$image_option     = $placid_theme_options['placid_cloumn_options'];

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if( has_post_thumbnail() ){
		?>
		<!--post thumbnal options-->
		<div class=" <?php if( $image_option == 'defaults' ) { echo "post-thumb"; } ?>">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumb-->
	<?php
	}
	?>
	<header class="<?php if( $image_option == 'defaults' ) { echo "entry-header"; } ?>">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() && $hide_meta_tag==1 ) : ?>
		<div class="entry-meta">
			<?php placid_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

		<div class="entry-content">
	   	  <p><?php echo wp_trim_words( get_the_excerpt(),$no_of_words,' ');?></p>
           <?php
            if(!empty($readmore))
            {
           ?>
              <a href="<?php the_permalink(); ?>" class="readmore"> <?php echo esc_html($readmore); ?> <i class="fa fa-long-arrow-right"></i>
             </a>
         <?php } ?>    
	    </div><!-- .entry-content -->
	</header><!-- .entry-header -->	
</article><!-- #post-## -->
