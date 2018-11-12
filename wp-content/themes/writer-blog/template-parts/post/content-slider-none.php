<?php
/**
 * Displays if there is no post or nothing to display
 */
?>

<div class="u-full-width">
   <div class="row">
    	<div class="category-header-background" style="background-image: linear-gradient( to bottom, rgba(0, 0, 0, .5 ) 0%, rgba( 0, 0, 0, .5 ) 100% ), url( '<?php echo esc_url( writer_blog_default_featured_image() ); ?>' )">
    		<div class="category-header-content">
    			<div class="category-title">
    				<h1><?php esc_html_e( 'Welcome!', 'writer-blog' ); ?></h1>
    			</div><!-- /.category-title -->
    		</div><!-- /.header-content -->
    	</div>
   </div> <!-- /.row -->
</div> <!-- /.u-full-width -->