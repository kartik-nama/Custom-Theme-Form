<?php
// Defining Absolute Path


if (!defined('ABSPATH')) {
    // header('Location: /theme-cust');

    die();
}



// Support For Feature Image

add_theme_support('post-thumbnails');


// Custom Post Type 'Form'
function form_post_type()
{
    register_post_type(
        'form',
        array(
            'labels' => array(
                'name' => __('Forms'),
                'singular_name' => __('Form'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'rewrite' => array('slug' => 'forms')
        )
    );
}

add_action('init', 'form_post_type');   // Initializing Action Hook For Custom Post Type


// For Removing Default Wordpress Custom Field MetaBox 

add_action('add_meta_boxes', 'remove_custom_fields_metabox');

function remove_custom_fields_metabox() {
    remove_meta_box('postcustom', 'form', '20');
}



?>

