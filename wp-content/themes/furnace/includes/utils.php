<?php
/**
 * furnaceLoop guess based loop function with custom hooks to modify stages.
 * @param string|array
 * @return null basically it publishes content besed on queried object
 */

function furnaceLoop()
{
    global $query_string, $wp_query;
    $temp = $wp_query;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page')) ? get_query_var('page') : 1;

    $args = func_get_args();
    $params = array('paged' => $paged);

    $params = wp_parse_args($params, $query_string);
    if (func_num_args() > 0)
    {
        $params = wp_parse_args($args[0], $params);
        $loop = new WP_Query($params);
    }
    else
    {
        $wp_query = $temp;
        $loop = $wp_query;
    }

    return $loop;
}

function fsGetImages()
{
    global $post;

    $images = new stdClass();


}