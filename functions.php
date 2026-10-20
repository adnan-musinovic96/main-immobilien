<?php

function main_immobilien_enqueue_assets()
{
    wp_enqueue_style(
        'main_immobilien_style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
}

function main_immobilien_enqueue_scripts()
{
    wp_enqueue_script(
        'mein_immobilien_custom',
        get_template_directory_uri() . '/assets/js/main.js',
        array('slick'),
        '1.0.0',
        array('in_footer' => true)
    );
}

function main_immobilien_enqueue_slick(){
    wp_enqueue_style(
        'slick-style',
        get_theme_file_uri('assets/vendor/slick/slick.css'),
        array(),
        '1.8.1'
    );

    wp_enqueue_script(
        'slick',
        get_theme_file_uri('assets/vendor/slick/slick.min.js'),
        array('jquery'),
        '1.8.1',
        true
    );
}

add_action('wp_enqueue_scripts', 'main_immobilien_enqueue_assets');
add_action('wp_enqueue_scripts', 'main_immobilien_enqueue_scripts');
add_action('wp_enqueue_scripts', 'main_immobilien_enqueue_slick');

add_theme_support("title-tag");

function mytheme_setup()
{
    // Add featured image support
    add_theme_support('post-thumbnails');

    // Optional: Set default thumbnail size
    set_post_thumbnail_size(800, 500, true); // width, height, hard crop

    // Optional: Add custom image sizes
    add_image_size('custom-blog-thumb', 400, 250, true);
}
add_action('after_setup_theme', 'mytheme_setup');
