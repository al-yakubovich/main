<?php
/**
 * @package elvinaa
 */

/**
 * Elvinaa Header Style 1
 */
if ( ! function_exists( 'elvinaa_header_style_1' ) ) :
function elvinaa_header_style_1() {
	?>
		<header id="home-inner" class="elementor-menu-anchor elvinaa-menu-wrapper full-width-menu style1">
			<div class="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top-left-sidebar">
								<?php
									if(is_active_sidebar('top-left-sidebar')){
										dynamic_sidebar('top-left-sidebar');
									}
								?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="top-right-sidebar">
								<ul id="menu-social" class="menu">
									<?php
										if(true === get_theme_mod( 'el_facebook_icon',true)){
											?><li><a href="<?php echo esc_url(get_theme_mod( 'el_facebook_url','#' )) ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php
										}
										if(true === get_theme_mod( 'el_twitter_icon',true)){
											?><li><a href="<?php echo esc_url(get_theme_mod( 'el_twitter_url','#' )) ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php
										}
										if(true === get_theme_mod( 'el_instagram_icon',true)){
											?><li><a href="<?php echo esc_url(get_theme_mod( 'el_instagram_url','#' )) ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php
										}
										if(true === get_theme_mod( 'el_googleplus_icon',true)){
											?><li><a href="<?php echo esc_url(get_theme_mod( 'el_googleplus_url','#' )) ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php
										}
										if(true === get_theme_mod( 'el_linkedin_icon',true)){
											?><li><a href="<?php echo esc_url(get_theme_mod( 'el_linkedin_url','#' )) ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php
										}
										if(true === get_theme_mod( 'el_pinterest_icon',true)){
											?><li><a href="<?php echo esc_url(get_theme_mod( 'el_pinterest_url','#' )) ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li><?php
										}
										if(true === get_theme_mod( 'el_rss_icon',true)){
											?><li><a href="<?php echo esc_url(get_theme_mod( 'el_rss_url','#' )) ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php
										}
									?>
								</ul>
							</div>
						</div>
					</div>
					<div class="clearfix">      
		    			<div class="logo">
		           			<?php 
			                	if (has_custom_logo()){
			                		elvinaa_the_custom_logo();
			                	}	                		                	
			                ?>
			                <h1 class="site-title">
						        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a>
						    </h1>
						    <?php
						        $description = esc_attr(get_bloginfo( 'description', 'display' ));
						        if ( $description || is_customize_preview() ) { 
						            ?>
						                <p class="site-description"><?php echo $description; ?></p>
						            <?php 
						        }
						    ?>
						</div>
						<nav class="elvinaa-main-menu navbar" id="elvinaa-main-menu-wrapper">
							<div class="navbar-header">
						     	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
							       	<span class="sr-only"><?php _e( 'Toggle navigation', 'elvinaa' ); ?></span>
							      	<span class="icon-bar"></span>
							       	<span class="icon-bar"></span>
							       	<span class="icon-bar"></span>
						     	</button>
						   	</div>
							<div class="collapse navbar-collapse" id="navbar-collapse-1">
						   		<?php
					                wp_nav_menu( array(			                  	
					                  	'theme_location'    => 'primary',
					                  	'depth'             => 3,
					                  	'container'         => 'ul',
					                  	'container_class'   => '',
					                  	'container_id'      => 'menu-primary',
					                  	'menu_class'        => 'nav',
					                  	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					                  	'walker'            => new wp_bootstrap_navwalker())
					                );
				             	?>							
						   	</div>
						</nav>
					</div>
		        </div>
		    </div>
	    </header> 
	<?php	
}
endif;

/**
 * Elvinaa Header Style 2
 */
if ( ! function_exists( 'elvinaa_header_style_2' ) ) :
function elvinaa_header_style_2() {
	?>
		<header id="home-inner" class="elementor-menu-anchor elvinaa-menu-wrapper full-width-menu style2">
			<div class="header-wrapper">
				<div class="container">
					<div class="clearfix">      
		    			<div class="logo">
		           			<?php 
			                	if (has_custom_logo()){
			                		elvinaa_the_custom_logo();
			                	}	                		                	
			                ?>
			                <h1 class="site-title">
						        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a>
						    </h1>
						    <?php
						        $description = esc_attr(get_bloginfo( 'description', 'display' ));
						        if ( $description || is_customize_preview() ) { 
						            ?>
						                <p class="site-description"><?php echo $description; ?></p>
						            <?php 
						        }
						    ?>
						</div>
						<nav class="elvinaa-main-menu navbar" id="elvinaa-main-menu-wrapper">
							<div class="navbar-header">
						     	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
							       	<span class="sr-only"><?php _e( 'Toggle navigation', 'elvinaa' ); ?></span>
							      	<span class="icon-bar"></span>
							       	<span class="icon-bar"></span>
							       	<span class="icon-bar"></span>
						     	</button>
						   	</div>
							<div class="collapse navbar-collapse" id="navbar-collapse-1">
						   		<?php
					                wp_nav_menu( array(			                  	
					                  	'theme_location'    => 'primary',
					                  	'depth'             => 3,
					                  	'container'         => 'ul',
					                  	'container_class'   => '',
					                  	'container_id'      => '',
					                  	'menu_class'        => 'nav',
					                  	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					                  	'walker'            => new wp_bootstrap_navwalker())
					                );
				             	?>							
						   	</div>
						</nav>
					</div>
		        </div>
		    </div>
	    </header> 
	<?php	
}
endif;

