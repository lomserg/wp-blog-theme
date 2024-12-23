<?php
define('B_THEME_ROOT', get_template_directory_uri());
define('B_IMG_DIR', B_THEME_ROOT . '/img/');

// Add theme support for title tag (optional)
function brendon_theme_support()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'brendon_theme_support');

// Enqueue styles
function brendon_register_styles()
{
    // Enqueue Bootstrap first for dependency
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . "/css/bootstrap/bootstrap.min.css", array(), '1.0', 'all');

    // Enqueue custom styles
    wp_enqueue_style('style-css', get_template_directory_uri() . "/css/style.css", array('bootstrap-css'), '1.0', 'all');
    wp_enqueue_style('media-css', get_template_directory_uri() . "/css/media.css", array('bootstrap-css'), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'brendon_register_styles');


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
    register_nav_menu('main_menu', 'Primary Menu'); // Регистрация меню с названием 'primary'
}
add_action('after_setup_theme', 'register_my_menu');

add_filter( 'excerpt_more', fn() => '...' );

add_filter( 'excerpt_length', function(){
	return 20;
} );

function custom_breadcrumbs() {
    $delimiter = '&gt;'; // Delimiter between breadcrumb links
    $home = 'Главная'; // Text for the Home link
    $before = '<span class="current">'; // Before current page text
    $after = '</span>'; // After current page text

    // Start breadcrumb if we're not on the home or front page, or if the page is paginated
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<div class="breadcrumb"><nav class="container"><ul>';
        
        // Home link
        echo '<li><a href="' . home_url() . '">' . $home . '</a></li>';

        // Check if we are on a category page
        if (is_category()) {
            // Display "Блог" before the category name
            echo '<li>' . $before . 'Блог' . $after . $delimiter . '</li>';
            
            // Get the current category object
            $category = get_queried_object();
            echo '<li>' . $before . 'Категория: ' . $category->name . $after . '</li>'; // Display category name
        } elseif (is_single()) {
            // If it's a single post, display the post title
            echo '<li>' . $before . get_the_title() . $after . '</li>';
        } else {
            // Default breadcrumb for other pages
            echo '<li>' . $before . 'Блог' . $after . '</li>';
        }

        echo '</ul></nav></div>';
    }
}

// Register support for post thumbnails in your theme
function my_theme_setup(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');

// Custom Post Type: 'products'
function cptui_register_my_cpts() {
    $labels = [
        "name" => esc_html__( "products", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "product", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => esc_html__( "products", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "rewrite" => [ "slug" => "products" ],
        "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields"], // Thumbnail support
    ];

    register_post_type( "products", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );