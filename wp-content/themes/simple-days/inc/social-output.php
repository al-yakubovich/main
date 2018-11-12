<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Social Output
 *
 * @package Simple Days
 */
  $ontouchstart = '';
  if(!is_amp()) $ontouchstart = ' ontouchstart=""';

      $sns_info = get_query_var('social_info');
      $i = 1;
      while($i <= $sns_info['loop']){


        if ($sns_info['icon'][$i] != 'none' && $sns_info['account'][$i] != ''){
          switch ($sns_info['icon'][$i]){
            case 'amazon':
              $sns_info['url'][$i] = esc_url($sns_info['account'][$i]);
              break;
            case 'codepen':
              $sns_info['url'][$i] = esc_url('https://codepen.io/'.$sns_info['account'][$i]);
              break;
            case 'facebook':
              $sns_info['url'][$i] = esc_url('https://www.facebook.com/'.$sns_info['account'][$i]);
              break;
            case 'feedly':
              $sns_info['url'][$i] = esc_url('https://feedly.com/i/subscription/feed/'.get_bloginfo('rss_url'));
              break;

            case 'flickr':
              $sns_info['url'][$i] = esc_url('https://www.flickr.com/photos/'.$sns_info['account'][$i]);
              break;

            case 'github':
              $sns_info['url'][$i] = esc_url('https://github.com/'.$sns_info['account'][$i]);
              break;

            case 'googleplus':
              $sns_info['url'][$i] = esc_url('https://plus.google.com/'.$sns_info['account'][$i]);
              break;

            case 'hatenabookmark':
              $sns_info['url'][$i] = esc_url('https://b.hatena.ne.jp/'.$sns_info['account'][$i]);
              break;

            case 'instagram':
              $sns_info['url'][$i] = esc_url('https://www.instagram.com/'.$sns_info['account'][$i]);
              break;

            case 'line':
              $sns_info['url'][$i] = esc_url('http://line.naver.jp/ti/p/'.$sns_info['account'][$i]);
              break;

            case 'linkedin':
              $sns_info['url'][$i] = esc_url('https://www.linkedin.com/in/'.$sns_info['account'][$i]);
              break;

            case 'meetup':
              $sns_info['url'][$i] = esc_url('https://www.meetup.com/'.$sns_info['account'][$i]);
              break;

            case 'pinterest':
              $sns_info['url'][$i] = esc_url('https://www.pinterest.com/'.$sns_info['account'][$i]);
              break;

            case 'rss':
              $sns_info['url'][$i] = get_bloginfo('rss_url');
              break;

            case 'soundcloud':
              $sns_info['url'][$i] = esc_url('https://soundcloud.com/'.$sns_info['account'][$i]);
              break;

            case 'tumblr':
              $sns_info['url'][$i] = esc_url('https://'.$sns_info['account'][$i].'.tumblr.com/');
              break;

            case 'twitter':
              $sns_info['url'][$i] = esc_url('https://twitter.com/'.$sns_info['account'][$i]);
              break;

            case 'vimeo':
              $sns_info['url'][$i] = esc_url('https://vimeo.com/'.$sns_info['account'][$i]);
              break;

            case 'youtube':
              $sns_info['url'][$i] = esc_url('https://www.youtube.com/'.$sns_info['account'][$i]);
              break;
            default:
              //どれでも無い
          }
        }


        if ($sns_info['icon'][$i] != 'none' && $sns_info['share'][$i] != ''){
          $title = get_the_title();
          $blogname = get_bloginfo( 'name' );
          $excerpt = mb_strimwidth(strip_tags(get_post()->post_content), 0, 120, '...');



          switch ($sns_info['share'][$i]){
            case 'buffer':
              $sns_info['url'][$i] = esc_url('https://bufferapp.com/add?text='.$title.'&url='.$sns_info['url'][$i]);
              break;

            case 'digg':
              $sns_info['url'][$i] = esc_url('https://digg.com/submit?url='.$sns_info['url'][$i].'&title='.$title);
              break;

            case 'mail':        
              $sns_info['url'][$i] = esc_url('mailto:?subject='.sprintf(esc_html__( 'Shared from &ldquo;%s&rdquo;', 'simple-days' ), $blogname ).'&amp;body='.$title.'%0d%0a'.$sns_info['url'][$i]);
              break;

            case 'evernote':
              $sns_info['url'][$i] = esc_url('https://www.evernote.com/clip.action?url='.$sns_info['url'][$i].'&title='.$title);
              break;

            case 'facebook':
              $sns_info['url'][$i] = esc_url('https://www.facebook.com/sharer/sharer.php?u='.$sns_info['url'][$i]);
              break;

            case 'googleplus':
              $sns_info['url'][$i] = esc_url('https://plus.google.com/share?url='.$sns_info['url'][$i]);
              break;

            case 'hatenabookmark':
              $sns_info['url'][$i] = esc_url('https://b.hatena.ne.jp/add?mode=confirm&url='.$sns_info['url'][$i].'&title='.$title);
              break;

            case 'line':
              $sns_info['url'][$i] = esc_url('https://line.me/R/msg/text/?'.$sns_info['url'][$i]);
              break;

            case 'linkedin':
              $sns_info['url'][$i] = esc_url('https://www.linkedin.com/shareArticle?mini=true&url='.$sns_info['url'][$i]);
              break;
            case 'messenger':
              $sns_info['url'][$i] = 'fb-messenger://share/?link='.$sns_info['url'][$i].'&app_id='.get_theme_mod( 'simple_days_social_account_facebook_app_id' , '');
              break;
//<a href=”fb-messenger://share/?link= https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fsharing%2Freference%2Fsend-dialog&app_id=123456789”>Send In Messenger</a>

            case 'pinterest':

              if(!has_post_thumbnail()) {
                $output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);
                if(isset($matches [1] [0])){
                $imageurl = esc_url($matches [1] [0]);
                }else{
                  $imageurl = esc_url(get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'/assets/images/no_image.png'));
                }
              }else{
                $thumurl = wp_get_attachment_image_src( get_post_thumbnail_id() , 'full' );
                $imageurl = esc_url($thumurl[0]);
              }





              $sns_info['url'][$i] = esc_url('https://www.pinterest.com/pin/create/bookmarklet/?url='.$sns_info['url'][$i].'&media='.$imageurl.'&is_video=false&description='.$excerpt);//'https://www.pinterest.com/pin/create/button/?url='.$sns_info['url'][$i]
              break;

            case 'pocket':
              $sns_info['url'][$i] = esc_url('https://getpocket.com/edit?url='.$sns_info['url'][$i].'&title='.$title);
              break;

            case 'reddit':
              $sns_info['url'][$i] = esc_url('https://reddit.com/submit?url='.$sns_info['url'][$i].'&title='.$title);
              break;

            case 'tumblr':
              $sns_info['url'][$i] = esc_url('https://www.tumblr.com/share/link?url='.$sns_info['url'][$i].'&name='.$title.'&description='.$excerpt);
              break;

            case 'twitter':
              $sns_info['url'][$i] = esc_url('https://twitter.com/share?url='.$sns_info['url'][$i].'&text='.$title);
              break;

            case 'whatsapp':
              $sns_info['url'][$i] = esc_url('https://api.whatsapp.com/send?text='.$title.' '.$sns_info['url'][$i]);
              break;

              default:
              
            }
        }











        if($sns_info['icon'][$i] != 'none' && $sns_info['url'][$i] != ''){
          echo '<li><a href="'.esc_url($sns_info['url'][$i]).'" class="sns_'.esc_attr( $sns_info['icon'][$i] ).' icon_base '.esc_attr( $sns_info['icon_shape'] ).' '.esc_attr( $sns_info['icon_size'] ) . esc_attr($sns_info['icon_tooltip']) .' non_hover'.esc_attr($sns_info['icon_color']).esc_attr($sns_info['icon_hover_color']).esc_attr($sns_info['icon_attribute']).'" title="'.(esc_attr( $sns_info['icon'][$i] ) =='hatenabookmark' ? esc_attr_x('Hatena', 'hatebu', 'simple-days') : esc_attr( ucfirst( $sns_info['icon'][$i] ) )).'" target="_blank" '.(!is_amp() ? 'style="'.esc_attr($sns_info['icon_user_color']).esc_attr($sns_info['icon_user_hover_color']).'"' : '').''.esc_attr($ontouchstart).'>'.($sns_info['icon'][$i] !='flickr' ? '<i class="icomoon icon-'.esc_attr( $sns_info['icon'][$i] ).'"></i>' : '<i class="icomoon icon-no"></i><i class="icomoon icon-flickr_l"></i><i class="icomoon icon-flickr_r"></i>').'</a></li>';
        }


        $i++;
      }
      $sns_info = array();
      set_query_var( 'social_info', $sns_info );
