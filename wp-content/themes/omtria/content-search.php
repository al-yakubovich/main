<article class="post post--default" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post-header">
        <?php edit_post_link( "<p class='fa fa-pencil-alt'></p>" ); ?>
    </header>

    <div class="post-content">
        <h2 class="post-title post-title--list"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
    </div>
</article>