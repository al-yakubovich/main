<?php
global $helium;

if ( $helium->is_mobile() ) {
	$suffix = '_mobile';
} else {
	$suffix = '';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>

	<?php
	if ( 'aligncenter' === get_theme_mod( 'archives_thumb_position' . $suffix, 'alternate' ) ) {
		helium_show_thumbnail( 'archives_thumb' );
	}

	?>
    
    <header class="entry-header">
		<?php if ( get_theme_mod( 'archives_meta_above_title' ) ): ?>
            <div class="entry-meta meta above-title">
				<?php helium_generate_post_meta( get_theme_mod( 'archives_meta_above_title' ) ) ?>
            </div>
		<?php endif ?>
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<?php if ( get_theme_mod( 'archives_meta_below_title' ) ): ?>
            <div class="entry-meta meta below-title">
				<?php helium_generate_post_meta( get_theme_mod( 'archives_meta_below_title' ) ) ?>
            </div>
		<?php endif ?>
    </header><!-- .entry-header -->


	<?php
	if ( 
	     'aligncenter' !== get_theme_mod( 'archives_thumb_position' . $suffix, 'alternate' ) ) {
		helium_show_thumbnail( 'archives_thumb' );
	}
	?>

    <div class="entry-content">
		<?php
		/* translators: %s: Name of current post */

		if ( get_theme_mod( 'archives_show_excerpts', true ) ) {
			the_excerpt();

		} else {
			the_content();
		}
		?>
        <div class="clear"></div>
		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'page-speed' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
    </div><!-- .entry-content -->

    <div class="clear"></div>
	<?php
	$default = array(
		array( 'key' => 'Tags', 'value' => __( 'Tagged with', 'page-speed' ) . '&nbsp;' ),
	);
	$meta    = get_theme_mod( 'archives_meta_after_body', $default );

	if ( 1 == count( $meta ) && $meta[0]['key'] == 'Line' ) {
		echo '<hr class="separator">';
	} else {
		?>

        <footer class="entry-footer">
            <div class="inner footer meta">
				<?php  helium_generate_post_meta( $meta ) ?>
            </div>
        </footer>
	<?php }
	?>
</article><!-- #post-## -->