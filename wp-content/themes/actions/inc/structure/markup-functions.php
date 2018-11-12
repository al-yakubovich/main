<?php
/**
 * Theme markup functions
 */
/**
 * Before Header
 * Wraps all content in wrappers of the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_top_header' ) ) {
	function actions_top_header() {
		?>
		<div class="header-area full">
			<header id="masthead" class="site-header inner">
	    <?php		
	}
}

if ( ! function_exists( 'actions_bottom_header' ) ) {
	function actions_bottom_header() {
		?>
			</header>		
		</div>
	    <?php
	}
}

/**
 * Before Content Body
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_body_top' ) ) {
	function actions_body_top() {
		?>
		<div class="main-content-area full">
		    <div class="main">
			    <div id="content" class="site-content inner">
		<?php
	}
}

/**
 * Before Content
 * Wraps all content in wrappers of the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_top_wrapper' ) ) {
	function actions_top_wrapper() {
		?>
		<div id="primary" class="content-area">
		    <main id="main" class="site-main" role="main">
	    <?php
	}
}

/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_bottom_wrapper' ) ) {
	function actions_bottom_wrapper() {
		?>			
			</main>
	    </div>
		<?php do_action( 'actions_sidebar' );
	}
}

/**
 * Sidebar
 * Gets the theme's declared sidebar
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_get_sidebar' ) ) {
	function actions_get_sidebar() {
		get_sidebar();
	} 
}

/**
 * Before Content
 * Wraps all content in wrappers of the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_top_sidebar' ) ) {
	function actions_top_sidebar() { ?>
		<div id="secondary" class="widget-area" role="complementary">
	<?php
	}
}

/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_bottom_sidebar' ) ) {
	function actions_bottom_sidebar() { ?>
		</div><!-- .sidebar .widget-area -->
	<?php
	}
}

/**
 * Before Footer
 * Closes the wrapping divs
 * @since   1.0.3
 * @return  void
 */
if ( ! function_exists( 'actions_footer_top' ) ) {
	function actions_footer_top() { ?>		
		<footer id="colophon" class="site-footer inner" role="contentinfo">
		    <div class="site-info">		
	<?php
	}
}

/**
 * After Footer
 * Closes the wrapping divs
 * @since   1.0.3
 * @return  void
 */
if ( ! function_exists( 'actions_footer_bottom' ) ) {
	function actions_footer_bottom() { 	?>
		    </div><!-- .site-info -->
		</footer>
	<?php
	}
}

/**
 * After Content Body
 * Wraps all content in wrappers of the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'actions_body_bottom' ) ) {
	function actions_body_bottom() { ?>
		        </div>
		    </div>
	    </div>		
	    <?php
	}
}


if ( ! function_exists( 'actions_content_none' ) ) {
	function actions_content_none() {
		?>
		<section class="no-results not-found">
	        <header class="page-header">
		        <h1 class="page-title"><?php _e( 'No Content Found', 'actions' ); ?></h1>
	        </header><!-- .page-header -->

	        <div class="page-content">
		        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'actions' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		        <?php elseif ( is_search() ) : ?>

			        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'actions' ); ?></p>
			        <?php get_search_form(); ?>

		        <?php else : ?>

			        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'actions' ); ?></p>
			        <?php get_search_form(); ?>

		        <?php endif; ?>
	        </div><!-- .page-content -->
        </section><!-- .no-results --> 
	    <?php
	}
}

if ( ! function_exists( 'actions_footer_before' ) ) {
	function actions_footer_before() { ?>
		<div class="footer-area full">
		    <div class="main"> 
	    <?php
	}
}

if ( ! function_exists( 'actions_footer_after' ) ) {
	function actions_footer_after() { ?>
		    </div>
	    </div> 
	    <?php
	}
}