if ( ! function_exists( 'elvinaa_action_header_hook' ) ) :
function elvinaa_action_header_hook() {
	if("style1" === esc_attr(get_theme_mod( 'el_header_styles','style1'))) {
	    add_action( 'elvinaa_action_header', 'elvinaa_header_style_1' );
	}
}
endif;
add_action( 'wp', 'elvinaa_action_header_hook' );



/**
 * Elvinaa Footer
 */

if ( ! function_exists( 'elvinaa_footer_copyrights' ) ) :
function elvinaa_footer_copyrights() {
	?>
		<div class="row">
            <div class="copyrights">
                <p><?php echo esc_attr(get_theme_mod( 'el_copyright_text', __('Copyrights Elvinaa. All Rights Reserved','elvinaa')) ); ?><span><?php _e(' | Theme by ','elvinaa') ?><a href="https://www.spiraclethemes.com/" target="_blank"><?php _e('Spiraclethemes','elvinaa') ?></a></span></p>
            </div>
        </div>
	<?php
}
endif;


if ( ! function_exists( 'elvinaa_action_footer_hook' ) ) :
function elvinaa_action_footer_hook() {
	add_action( 'elvinaa_action_footer', 'elvinaa_footer_copyrights' );	
}
endif;
add_action( 'wp', 'elvinaa_action_footer_hook' );


/**
 * Elvinaa Page Title
 */

if ( ! function_exists( 'elvinaa_get_page_title' ) ) :
function elvinaa_get_page_title($blogtitle=false,$archivetitle=false,$searchtitle=false,$pagenotfoundtitle=false) {
	if(!is_front_page()){
		?>
			<div class="content-section img-overlay">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-12">
							<div class="section-title page-title"> 
								<?php
									if($blogtitle){
										?><h1 class="main-title"><?php single_post_title(); ?></h1><?php
									}
									if($archivetitle){
										?><h1 class="main-title"><?php the_archive_title(); ?></h1><?php
									}
									if($searchtitle){
										?><h1 class="main-title"><?php _e('SEARCH RESULTS','elvinaa') ?></h1><?php
									}
									if($pagenotfoundtitle){
										?><h1 class="main-title"><?php _e('PAGE NOT FOUND','elvinaa') ?></h1><?php
									}
									if($blogtitle==false && $archivetitle==false && $searchtitle==false && $pagenotfoundtitle==false){
										?><h1 class="main-title"><?php the_title(); ?></h1><?php
									}
								?>                                                          
			                </div>						
						</div>
					</div>
				</div>	
			</div>
			</div>	<!-- End page-title -->	
		<?php
	}	
}
endif;


/**
 * Elvinaa Slider 
 */

if ( ! function_exists( 'elvinaa_get_featured_slider' ) ) :
function elvinaa_get_featured_slider() {
	?>
		<div class="slider-wrapper">
			<div class="slider-inner">
		        <div class="slider flexslider">
		            <ul class="slides">
		                <?php
		                	$cat = absint(get_theme_mod( 'el_slider_post_category' ));
		                	$catquery = new WP_Query( 'cat='.$cat.'&posts_per_page=3' );
							while($catquery->have_posts()) : $catquery->the_post();
			                	?>
			                		<li>
			                			<div class="post-image">
				                			<?php 
				                				if ( has_post_thumbnail()) {
				                					the_post_thumbnail('full');
				                				}
				                			?>
				                		</div>
				                		
			                			<div class="captions">
			                				<h6 class="category"><i class="fa fa-circle"></i><a href="<?php echo esc_url(get_category_link( $cat )) ?>"><?php echo esc_attr(get_cat_name($cat));?></a></h6>
			                				<h1>
			                					<?php the_title(); ?>
			                				</h1>
											<p><?php echo wp_trim_words( get_the_content(), 25, '...' ); ?></p>
											<div class="slider-button center">  
				                				<div class="read-more first">
	                                                <a class="btn" href="<?php esc_url(the_permalink()) ?>"><?php echo esc_attr(get_theme_mod( 'el_readmore_text',__('CONTINUE READING...','elvinaa') )); ?></a>
	                                            </div>
											</div>
			                			</div>
									</li>
								<?php 
							endwhile; 
						?> 
					</ul>
				</div>
			</div>
		</div>
	<?php
}
endif;


/**
* Custom excerpt length.
*/
if ( ! function_exists( 'elvinaa_my_excerpt_length' ) ) :
function elvinaa_my_excerpt_length($length) {
	if ( is_admin() ) {
		return $length;
	}
  	return absint(get_theme_mod( 'el_excerpt_length',70));
}
endif;
add_filter('excerpt_length', 'elvinaa_my_excerpt_length');