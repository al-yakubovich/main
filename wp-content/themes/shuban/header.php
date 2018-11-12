<!DOCTYPE html>
<html <?php 
language_attributes();
?>
>
<head>
<meta charset="<?php 
bloginfo( 'charset' );
?>
">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php 
wp_head();
?>
</head>

<body <?php 
body_class();
?>
>
<div id="page" class="site">

	<?php 
?>

	<div class="st-header-area">
		<div class="container">
			<a class="skip-link screen-reader-text" href="#content"><?php 
esc_html_e( 'Skip to content', 'shuban' );
?>
</a>

			<header id="masthead" class="site-header st-site-header" role="banner">
				 <div class="site-branding">

					 <?php 

if ( !get_theme_mod( 'shuban_logo' ) ) {
    ?>

						<?php 
    
    if ( is_front_page() ) {
        ?>
							<h1 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><?php 
        bloginfo( 'name' );
        ?>
</a></h1>
						<?php 
    } else {
        ?>
							<h2 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><?php 
        bloginfo( 'name' );
        ?>
</a></h2>
						<?php 
    }
    
    ?>

					<?php 
} else {
    ?>

						<?php 
    
    if ( is_front_page() ) {
        ?>
							<h1 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><img src="<?php 
        echo  esc_url( get_theme_mod( 'shuban_logo' ) ) ;
        ?>
" alt="<?php 
        bloginfo( 'name' );
        ?>
" class="shuban-logo-img" height="<?php 
        if ( get_theme_mod( 'shuban_logo_height' ) ) {
            echo  get_theme_mod( 'shuban_logo_height' ) ;
        }
        ?>
" /></a></h1>
						<?php 
    } else {
        ?>
							<h2 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><img src="<?php 
        echo  esc_url( get_theme_mod( 'shuban_logo' ) ) ;
        ?>
" alt="<?php 
        bloginfo( 'name' );
        ?>
" class="shuban-logo-img" height="<?php 
        if ( get_theme_mod( 'shuban_logo_height' ) ) {
            echo  get_theme_mod( 'shuban_logo_height' ) ;
        }
        ?>
" /></a></h2>
						<?php 
    }
    
    ?>

					<?php 
}

?>

					<?php 
$description = get_bloginfo( 'description', 'display' );
?>
					<?php 

if ( $description || is_customize_preview() ) {
    ?>
						<p class="site-description"><?php 
    echo  $description ;
    ?>
</p>
					<?php 
}

?>

                </div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle btn btn-primary btn-sm" aria-controls="primary-menu" aria-expanded="false" ><i class="fa fa-bars"></i></button>
					<?php 
wp_nav_menu( array(
    'theme_location' => 'menu-1',
    'menu_id'        => 'primary-menu',
    'menu_class'     => 'shuban-main-menu',
) );
?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div>
		<!-- /.container -->
	</div>
	<!-- .st-header-area -->


	<?php 

if ( get_header_image() ) {
    ?>
		<style media="screen">
			.st-header-area {
				background-image: url('<?php 
    header_image();
    ?>
');
			}
		</style>
	<?php 
}

?>



	<div class="st-content-area">
		<div class="container">
			<div id="content" class="site-content row">
