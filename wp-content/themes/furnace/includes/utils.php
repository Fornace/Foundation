<?php
/**
 * furnaceLoop guess based loop function with custom hooks to modify stages.
 * @param string|array
 * @return null basically it publishes content besed on queried object
 */
function furnaceLoop()
{
    global $query_string, $wp_query;
    $defaults = $wp_query->query_vars;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page')) ? get_query_var('page') : 1;

    $args = func_get_args();
    $params = array('paged' => $paged);

    $params = wp_parse_args($params, $query_string);
    if (func_num_args() > 0)
    {
        /*if (is_array($args[0]))
        {
            $params = array()
            $params = wp_parse_args($paged, $defaults);
            $params = wp_parse_args($args[0], $defaults);
        }
        elseif (is_string($args[0]))
        {
            $params = wp_parse_args($paged, $query_string);
            $params = wp_parse_args($args[0], $query_string);
        }*/

        $params = wp_parse_args($args[0], $params);


        $loop = new WP_Query($params);
    }
    else {
        $loop = new WP_Query();
    }
    var_dump($query_string);
    var_dump($params);
    return $loop;
}
