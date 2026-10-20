<?php

/**
 * Plugin name: Immobilien
 * Description: A plugin to manage Immobilien
 * Version: 1.0
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('init', 'immobilien_register_post_type');


function immobilien_register_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Immobilien',
            'singular_name' => 'Immobilien',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Immobilien',
            'edit_item' => 'Edit Immobilien',
            'new_item' => 'New Immobilien',
            'view_item' => 'View Immobilien',
            'search_items' => 'Search Immobilien',
            'not_found' => 'No Immobilien Found',
            'not_found_in_trash' => 'No Immobiliens in the trash',

        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );

    register_post_type('immobilie', $args);
    register_post_meta('immobilie', 'preis', array('type' => 'number', 'single' => true, 'show_in_rest' => true));
    register_post_meta('immobilie', 'wohnflaeche', array('type' => 'number', 'single' => true, 'show_in_rest' => true));
    register_post_meta('immobilie', 'zimmer', array('type' => 'number', 'single' => true, 'show_in_rest' => true));
    register_taxonomy('ort', 'immobilie', array('label' => 'Ort', 'public' => true, 'show_in_rest' => true, 'hierarchical' => true));
    register_taxonomy('angebot', 'immobilie', array('label' => 'Angebot', 'public' => true, 'show_in_rest' => true, 'hierarchical' => true));
    register_taxonomy('immobilientyp', 'immobilie', array('label' => 'Immobilientyp', 'public' => true, 'show_in_rest' => true, 'hierarchical' => true));
}