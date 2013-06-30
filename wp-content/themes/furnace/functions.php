<?php
/**
 * @package Wordpress
 * @subpackage furnace
 * The Main functions.php file for "Furnace".
 */
if (!defined('FURNACE_INCLUDE')) {
    define('FURNACE_INCLUDE', get_template_directory() . '/includes');
}
require_once FURNACE_INCLUDE . '/init.php';

if (!function_exists('furnace_setup')) :

    function furnace_setup()
    {
        load_theme_textdomain('furnace', get_template_directory() . '/languages');

        add_editor_style();

        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('post-formats', array('aside', 'link', 'image', 'video', 'quote', 'status'));
    }

    add_action('after_theme_setup', 'furnace_setup');
endif;


if (!function_exists('furnace_manage_assets')) :
function furnace_manage_assets()
{
    wp_deregister_script('jquery');

    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9/jquery.min.js');

    wp_enqueue_script('fs_app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '0.0.1', TRUE );
    wp_enqueue_script('fs_app', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'app'), '0.0.1', TRUE );

    wp_enqueue_style('fs_style', get_template_directory_uri() . '/assets/css/master.css');
}
add_action('wp_enqueue_scripts', 'furnace_manage_assets');
endif;