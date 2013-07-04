<?php

get_header();
$loop = furnaceLoop(apply_filters('fs_loop_default_args', NULL));

if ($loop->have_posts()) :
    while ($loop->have_posts()) : $loop->the_post();
get_template_part('loop', get_post_format());
endwhile;
else :
    get_404_template();
endif;
get_footer();