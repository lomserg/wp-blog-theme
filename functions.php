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
