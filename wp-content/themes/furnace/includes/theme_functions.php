<?php
 add_action('init', 'fsSetup');
 if (!function_exists('fsSetup')) :
 function fsSetup()
    {
        load_theme_textdomain('furnace', get_template_directory() . '/languages');

        add_editor_style();

        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('post-formats', array('aside', 'link', 'image', 'video', 'quote', 'status'));
    }
endif;


if (!function_exists('fsManageAssets')) :
function fsManageAssets()
{
    wp_deregister_script('jquery');

    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9/jquery.min.js', NULL, NULL);

    wp_enqueue_script('fs_app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '0.0.1', TRUE );
    wp_enqueue_script('fs_app', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'app'), '0.0.1', TRUE );

    wp_enqueue_style('fs_style', get_template_directory_uri() . '/assets/css/master.css');
}
add_action('wp_enqueue_scripts', 'fsManageAssets');
endif;