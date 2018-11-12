<?php
	/**
		* Template Name: Page with Page Sidebar
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.3.2
	*/
	
	get_header();
	
	
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part( 'content/content', 'page' ); ?>
		
		<?php
			// only allow comments if chosen in theme customizer
			if ( get_theme_mod( 'mystem_page_comments' ) == 1 ) :
			
			// if comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
			endif;
			endif;
		?>
		
		<?php endwhile; // end of the loop. ?>
		
	</main>
</div>
<div id="secondary" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'page-sidebar' ) ) : ?>
	
	<aside id="search" class="widget widget_search">
		<?php get_search_form(); ?>
	</aside>
	
	<aside id="archives" class="widget">
		<h4 class="widget-title"><?php esc_attr_e( 'Archives', 'mystem' ); ?></h4>
		<ul>
			<?php wp_get_archives( array(
				'type' => 'monthly',
			) );?>
		</ul>
	</aside>
	
	<aside id="meta" class="widget">
		<h4 class="widget-title"><?php esc_attr_e( 'Meta', 'mystem' ); ?></h4>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</aside>
	
	<?php endif; // end sidebar widget area ?>
	
</div>
<?php get_footer(); ?>

