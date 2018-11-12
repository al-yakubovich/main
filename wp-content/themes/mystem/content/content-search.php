<?php
	/**
		* search results display
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<h4 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>		
		<div class="entry-meta">
			<?php mystem_posted_on(); ?>
		</div>
	</header>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
