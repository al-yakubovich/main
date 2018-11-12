<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Extra content
 *
 * @package Simple Days
 */


add_filter('the_content','simple_days_replace_content');

function simple_days_replace_content($the_content) {
if (is_singular()){
  $ontouchstart = '';
  if(!is_amp()) $ontouchstart = ' ontouchstart=""';

  if ( get_theme_mod( 'simple_days_toc',false) == true) {
    if ( is_single() && get_theme_mod( 'simple_days_toc_post',true) == true || is_page() && get_theme_mod( 'simple_days_toc_page',true) == true) {
      $heading = array();
      $heading_count = preg_match_all( '/<h([1-6]).*?>(.*?)<\/h[1-6].*?>/iu', $the_content, $heading );

      if( $heading_count >= get_theme_mod( 'simple_days_toc_dc','3')){
        $numif = (get_theme_mod( 'simple_days_toc_numerical','true') == true ? '1' : "0") ;
        $hieif = (get_theme_mod( 'simple_days_toc_hierarchical',false) == true ? '1' : "0") ;
        $toc_html = '';
        $toc_header_html = '';
        $toc_footer_html = '';
        $numerical = '';
        $top_level = 6;
        foreach($heading[1] as $data){
          if($data < $top_level) $top_level = $data;
        }
        $i = $first = $heading_1 = $heading_2 = $heading_3 = $heading_4 = $heading_5 = $heading_6 = $num_heading_1 = $num_heading_2 = $num_heading_3 = $num_heading_4 = $num_heading_5 = $num_heading_6 = 0;
        $before_level = $top_level;
        $after_level = $heading[1][1];
        $toc_header_html = '<div id="simple_days_toc" class="s_d_toc simple_days_box_shadow"><input id="toggle_toc" type="checkbox"'. (get_theme_mod( 'simple_days_toc_hide',false) == false ? '': 'checked' ) .'/><div class="s_d_toc_ctrl"><span class="s_d_toc_title">'.get_theme_mod( 'simple_days_toc_title',esc_html_x( 'Contents', 'toc' , 'simple-days' )).'</span> [<label for="toggle_toc" class="labbel_view">'.esc_html_x( 'view', 'toc' , 'simple-days' ).'</label><label for="toggle_toc" class="labbel_hide">'.esc_html__( 'hide', 'simple-days' ).'</label>]</div>'."\n";
        $toc_footer_html = '</div>';
        if($hieif == '1'){

          $toc_html .= '<ul class="s_d_toc_ul">';
          foreach($heading[1] as $data){
            ${"num_heading_".$heading[1][$i]}++;
            ${"heading_".$heading[1][$i]}++;
            $link_number = ${"heading_".$heading[1][$i]};
            $currnt_level = $heading[1][$i];
            $pattern = '{<h'.$heading[1][$i].'(.*?)>'.$heading[2][$i].'<\/h'.$heading[1][$i].'>}isum';
            $replacement = '<h'.$heading[1][$i].'$1><span id="heading'.$heading[1][$i].'_'.$link_number.'">'.$heading[2][$i].'</span></h'.$heading[1][$i].'>';
            $the_content  = preg_replace($pattern, $replacement, $the_content,1);

            if($numif == 1){
switch ($heading[1][$i]){
case 1:
  $numerical = $num_heading_1.' ';
  $num_heading_2 = $num_heading_3 = $num_heading_4 = $num_heading_5 = $num_heading_6 = 0;
  break;
case 2:
  $numerical = ($top_level < 2 ? $num_heading_1.'.' : '' ).$num_heading_2.' ';
  $num_heading_3 = $num_heading_4 = $num_heading_5 = $num_heading_6 = 0;
  break;
case 3:
  $numerical = ($top_level < 2 ? $num_heading_1.'.' : '' ).($top_level < 3 ? $num_heading_2.'.' : '' ).$num_heading_3.' ';
  $num_heading_4 = $num_heading_5 = $num_heading_6 = 0;
  break;
case 4:
  $numerical = ($top_level < 2 ? $num_heading_1.'.' : '' ).($top_level < 3 ? $num_heading_2.'.' : '' ).($top_level < 4 ? $num_heading_3.'.' : '' ).$num_heading_4.' ';
  $num_heading_5 = $num_heading_6 = 0;
  break;
case 5:
  $numerical = ($top_level < 2 ? $num_heading_1.'.' : '' ).($top_level < 3 ? $num_heading_2.'.' : '' ).($top_level < 4 ? $num_heading_3.'.' : '' ).($top_level < 5 ? $num_heading_4.'.' : '' ).$num_heading_5.' ';
  $num_heading_6 = 0;
  break;
case 6:
  $numerical = ($top_level < 2 ? $num_heading_1.'.' : '' ).($top_level < 3 ? $num_heading_2.'.' : '' ).($top_level < 4 ? $num_heading_3.'.' : '' ).($top_level < 5 ? $num_heading_4.'.' : '' ).($top_level < 6 ? $num_heading_5.'.' : '' ).$num_heading_6.' ';
  break;
default:
  $numerical = '';
}

            }

            if($before_level === $currnt_level){
              $toc_html .= '<li>'.esc_html($numerical).'<a href="'.esc_url('#heading'.$heading[1][$i].'_'.$link_number).'">'.esc_html(wp_strip_all_tags($heading[2][$i])).'</a>';
            }else if ($currnt_level > $before_level ){

              while($currnt_level != $before_level){
                $toc_html .= '<ul><li>';
                $currnt_level-- ;
              }
              $toc_html .= esc_html($numerical).'<a href="'.esc_url('#heading'.$heading[1][$i].'_'.$link_number).'">'.esc_html(wp_strip_all_tags($heading[2][$i])).'</a>';
            }else{
              
              $toc_html .= '<li>'.esc_html($numerical).'<a href="'.esc_url('#heading'.$heading[1][$i].'_'.$link_number).'">'.esc_html(wp_strip_all_tags($heading[2][$i])).'</a>';
            }
            $before_level = $heading[1][$i];
            $i++;
            if(isset($heading[1][$i])) $after_level = $heading[1][$i];
            if($before_level === $after_level){
              $toc_html .= '</li>'."\n";
            }else if($before_level > $after_level){
              $diff_level = $before_level - $after_level;
              while($diff_level > 0){
                $toc_html .= '</li></ul></li>'."\n";
                $diff_level-- ;
              }
              $toc_html .= ''."\n";
              
            }else{
              $toc_html .= "\n";
              
            }

          }
          if ($before_level > $top_level){
             $toc_html .= '</li>'."\n";
             $diff_level = $before_level;
             while($diff_level > 2){
               $toc_html .= '</ul></li>'."\n";
               $diff_level-- ;
             }
          }
          $toc_html .= '</ul>'."\n";
        }else{


          $ulol = ($hieif == '0' && $numif == '1' ? 'ol' : 'ul');
          $toc_html .= '<'.esc_attr($ulol).' class="s_d_toc_ul'.($ulol == 'ol' ? ' s_d_toc_ol' : '').'">';
          foreach($heading[1] as $data){
            ${"heading_".$heading[1][$i]}++;
            $link_number = ${"heading_".$heading[1][$i]};
            $pattern = '{<h'.$heading[1][$i].'(.*?)>'.$heading[2][$i].'<\/h'.$heading[1][$i].'>}isum';

            $replacement = '<h'.$heading[1][$i].'$1><span id="heading'.$heading[1][$i].'_'.$link_number.'">'.$heading[2][$i].'</span></h'.$heading[1][$i].'>';
            $the_content  = preg_replace($pattern, $replacement, $the_content,1);
            $toc_html .= '<li><a href="'.esc_url('#heading'.$heading[1][$i].'_'.$link_number).'">'.esc_html($heading[2][$i]).'</a></li>'."\n";
            $i++;
          }
          $toc_html .= '</'.esc_attr($ulol).'>'."\n";
        }

        $dp = get_theme_mod( 'simple_days_toc_dp','0');
        $pattern = '{<h'.$heading[1][0].'(.*?)>(.*?)'.$heading[2][0].'(.*?)<\/h'.$heading[1][0].'>}ismu';
        if($dp == '0' ){
          $replacement = $toc_header_html.$toc_html.$toc_footer_html."\n".'<h'.$heading[1][0].'$1>${2}'.$heading[2][0].'$3</h'.$heading[1][0].'>';
          $the_content  = preg_replace($pattern, $replacement, $the_content,1);
        }else if ($dp == '1' ){
          $replacement = '<h'.$heading[1][0].'$1>${2}'.$heading[2][0].'$3</h'.$heading[1][0].'>'.$toc_header_html.$toc_html.$toc_footer_html;
          $the_content  = preg_replace($pattern, $replacement, $the_content,1);
        }else{
          $the_content  = $toc_header_html.$toc_html.$toc_footer_html.$the_content;
        }

        if( get_theme_mod( 'simple_days_toc_widget' , false) == true && is_active_widget( false, false, 'simple_days_toc_widget', true ) && $toc_html != ''){
           $pattern = '/<input id="toggle_toc".*?<\/label>\]<\/div>/iu';
           $toc_header_html  = '<div class="s_d_toc_widget simple_days_box_shadow s_d_toc'.(get_theme_mod( 'simple_days_toc_widget_sticky',false) == true ? ' s_d_toc_sticky' : "").'">';
           $toc_footer_html  = '</div>';
           set_query_var( 'simple_days_toc_html', $toc_header_html.$toc_html.$toc_footer_html );

        }
      }
    }
  }



  if ( is_single() && (is_active_sidebar( 'before_h2_no1' ) || is_active_sidebar( 'before_h2_no2' ) ||is_active_sidebar( 'before_h2_no3' ))) { //is_single()
    $pattern = '{<h2.*?>.+?<\/h2>}ismu';

    if ( preg_match_all( $pattern, $the_content, $result )) {
      if ( $result[0] ) {
        if ( isset($result[0][0]) && is_active_sidebar( 'before_h2_no1' )) {
            ob_start();
            dynamic_sidebar( 'before_h2_no1' );
            $before_h2 = ob_get_clean();
            $the_content  = str_replace($result[0][0], $before_h2.$result[0][0], $the_content);

        }
        if ( isset($result[0][1]) && is_active_sidebar( 'before_h2_no2' )) {
            ob_start();
            dynamic_sidebar( 'before_h2_no2' );
            $before_h2 = ob_get_clean();
            $the_content  = str_replace($result[0][1], $before_h2.$result[0][1], $the_content);
        }
        if ( isset($result[0][2]) && is_active_sidebar( 'before_h2_no3' ) ) {
            ob_start();
            dynamic_sidebar( 'before_h2_no3' );
            $before_h2 = ob_get_clean();
            $the_content  = str_replace($result[0][2], $before_h2.$result[0][2], $the_content);
        }
      }
    }
  }

  if ( is_page() && (is_active_sidebar( 'page_before_h2_no1' ) || is_active_sidebar( 'page_before_h2_no2' ) ||is_active_sidebar( 'page_before_h2_no3' ))) { //is_single()
    $pattern = '/^<h2.*?>.+?<\/h2>$/im';
    if ( preg_match_all( $pattern, $the_content, $result )) {
      if ( $result[0] ) {
        if ( isset($result[0][0]) && is_active_sidebar( 'page_before_h2_no1' )) {
            ob_start();
            dynamic_sidebar( 'page_before_h2_no1' );
            $before_h2 = ob_get_clean();
            $the_content  = str_replace($result[0][0], $before_h2.$result[0][0], $the_content);

        }
        if ( isset($result[0][1]) && is_active_sidebar( 'page_before_h2_no2' )) {
            ob_start();
            dynamic_sidebar( 'page_before_h2_no2' );
            $before_h2 = ob_get_clean();
            $the_content  = str_replace($result[0][1], $before_h2.$result[0][1], $the_content);
        }
        if ( isset($result[0][2]) && is_active_sidebar( 'page_before_h2_no3' ) ) {
            ob_start();
            dynamic_sidebar( 'page_before_h2_no3' );
            $before_h2 = ob_get_clean();
            $the_content  = str_replace($result[0][2], $before_h2.$result[0][2], $the_content);
        }
      }
    }
  }






  $blog_local = get_theme_mod( 'simple_days_blog_card_internal',false);
  $blog_external = get_theme_mod( 'simple_days_blog_card_external',false);
  
  if ( $blog_local == true || $blog_external == true ) {
    
    $pattern = '{<p><a(.*?)href=[\'"]([^\'"]+)[\'"](.*?)>([^\'"]+)</a></p>}';
    
    if(preg_match_all($pattern,$the_content,$match_url)){
      
      $match_count = count($match_url[1]);
      $i = 0;
      //var_dump($match_url);
      
      while($i < $match_count){
        
	      if($match_url[2][$i] == $match_url[4][$i]){
          
	        if(strpos($match_url[2][$i],home_url()) !== false){
            
	          if ( $blog_local == true) {
              $post_id = url_to_postid($match_url[2][$i]);

              if($post_id != '0'){
                $link_icon = 'link';
                $user_id = get_post_field( 'post_author', $post_id );
                $thumurl = wp_get_attachment_image_src (get_post_thumbnail_id ($post_id,  true), 'medium');
                $category = get_the_category($post_id);
                $link_url = get_permalink( $post_id );
                $link_url_option = $match_url[1][$i].' '.$match_url[3][$i];
                $link_url_option == ' ' ? $link_url_option = '' : '';
                if(!empty($thumurl)){
                  $img_source = '<img src="'.esc_url( $thumurl[0] );
                }else{
                  $img_source = '<img src="'.esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'));
                }
                $title = get_post( $post_id )->post_title;
                $description = mb_strimwidth( wp_strip_all_tags(strip_shortcodes(get_post($post_id)->post_content), true), 0 , 180, '&hellip;' );

                if(has_site_icon()){
                  $cache_favicon = '<img src="'.esc_url( get_site_icon_url() ).'" height="16" width="16" />';
                }else{
                  $cache_favicon = '<i class="fa fa-home" aria-hidden="true"></i>';
                }
              }else{
                $i++;
                continue;
              }  
              
            }else{
              
              $i++;
              continue;
            }
          }else{
            
            if ( $blog_external == true) {
              $simple_days_external_cache = array();
              $link_icon = 'external-link';
	      	    

              
              $simple_days_cache_name = str_replace(array('http://','https://','www.','.','-','/'),array('','','','_','_','_'),$match_url[2][$i]);

              $simple_days_external_cache = get_option('simple_days_external_cache');

              
              if(isset($simple_days_external_cache["$simple_days_cache_name"]['update_time']))$old_time = $simple_days_external_cache["$simple_days_cache_name"]['update_time'];
              
              if(isset($old_time)){
              	$diff_time = (time() - $old_time) / ( 60 * 60 * 24);
                $diff_time > 60 ? $diff_time = 1 : $diff_time = 0 ;
              }else{
              	$diff_time = 0;
              }
              
              $blog_cache_off = get_theme_mod( 'simple_days_blog_card_cache_off',false);
              //$blog_cache_off = true;
              if (!isset($simple_days_external_cache["$simple_days_cache_name"]) || $diff_time == 1 || $blog_cache_off == true ){
                

                require_once( ABSPATH . 'wp-load.php' );
                $external_data = wp_remote_get( $match_url[2][$i] );
                
                if ( ! is_wp_error( $external_data ) && $external_data['response']['code'] === 200 ) {
                  $external_html = mb_convert_encoding($external_data['body'], 'UTF-8', 'ASCII,JIS,UTF-7,EUC-JP,SJIS,UTF-8');
                
              	  if (preg_match('/<head.*?>(.*?)<\/head>/is', $external_html, $match_head)) {

                    $external_head = $match_head[1];
                    preg_match_all('/<meta property=[\'"]og:([^\'"]+)[\'"] content=[\'"]([^\'"]+)[\'"].*?>/is', $external_head, $match_og);
                    preg_match_all('/<meta property=[\'"]fb:([^\'"]+)[\'"] content=[\'"]([^\'"]+)[\'"].*?>/is', $external_head, $match_fb);
                    preg_match_all('/<meta name=[\'"]twitter:([^\'"]+)[\'"] content=[\'"]([^\'"]+)[\'"].*?>/is', $external_head, $match_twitter);

                    if (isset($match_og) && is_array($match_og) && count($match_og) == 3) {
                      $j=0;
                      while ($j < count($match_og[1])) {
                        $tags['og:'.$match_og[1][$j]] = esc_attr($match_og[2][$j]);
                        $j++;
                      }
                    }

                    if (isset($tags['og:title'])) {
                      $title = $tags['og:title'];
                    }else{
                      $pattern = 'title';
                      if (preg_match('/<'.$pattern.'.*?>(.*)<\/'.$pattern.'>/is', $external_head, $match_title)) {
                        $title = esc_html($match_title[1]);
                      }else{
                      	$title = '';
                      }
                    }
                    if (isset($tags['og:description'])) {
                      $description = esc_html($tags['og:description']);
                    }else{
                      if(preg_match('/<p.*?>(.*?)<\/p>/is', $external_html, $description)){
                      	$description = esc_html(strip_tags($description[1]));
                      }else{
                        $description = '';
                      }
                    }
                  }else{
                    $filetype = $external_data['headers']['content-type'];
                    if($filetype!=''){
                      $filetype = substr(strrchr($filetype,"/"),1);
                    }else{
                      $filetype = '';
                    }
                    $description = $filetype.' '. esc_html__( 'file', 'simple-days' );
                    $title = substr(strrchr($match_url[2][$i],"/"),1);
                  }

                  require_once(ABSPATH . 'wp-admin/includes/file.php');
                  global $wp_filesystem;
                  $cache_favicon = '';
                  if ( WP_Filesystem() ) {
                    $upload_dir = wp_upload_dir();
                    $dir = $upload_dir['basedir'].'/simple_days_cache/';
                    //$dir = WP_CONTENT_DIR.'/uploads/simple_days_cache/';
                    if ( !$wp_filesystem->is_dir($dir) ) {
                      $wp_filesystem->mkdir($dir, 0777, true);
                      $wp_filesystem->chmod($dir, 0777);
                    }
                    $host_url = parse_url(esc_url($match_url[2][$i]), PHP_URL_HOST);

                      //$favicon_image = $wp_filesystem->get_contents('https://www.google.com/s2/favicons?domain='.$host_url);

                    $favicon_image = wp_remote_get('https://www.google.com/s2/favicons?domain='.$host_url);
                    if ( ! is_wp_error( $favicon_image ) && $favicon_image['response']['code'] === 200 ) {
                      $favicon_image = $favicon_image['body'];
                      $cache_favicon = $dir.$host_url.'.png';
                      $wp_filesystem->put_contents($cache_favicon, $favicon_image, FS_CHMOD_FILE);
                      $cache_favicon = str_replace(WP_CONTENT_DIR, content_url(), $cache_favicon);
                    }
                  }
                  $cache_image = '';

                  if (isset($tags['og:image'])) {
                    if ( WP_Filesystem() ) {
                      $cache_image = str_replace(array('http://','https://','www.','-','/'),array('','','','_','_'),$tags['og:image']);
                      $cache_image = preg_replace('/\?.*$/i', '', $dir.$cache_image);
                      $path_parts = pathinfo($cache_image);
                      if(!$path_parts)$cache_image.'.png';
                        //$file_image = $wp_filesystem->get_contents($tags['og:image']);
                      $file_image = wp_remote_get($tags['og:image']);
//var_dump($file_image);

                      if ( ! is_wp_error( $file_image ) && $file_image['response']['code'] === 200 ) {
                        $file_image = $file_image['body'];

                        $wp_filesystem->put_contents($cache_image, $file_image, FS_CHMOD_FILE);
                        $cache_image_edit = wp_get_image_editor($cache_image);
                        if ( !is_wp_error($cache_image_edit) ) {
                          $cache_image_edit->resize('300', '300');
                          $cache_image_edit->save( $cache_image );
                        }
                        $cache_image = str_replace(WP_CONTENT_DIR, content_url(), $cache_image);
                      }else{
                        $cache_image = '';
                      }

                    }
                      
                  }

                  $link_url = $match_url[2][$i];
                  $link_url_option = $match_url[1][$i].' '.$match_url[3][$i];
                  $link_url_option == ' ' ? $link_url_option = '' : '';
                  if($cache_image != ''){
                    $img_source = '<img src="'.esc_url( $cache_image );
                  }else{
                    $img_source = '<img src="'.esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'));
                  }

                  if(isset($simple_days_external_cache["$simple_days_cache_name"]) || !isset($simple_days_external_cache["$simple_days_cache_name"])){
                    $simple_days_external_cache["$simple_days_cache_name"] = array(
                      'title' => esc_html($title),
                      'cache_image' => esc_url($cache_image),
                      'description' => esc_html(strip_tags($description)),
                      'link_url' => esc_url($link_url),
                      'link_url_option' => $link_url_option,
                      'favicon' => esc_url($cache_favicon),
                      'update_time' => time(),
                    );
                  }
                  update_option('simple_days_external_cache', $simple_days_external_cache);

                }else{
                
                  //echo 'error';
                  $i++;
                  continue;
                }

	      	  }else{
	      	  	$title = esc_html($simple_days_external_cache["$simple_days_cache_name"]['title']);
	      	  	$cache_image = esc_url($simple_days_external_cache["$simple_days_cache_name"]['cache_image']);
	      	  	$description = esc_html($simple_days_external_cache["$simple_days_cache_name"]['description']);
	      	  	$link_url = esc_url($simple_days_external_cache["$simple_days_cache_name"]['link_url']);
	      	  	$link_url_option = $simple_days_external_cache["$simple_days_cache_name"]['link_url_option'];
	      	  	$cache_favicon = esc_url($simple_days_external_cache["$simple_days_cache_name"]['favicon']);
                if($cache_image != ''){
                  $img_source = '<img src="'.esc_url( $cache_image );
                }else{
                  $img_source = '<img src="'.esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'));
                }

	      	  }
              $cache_favicon = '<img src="'.esc_url( $cache_favicon ).'" height="16" width="16" />';
            
            }else{
              
              $i++;
              continue;
            }
          }
          $replacement = '<div class="s_d_bc simple_days_box_shadow">
	<div class="s_d_bc_thum_wrap"><div class="fit_box_img_wrap s_d_bc_thum"><a href="'.esc_url($link_url).'"'.$link_url_option.'>'.$img_source.'" class="scale_13 trans_10"'.esc_attr($ontouchstart).' width="3" height="2" /></a></div></div><div class="s_d_bc_entry_wrap"><div class="s_d_bc_entry"><div class="s_d_bc_title"><h4><a href="'.esc_url($link_url).'"'.$link_url_option.'>'.esc_html($title).'</a> <i class="fa fa-'.$link_icon.'" aria-hidden="true"></i></h4></div><div class="s_d_bc_info"><div class="s_d_bc_favicon">'.$cache_favicon.'</div><div class="s_d_bc_link">&nbsp;'.parse_url(esc_url($link_url), PHP_URL_HOST).'</div></div><div class="s_d_bc_summary">'.esc_html(strip_tags($description)).'</div></div></div></div>';
           $the_content = str_replace($match_url[0][$i], $replacement, $the_content);
	    }else{

	    }
	    $i++;
      }
    }
  }

}


    if ( is_amp() ){
      
      $the_content = mb_ereg_replace('\xc2\xa0', ' ', $the_content);
      
      $the_content = preg_replace('/<script.*?gist\.github\.com.*?>.*?<\/script>/iu','<a class="github_link" href="'.esc_url(get_the_permalink()).'">'.esc_html__( 'Code check to master page', 'simple-days' ).'</a>', $the_content);
      
      $the_content = preg_replace('/<script.*?static\.codepen\.io\/assets\/embed\/ei\.js.*?>.*?<\/script>/iu','<a class="github_link" href="'.esc_url(get_the_permalink()).'">'.esc_html__( 'Code check to master page', 'simple-days' ).'</a>', $the_content);

      
      $the_content = preg_replace(array(
    	'/( style| target| onclick| border| scale marginwidth| marginheight| security)=[\'"]([^\'"]+)[\'"]/iu',
        '/<script.*?>.*?<\/script>/iu',
        '/<font*?>/iu',
        '/<\/font>/iu',
        ), '', $the_content);

      $pattern = 'iframe';
      
      $the_content = preg_replace(array(
    	'/<'.$pattern.'/i',
        '/<\/'.$pattern.'>/i',
        ),
      array(
    	'<amp-iframe layout="responsive"',
    	'</amp-iframe>',
      ),$the_content);

      
      $the_content = preg_replace('/ src="http:\/\/ecx.images-amazon.com/i', ' layout="responsive" height="128" width="128" src="http://ecx.images-amazon.com', $the_content);
      
      $the_content = preg_replace('/ src="https:\/\/images-fe.ssl-images-amazon.com/i', ' layout="responsive" height="128" width="128" src="https://images-fe.ssl-images-amazon.com', $the_content);
      
      $the_content = preg_replace('/ src="https:\/\/thumbnail.image.rakuten.co.jp/i', ' width="128" height="128" sizes="(max-width: 128px) 128vw, 128px" src="https://thumbnail.image.rakuten.co.jp', $the_content);
      
      $the_content = preg_replace('/ src="https:\/\/item.shopping.c.yimg.jp/i', ' width="128" height="128" sizes="(max-width: 128px) 128vw, 128px" src="https://item.shopping.c.yimg.jp', $the_content);
      
      $the_content = preg_replace('/<img(.*?)\/?>/i', '<amp-img $1></amp-img>', $the_content);

    }else{
      
      if (get_theme_mod( 'simple_days_lightbox','false') == 'lity'){
        $pattern ='/<a(.*?)href=[\'"](.*?).(png|jpe?g|gif|svg|webp|bmp|ico|tiff?)[\'"](.*?)><img/i';
        $replacement = '<a$1href="$2.$3"$4 data-lity><img';
        $the_content = preg_replace($pattern, $replacement, $the_content);
      }

      
      if (get_theme_mod( 'simple_days_highlight',false) == true){
        $highlight = (strpos($the_content,'<pre>') !== false ? true : false);
        if ($highlight == true){
      	  add_action( 'wp_footer', 'highlight_load');
      	  add_action( 'wp_footer', 'highlight_onload', 30);
        }
      }
    }

  return $the_content;
}
