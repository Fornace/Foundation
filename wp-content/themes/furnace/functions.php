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



add_filter('fs_loop_default_args', function(){
    return array(
        'posts_per_page' => 1,
        );
}, 1);