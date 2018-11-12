<?php
  defined('ABSPATH') or die("Please don't run this script.");
/**
 * @package Simple Days
*/

function simple_days_breadcrumbs(){


    $home_link        = esc_url(home_url('/'));
    $home_text        = esc_attr__( 'Home', 'simple-days' );
    $link_before      = '<li><i class="fa '.esc_attr(get_theme_mod( 'simple_days_breadcrumbs_treeicon','fa-folder-open-o')).'" aria-hidden="true"></i> ';
    $link_after       = '</li>';
    $link_prop_before = '<span class="breadcrumb_tree">';
    $link_prop_after  = '</span>';

    $link             = $link_before . '<a href="%1$s"><span class="">%2$s</span></a>' . $link_after;
    $delimiter        = ' '.get_theme_mod( 'simple_days_breadcrumbs_delimiter','&raquo;').' ';
    $before           = '<li><i class="fa '.esc_attr(get_theme_mod( 'simple_days_breadcrumbs_currenticon','fa-file-text-o')).'" aria-hidden="true"></i> <span class="current">';
    $after            = '</span></li>';
    $page_addon       = '';
    $breadcrumb_trail = '';
    $category_links   = '';




    $wp_the_query   = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();


    if ( is_singular() )
    {


        $post_object = sanitize_post( $queried_object );


        $title          = esc_html($post_object->post_title);
        $parent         = $post_object->post_parent;
        $post_type      = $post_object->post_type;
        $post_id        = $post_object->ID;
        $post_link      = $before . $title . $after;
        $parent_string  = '';
        $post_type_link = '';

        if ( 'post' === $post_type )
        {

            $categories = get_the_category( $post_id );
            if ( $categories ) {

                $category  = $categories[0];
                $category_links = get_category_parents( $category, true, $delimiter );
                $category_links = mb_ereg_replace(">(.*?)<\/a>",">$link_prop_before\\1$link_prop_after</a></li>",$category_links);
                $category_links = str_replace( '<a',   $link_before . '<a', $category_links );
            }
        }

        if ( !in_array( $post_type, array('post', 'page', 'attachment') ) )
        {
            $post_type_object = get_post_type_object( $post_type );
            $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

            $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
        }


        if ( 0 !== $parent )
        {
            $parent_links = array();
            while ( $parent ) {
                $post_parent = get_post( $parent );

                $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse( $parent_links );

            $parent_string = implode( $delimiter, $parent_links );
        }


        if ( $parent_string ) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ( $post_type_link )
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ( $category_links )
            $breadcrumb_trail = $category_links . $breadcrumb_trail;

    }


    if( is_archive() )
    {
        if (    is_category()
             || is_tag()
             || is_tax()
        ) {

            $term_object        = get_term( $queried_object );
            $taxonomy           = $term_object->taxonomy;
            $term_id            = $term_object->term_id;
            $term_name          = $term_object->name;
            $term_parent        = $term_object->parent;
            $taxonomy_object    = get_taxonomy( $taxonomy );
            $current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
            $parent_term_string = '';

            if ( 0 !== $term_parent )
            {

                $parent_term_links = array();
                while ( $term_parent ) {
                    $term = get_term( $term_parent, $taxonomy );

                    $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

                    $term_parent = $term->parent;
                }

                $parent_term_links  = array_reverse( $parent_term_links );
                $parent_term_string = implode( $delimiter, $parent_term_links );
            }

            if ( $parent_term_string ) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif ( is_author() ) {

            $breadcrumb_trail = esc_attr__( 'Author archive for ', 'simple-days' ) .  $before . $queried_object->data->display_name . $after;

        } elseif ( is_date() ) {

            $year     = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day      = $wp_the_query->query_vars['day'];


            if ( $monthnum ) {
                $date_time  = DateTime::createFromFormat( '!m', $monthnum );
                $month_name = $date_time->format( 'F' );
            }

            if ( is_year() ) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif( is_month() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif( is_day() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
                $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif ( is_post_type_archive() ) {

            $post_type        = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object( $post_type );

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

        }
    }


    if ( is_search() && !is_paged()) {
        
        $breadcrumb_trail = $before . sprintf( esc_html__( 'Search query for: %s', 'simple-days' ) , get_search_query()) . $after;
    }

    if ( is_search() && is_paged()) {
        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        
        $breadcrumb_trail = $before . sprintf(esc_attr__( 'Search query for: %s', 'simple-days' ) , get_search_query()). sprintf( esc_attr__( ' ( Page %s )' , 'simple-days' ), number_format_i18n( $current_page ) ) . $after;
    }


    if ( is_404() ) {
        $breadcrumb_trail = $before . esc_attr__( 'Error 404', 'simple-days' ) . $after;
    }


    if ( is_paged() && !is_search() ) {
        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        
        $page_addon   = $before . sprintf( esc_attr__( ' ( Page %s )' , 'simple-days' ), number_format_i18n( $current_page ) ) . $after;
    }

    $breadcrumb_output_link  = '';
    $breadcrumb_output_link .= '<div><ol id="breadcrumb" class="breadcrumb">';
    if (    is_home()
         || is_front_page()
    ) {

        if ( is_paged() ) {

            $breadcrumb_output_link .= '<li><i class="fa '.get_theme_mod( 'simple_days_breadcrumbs_homeicon','fa-home').'" aria-hidden="true"></i> <a href="' . $home_link . '"><span class="breadcrumb_home">' . $home_text . '</span></a></li>';
            $breadcrumb_output_link .= $page_addon;
        }
    } else {

        $breadcrumb_output_link .= '<li><i class="fa '.get_theme_mod( 'simple_days_breadcrumbs_homeicon','fa-home').'" aria-hidden="true"></i> <a href="' . $home_link . '"><span class="breadcrumb_home">' . $home_text . '</span></a></li>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }
    $breadcrumb_output_link .= '</ol></div><!-- .breadcrumbs -->';

    preg_match_all("|<a href=\"(.*?)\".*?><span class=\".*?\">(.*?)</span></a>|mis",$breadcrumb_output_link,$matches);
    $link_prop_count = count($matches[1])-1;
    $count=2;
    $i=1;
    $site_url = esc_url( home_url( '/' ) );
    $site_title = esc_attr( get_bloginfo( 'name', 'display' ) );

    $post_title = get_the_title()=="" ? esc_attr__( 'No title', 'simple-days' ) :esc_attr( get_the_title());

    $post_url = esc_url( get_permalink());
    $breadcrumb_json_ld = <<<EOF
<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement":
          [
            {
             "@type": "ListItem",
             "position": 1,
             "item":
             {
               "@id": "{$site_url}",
               "name": "{$site_title}"
             }
            },\n
EOF;
            while ($link_prop_count != 0) {
                $breadcrumb_json_ld .= <<<EOF
            {
             "@type": "ListItem",
             "position": $count,
             "item":
             {
               "@id": "{$matches[1][$i]}",
               "name": "{$matches[2][$i]}"
             }
            },\n
EOF;
                $link_prop_count--;
                $count++;
                $i++;
            }
            $breadcrumb_json_ld .= <<<EOF
            {
             "@type": "ListItem",
             "position": {$count},
             "item":
             {
               "@id": "$post_url",
               "name": "$post_title"
             }
            }
          ]
        }
        </script>
EOF;
    if(get_theme_mod( 'simple_days_breadcrumbs_display','left') == 'none'){
       $breadcrumb_output_link= '';
    }else{
      if(get_theme_mod( 'simple_days_breadcrumbs_current',true) == false){
         $str = '/<\/li>'.get_theme_mod( 'simple_days_breadcrumbs_delimiter',' &raquo; ').'<li><i class="fa '.get_theme_mod( 'simple_days_breadcrumbs_currenticon','fa-file-text-o').'" aria-hidden="true"><\/i> <span class=\"current\">(.*)<\/span><\/li>/u';
         $breadcrumb_output_link = preg_replace( $str , '</li>' , $breadcrumb_output_link ,1);
      }
    }
    $breadcrumb_output_link = $breadcrumb_json_ld.$breadcrumb_output_link;
    echo $breadcrumb_output_link;
}
