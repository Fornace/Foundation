<?php
function furnaceLoop()
{
    global $query_string, $wp_query;
    $args = func_get_args();
    $params = array();
    if (func_num_args() > 0)
    {
        if (is_array($args))
        {
            $params = $args;
        }
        elseif (is_string(var))
        {
            $params = $query_string . $args;
        }
    }
}