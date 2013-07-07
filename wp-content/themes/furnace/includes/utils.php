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
function fsGetImages($size = 'thumbnail', $post_id = NULL)
{
    $post_id = (NULL === $post_id) ? get_the_ID() : $post_id;
    $result = array();

    if($images = get_posts(array(
        'post_parent'    => $post_id,
        'post_type'      => 'attachment',
        'numberposts'    => -1, // show all
        'post_status'    => null,
        'post_mime_type' => 'image',
    )))
    {

        foreach ($images as $key => $image)
        {

            if ($image->ID === (int) get_post_thumbnail_id($post_id))
            {
                $result['thumb']['thumb_img'] = get_the_post_thumbnail($post_id, $size);
                $result['thumb']['thumb_url'] = wp_get_attachment_url($image->ID);
                $result['thumb']['thumb_link'] = wp_get_attachment_link($image->ID);
                $result['thumb']['thumb_postlink'] = get_permalink($image->post_parent);
                $result['thumb']['thumb_title'] = apply_filters('the_title', $image->post_title);
                $result['thumb']['thumb_desc'] = apply_filters('the_content', $image->post_content);
                $result['thumb']['thumb_excerpt'] = apply_filters('the_excerpt', $image->post_excerpt);
            }
            else
            {
                $result[$key]['att_img'] = wp_get_attachment_image($image->ID, $size);
                $result[$key]['att_url'] = wp_get_attachment_url($image->ID);
                $result[$key]['att_link'] = wp_get_attachment_link($image->ID);
                $result[$key]['postlink'] = get_permalink($image->post_parent);
                $result[$key]['att_title'] = apply_filters('the_title', $image->post_title);
                $result[$key]['att_desc'] = apply_filters('the_content', $image->post_content);
                $result[$key]['att_excerpt'] = apply_filters('the_excerpt', $image->post_excerpt);
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


/**
 * [fsThumbnail returns Post Thumbnail or (if no Thumbnail) first image of the post or FALSE on no images. It returns an array of information for the images on success.]
 * @param  string $size    [Optional. image size to return]
 * @param  [int] $post_id [Optional. if not specified returns images from the Current post]
 * @return [array|false]          [Returns an array of image information alongwith the image itself on success or FALSE if fails to find out any image]
 */
function fsThumbnail($size='thumbnail', $post_id = NULL)
{
    $post_id = (NULL === $post_id) ? get_the_ID() : $post_id;
    $images = fsGetImages($size, $post_id);
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
}

function fsWPMeta($post_id)
{
    if ($post_id)
    {

    }
}