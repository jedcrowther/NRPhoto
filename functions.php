<?php

/**
 * wp_underscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_underscore
 */
if (!function_exists('wp_underscore_setup')) :

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function wp_underscore_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on wp_underscore, use a find and replace
     * to change 'wp_underscore' to the name of your theme in all the template files.
     */
    load_theme_textdomain('wp_underscore', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'wp_underscore'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('wp_underscore_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }

endif;
add_action('after_setup_theme', 'wp_underscore_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_underscore_content_width() {
  $GLOBALS['content_width'] = apply_filters('wp_underscore_content_width', 640);
}

add_action('after_setup_theme', 'wp_underscore_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_underscore_widgets_init() {
  register_sidebar(array(
      'name' => esc_html__('Sidebar', 'wp_underscore'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'wp_underscore'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));

  register_sidebar(array('name' => 'Contact Widget'));
}

add_action('widgets_init', 'wp_underscore_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wp_underscore_scripts() {
  
  wp_register_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
  wp_enqueue_style('Font_Awesome');
  
  wp_enqueue_style('wp_underscore-style', get_stylesheet_uri());
  
  

  wp_enqueue_script('wp_underscore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

  wp_enqueue_script('wp_underscore-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), 1.1, true);
  
//  wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array('jquery'), 1.1, true);
  
  wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), 1.1, true);

  wp_enqueue_script('tweenmax', get_template_directory_uri() . '/js/TweenMax.min.js', array('jquery'), 1.1, true);
  

  
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'wp_underscore_scripts');

//add support for custom logo
function theme_prefix_setup() {

  add_theme_support('custom-logo', array(
      'height' => 480,
      'width' => 1600,
      'flex-width' => true,
      'header-selector' => '.site-title a'
  ));
}

add_action('after_setup_theme', 'theme_prefix_setup');

function theme_prefix_the_custom_logo() {

  if (function_exists('the_custom_logo')) {
    the_custom_logo();
  }
}

// register gallery menu
function register_my_menu() {
  register_nav_menu('gallery-menu', __('Gallery Menu'));
}

add_action('init', 'register_my_menu');


// set up woocommerce support

add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
  add_theme_support('woocommerce');
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load metabox file.
 */
require get_template_directory() . '/inc/metaboxes.php';


// hide description and reviews tabs for woocommerce
add_filter('woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98);

function wcs_woo_remove_reviews_tab($tabs) {
  unset($tabs);
  return $tabs;
}



// Add About & Contact Post Types
add_action('init', 'all_custom_post_types');

function all_custom_post_types() {

  $types = array(
      array('the_type' => 'About',
          'single' => 'About',
          'plural' => 'About'),
      array('the_type' => 'Contact',
          'single' => 'Contact',
          'plural' => 'Contact'),
      array('the_type' => 'Portfolio',
          'single' => 'Portfolio',
          'plural' => 'Portfolio'),
  );

  foreach ($types as $type) {

    $the_type = $type['the_type'];
    $single = $type['single'];
    $plural = $type['plural'];

    $labels = array(
        'name' => _x($plural, 'post type general name'),
        'singular_name' => _x($single, 'post type singular name'),
        'add_new' => _x('Add New ', $single),
        'add_new_item' => __('Add New ' . $single),
        'edit_item' => __('Edit ' . $single),
        'new_item' => __('New ' . $single),
        'view_item' => __('View ' . $single),
        'search_items' => __('Search ' . $plural),
        'not_found' => __('No ' . $plural . ' found'),
        'not_found_in_trash' => __('No ' . $plural . ' found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => ($single . ' Page')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Holds information for the Page',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => false,
    );

    register_post_type($the_type, $args);
  }
}

// removes slug from custom post permalinks
function na_remove_slug( $post_link, $post, $leavename ) {
    if ( ('about' || 'contact') != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

function na_parse_request( $query ) {
    if ( ! $query->is_main_query() ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', (array( 'post', 'about', 'page' ) || array( 'post', 'contact', 'page' ) ));
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );



//change labels for 'Posts' in admin dashboard to 'Galleries'

function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Galleries';
    $submenu['edit.php'][5][0] = 'Galleries';
    $submenu['edit.php'][10][0] = 'Add Gallery';
    $submenu['edit.php'][16][0] = 'Gallery Tags';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Galleries';
    $labels->singular_name = 'Gallery';
    $labels->add_new = 'Add Gallery';
    $labels->add_new_item = 'Add Gallery';
    $labels->edit_item = 'Edit Gallery';
    $labels->new_item = 'Gallery';
    $labels->view_item = 'View Gallery';
    $labels->search_items = 'Search Galleries';
    $labels->not_found = 'No Gallery found';
    $labels->not_found_in_trash = 'No Gallery found in Trash';
    $labels->all_items = 'All Galleries';
    $labels->menu_name = 'Galleries';
    $labels->name_admin_bar = 'Galleries';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );

