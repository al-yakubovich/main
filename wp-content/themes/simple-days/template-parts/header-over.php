<?php
/**
 * The template part for displaying a over widget
 *
 * @package Simple Days

 */
?>
    <div id="oh_wrap">
      <div class="container oh_con">
    <?php if( is_active_sidebar( 'over_header_left' )){ ?>
      <div id="oh_L"><?php dynamic_sidebar( 'over_header_left' ); ?></div>
    <?php } if( is_active_sidebar( 'over_header_right' )){ ?>
      <div id="oh_R"><?php dynamic_sidebar( 'over_header_right' ); ?></div>
    <?php } ?>
      </div>
    </div>
