<?php
/**
 * Default loop template
 */


$loop = furnaceLoop();

if ($loop->have_posts()) :
echo apply_filters('fs_content_wrap_start', '<div>');
    while ($loop->have_posts()) : $loop->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content(); ?>

        </article>

    <?php endwhile;
echo apply_filters('fs_content_wrap_end', '</div>');
endif;
?>