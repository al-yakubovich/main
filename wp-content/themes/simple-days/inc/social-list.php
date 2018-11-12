<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Social List
 *
 * @package Simple Days
 */

      $social['name_list'] = array(
        'none'             => '-',
        'amazon'           => esc_html__('Amazon', 'simple-days'),
        'codepen'          => esc_html__('CodePen', 'simple-days'),
        'facebook'         => esc_html__('Facebook', 'simple-days'),
        'feedly'           => esc_html__('Feedly', 'simple-days'),
        'flickr'           => esc_html__('Flickr', 'simple-days'),
        'github'           => esc_html__('Github', 'simple-days'),
        'googleplus'       => esc_html__('Google+', 'simple-days'),
        'hatenabookmark'   => esc_html__('Hatena Bookmark', 'simple-days'),
        'instagram'        => esc_html__('Instagram', 'simple-days'),
        'line'             => esc_html__('Line', 'simple-days'),
        'linkedin'         => esc_html__('LinkedIn', 'simple-days'),
        'meetup'           => esc_html__('Meetup', 'simple-days'),
        'pinterest'        => esc_html__('Pinterest', 'simple-days'),
        'rss'              => esc_html__('RSS', 'simple-days'),
        'soundcloud'       => esc_html__('SoundCloud', 'simple-days'),
        'tumblr'           => esc_html__('Tumblr', 'simple-days'),
        'twitter'          => esc_html__('Twitter', 'simple-days'),
        'vimeo'            => esc_html__('Vimeo', 'simple-days'),
        'youtube'          => esc_html__('Youtube', 'simple-days'),
      );
      $social['shape_list'] = array(
          'icon_square' => esc_html__( 'square', 'simple-days' ),
          'icon_circle' => esc_html__( 'circle', 'simple-days' ),
          'icon_rectangle' => esc_html__( 'rectangle', 'simple-days' ),
          'icon_character' => esc_html__( 'only icon', 'simple-days' ),
          'icon_hollow_square' => esc_html__( 'hollow square', 'simple-days' ),
          'icon_hollow_circle' => esc_html__( 'hollow circle', 'simple-days' ),
          'icon_hollow_rectangle' => esc_html__( 'hollow rectangle', 'simple-days' ),
      );
      $social['size_list'] = array(
          'icon_small' => esc_html__( 'small', 'simple-days' ),
          '' => esc_html__( 'medium', 'simple-days' ),
          'icon_large' => esc_html__( 'large', 'simple-days' ),
          'icon_xlarge' => esc_html__( 'extra large', 'simple-days' ),
      );
//var_dump($social);
      set_query_var( 'social_list', $social );
