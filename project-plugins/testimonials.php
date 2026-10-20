<?php

/**
 * Plugin name: Testimonials
 * Description: A plugin to manage Testimonials
 * Version: 1.0
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('init', 'testimonials_register_post_type');

function testimonials_register_post_type(){
    $args = array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'search_items' => 'Search Testimonial',
            'not_found' => 'No Testimonials Found',
            'not_found_in_trash' => 'No Testimonials in the trash',
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('custom-fields', 'title', 'editor')
    );

    register_post_type('testimonials', $args);
    register_post_meta('testimonials', 'rating', array('rating' => 'intiger', 'single' => true, 'show_in_rest' => true));
    register_post_meta('testimonials', 'location', array('type' => 'string', 'single' => true, 'show_in_rest' => true));
}