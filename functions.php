<?php
define('B_THEME_ROOT', get_template_directory_uri());
define('B_IMG_DIR', B_THEME_ROOT . '/img/');


function setup_blog (){
    add_theme_support('post-thumbnails', array('slide-items','post','gallery-items','audio-items','video-items','page','event-items','staff'));
    add_theme_support('menus');
    };
add_action( 'after_setup_theme', 'setup_blog' );


// function wp_blog_setup_setup() {


// 	// Add default posts and comments RSS feed links to head.
// 	add_theme_support( 'automatic-feed-links' );

// 	/*
// 		* Let WordPress manage the document title.
// 		* By adding theme support, we declare that this theme does not use a
// 		* hard-coded <title> tag in the document head, and expect WordPress to
// 		* provide it for us.
// 		*/
// 	add_theme_support( 'title-tag' );

// 	/*
// 		* Enable support for Post Thumbnails on posts and pages.
// 		*
// 		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
// 		*/
// 	add_theme_support( 'post-thumbnails' );
// 	add_post_type_support( 'portfolio', 'thumbnail' );



// 	/*
// 		* Switch default core markup for search form, comment form, and comments
// 		* to output valid HTML5.
// 		*/
// 	add_theme_support(
// 		'html5',
// 		array(
// 			'search-form',
// 			'comment-form',
// 			'comment-list',
// 			'gallery',
// 			'caption',
// 			'style',
// 			'script',
// 		)
// 	);

// 	// Set up the WordPress core custom background feature.
// 	add_theme_support(
// 		'custom-background',
// 		apply_filters(
// 			'wayup_custom_background_args',
// 			array(
// 				'default-color' => 'ffffff',
// 				'default-image' => '',
// 			)
// 		)
// 	);

// 	// Add theme support for selective refresh for widgets.
// 	add_theme_support( 'customize-selective-refresh-widgets' );

// 	/**
// 	 * Add support for core custom logo.
// 	 *
// 	 * @link https://codex.wordpress.org/Theme_Logo
// 	 */
// 	add_theme_support(
// 		'custom-logo',
// 		array(
// 			'height'      => 250,
// 			'width'       => 250,
// 			'flex-width'  => true,
// 			'flex-height' => true,
// 		)
// 	);
// }

// add_action( 'after_setup_theme', 'wp_blog_setup_setup' );

// Add theme support for title tag (optional)
// function brendon_theme_support()
// {
//     add_theme_support('title-tag');
// }
// add_action('after_setup_theme', 'brendon_theme_support');

//	This theme uses wp_nav_menu() in one location.


// Register the navigation menus
function register_menus() {
    register_nav_menus(
        array(
            'header_navigation' => 'Menu header', // This is the location for the menu
        )
    );
}
add_action('after_setup_theme', 'register_menus', 0);

// добавляем классы к li
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

