<?php


//// Add About & Contact Post Types
//add_action('init', 'all_custom_post_types');
//
//function all_custom_post_types() {
//
//  $types = array(
//      array('the_type' => 'About',
//          'single' => 'About',
//          'plural' => 'About'),
//      array('the_type' => 'Contact',
//          'single' => 'Contact',
//          'plural' => 'Contact'),
//      array('the_type' => 'Portfolio',
//          'single' => 'Portfolio',
//          'plural' => 'Portfolio'),
//  );
//
//  foreach ($types as $type) {
//
//    $the_type = $type['the_type'];
//    $single = $type['single'];
//    $plural = $type['plural'];
//
//    $labels = array(
//        'name' => _x($plural, 'post type general name'),
//        'singular_name' => _x($single, 'post type singular name'),
//        'add_new' => _x('Add New ', $single),
//        'add_new_item' => __('Add New ' . $single),
//        'edit_item' => __('Edit ' . $single),
//        'new_item' => __('New ' . $single),
//        'view_item' => __('View ' . $single),
//        'search_items' => __('Search ' . $plural),
//        'not_found' => __('No ' . $plural . ' found'),
//        'not_found_in_trash' => __('No ' . $plural . ' found in Trash'),
//        'parent_item_colon' => '',
//        'menu_name' => ($single . ' Page')
//    );
//
//    $args = array(
//        'labels' => $labels,
//        'description' => 'Holds information for the Page',
//        'public' => true,
//        'menu_position' => 5,
//        'supports' => array('title', 'editor', 'thumbnail'),
//        'has_archive' => false,
//    );
//
//    register_post_type($the_type, $args);
//  }
//}

//// removes slug from custom post permalinks
//function na_remove_slug( $post_link, $post, $leavename ) {
//    if ( ('about' || 'contact') != $post->post_type || 'publish' != $post->post_status ) {
//        return $post_link;
//    }
//    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
//    return $post_link;
//}
//add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );
//
//function na_parse_request( $query ) {
//    if ( ! $query->is_main_query() ) {
//        return;
//    }
//    if ( ! empty( $query->query['name'] ) ) {
//        $query->set( 'post_type', (array( 'post', 'about', 'page' ) || array( 'post', 'contact', 'page' ) ));
//    }
//}
//add_action( 'pre_get_posts', 'na_parse_request' );
//