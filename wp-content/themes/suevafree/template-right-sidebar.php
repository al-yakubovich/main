<?php 

	/* Template Name: Right Sidebar */
	
	get_header();
	do_action( 'suevafree_top_sidebar', 'top-sidebar-area');
	do_action( 'suevafree_header_sidebar', 'header-sidebar-area');

?>

<div class="container content">
	
    <div class="row">
       
        <div class="col-md-8 right-sidebar" >
        	
            <div class="row">
        
                <div <?php post_class(); ?> >
                
                    <?php 
					
						while ( have_posts() ) : the_post();
						
							do_action('suevafree_postformat', 'suevafree_thumbnail_l');
							wp_link_pages(array('before' => '<div class="suevafree-pagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>') );
						
						endwhile;
						
					?>
            
                </div>
        
			</div>
        
        </div>

		<?php do_action('suevafree_side_sidebar', 'side-sidebar-area' ); ?>

    </div>
    
</div>

<?php 

	do_action( 'suevafree_full_sidebar', 'full-sidebar-area');
	get_footer(); 
	
?>