// Enqueue styles
function brendon_register_styles_scripts() {
    // Enqueue styles
    // wp_enqueue_style('bootstrap-css', get_template_directory_uri() . "/css/bootstrap/bootstrap.min.css", [], '1.0', 'all');
    // wp_enqueue_style('style-css', get_template_directory_uri() . "/css/style.css", ['bootstrap-css'], '1.0', 'all');
     wp_enqueue_style('style-css', get_template_directory_uri() . "/css/style.css", [], '1.0', 'all');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . "/css/swiper/swiper-bundle.min.css", [], '1.0', 'all');
    
    // Enqueue scripts
  // Enqueue scripts
  wp_enqueue_script('swiper-js', get_template_directory_uri() . '/js/swiper-bundle.js', [], '1.0.0', true); // Load in footer
  wp_enqueue_script('slider-js', get_template_directory_uri() . '/js/slider.js', ['swiper-js'], '1.0.0', true); // Ensure Swiper is a dependency
  wp_enqueue_script('myscript', get_template_directory_uri() . '/js/main.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'brendon_register_styles_scripts');
// Ensure scripts are loaded on 404 pages
function load_scripts_on_404() {
    if (is_404()) {
        do_action('wp_enqueue_scripts');
    }
}
add_action('template_redirect', 'load_scripts_on_404');
function add_defer_to_script($tag, $handle) {
    // Add defer to Swiper JS
    if ('swiper-js' === $handle) {
        return str_replace('src', 'defer="defer" src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_defer_to_script', 10, 2);


function register_my_widgets()
{

    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => "blog-sidebar",
        'description'   => 'Description',
        'class'         => '',
        'before_widget' => '<div>',
        'after_widget'  => '</div><div class="space x-small"></div>',
        'before_title'  => '<h5 class="blog-text-uppercase">',
        'after_title'   => "</h5>\n",
        'before_sidebar' => '', // WP 5.6
        'after_sidebar'  => '', // WP 5.6
    ));
}
add_action('widgets_init', 'register_my_widgets');

function register_my_menu() {
    register_nav_menus( array(
        'main_menu' => 'Primary Menu',
        'burger_menu' => 'Burger Menu',
    )); // Регистрация меню с названием 'primary'
}
add_action('after_setup_theme', 'register_my_menu');

add_filter( 'excerpt_more', fn() => '...' );

add_filter( 'excerpt_length', function(){
	return 20;
} );

function custom_breadcrumbs() {
    global $post; // Declare the global $post variable

    if (!is_front_page()) {
        echo '<ul class="breadcrumbs">';
        echo '<li><a href="' . home_url() . '">Главная</a></li>';

        if (is_single()) {
            $categories = get_the_category();
            if (!empty($categories)) {
                $category = $categories[0];
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            echo '<li><span class="current">' . get_the_title() . '</span></li>';
        } elseif (is_page()) {
            if ($post->post_parent) {
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach ($ancestors as $ancestor) {
                    echo '<li><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
            }
            echo '<li><span class="current">' . get_the_title() . '</span></li>';
        } elseif (is_category()) {
            echo '<li><span class="current">' . single_cat_title('', false) . '</span></li>';
        } elseif (is_tag()) {
            echo '<li><span class="current">' . single_tag_title('', false) . '</span></li>';
        } elseif (is_archive()) {
            echo '<li><span class="current">' . post_type_archive_title('', false) . '</span></li>';
        } elseif (is_search()) {
            echo '<li><span class="current">Результаты поиска: ' . get_search_query() . '</span></li>';
        } elseif (is_404()) {
            echo '<li><span class="current">Страница не найдена</span></li>';
        }

        echo '</ul>';
    } else {
        echo '<ul class="breadcrumbs">';
        echo '<li><span class="current">Главная</span></li>';
        echo '</ul>';
    }
}



function cptui_register_my_cpts() {

	/**
	 * Post Type: products.
	 */

	$labels = [
		"name" => esc_html__( "products", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "product", "custom-post-type-ui" ),
		"featured_image" => esc_html__( "Featured image", "custom-post-type-ui" ),
		"set_featured_image" => esc_html__( "Set featured image", "custom-post-type-ui" ),
		"remove_featured_image" => esc_html__( "Remove featured image", "custom-post-type-ui" ),
		"use_featured_image" => esc_html__( "Use as featured image", "custom-post-type-ui" ),
		"archives" => esc_html__( "Product archives", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "products", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "products", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "products", $args );

	/**
	 * Post Type: slider_hero.
	 */

	$labels = [
		"name" => esc_html__( "slider_hero", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "slider_hero", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "my sliders", "custom-post-type-ui" ),
		"all_items" => esc_html__( "all sliders", "custom-post-type-ui" ),
		"add_new" => esc_html__( "add slider", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "add slider", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "edit slider", "custom-post-type-ui" ),
		"new_item" => esc_html__( "new slider", "custom-post-type-ui" ),
		"view_item" => esc_html__( "view sliders", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "slider_hero", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "slider_hero", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "slider_hero", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_products() {

	/**
	 * Post Type: products.
	 */

	$labels = [
		"name" => esc_html__( "products", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "product", "custom-post-type-ui" ),
		"featured_image" => esc_html__( "Featured image", "custom-post-type-ui" ),
		"set_featured_image" => esc_html__( "Set featured image", "custom-post-type-ui" ),
		"remove_featured_image" => esc_html__( "Remove featured image", "custom-post-type-ui" ),
		"use_featured_image" => esc_html__( "Use as featured image", "custom-post-type-ui" ),
		"archives" => esc_html__( "Product archives", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "products", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "products", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "page-attributes" ],
		"show_in_graphql" => false,
        'menu_icon'   => 'dashicons-cart',  // Optional, custom icon for the menu
	];

	register_post_type( "products", $args );
}

add_action( 'init', 'cptui_register_my_cpts_products' );


function cptui_register_my_cpts_slider_hero() {

	/**
	 * Post Type: slider_hero.
	 */

	$labels = [
		"name" => esc_html__( "slider_hero", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "slider_hero", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "my sliders", "custom-post-type-ui" ),
		"all_items" => esc_html__( "all sliders", "custom-post-type-ui" ),
		"add_new" => esc_html__( "add slider", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "add slider", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "edit slider", "custom-post-type-ui" ),
		"new_item" => esc_html__( "new slider", "custom-post-type-ui" ),
		"view_item" => esc_html__( "view sliders", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "slider_hero", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "slider_hero", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "slider_hero", $args );
}

add_action( 'init', 'cptui_register_my_cpts_slider_hero' );

function register_product_taxonomies() {
    // Register custom taxonomy for 'Products'
    register_taxonomy(
        'product_category',  // Taxonomy name
        'products',           // Post type
        array(
            'label' => 'Product Categories',
            'rewrite' => array('slug' => 'product-category'),
            'hierarchical' => true,  // Hierarchical like categories (not tags)
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'register_product_taxonomies');

function create_cases_post_type() {
    register_post_type( 'cases',
        array(
            'labels' => array(
                'name'               => 'Cases',
                'singular_name'      => 'Case',
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Case',
                'edit_item'          => 'Edit Case',
                'new_item'           => 'New Case',
                'view_item'          => 'View Case',
                'search_items'       => 'Search Cases',
                'not_found'          => 'No cases found',
                'not_found_in_trash' => 'No cases found in Trash',
                'all_items'          => 'All Cases',
                'archives'           => 'Case Archives',
                'attributes'         => 'Case Attributes',
            ),
            'public'      => true,
            'has_archive' => true,
            'show_in_rest' => true,  // Enable for Gutenberg editor
            'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'taxonomies'  => array( 'category', 'post_tag' ),  // Optional, if you want categories and tags for cases
            'menu_icon'   => 'dashicons-archive',  // Optional, custom icon for the menu
        )
    );
}
add_action( 'init', 'create_cases_post_type' );


// function handle_contact_form() {
//     if ( isset($_POST['action']) && $_POST['action'] == 'custom_contact_form' ) {
  
//         $name    = sanitize_text_field( $_POST['name'] );
//         $email   = sanitize_email( $_POST['email'] );
//         $message = sanitize_textarea_field( $_POST['message'] );
  
//         // You can add your custom logic here, like sending an email
  
//         // For example:
//         $to      = 'lomserg@gmail.com';
//         $subject = 'New Contact Form Submission';
//         $headers = array('Content-Type: text/html; charset=UTF-8');
//         $message_body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
  
//         wp_mail( $to, $subject, $message_body, $headers );
  
//         // Optionally, you can redirect the user after submission
//         wp_redirect( home_url('/thank-you/') );
//         exit;
//     }
// }
  
// add_action( 'admin_post_nopriv_custom_contact_form', 'handle_contact_form' );
// add_action( 'admin_post_custom_contact_form', 'handle_contact_form' );