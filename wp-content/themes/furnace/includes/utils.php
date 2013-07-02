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

function fsGetImages($size = 'thumbnail')
{
    $result = array();

    if($images = get_children(array(
        'post_parent'    => get_the_ID(),
        'post_type'      => 'attachment',
        'numberposts'    => -1, // show all
        'post_status'    => null,
        'post_mime_type' => 'image',
    ))) {
        foreach ($images as $key => $image) {
            $result[$k]['attimg'] = wp_get_attachment_image($image->ID, $size);
            $result[$k]['atturl'] = wp_get_attachment_url($image->ID);
            $result[$k]['attlink'] = wp_get_attachment_link($image->ID);
            $result[$k]['postlink'] = get_permalink($image->post_parent);
            $result[$k]['atttitle'] = apply_filters('the_title', $image->post_title);
            $result[$k]['attdesc'] = apply_filters('the_content', $image->post_content);
        }
    }

}