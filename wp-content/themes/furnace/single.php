<?php
get_header();
$vl = get_queried_object();
var_dump($vl);
$loop = furnaceLoop();
if ($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();
get_template_part('loop', 'single');
endwhile;

endif;
get_sidebar();
get_footer();