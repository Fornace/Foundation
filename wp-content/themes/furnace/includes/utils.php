<?php
/**
 * furnaceLoop guess based loop function with custom hooks to modify stages.
 * @param string|array
 * @return null [basically it publishes content besed on queried object]
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
/**
 * Retrieves useful information about post attachment images
 * @param  string $size [Optional "size" of attachment image such as, 'thumbnail', 'medium', 'full'. Default to 'thumbnail']
 * @return array|FALSE       [Returns array on success or FALSE if there is no image from the post]
 */
function fsGetImages($size = 'thumbnail')
{
    global $post;
    $result = array();

    if($images = get_children(array(
        'post_parent'    => $post->ID,
        'post_type'      => 'attachment',
        'numberposts'    => -1, // show all
        'post_status'    => null,
        'post_mime_type' => 'image',
    )))
    {

        foreach ($images as $key => $image)
        {
            if ($image->ID === get_post_thumbnail_id($post->ID))
            {
                $result['thumb']['thumb_img'] = get_the_post_thumbnail($post->ID);
                $result['thumb']['thumb_url'] = wp_get_attachment_url($image->ID);
                $result['thumb']['thumb_link'] = wp_get_attachment_link($image->ID);
                $result['thumb']['thumb_postlink'] = get_permalink($image->post_parent);
                $result['thumb']['thumb_title'] = apply_filters('the_title', $image->post_title);
                $result['thumb']['thumb_desc'] = apply_filters('the_content', $image->post_content);
                $result['thumb']['thumb_excerpt'] = apply_filters('the_excerpt', $image->post_excerpt);
            }
            else
            {
                $result[]['att_img'] = wp_get_attachment_image($image->ID, $size);
                $result[]['att_url'] = wp_get_attachment_url($image->ID);
                $result[]['att_link'] = wp_get_attachment_link($image->ID);
                $result[]['postlink'] = get_permalink($image->post_parent);
                $result[]['att_title'] = apply_filters('the_title', $image->post_title);
                $result[]['att_desc'] = apply_filters('the_content', $image->post_content);
                $result[]['att_excerpt'] = apply_filters('the_excerpt', $image->post_excerpt);
            }
        }

        $result['first_image']['thumb_img'] = $result[0]['att_img'];
        $result['first_image']['thumb_url'] = $result[0]['att_url'];
        $result['first_image']['thumb_link'] = $result[0]['att_link'];
        $result['first_image']['thumb_postlink'] = $result[0]['postlink'];
        $result['first_image']['thumb_title'] = $result[0]['att_title'];
        $result['first_image']['thumb_desc'] = $result[0]['att_desc'];
        $result['first_image']['thumb_excerpt'] = $result[0]['att_excerpt'];

        return $result;
    }

    return FALSE;

}

function fsThumbnail($size='thumbnail')
{
    global $post;

    $images = fsGetImages($size);
    $result = array();
    if (empty($images))
    {
        return FALSE;
    }
    else
    {

        if (array_key_exists('thumb', $images))
        {
            $result['thumbnail'] = $images['thumb'];
        }
        else
        {
            $result['thumbnail'] = $images['first_image'];
        }
    return $result['thumbnail'];
    }

   /* if ('' !== get_the_post_thumbnail($post->ID))
    {
        $thumb = get_the_post_thumbnail($post->ID, $size);
    }
    else
    {
        if(function_exists('fsGetImages'))
        {
            $images = fsGetImages($size);
            $thumb = ($images) ? $images['first_image']['att_img'] : FALSE;
        }
    }*/
}

function fsWPMeta($post_id)
{
    if ($post_id)
    {

    }
}