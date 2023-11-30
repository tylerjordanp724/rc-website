<?php
/**
 * Red Camel Auto functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Red_Camel_Auto
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Red Camel Auto, use a find and replace
		* to change 'rc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rc', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rc' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rc_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rc_content_width', 640 );
}
add_action( 'after_setup_theme', 'rc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rc_scripts() {
	// adding bootstrap
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), '5.1.3','all');
	// adding our styles
	wp_enqueue_style( 'styles', get_template_directory_uri() .'/css/styles.css', array(), '1.0.0', 'all' );
	// wp_style_add_data( 'rc-style', 'rtl', 'replace' );

	// adding jquery
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js", array(), false, true);
	wp_enqueue_script( 'maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAuUGNsyMUDQ7ioNYCx7qIqCIsMGK9cCRE', array(), true ); 
	// adding our scripts
	// wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array(), '1.0.0', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_style', 'rc_scripts');
add_action( 'wp_enqueue_scripts', 'rc_scripts' );

// Register Custom Post Type
function red_camel_vehicle() {

	$labels = array(
		'name'                  => _x( 'Vehicles', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Vehicle', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Vehicles', 'text_domain' ),
		'name_admin_bar'        => __( 'Vehicle', 'text_domain' ),
		'archives'              => __( 'Vehicle Archives', 'text_domain' ),
		'attributes'            => __( 'Vehicle Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Vehicle:', 'text_domain' ),
		'all_items'             => __( 'All Vehicles', 'text_domain' ),
		'add_new_item'          => __( 'Add New Vehicle', 'text_domain' ),
		'add_new'               => __( 'Add New Vehicle', 'text_domain' ),
		'new_item'              => __( 'New Vehicle', 'text_domain' ),
		'edit_item'             => __( 'Edit Vehicle', 'text_domain' ),
		'update_item'           => __( 'Update Vehicle', 'text_domain' ),
		'view_item'             => __( 'View Vehicle', 'text_domain' ),
		'view_items'            => __( 'View Vehicles', 'text_domain' ),
		'search_items'          => __( 'Search Vehicle', 'text_domain' ),
		'not_found'             => __( 'Vehicle Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Vehicle Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Vehicles list', 'text_domain' ),
		'items_list_navigation' => __( 'Vehilces list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Vehicles list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'vehicle',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Vehicle', 'text_domain' ),
		'description'           => __( 'All vehicles for Red Camel Auto', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields' ),
		'taxonomies'            => array( 'body', 'make', 'model', 'price', 'mileage', 'condition' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-car',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'rc_vehicle', $args );

}
add_action( 'init', 'red_camel_vehicle', 0 );

/**
 * ACF Options Page
 */

 if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Footer Fields',
		'menu_title' => 'Footer',
		'menu_slug' => 'footer-fields'
	));
 }


/**
 * ACF Google Maps API
 * 
 * 
 */
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAuUGNsyMUDQ7ioNYCx7qIqCIsMGK9cCRE';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

