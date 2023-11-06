<?php
/**
 * starter_theme functions and definitions
 *
 * @package starter_theme
 * @since starter_theme 1.0
 */

	add_action( 'init', 'mcrh_theme_setup' );
	function mcrh_theme_setup() {
		// Load scripts
		if (!is_admin()) add_action("wp_enqueue_scripts", "load_js", 11);
		function load_js() {
			wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), false, false);
			wp_deregister_script('jquery');
			wp_enqueue_script('jquery', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), null, true);
			wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), null, true);
			wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), null, true);
		}

		remove_action( 'wp_head', 'wlwmanifest_link');
		remove_action ('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');
		remove_action( 'wp_head', 'wp_shortlink_wp_head');
	}

	// Register Custom Menu
	function register_menu() {
		register_nav_menu('main-menu', __('Main Menu'));
	}
	add_action('init', 'register_menu');

	// Remove inline image dimensions
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
	function remove_thumbnail_dimensions( $html ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}

	// Custom WYSIWYG toolbar
	add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
	function my_toolbars( $toolbars ) {
		$toolbars['Simple' ] = array();
		$toolbars['Simple' ][1] = array('bold' , 'italic' , 'link', 'unlink' );
		return $toolbars;
	}


	// Custom Excerpt Length

	function custom_excerpt_length( $length ) {
    return 30;
	}
	add_filter( 'excerpt_length','custom_excerpt_length', 999 ); //sets the excerpt length

	

	// Adding Custom Taxonomies

	add_action( 'init', 'add_custom_taxonomies', 0 );

	function add_custom_taxonomies() {
		$labels = array(
			'name'			 	=> _x(	'Year', 'taxonomy general name' ),
			'singular_name'  	=> _x(	'Year', 'taxonomy singular name' ),
			'search_items'   	=> __(	'Search Years' ),
			'all_items'      	=> __(	'All Years' ),
			'parent_item'       => __(	'Parent Year' ),
			'parent_item_colon' => __(	'Parent Year:' ),
			'edit_item' 		=> __(	'Edit Year' ),
			'update_item'		=> __(	'Update Year' ),
			'add_new_item'		=> __(	'Add New Year' ),
			'new_item_name'		=> __(	'New Year' ),
			'menu_name'			=> __(	'Year' ),
		);

		$args = array(
			'hierarchical' 		=> false,
			'labels'			=> $labels,
			'show_ui' 			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
			'rewrite'			=> array( 'slug' => 'year' ),
		);

		register_taxonomy( 'year', array('post'), $args );

		$labels = array(
			'name'			 	=> _x(	'Topic', 'taxonomy general name' ),
			'singular_name'  	=> _x(	'Topic', 'taxonomy singular name' ),
			'search_items'   	=> __(	'Search Topics' ),
			'all_items'      	=> __(	'All Topics' ),
			'parent_item'       => __(	'Parent Topic' ),
			'parent_item_colon' => __(	'Parent Topic:' ),
			'edit_item' 		=> __(	'Edit Topic' ),
			'update_item'		=> __(	'Update Topic' ),
			'add_new_item'		=> __(	'Add New Topic' ),
			'new_item_name'		=> __(	'New Topic' ),
			'menu_name'			=> __(	'Topic' ),
		);

		$args = array(
			'hierarchical' 		=> false,
			'labels'			=> $labels,
			'show_ui' 			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
			'rewrite'			=> array( 'slug' => 'topic' ),
		);

		register_taxonomy( 'topic', array('post'), $args );	


		$labels = array(
			'name'			 	=> _x(	'People', 'taxonomy general name' ),
			'singular_name'  	=> _x(	'People', 'taxonomy singular name' ),
			'search_items'   	=> __(	'Search People' ),
			'all_items'      	=> __(	'All People' ),
			'parent_item'       => __(	'Parent People' ),
			'parent_item_colon' => __(	'Parent People:' ),
			'edit_item' 		=> __(	'Edit People' ),
			'update_item'		=> __(	'Update People' ),
			'add_new_item'		=> __(	'Add New People' ),
			'new_item_name'		=> __(	'New People' ),
			'menu_name'			=> __(	'People' ),
		);

		$args = array(
			'hierarchical' 		=> false,
			'labels'			=> $labels,
			'show_ui' 			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
			'rewrite'			=> array( 'slug' => 'people' ),
		);

		register_taxonomy( 'people', array('post'), $args );


		$labels = array(
			'name'			 	=> _x(	'State', 'taxonomy general name' ),
			'singular_name'  	=> _x(	'State', 'taxonomy singular name' ),
			'search_items'   	=> __(	'Search State' ),
			'all_items'      	=> __(	'All State' ),
			'parent_item'       => __(	'Parent State' ),
			'parent_item_colon' => __(	'Parent State:' ),
			'edit_item' 		=> __(	'Edit State' ),
			'update_item'		=> __(	'Update State' ),
			'add_new_item'		=> __(	'Add New State' ),
			'new_item_name'		=> __(	'New State' ),
			'menu_name'			=> __(	'State' ),
		);

		$args = array(
			'hierarchical' 		=> false,
			'labels'			=> $labels,
			'show_ui' 			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
			'rewrite'			=> array( 'slug' => 'state' ),
		);

		register_taxonomy( 'state', array('post'), $args );		
	}

	//Add Category classes to posts
	function year_tag($separator = ' ') {
       $subcategories = (array) get_the_terms($post->ID, 'year');

       $thesublist = '';
       foreach($subcategories as $subcategory) {
               $thesublist .= $separator . $subcategory->slug;
       }
       echo $thesublist;
	}

	function topic_tag($separator = ' ') {
       $subcategories = (array) get_the_terms($post->ID, 'topic');

       $thesublist = '';
       foreach($subcategories as $subcategory) {
               $thesublist .= $separator . $subcategory->slug;
       }
       echo $thesublist;
	}

	function people_tag($separator = ' ') {
       $subcategories = (array) get_the_terms($post->ID, 'people');

       $thesublist = '';
       foreach($subcategories as $subcategory) {
               $thesublist .= $separator . $subcategory->slug;
       }
       echo $thesublist;
	}

	function state_tag($separator = ' ') {
       $subcategories = (array) get_the_terms($post->ID, 'state');

       $thesublist = '';
       foreach($subcategories as $subcategory) {
               $thesublist .= $separator . $subcategory->slug;
       }
       echo $thesublist;
	}
?>