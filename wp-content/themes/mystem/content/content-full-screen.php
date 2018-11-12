<?php
/**
 * The template used for displaying the Home page template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_content(); ?>	
</article>