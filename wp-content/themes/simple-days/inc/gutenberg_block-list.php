<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * Social List
 *
 * @package Simple Days
 */

      $gutenberg_block['core_list'] = array(
      	//Common Blocks
        'paragraph' => esc_html_x('Paragraph' , 'gutenberg_block' , 'simple-days'),
        'image' => esc_html_x('Image' , 'gutenberg_block' , 'simple-days'),
        'heading' => esc_html_x('Heading' , 'gutenberg_block' , 'simple-days'),
        'gallery' => esc_html_x('Gallery' , 'gutenberg_block' , 'simple-days'),
        'list' => esc_html_x('List' , 'gutenberg_block' , 'simple-days'),
        'quote' => esc_html_x('Quote' , 'gutenberg_block' , 'simple-days'),
        'audio' => esc_html_x('Audio' , 'gutenberg_block' , 'simple-days'),
        'cover-image' => esc_html_x('Cover Image' , 'gutenberg_block' , 'simple-days'),
        'file' => esc_html_x('File' , 'gutenberg_block' , 'simple-days'),
        //'subhead' => esc_html_x('Subheading' , 'gutenberg_block' , 'simple-days'),
        'video' => esc_html_x('Video' , 'gutenberg_block' , 'simple-days'),
        //Formatting
        'freeform' => esc_html_x('Classic' , 'gutenberg_block' , 'simple-days'),
        'code' => esc_html_x('Code' , 'gutenberg_block' , 'simple-days'),
        'html' => esc_html_x('Custom HTML' , 'gutenberg_block' , 'simple-days'),
        'preformatted' => esc_html_x('Preformatted' , 'gutenberg_block' , 'simple-days'),
        'pullquote' => esc_html_x('Pullquote' , 'gutenberg_block' , 'simple-days'),
        'table' => esc_html_x('Table' , 'gutenberg_block' , 'simple-days'),
        'verse' => esc_html_x('Verse' , 'gutenberg_block' , 'simple-days'),
        //Layout Elements
        'columns' => esc_html_x('Columns' , 'gutenberg_block' , 'simple-days'),
        'button' => esc_html_x('Button' , 'gutenberg_block' , 'simple-days'),
        'more' => esc_html_x('More' , 'gutenberg_block' , 'simple-days'),
        'nextpage' => esc_html_x('Page break' , 'gutenberg_block' , 'simple-days'),
        'separator' => esc_html_x('Separator' , 'gutenberg_block' , 'simple-days'),
        'spacer' => esc_html_x('Spacer' , 'gutenberg_block' , 'simple-days'),
        //'text-columns' => esc_html_x('text-columns' , 'gutenberg_block' , 'simple-days'),
        //Widgets
        'shortcode' => esc_html_x('Shortcode' , 'gutenberg_block' , 'simple-days'),
        'archives' => esc_html_x('Archives' , 'gutenberg_block' , 'simple-days'),
        'categories' => esc_html_x('Categories' , 'gutenberg_block' , 'simple-days'),
        'latest-comments' => esc_html_x('Latest Comments' , 'gutenberg_block' , 'simple-days'),
        'latest-posts' => esc_html_x('Latest Posts' , 'gutenberg_block' , 'simple-days'),

        'embed' => esc_html_x('Embed' , 'gutenberg_block' , 'simple-days'),
      );




      $gutenberg_block['embed_list'] = array(
        'twitter' => esc_html_x('Twitter' , 'gutenberg_block' , 'simple-days'),
        'youtube' => esc_html_x('Youtube' , 'gutenberg_block' , 'simple-days'),
        'facebook' => esc_html_x('Facebook' , 'gutenberg_block' , 'simple-days'),
        'instagram' => esc_html_x('Instagram' , 'gutenberg_block' , 'simple-days'),
        'wordpress' => esc_html_x('WordPress' , 'gutenberg_block' , 'simple-days'),
        'soundcloud' => esc_html_x('SoundCloud' , 'gutenberg_block' , 'simple-days'),
        'spotify' => esc_html_x('Spotify' , 'gutenberg_block' , 'simple-days'),
        'flickr' => esc_html_x('Flickr' , 'gutenberg_block' , 'simple-days'),
        'vimeo' => esc_html_x('Vimeo' , 'gutenberg_block' , 'simple-days'),
        'animoto' => esc_html_x('Animoto' , 'gutenberg_block' , 'simple-days'),
        'cloudup' => esc_html_x('Cloudup' , 'gutenberg_block' , 'simple-days'),
        'collegehumor' => esc_html_x('CollegeHumor' , 'gutenberg_block' , 'simple-days'),
        'dailymotion' => esc_html_x('Dailymotion' , 'gutenberg_block' , 'simple-days'),
        'funnyordie' => esc_html_x('Funny or Die' , 'gutenberg_block' , 'simple-days'),
        'hulu' => esc_html_x('Hulu' , 'gutenberg_block' , 'simple-days'),
        'imgur' => esc_html_x('Imgur' , 'gutenberg_block' , 'simple-days'),
        'issuu' => esc_html_x('Issuu' , 'gutenberg_block' , 'simple-days'),
        'kickstarter' => esc_html_x('Kickstarter' , 'gutenberg_block' , 'simple-days'),
        'meetup-com' => esc_html_x('Meetup.com' , 'gutenberg_block' , 'simple-days'),
        'mixcloud' => esc_html_x('Mixcloud' , 'gutenberg_block' , 'simple-days'),
        'photobucket' => esc_html_x('Photobucket' , 'gutenberg_block' , 'simple-days'),
        'polldaddy' => esc_html_x('Polldaddy' , 'gutenberg_block' , 'simple-days'),
        'reddit' => esc_html_x('Reddit' , 'gutenberg_block' , 'simple-days'),
        'reverbnation' => esc_html_x('ReverbNation' , 'gutenberg_block' , 'simple-days'),
        'screencast' => esc_html_x('Screencast' , 'gutenberg_block' , 'simple-days'),
        'scribd' => esc_html_x('Scribd' , 'gutenberg_block' , 'simple-days'),
        'slideshare' => esc_html_x('Slideshare' , 'gutenberg_block' , 'simple-days'),
        'smugmug' => esc_html_x('SmugMug' , 'gutenberg_block' , 'simple-days'),
        'speaker' => esc_html_x('Speaker' , 'gutenberg_block' , 'simple-days'),
        'ted' => esc_html_x('TED' , 'gutenberg_block' , 'simple-days'),
        'tumblr' => esc_html_x('Tumblr' , 'gutenberg_block' , 'simple-days'),
        'videopress' => esc_html_x('VideoPress' , 'gutenberg_block' , 'simple-days'),
        'wordpress-tv' => esc_html_x('WordPress.tv' , 'gutenberg_block' , 'simple-days'),
      );

//var_dump($gutenberg_block);
      set_query_var( 'gutenberg_block_list', $gutenberg_block );
