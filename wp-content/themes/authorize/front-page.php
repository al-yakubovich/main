<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Authorize
 */

get_header(); ?>
	<!-- Start home page feature -->
	<div id="hf_container">
    	<?php 
			/* Get home boxes */
			$arHFLeft = authorize_get_homepage_box('home_feature_left');
			$arHFTopRight = authorize_get_homepage_box('home_feature_right_top');
			$arHFBottomRight = authorize_get_homepage_box('home_feature_right_bottom');			
		?>
        
        <?php if(!empty($arHFLeft['title'])) {?>
            <div id="hf_left_div" class="shadow-border">
                <div class="FeatureLeft_Content">
                    <div class="FeatImage">
                        <?php echo wp_kses_post( $arHFLeft['image'] )  ?>
                    </div>
                    
                    <div class="FeatContent">
                        <h1><?php echo wp_kses_post( $arHFLeft['title'] ) ?></h1>
                        <?php echo wp_kses_post( $arHFLeft['content'] ) ?>
                        <div class="moreinfo_link">
                            <?php echo esc_url( $arHFLeft['link'] ) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        
        
        <div id="hf_right">
            <?php if(!empty($arHFTopRight['title'])) {?>
                <div id="hf_right_top_div" class="hf_right_inner shadow-border">                
                    <div class="FeatImage">
                        <?php echo wp_kses_post( $arHFTopRight['image'] ) ?>
                    </div>
                    
                    <div class="FeatContent">
                        <h2><?php echo wp_kses_post($arHFTopRight['title'] ) ?></h2>
                        <?php echo wp_kses_post( $arHFTopRight['content'] ) ?>
                    
                        <div class="moreinfo_link">
                            <?php echo esc_url( $arHFTopRight['link'] ) ?>
                        </div>
                    </div>
                </div>
        	<?php } ?>
        
       		<?php if(!empty($arHFBottomRight['title'])) {?>	
                <div id="hf_right_bottom_div" class="hf_right_inner shadow-border">
                    <div class="FeatImage">
                        <?php echo wp_kses_post( $arHFBottomRight['image'] ) ?>
                    </div>
                    
                    <div class="FeatContent">
                        <h2><?php echo wp_kses_post( $arHFBottomRight['title'] ) ?></h2>
                        <?php echo wp_kses_post( $arHFBottomRight['content'] ) ?>
                        
                        <div class="moreinfo_link">
                            <?php echo esc_url( $arHFBottomRight['link'] ) ?>
                        </div>
                    </div>
                </div>
			<?php } ?>
        </div>
	</div>
	<!-- end home page feature -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"> 
			<?php  get_template_part( 'components/features/featured-content/display', 'featured' );?>
			
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>
	</div>
<?php
get_sidebar();
get_footer();