<?php
function my_portfolio_setup(){
    register_post_type('project', [
        'labels' => [
            'name' => __('Projects'),
            'singular_name' => __('Project'),
        ],
        'public' => true,
        'has_archive' => 'projects',
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => ['slug' => 'projects'],
    ]);
}
add_action('init', 'my_portfolio_setup');

add_theme_support('post-thumbnails');

function my_portfolio_enqueue_styles(){
    wp_enqueue_style('portfolio-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Montserrat:wght@400;700&display=swap', [], null);
    wp_enqueue_style('my-portfolio-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_portfolio_enqueue_styles');

function register_project_categories(){
    register_taxonomy('project_category', 'project', [
        'labels' => [
            'name' => 'Project Categories',
            'singular_name' => 'Project Category',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'public' => true,
        'publicly_queryable' => true,
        'rewrite' => ['slug' => 'project-category'],
    ]);
}
add_action('init', 'register_project_categories');