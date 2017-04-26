<?php


//global $pagenow;
//
//vvar_dump( $_GET['post'] );
//    die();
//
//    if ( '232' == get_post_meta( $post->ID) ) 
//      


      {
function register_meta_boxes( $meta_boxes ) {
  
  $prefix = 'prefix_';
  
  //add metabox to Gallery Posts for hover image
    $meta_boxes[] = array(
      'title' => esc_html__('Hover Label Image', 'textdomain'),
      'fields' => array(
          array(
              'id' => 'hover-image',
              'name' => esc_html__('Image', 'textdomain'),
              'type' => 'image_upload',
              'force_delete' => false,
              'max_file_uploads' => 1,
          ),
      ),
  );
    
if ($_GET['post'] === '259') {    
    //add metaboxes to Contact Page
    $meta_boxes[] = array(
        'title'      => __( 'Contact Details', 'textdomain' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'id'   => 'email',
                'name' => __( 'Email', 'textdomain' ),
                'type' => 'email',
            ),
            array(
                'id'   => 'phone',
                'name' => __( 'Phone Number', 'textdomain' ),
                'type' => 'text',
            ),
        )
    );
    
}    
        //add metaboxes to About Page
    
if ($_GET['post'] === '232') {

    $meta_boxes[] = array(
        'title'      => __( 'About Me Details', 'textdomain' ),
        'post_types' => array( 'page' ),
        'fields'     => array(
            
            array(
                'id'   => 'about-title',
                'name' => __( 'About Title', 'textdomain' ),
                'type' => 'text',
            ),
            array(
              'id' => 'about-image',
              'name' => esc_html__('About Me Image', 'textdomain'),
              'type' => 'image_upload',
              'force_delete' => false,
              'max_file_uploads' => 1,
          ),
            
            
        )
          
    );

  $meta_boxes[] = array(
        'title'      => __( 'Gear Details', 'textdomain' ),
        'post_types' => array( 'page' ),
        'fields'     => array(
            array(
                'id'   => 'gear-title',
                'name' => __( 'Gear Title', 'textdomain' ),
                'type' => 'text',
            ),
            array(
              'id' => 'gear-image',
              'name' => esc_html__('Gear Background Image', 'textdomain'),
              'type' => 'image_upload',
              'force_delete' => false,
              'max_file_uploads' => 1,
          ),
          array(
                'id'   => 'gear-list',
                'name' => __( 'Gear List', 'textdomain' ),
                'type' => 'wysiwyg',
            ),
        )
    );
}

    return $meta_boxes;

}
    
    
add_filter( 'rwmb_meta_boxes', 'register_meta_boxes' );


}