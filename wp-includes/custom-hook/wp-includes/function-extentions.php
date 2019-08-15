<?php

add_filter("wp_change_cast_for_post_in_breadcrumb","wp_change_cast_for_post_in_breadcrumb");
function wp_change_cast_for_post_in_breadcrumb(){
    $delimiter    = ' <span class="chevron">&#8250;</span> '; // delimiter between crumbs
    $before       = '<span class="breadcrumb-current">'; // tag before the current crumb
    $after        = '</span>'; // tag after the current crumb
    $show['current'] = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $show['home']    = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show['search']  = 0; // 1 - show breadcrumbs on the search page, 0 - don't show
    /* === END OF OPTIONS === */

    $home_link   = home_url( '/' );
    $before_link = '<span class="breadcrumb" typeof="v:Breadcrumb">';
    $after_link  = '</span>';
    $link_att    = ' rel="v:url" property="v:title"';
    $link        = $before_link . '<a' . $link_att . ' href="%1$s">%2$s</a>' . $after_link;


    $post        = get_queried_object();
    $post_parent_page = get_post_meta(get_the_ID(),"post_page_parent", true);
    $parent_id   = $post_parent_page !== "" ? $post_parent_page : $post->post_parent;
    $text['home']     = __( 'Home', 'responsive-mobile' ); // text for the 'Home' link
    $html_output = '';
    $html_output .= '<div class="breadcrumb-list" xmlns:v="http://rdf.data-vocabulary.org/#"> <div class="breadcrumb-container">' . sprintf( $link, $home_link, $text['home'] ) . $delimiter;
    $breadcrumbs = array();
    while( $parent_id ) {
        $page_child    = get_page( $parent_id );
        $breadcrumbs[] = sprintf( $link, get_permalink( $page_child->ID ), get_the_title( $page_child->ID ) );
        $post_parent_page = get_post_meta($page_child->ID,"post_page_parent", true);
        $parent_id   = $post_parent_page !== "" ? $post_parent_page : $page_child->post_parent;
    }
    $breadcrumbs = array_reverse( $breadcrumbs );
    for( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
        $html_output .= $breadcrumbs[$i];
        if( $i != count( $breadcrumbs ) - 1 ) {
            $html_output .= $delimiter;
        }
    }
    if( 1 == $show['current'] ) {
        $html_output .= $delimiter . $before . get_the_title() . $after;
    }
    return $html_output;
}